<?php

namespace App\Http\Controllers;

use App\Angsuran;
use App\Lappi;
use App\Trx_header;
use Illuminate\Http\Request;

class LappiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // index
    public function index()
    {
        return view('admin.Lappi.index');
    }
    
    // tampil
    public function tampilindex(Request $request)
    {   
        $month = $request->bulan;
	    $year = $request->tahun;
        $Trxheader = Trx_header::where('jenis_transaksi','=', 'Kredit')
        ->with('Pelanggan','Trx_detail','barang')
        ->whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)->get();
        $totalPiutang = 0;
        foreach($Trxheader as $trx) {
            $totalPiutang = $totalPiutang + $trx->kurang_bayar;
        }
        return view('admin.Lappi.tampil',compact('Trxheader', 'totalPiutang'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lappi  $lappi
     * @return \Illuminate\Http\Response
     */
    public function show(Lappi $lappi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lappi  $lappi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lappi $lappi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lappi  $lappi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lappi $lappi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lappi  $lappi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lappi $lappi)
    {
        //
    }
}
