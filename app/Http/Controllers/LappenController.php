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
		
        $Trx_header = Trx_header::whereYear('tgl_trx', '=', $year)
                      ->whereMonth('tgl_trx', '=', $month)
                      ->with('pelanggan')->get();
        $barang = barang::all();
        $Trx_detail = Trx_detail::all();

        $penjualan = 0;
        foreach($Trx_header as $trx){
            $penjualan = $penjualan + $trx->total_bayar;
        }
        return view('admin.Lappen.tampil',compact('barang','Trx_detail','Trx_header','month','year','penjualan'));
    }

    // Tampil Pemilik
    public function tampilindexpemilik(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
		
        $Trx_header = Trx_header::whereYear('tgl_trx', '=', $year)
                      ->whereMonth('tgl_trx', '=', $month)
                      ->with('pelanggan')->get();
        $barang = barang::all();
        $Trx_detail = Trx_detail::all();
        $penjualan = 0;
        foreach($Trx_header as $trx){
            $penjualan = $penjualan + $trx->total_bayar;
        }
        return view('pemilik.Lappen.tampil',compact('barang','Trx_detail','Trx_header','penjualan'));
    }

    //print out
    public function cetak(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
        $dataBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $selectedMonth = str_replace('0','',$month);
        $monthName = $dataBulan[$selectedMonth -1];
        
        $Trx_header = Trx_header::whereYear('tgl_trx', '=', $year)
                     ->whereMonth('tgl_trx', '=', $month)
                     ->with('pelanggan')->get();
        $barang = barang::all();
        $tgl = date('d-m-Y');
        $Trx_detail = Trx_detail::all();
        $penjualan = 0;
        foreach($Trx_header as $trx){
            $penjualan = $penjualan + $trx->total_bayar;
        }
            //  foreach($Trx_header as $date){
            //     $dt = date('F Y',strtotime($date->tgl_trx));
            //  }
             
                $pdf = PDF::loadview('admin.Lappen.cetak', compact('barang','Trx_detail','Trx_header','monthName','year','penjualan','month','tgl'))->setPaper('A4','potrait');
                return $pdf->stream();
    }

}
