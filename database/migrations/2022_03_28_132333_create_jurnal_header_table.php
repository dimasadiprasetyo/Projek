<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_header', function (Blueprint $table) {
            
            $table->string('id_jurnal')->primary();
            $table->enum('status_posting',['1','0']);
            $table->date('tanggal');
            $table->char('id_trx',17);
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('id_trx')->references('id_trx')->on('trx_headers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_header');
    }
}
