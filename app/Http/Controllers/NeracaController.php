<?php

namespace App\Http\Controllers;

use App\Akun;
use App\Jurnal_header;
use App\Neraca;
use Illuminate\Http\Request;

class NeracaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.Neraca.awal');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampil(Request $request)
    {
        // bener sing iki si o?
        // iyo
        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->with('Jurnal_detail')->get();
        foreach($Jurnalheader as $date){
            $dt = date('M Y',strtotime($date->tanggal));
        }
        $akuns = Akun::all();

        // foreach($akuns as $akun) {

        //     foreach($Jurnalheader as $header) {
        //         foreach($header->jurnal_detail as $detail) {

        //         }
        //     }
        // }

        // dd($Jurnalheader);
        // return view('admin.BB.tampil',compact('akuns','Jurnalheader'));
        return view('admin.Neraca.index',compact('akuns','Jurnalheader','dt'));
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
