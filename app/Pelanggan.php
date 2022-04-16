<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $primaryKey = 'kode_pelanggan';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['kode_pelanggan','nama_pelanggan','alamat','telepon'];

    public function trx_header(){
        return  $this->hasMany('App\Trx_header','kode_pelanggan','kode_pelanggan');
    }
    public function Angsuran(){
        return  $this->hasMany('App\Angsuran');
    }
    public function Lappen(){
        return  $this->hasMany('App\Lappen');
    }
}
