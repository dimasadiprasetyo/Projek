<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('trx_headers', function (Blueprint $table) {
            
            $table->char('id_trx', 17)->primary();
            $table->string('kode_pelanggan')->nullable();// pelanggan
            $table->date('tgl_trx');
            $table->string('keterangan')->nullable();
            $table->enum('jenis_transaksi',['Tunai','Kredit']);
            $table->enum('status_trx',['Belum Lunas','Lunas']);
            $table->bigInteger('total_bayar')->nullable();
            $table->bigInteger('kurang_bayar')->nullable();
            $table->date('tgl_jatuhtemp')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('kode_pelanggan')->references('kode_pelanggan')->on('pelanggans')->OnDelete('set null')->OnUpdate('set null');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('trx_headers');
        Schema::enableForeignKeyConstraints();
    }
}
