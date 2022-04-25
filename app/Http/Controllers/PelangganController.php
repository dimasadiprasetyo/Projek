<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    //index
    public function index(){
        $Pelanggans = Pelanggan::all();
        // dd($Pelanggans);
        // dd($Penjualankavlings);
        return view('admin.Pelanggan.index', compact('Pelanggans'));
    }
    
    //create/tambah
    public function create(){
        // $pelanggans = Pelanggan::select('id', 'kode_pelanggan')->get();
        return view('admin.Pelanggan.tambah');
    }

    //store/tambah
    public function store(Request $request){
        $validation = $request->validate([
            'kode_pelanggan'=> 'required|min:6|max:8',
            'nama_pelanggan'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
        ],
        [
                'kode_pelanggan.required'=>'Lengkapi Data!',
                'kode_pelanggan.min'=>'Masukkan Minim 6 Karakter',
                'kode_pelanggan.max'=>'Masukkan Maks 8 Karakter',
                'nama_pelanggan.required'=>'Lengkapi Data!',
                'alamat.required'=>'Lengkapi Data!',
                'telepon.required'=>'Lengkapi Data!',
        ]);
        Pelanggan::create([
            'kode_pelanggan'=>$request->kode_pelanggan,
            'nama_pelanggan'=>$request->nama_pelanggan,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
        ]);
        return redirect(route('pelanggan.index'))->withToastSuccess("Data Berhasil Ditambahkan");
    }

    //edit
    public function edit(Pelanggan $pelanggan){
        return view('admin.Pelanggan.edit', compact('pelanggan'));
    }

    //update
    public function update(Request $request, Pelanggan $pelanggan){
        $pelanggan->update([
            'kode_pelanggan'=>$request->kode_pelanggan,
            'nama_pelanggan'=>$request->nama_pelanggan,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
        ]);
        return redirect(route('pelanggan.index'))->withToastSuccess("Data Berhasil Di Edit");
    }

    //destroy/hapus
    public function destroy(Pelanggan $pelanggan){
        $pelanggan->delete();
        return redirect(route('pelanggan.index'));
    }
}
