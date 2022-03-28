<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngsuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsurans', function (Blueprint $table) {
            $table->string('kode_angsuran')->primary();
            $table->date('tanggal_ang');
            $table->char('id_trx',17);
            $table->bigInteger('angsuran_ke');
            $table->bigInteger('jml_bayar');
            $table->bigInteger('kurang_bayar');
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
        Schema::dropIfExists('angsurans');
    }
}
