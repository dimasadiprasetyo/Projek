<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $primaryKey = 'kode_barang';
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = ['kode_barang','jenis_barang','asal_barang','ukuran_barang','stok','harga','created_at','updated_at'];

    public function trx_header(){
        return  $this->hasMany('App\Trx_header','barang_id','kode_barang');
    }
    public function trx_detail(){
        return  $this->hasManyThrough('App\Trx_detail','barang_id','kode_barang');
    }
    public function angsuran(){
        return  $this->hasMany('App\Angsuran','kode_barang','kode_angsuran');
    }
    public function lappen(){
        return  $this->hasMany('App\Lappen');
    }
}
