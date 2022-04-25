<?php

namespace App\Http\Controllers;

use App\barang;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //index
    public function index(){
        $Barangs = Barang::all();
        // dd($Penjualankavlings);
        return view('admin.Barang.index', compact('Barangs'));
    }

    //create
    public function create(){
        // $barangs = barang::select('id', 'kode_barang')->get();
        return view('admin.Barang.tambah');
    }
    
    //store
    public function store(Request $request){
        $validation = $request->validate([
            'kode_barang'=> 'required|min:7|max:10',
            'jenis_barang'=>'required',
            'ukuran_barang'=>'required',
            'stok'=>'required',
            'harga'=>'required',
        ],
        [
                'kode_barang.required'=>'Lengkapi Data!',
                'kode_barang.min'=>'Masukkan Minim 7 Karakter',
                'kode_barang.max'=>'Masukkan Maks 10 Karakter',
                'jenis_barang.required'=>'Lengkapi Data!',
                'ukuran_barang.required'=>'Lengkapi Data!',
                'stok.required'=>'Lengkapi Data!',
                'harga.required'=>'Lengkapi Data!',
        ]);
        barang::create([
            'kode_barang'=>$request->kode_barang,
            'jenis_barang'=>$request->jenis_barang,
            'asal_barang'=>$request->asal_barang,
            'ukuran_barang'=>$request->ukuran_barang,
            'stok'=>$request->stok,
            'harga'=>$request->harga
        ]);
        
        return redirect(route('barang.index'))->withToastSuccess("Data Berhasil Ditambahkan");
    }

    //show
    public function show(barang $barang){
        //
    }

    //edit
    public function edit(barang $barang){
        return view('admin.Barang.edit', compact('barang'));
    }

    //update
    public function update(Request $request, barang $barang)
    {
        $barang->update([
            'kode_barang'=>$request->kode_barang,
            'jenis_barang'=>$request->jenis_barang,
            'asal_barang'=>$request->asal_barang,
            'ukuran_barang'=>$request->ukuran_barang,
            'stok'=>$request->stok,
            'harga'=>$request->harga
        ]);
        return redirect(route('barang.index'))->withToastSuccess("Data Berhasil Di Edit");
    }

    //destroy
    public function destroy(barang $barang){
        $barang->delete();
        return redirect(route('barang.index'))->with('success','Hapus Sukses');

    }
}
