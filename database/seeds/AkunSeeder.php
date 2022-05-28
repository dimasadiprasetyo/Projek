<?php

use Illuminate\Database\Seeder;
use App\Akun;
use App\User;
use Illuminate\Support\Str;
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
            'id_akun'=>'101',
            'nama_akun'=>'Kas',
            'saldo_awal'=>0,
            'saldo_akhir'=>0,
            'jenis_akun'=>'Debet',
        ]);
        Akun::create([
            'id_akun'=>'102',
            'nama_akun'=>'Persediaan Barang Dagang',
            'saldo_awal'=>0,
            'saldo_akhir'=>0,
            'jenis_akun'=>'Debet',
        ]);
        Akun::create([
            'id_akun'=>'103',
            'nama_akun'=>'piutang usaha',
            'saldo_awal'=>0,
            'saldo_akhir'=>0,
            'jenis_akun'=>'Debet',
        ]);
        Akun::create([
            'id_akun'=>'400',
            'nama_akun'=>'penjualan',
            'saldo_awal'=>0,
            'saldo_akhir'=>0,
            'jenis_akun'=>'Kredit',
        ]);
        Akun::create([
            'id_akun'=>402,
            'nama_akun'=>'potongan penjualan',
            'saldo_awal'=>0,
            'saldo_akhir'=>0,
            'jenis_akun'=>'Debet',
        ]);
        User::create([
            'name'=>'Admin',
            'level'=>'admin',
            'email'=>'Admin@admin',
            'password'=>bcrypt('12345'),
            'username' => 'Admin',
            'remember_token'=>Str::random(60),
        ]);
        User::create([
            'name'=>'Pemilik',
            'level'=>'pemilik',
            'email'=>'Pemilik@pemilik',
            'password'=>bcrypt('12345'),
            'username' =>'Pemilik',
            'remember_token'=>Str::random(60),
        ]);
        
    }
}
