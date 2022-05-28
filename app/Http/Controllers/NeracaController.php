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
        // dd($request->all());
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->where('status_posting','=','1')->with('Jurnal_detail')->get();
        // dd($Jurnalheader);
        
        $akuns = Akun::whereNotIn('id_akun',[402,102])->get();
        return view('admin.Neraca.index',compact('akuns','Jurnalheader','month','year'));
    }

    // Tampil Pemilik
    public function tampilpemilik(Request $request){

        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->where('status_posting','=','1')->with('Jurnal_detail')->get();
        
        $akuns = Akun::whereNotIn('id_akun',[402,102])->get();
        return view('pemilik.Neraca.index',compact('akuns','Jurnalheader'));
    }

    // print out
    public function cetak(Request $request){
        $month = $request->month;
	    $year = $request->year;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->where('status_posting','=','1')->with('Jurnal_detail')->get();
        foreach($Jurnalheader as $date){
            $dt = date('M Y',strtotime($date->tanggal));
        }
        $akuns = Akun::whereNotIn('id_akun',[402,102])->get();
        $tgl = date('d-m-Y');
        $pdf = PDF::loadview('admin.Neraca.cetak', compact('Jurnalheader','akuns','dt','tgl'));
        return $pdf->stream();
    }
    
}
