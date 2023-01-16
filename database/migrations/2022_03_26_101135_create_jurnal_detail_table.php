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
            
            $table->id('id_jurnal_detail');
            $table->char('id_jurnal',20);
            $table->string('id_akun');
            $table->bigInteger('debit');
            $table->bigInteger('kredit');

            // $table->foreign('id_akun')->references('id_akun')->on('akuns');
            // $table->foreign('id_jurnal')->references('id_jurnal')->on('jurnal_header')->onDelete('cascades');
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
