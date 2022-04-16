<?php

namespace App\Http\Controllers;

use App\barang;
use App\Lappen;
use App\Pelanggan;
use App\Trx_detail;
use App\Trx_header;
use PDF;
use Illuminate\Http\Request;

class LappenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // ---- Admin ------
    public function index()
    {
        return view('admin.Lappen.index');           
    }
    // ---- Pemilik ------
    public function indexpemilik()
    {
        return view('admin.Lappen.index');           
    }
    
    // --- Admin ----
    public function tampilindex(Request $request)
    {
        $month = $request->bulan;
	    $year = $request->tahun;
		
        $Pelanggan = Pelanggan::all();
        $Barang = barang::all();
        $Trx_detail = Trx_detail::all();
	    $inboxs = Trx_header::whereYear('tgl_trx', '=', $year)
                      ->whereMonth('tgl_trx', '=', $month)->with('Pelanggan','Trx_detail')->get();
        // dd($inboxs);
        return view('admin.Lappen.tampil',compact('inboxs','Pelanggan','Barang','Trx_detail'));
    }
    // --- Pemilik ----
    public function tampilindexpemilik(Request $request)
    {
        $month = $request->bulan;
	    $year = $request->tahun;
		
        $Pelanggan = Pelanggan::all();
        $Barang = barang::all();
        $Trx_detail = Trx_detail::all();
	    $inboxs = Trx_header::whereYear('tgl_trx', '=', $year)
                      ->whereMonth('tgl_trx', '=', $month)->with('Pelanggan','Trx_detail')->get();
        // dd($inboxs);
        return view('pemilik.Lappen.tampil',compact('inboxs','Pelanggan','Barang','Trx_detail'));
    }

    public function cetak(Request $request){
    
	    $inboxs = Trx_header::select('*')->get();
        foreach($inboxs as $date){
            $dt = date('M Y',strtotime($date->tgl_trx));
        }
        $pdf = PDF::loadview('admin.Lappen.cetak', compact('inboxs','dt'));
        return $pdf->stream();
    }

    public function destroy(Lappen $lappen)
    {
        //
    }
}
