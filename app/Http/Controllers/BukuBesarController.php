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
                        ->whereMonth('tanggal', '=', $month)
                        ->where('status_posting','=','1')
                        ->with('Jurnal_detail')->get();
        // $akuns = Akun::all();
        $akuns = Akun::whereNotIn('id_akun',[102])->get();

        return view('admin.BB.tampil',compact('akuns','Jurnalheader','month','year'));
    }
    // Tampil Pemilik
    public function tampilindexpemilik(Request $request){
        
        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->where('status_posting','=',1)->with('Jurnal_detail')->get();
        // $akuns = Akun::all();
        $akuns = Akun::whereNotIn('id_akun',[102])->get();

        return view('pemilik.BB.tampil',compact('akuns','Jurnalheader'));
    }

    // Cetak Admin
    public function cetak(Request $request){
        $month = $request->month;
	    $year = $request->year;

        $dataBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $selectedMonth = str_replace('0','',$month);
        $monthName = $dataBulan[$selectedMonth -1];

        $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->where('status_posting','=','1')->with('Jurnal_detail')->get();
        foreach($Jurnalheader as $date){
            $dt = date('M Y',strtotime($date->tanggal));
        }
        // $akuns = Akun::all();
        $akuns = Akun::whereNotIn('id_akun',[102])->get();
        $tgl = date('d-m-Y');

        $pdf = PDF::loadview('admin.BB.cetak', compact('Jurnalheader','akuns','dt','tgl', 'monthName', 'year'))->setpaper('F4','potrait');
        return $pdf->stream();
    }
    
}
