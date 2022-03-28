<?php

namespace App\Http\Controllers;

use App\barang;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Barangs = Barang::all();
        // dd($Penjualankavlings);
        return view('admin.Barang.index', compact('Barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $barangs = barang::select('id', 'kode_barang')->get();
        return view('admin.Barang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        return view('admin.Barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        $barang->delete();
        return redirect(route('barang.index'))->with('success','Hapus Sukses');;

    }
}
