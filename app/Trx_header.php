<?php

namespace App;
use \Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trx_header extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_trx';
    protected $keyType = 'char';
    protected $table = 'trx_headers';
    public $incrementing = false;
    protected $fillable = ['id_trx','kode_pelanggan','pelanggan','tgl_trx','keterangan','jenis_barang','jenis_transaksi',
                            'status_trx','total_bayar','kurang_bayar','ongkos','tgl_jatuhtemp'];

    public function Trx_detail(){
        return  $this->BelongsTo('App\Trx_detail','id_trx','id_trx');
    }
    public function barang(){
        return  $this->BelongsTo('App\barang','barang_id','kode_barang');
    }
    public function Pelanggan(){
        return  $this->belongsTo('App\Pelanggan','kode_pelanggan','kode_pelanggan')->withDefault([
            'kode_pelanggan'=>'nama_pelanggan',
        ]);;
    }
    
    public function Angsuran(){
        return  $this->hasMany('App\Angsuran','kode_angsuran','id_trx');
    }
    public function jurnal_header(){
        return  $this->hasMany('App\Jurnal_header','id_trx','id_trx');
    }
   
}
