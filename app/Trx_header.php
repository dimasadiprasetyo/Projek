<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trx_header extends Model
{
    protected $primaryKey = 'id_trx';
    protected $keyType = 'char';
    public $incrementing = false;
    protected $fillable = ['id_trx','kode_pelanggan','tgl_trx','keterangan','jenis_barang','jenis_transaksi','status_trx','total_bayar','kurang_bayar','tgl_jatuhtemp'];

    public function barang(){
        return  $this->belongsTo('App\barang','barang_id','id_trx');
    }
    public function Pelanggan(){
        return  $this->belongsTo('App\Pelanggan','kode_pelanggan','kode_pelanggan')->withDefault([
            'kode_pelanggan'=>'nama_pelanggan',
        ]);;
    }
    
    public function Trx_detail(){
        return  $this->belongsTo('App\Trx_detail','id_trx','id_trx');
    }
    public function Angsuran(){
        return  $this->hasMany('App\Angsuran','kode_angsuran','id_trx');
    }
    public function jurnal_header(){
        return  $this->hasMany('App\Jurnal_header','id_trx','id_trx');
    }
   
}
