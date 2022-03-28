<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_detail', function (Blueprint $table) {
            
            $table->bigInteger('id_jurnal_detail')->primary();
            $table->string('id_jurnal');
            $table->string('id_akun');
            $table->bigInteger('debit');
            $table->bigInteger('kredit');

            $table->foreign('id_akun')->references('id_akun')->on('akuns');
            $table->foreign('id_jurnal')->references('id_jurnal')->on('jurnal_header');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_detail');
    }
}
