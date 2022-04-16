<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lappen extends Model
{

   public function Trx_detail(){
        return  $this->belongsTo('App\Trx_detail');
    }
   public function barang(){
        return  $this->belongsTo('App\barang');
    }
    public function Pelanggan()
    {
        return  $this->belongsTo('App\Pelanggan','kode_pelanggan')->withDefault([
            'nama_pelanggan'=>'Guest',
        ]);
    }
}
