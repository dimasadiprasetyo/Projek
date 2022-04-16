<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal_detail extends Model
{
    protected $primaryKey = 'id_jurnal_detail';
    protected $table = 'jurnal_detail';
    protected $fillable = ['id_jurnal', 'id_akun', 'debit', 'kredit'];

    public function Jurnal_header(){
        return  $this->belongsTo('App\Jurnal_header','id_jurnal','id_jurnal');
    }

}

