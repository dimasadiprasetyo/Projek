<?php

namespace App\Http\Controllers;
use DB;
use App\Trx_header;
use App\User;

use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function dasboard(){
        //user
        $user = User::count();
        
        // bulan
        $totaldp = 0;
        $totalbayar = 0;
        $bulan = Trx_header::whereMonth('tgl_trx',date('m'))->with('Pelanggan','Trx_detail','barang')->get();
        foreach ($bulan as $bln) {
            $totalbayar += $bln->total_bayar;
            $totaldp += $bln->kurang_bayar;
        }
        // dd($totaldp);
        $total1 = $totalbayar - $totaldp;
        
        
        // date('Y-m-d');

        // hari ini
        $totaldp = 0;
        $totalbayar = 0;
        $bulan = Trx_header::where('tgl_trx',date('Y-m-d'))->with('Pelanggan','Trx_detail','barang')->get();
        foreach ($bulan as $bln) {
            $totalbayar  += $bln->total_bayar;
            $totaldp += $bln->kurang_bayar;
        }
        $total2 = $totalbayar - $totaldp;

        // piutang
        $total3 = 0;
        $Trxheader = Trx_header::where('jenis_transaksi','=', 'Kredit')->with('Pelanggan','Trx_detail','barang')->get();
        foreach($Trxheader as $trx) {
            $total3= $total3 + $trx->kurang_bayar;
        }


        // Statistik

        

                // $piutangdagang=Trx_header::where('jenis_transaksi','=', 'Kredit')
                //                 ->select(DB::raw("CAST(SUM(kurang_bayar) as int)as kurang_bayar"))
                //                 ->whereYear("tgl_trx",date('Y'))
                //                 ->GroupBy(DB::raw("Month(tgl_trx)"))
                //                 ->pluck('kurang_bayar');
                
                // $pendapatan=Trx_header::select(DB::raw("CAST(SUM(total_bayar) as int)as total_bayar"))
                //         ->whereYear("tgl_trx",date('Y'))
                //         ->GroupBy(DB::raw("Month(tgl_trx)"))
                //         ->pluck('total_bayar');
                // $pendapatan=Trx_header::select(DB::raw("COUNT(total_bayar) as total_bayar"))
                //         ->whereYear("tgl_trx",date('Y'))
                //         ->GroupBy(DB::raw("Month(tgl_trx)"))
                //         ->pluck('total_bayar');


                // $labels = $pendapatan->keys();
                // $data = $pendapatan->values();
            //     $months = Trx_header::select(DB::raw("Month(tgl_trx) as month"))
            //             ->whereYear("tgl_trx",date('Y'))
            //             ->GroupBy(DB::raw("Month(tgl_trx)"))
            //             ->pluck('month');
            //   $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
            //   foreach($months as $index => $month){
            //       $datas[$month] = $pendapatan[$index];
            //   }
       
        return view('dasboard/index',compact('user','bulan','Trxheader','total1','total2','total3' ));
       
                    
    }

    public function getData(){
       

    }
}
