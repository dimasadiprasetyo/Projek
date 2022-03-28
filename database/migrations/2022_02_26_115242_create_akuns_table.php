<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akuns', function (Blueprint $table) {
            
            $table->string('id_akun')->primary();
            $table->string('nama_akun');
            $table->bigInteger('saldo_awal')->nullable();
            $table->bigInteger('saldo_akhir')->nullable();
            $table->enum('jenis_akun',['Debet','Kredit']);
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
        Schema::dropIfExists('akuns');
    }
}
