<?php

namespace App\Http\Controllers;

use App\barang;
use App\Pelanggan;
use App\Trx_detail;
use App\Trx_header;
use Illuminate\Http\Request;

class KreditController extends Controller
{
    public function create(){
        $pelanggans=Pelanggan::all();
        $barangs=barang::all();
        $datas=barang::select('kode_barang');
        $tgl=date('dmYHis'); 
        $tglInput = date('Y-m-d');
        $id_trx = "TRX".$tgl;
            return view('admin.Trxkredit.index', compact('pelanggans','barangs', 'id_trx', 'tglInput'));
    }

    public function detailStore(Request $request){

        $kodebarang=$request->kode_barang;
        $barang = barang::where('kode_barang',$kodebarang)->first();
        $dis= 0;
        if($request->qty >= 10){
            $dis=(25/100)*$barang->harga*$request->qty;
        }
        $totalHarga = $barang->harga*$request->qty-$dis;
        Trx_detail::create([
            'id_trx'=>$request->id_trx,
            'barang_id'=>$request->kode_barang,
            'qty'=>$request->qty,
            'diskon'=>$dis,
            'total_harga'=>$totalHarga,
        ]);
        // barang::   
    }

    public function detailIndex($id_trx){
        $trx_detail = Trx_detail::where('id_trx', $id_trx)->with('barang')->get();
            // $totalpen = Trx_detail::sum("total_harga")->where('id_trx', $id_trx);
            $total = 0;
        foreach($trx_detail as $detail) {
            $total += $detail->total_harga;
        }
        // dd($trx_detail);
            return response()->json([
                'trx_detail' => $trx_detail,
                'total_penjualan' => $total]);
    }

    public function headerstoretunai(Request $request){
        $pelanggans=Pelanggan::all();
        $barangs=barang::all();
        $datas=barang::select('kode_barang');
        $tgl=date('dmYHis'); 
        $id_trx = "TRX".$tgl;
        $tglInput = date('Y-m-d');
        $tambah_tanggal = mktime(0,0,0,date('m')+1,date('d'),date('Y')); // angka 2,7,1 yang dicetak tebal bisa dirubah rubah
    //    dd($request->all());
        // $tgl_jatuhtemp = date('Y-m-d',$tambah_tanggal);
        Trx_header::create([
            'id_trx'=> $request->id_trx,
            'kode_pelanggan'=>$request->kode_pelanggan,
            'tgl_trx'=> $request->tgl_trx,
            'keterangan'=>$request->keterangan,
            'jenis_transaksi'=>'Kredit',
            'status_trx'=>'Belum Lunas',
            'bayar_uangmuka'=>$request->bayar_uangmuka,
            'total_bayar'=>$request->total_bayar,
            'kurang_bayar'=>$request->kurang_bayar,
            'tgl_jatuhtemp'=>$request->tgl_jatuhtemp
        ]);
        
            return view('admin.Trxkredit.index',compact('pelanggans','barangs', 'tglInput'),['id_trx'=>$id_trx]);
    }
    public function cekkurang($id_trx){
        $trx_detail= Trx_detail::where(['id_trx'=> $id_trx])->get();
        $ttl = 0;
        foreach($trx_detail as $trx) {
            $ttl += $trx->total_harga;
        }
        return response()->json(['total' => $ttl]);

    }
    public function nota(){
        return view('admin.Trxkredit.nota');
    }
}
