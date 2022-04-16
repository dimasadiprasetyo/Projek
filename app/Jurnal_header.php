<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal_header extends Model
{
    protected $primaryKey = 'id_jurnal';
    protected $keyType = 'char';
    public $incrementing = false;
    protected $table = 'jurnal_header';
    protected $fillable = ['id_jurnal','status_posting','tanggal','id_trx','jenis_barang','keterangan'];

    public function Jurnal_detail(){
        return  $this->hasMany('App\Jurnal_detail','id_jurnal','id_jurnal');
    }
    public function trx_header(){
        return  $this->belongsTo('App\Trx_header','id_trx','id_trx');
    }
}
