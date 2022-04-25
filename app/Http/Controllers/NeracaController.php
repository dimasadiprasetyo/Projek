<?php

namespace App\Http\Controllers;

use App\Akun;
use App\Jurnal_header;
use App\Neraca;
use PDF;
use Illuminate\Http\Request;

class NeracaController extends Controller
{
    // Index Admin
    public function index(){
        return view('admin.Neraca.awal');
    }

    // Index Pemilik
    public function indexpemilik(){
        return view('pemilik.Neraca.awal');
    }

    // Tampil Admin
    public function tampil(Request $request){

        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->where('status_posting','=',1)->with('Jurnal_detail')->get();
        foreach($Jurnalheader as $date){
            $dt = date('M Y',strtotime($date->tanggal));
        }
        $akuns = Akun::all();
        return view('admin.Neraca.index',compact('akuns','Jurnalheader','dt'));
    }

    // Tampil Pemilik
    public function tampilpemilik(Request $request){

        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->where('status_posting','=',1)->with('Jurnal_detail')->get();
        foreach($Jurnalheader as $date){
            $dt = date('M Y',strtotime($date->tanggal));
        }
        $akuns = Akun::all();
        return view('pemilik.Neraca.index',compact('akuns','Jurnalheader','dt'));
    }

    // print out
    public function cetak(){
        $Jurnalheader = Jurnal_header::select('*')->where('status_posting','=',1)->get();
        foreach($Jurnalheader as $date){
            $dt = date('M Y',strtotime($date->tanggal));
        }
        $akuns = Akun::all();
        $pdf = PDF::loadview('admin.Neraca.cetak', compact('Jurnalheader','akuns','dt'));
        return $pdf->stream();
    }
    
}
