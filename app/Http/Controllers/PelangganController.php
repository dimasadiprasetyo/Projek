<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pelanggans = Pelanggan::all();
        // dd($Pelanggans);
        // dd($Penjualankavlings);
        return view('admin.Pelanggan.index', compact('Pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pelanggans = Pelanggan::select('id', 'kode_pelanggan')->get();
        return view('admin.Pelanggan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pelanggan::create([
            'kode_pelanggan'=>$request->kode_pelanggan,
            'nama_pelanggan'=>$request->nama_pelanggan,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
        ]);
        return redirect(route('pelanggan.index'))->withToastSuccess("Data Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('admin.Pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $pelanggan->update([
            'kode_pelanggan'=>$request->kode_pelanggan,
            'nama_pelanggan'=>$request->nama_pelanggan,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
        ]);
        return redirect(route('pelanggan.index'))->withToastSuccess("Data Berhasil Di Edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect(route('pelanggan.index'));
    }
}
