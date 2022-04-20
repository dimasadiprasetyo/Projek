<?php

use Illuminate\Database\Seeder;
use App\Akun;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Akun::create([
            [
            'id_akun'=>101,
            'nama_akun'=>'kas',
            'saldo_awal'=>0,
            'saldo_akhir'=>0,
            'jenis_akun'=>'Debet',
            ],
            [
            'id_akun'=>102,
            'nama_akun'=>'persediaan barang dagang',
            'saldo_awal'=>0,
            'saldo_akhir'=>0,
            'jenis_akun'=>'Debet',
            ],
            [
            'id_akun'=>103,
            'nama_akun'=>'piutang usaha',
            'saldo_awal'=>0,
            'saldo_akhir'=>0,
            'jenis_akun'=>'Debet',
            ],
            [
            'id_akun'=>400,
            'nama_akun'=>'penjualan',
            'saldo_awal'=>0,
            'saldo_akhir'=>0,
            'jenis_akun'=>'Kredit',
            ],
            [
            'id_akun'=>402,
            'nama_akun'=>'potongan penjualan',
            'saldo_awal'=>'0',
            'saldo_akhir'=>'0',
            'jenis_akun'=>'Debet',
            ],
        ]);
    }
}
