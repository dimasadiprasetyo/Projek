<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    
    protected $fillable = ['kode_angsuran','tanggal_ang','id_trx','angsuran_ke','jml_bayar','kurang_bayar','created_at','updated_at'];

    public function Trx_header()
    {
        return  $this->belongsTo('App\Trx_header','id_trx','id_trx');
    }
    public function Trx_detail()
    {
        return  $this->belongsTo('App\Trx_detail','kode_angsuran','id_trx');
    }
    public function Pelanggan()
    {
        return  $this->belongsTo('App\Pelanggan','kode_pelanggan','kode_pelanggan');
    }
    public function barang(){
        return  $this->belongsTo('App\barang','kode_angsuran','kode_barang');
    }
}
