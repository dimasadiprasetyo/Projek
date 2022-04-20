<?php

namespace App\Http\Controllers;

use App\Akun;
use App\Buku_besar;
use App\Jurnal_detail;
use App\Jurnal_header;
use PDF;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    // Admin
    public function index()
    {
        return view('admin.BB.index');
    }
    // Pemilik
    public function indexpemilik()
    {
        return view('pemilik.BB.index');
    }

    // Admin
    public function tampilindex(Request $request)
    {
        
        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->with('Jurnal_detail')->get();
        $akuns = Akun::all();

        return view('admin.BB.tampil',compact('akuns','Jurnalheader'));
    }

    public function tampilindexpemilik(Request $request)
    {
        
        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->with('Jurnal_detail')->get();
        $akuns = Akun::all();

        return view('pemilik.BB.tampil',compact('akuns','Jurnalheader'));
    }

    
    public function cetak(){
        $Jurnalheader = Jurnal_header::select('*')->get();
        $akuns = Akun::all();
        $pdf = PDF::loadview('admin.BB.cetak', compact('Jurnalheader','akuns'));
        return $pdf->stream();
    }
    
}
