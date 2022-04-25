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
    
    // Index Admin 
    public function index(){
        return view('admin.Lappen.index');           
    }

    // Index Pemilik 
    public function indexpemilik(){
        return view('pemilik.Lappen.index');           
    }
    
    // Tampil Admin
    public function tampilindex(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
		
        $Trx_header = Trx_header::whereYear('tgl_trx', '=', $year)->whereMonth('tgl_trx', '=', $month)->with('pelanggan')->get();
        $barang = barang::all();
        $Trx_detail = Trx_detail::all();
        return view('admin.Lappen.tampil',compact('barang','Trx_detail','Trx_header'));
    }

    // Tampil Pemilik
    public function tampilindexpemilik(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
		
        $Trx_header = Trx_header::whereYear('tgl_trx', '=', $year)->whereMonth('tgl_trx', '=', $month)->with('pelanggan')->get();
        $barang = barang::all();
        $Trx_detail = Trx_detail::all();
        return view('pemilik.Lappen.tampil',compact('barang','Trx_detail','Trx_header'));
    }

    //print out
    public function cetak(Request $request){
        $Trx_header = Trx_header::select('*')->get();
        $barang = barang::all();
        $Trx_detail = Trx_detail::all();

             foreach($Trx_header as $date){
                $dt = date('M Y',strtotime($date->tgl_trx));
             }
                $pdf = PDF::loadview('admin.Lappen.cetak', compact('barang','Trx_detail','Trx_header','dt'))->setPaper('A4','potrait');
                return $pdf->stream();
    }

}
