<?php

namespace App\Http\Controllers;

use App\barang;
use App\Jurnal_detail;
use App\Jurnal_header;
use App\Trx_detail;
use App\Trx_header;
use PDF;
use Illuminate\Http\Request;

class JPController extends Controller
{
    public function index(){
        return view('admin.JP.index');
    }

    //Index Pemilik
    public function indexpemilik(){
        return view('pemilik.JP.index');
    }

    public function tampil(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
		
        $Trx_header = Trx_header::where('jenis_transaksi','=','Kredit')
                      ->whereYear('tgl_trx', '=', $year)
                      ->whereMonth('tgl_trx', '=', $month)
                      ->with('pelanggan')->get();
        $barang = barang::all();
        $Trx_detail = Trx_detail::all();
        $penjualan = 0;
        foreach($Trx_header as $trx){
            $penjualan = $penjualan + $trx->kurang_bayar;
        }
        return view('admin.JP.tampil',compact('barang','Trx_detail','Trx_header','penjualan'));
    }

      // Tampil Pemilik
    public function tampilpemilik(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
		
        $Trx_header = Trx_header::where('jenis_transaksi','=','Kredit')
                      ->whereYear('tgl_trx', '=', $year)
                      ->whereMonth('tgl_trx', '=', $month)
                      ->with('pelanggan')->get();
        $barang = barang::all();
        $Trx_detail = Trx_detail::all();
        $penjualan = 0;
        foreach($Trx_header as $trx){
            $penjualan = $penjualan + $trx->kurang_bayar;
        }
        return view('pemilik.JP.tampil',compact('barang','Trx_detail','Trx_header','penjualan'));
    }

    public function cetak(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
        $dataBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $selectedMonth = str_replace('0','',$month);
        $monthName = $dataBulan[$selectedMonth -1];
        
        $Trx_header = Trx_header::where('jenis_transaksi','=','Kredit')
                      ->whereYear('tgl_trx', '=', $year)
                      ->whereMonth('tgl_trx', '=', $month)
                      ->with('pelanggan')->get();
        $barang = barang::all();
        $tgl = date('d-m-Y');
        $Trx_detail = Trx_detail::all();
        $penjualan = 0;
        foreach($Trx_header as $trx){
            $penjualan = $penjualan + $trx->kurang_bayar;
        }
        
        $pdf = PDF::loadview('admin.JP.cetak', compact('barang','Trx_detail','Trx_header',
                            'monthName','year','penjualan','month','tgl'))
                            ->setPaper('F4','potrait');
        return $pdf->stream();
    }
}
