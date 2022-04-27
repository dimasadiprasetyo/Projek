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
    // Index Admin
    public function index(){
        return view('admin.BB.index');
    }
    // Index Pemilik
    public function indexpemilik(){
        return view('pemilik.BB.index');
    }


    // Tampil Admin
    public function tampilindex(Request $request){
        
        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->where('status_posting','=',1)->with('Jurnal_detail')->get();
        $akuns = Akun::all();

        return view('admin.BB.tampil',compact('akuns','Jurnalheader'));
    }
    // Tampil Pemilik
    public function tampilindexpemilik(Request $request){
        
        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->where('status_posting','=',1)->with('Jurnal_detail')->get();
        $akuns = Akun::all();

        return view('pemilik.BB.tampil',compact('akuns','Jurnalheader'));
    }

    // Cetak Admin
    public function cetak(){
        $Jurnalheader = Jurnal_header::select('*')->where('status_posting','=',1)->where('status_posting','=',1)->get();
        $akuns = Akun::all();
        foreach($Jurnalheader as $date){
            $dt = date('M Y',strtotime($date->tanggal));
        }
        $pdf = PDF::loadview('admin.BB.cetak', compact('Jurnalheader','akuns','dt'))->setpaper('a4','potrait');
        return $pdf->stream();
    }
    
}
