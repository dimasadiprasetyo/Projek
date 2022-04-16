<?php

namespace App\Http\Controllers;

use App\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Akuns = Akun::all();
        // dd($Penjualankavlings);
        return view('admin.Akun.index', compact('Akuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $akuns = Akun::select('id', 'id_akun')->get();
        return view('admin.Akun.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'id_akun'=> 'required|min:3|max:6',
            'nama_akun'=>'required',
        ],
        [
                'id_akun.required'=>'Lengkapi Data!',
                'id_akun.min'=>'Masukkan Minim 3 Karakter',
                'id_akun.max'=>'Masukkan Maks 6 Karakter',
                'nama_akun.required'=>'Lengkapi Data!',
        ]);
        Akun::create([
            'id_akun'=>$request->id_akun,
            'nama_akun'=>$request->nama_akun,
            'saldo_awal'=>$request->saldo_awal,
            'saldo_akhir'=>$request->saldo_akhir,
            'jenis_akun'=>$request->jenis_akun,
        ]);
        return redirect(route('akun.index'))->withToastSuccess("Data Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit(Akun $akun)
    {
        return view('admin.Akun.edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Akun $akun)
    {
        $akun->update([
            'id_akun'=>$request->id_akun,
            'nama_akun'=>$request->nama_akun,
            'saldo_awal'=>$request->saldo_awal,
            'saldo_akhir'=>$request->saldo_akhir,
            'jenis_akun'=>$request->jenis_akun,
        ]);
        return redirect(route('akun.index'))->withToastSuccess("Data Berhasil Di edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Akun $akun)
    {
        //
    }
}
