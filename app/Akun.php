<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $primaryKey = 'id_akun';
    protected $fillable = ['id_akun','nama_akun','saldo_awal','saldo_akhir','jenis_akun','created_at','updated_at'];

    public function Jurnal_detail(){
        return  $this->hasMany('App\Jurnal_detail','id_jurnal','id_jurnal');
    }
    
}
