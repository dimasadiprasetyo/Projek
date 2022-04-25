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
        $total1 = 0;
        $bulan = Trx_header::whereMonth('tgl_trx',date('m'))->with('Pelanggan','Trx_detail','barang')->get();
        foreach ($bulan as $bln) {
            $total1 = $total1 + $bln->total_bayar;
        }

        // hari ini
        $total2 = 0;
        $bulan = Trx_header::whereDay('tgl_trx',date('d'))->with('Pelanggan','Trx_detail','barang')->get();
        foreach ($bulan as $bln) {
            $total2 = $total2 + $bln->total_bayar;
        }

        // piutang
        $total3 = 0;
        $Trxheader = Trx_header::where('jenis_transaksi','=', 'Kredit')->with('Pelanggan','Trx_detail','barang')->get();
        foreach($Trxheader as $trx) {
            $total3= $total3 + $trx->kurang_bayar;
        }

        // dd($total3);

        //STATISTIK      
        $piutangdagang=Trx_header::where('jenis_transaksi','=', 'Kredit')
                ->select(DB::raw("CAST(SUM(kurang_bayar) as int)as kurang_bayar"))
                ->whereYear("tgl_trx",date('Y'))
                ->GroupBy(DB::raw("Month(tgl_trx)"))
                ->pluck('kurang_bayar');
        
        // $bulanpiutang=Trx_header::select(DB::raw("MONTHNAME(tgl_trx)as bulanpiutang"))
        //         ->GroupBy(DB::raw("MONTHNAME(tgl_trx)"))
        //         ->pluck('bulanpiutang');
        
        $pendapatan=Trx_header::select(DB::raw("CAST(SUM(total_bayar) as int)as total_bayar"))
                ->whereYear("tgl_trx",date('Y'))
                ->GroupBy(DB::raw("Month(tgl_trx)"))
                ->pluck('total_bayar');
        // $piutangdagang=Trx_header::where('jenis_transaksi','=', 'Kredit')
        //         ->select(DB::raw("CAST(SUM(kurang_bayar) as int)as kurang_bayar"))
        //         ->GroupBy(DB::raw("Month(tgl_trx)"))
        //         ->pluck('kurang_bayar');
        
        // $bulanpiutang=Trx_header::select(DB::raw("MONTHNAME(tgl_trx)as bulanpiutang"))
        //         ->GroupBy(DB::raw("MONTHNAME(tgl_trx)"))
        //         ->pluck('bulanpiutang');
        
        // $pendapatan=Trx_header::select(DB::raw("CAST(SUM(total_bayar) as int)as total_bayar"))
        //         ->GroupBy(DB::raw("Month(tgl_trx)"))
        //         ->pluck('total_bayar');

        return view('dasboard/index',compact('user','bulan','Trxheader','total1','total2','total3','piutangdagang','pendapatan'));
        
    }

    public function getData(){
        

        //foreac($bulanpiutang as $b):
            //$piutangdagang = Trx_header::where('MONTH(tgl)','=', $b->bulanpiutang) where kro ngecek tahunbulan trs jenis transaksi
                // ->select(DB::raw("CAST(SUM(kurang_bayar) as int)as kurang_bayar"))
                // ->GroupBy(DB::raw("Month(tgl_trx)"))//iki ms uwes
                // ->pluck('kurang_bayar')
                //endforach
                //njpk e ojo monthname tok tpi kro month e semisal januari =01 kokuinan
                //lanjut sesok nek rk kpn2 manej puo ak meh turu wkwk, haa mas suwun
                // nko kabari ow nek lego insyaaAllah
        // aku rak paham mas wkwk, jal di contohi langsung wae
               
    }
}
