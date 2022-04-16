<?php

namespace App\Http\Controllers;

use App\Trx_header;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function dasboard(){
        $Trxheader = Trx_header::where('jenis_transaksi','=', 'Kredit')
        ->with('Pelanggan','Trx_detail','barang')->get();
        $totalPiutang = 0;
        foreach($Trxheader as $trx) {
            $totalPiutang = $totalPiutang + $trx->kurang_bayar;
        }
        
        return view('dasboard.index',compact('Trxheader', 'totalPiutang'));
    }
}
