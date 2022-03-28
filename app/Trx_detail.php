<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trx_detail extends Model
{
    protected $primaryKey = 'id_trx';
    protected $keyType = 'char';
    public $incrementing = false;
    protected $fillable = ['id_trx','barang_id','qty','diskon','total_harga','created_at','updated_at'];

    public function barang(){
        return  $this->belongsTo('App\barang','barang_id','kode_barang');
    }
    public function Pelanggan(){
        return  $this->belongsTo('App\Pelanggan','kode_pelanggan','kode_pelanggan');
    }
    public function Trx_header(){
        return  $this->hasMany('App\Trx_header','id_trx','id_trx');
    }
    public function Angsuran(){
        return  $this->hasMany('App\Angsuran','kode_angsuran','id_trx');
    }
    
}
