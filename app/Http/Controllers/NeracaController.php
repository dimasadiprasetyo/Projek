<?php

namespace App\Http\Controllers;

use App\Akun;
use App\Jurnal_header;
use App\Neraca;
use PDF;
use Illuminate\Http\Request;

class NeracaController extends Controller
{
    // Admin
    public function index()
    {

        return view('admin.Neraca.awal');
    }
    // Pemilik
    public function indexpemilik()
    {

        return view('pemilik.Neraca.awal');
    }
    // Admin
    public function tampil(Request $request)
    {

        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->with('Jurnal_detail')->get();
        foreach($Jurnalheader as $date){
            $dt = date('M Y',strtotime($date->tanggal));
        }
        $akuns = Akun::all();
        return view('admin.Neraca.index',compact('akuns','Jurnalheader','dt'));
    }
    // Pemilik
    public function tampilpemilik(Request $request)
    {

        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->with('Jurnal_detail')->get();
        foreach($Jurnalheader as $date){
            $dt = date('M Y',strtotime($date->tanggal));
        }
        $akuns = Akun::all();
        return view('pemilik.Neraca.index',compact('akuns','Jurnalheader','dt'));
    }

    public function cetak(){
        $Jurnalheader = Jurnal_header::select('*')->get();
        foreach($Jurnalheader as $date){
            $dt = date('M Y',strtotime($date->tanggal));
        }
        $akuns = Akun::all();
        $pdf = PDF::loadview('admin.Neraca.cetak', compact('Jurnalheader','akuns','dt'));
        return $pdf->stream();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function show(Neraca $neraca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function edit(Neraca $neraca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Neraca $neraca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Neraca $neraca)
    {
        //
    }
}
