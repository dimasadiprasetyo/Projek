<?php

namespace App\Http\Controllers;

use App\barang;
use App\Jurnal_detail;
use App\Jurnal_header;
use App\Pelanggan;
use App\Trx_detail;
use App\Trx_header;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;



class TunaiController extends Controller
{

    public function create(){
        $pelanggans=Pelanggan::all();
        $barangs=barang::all();
        $datas=barang::select('kode_barang');
        $tglInput = date('Y-m-d');
        $tgl=date('dmYHis'); 
        $id_trx = "TRX".$tgl;
        // dd($id_trx);
        return view('admin.Trxtunai.index',compact('pelanggans','barangs', 'tglInput'),['id_trx'=>$id_trx]);
    }

    public function detailStore(Request $request) {
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
        $total = 0;
        foreach($trx_detail as $detail) {
            $total += $detail->total_harga;
        }
        // dd($trx_detail);
        return response()->json([
            'trx_detail' => $trx_detail,
            'total_penjualan' => $total]);
        
    }
    
    public function headerstoretunai(Request $request, $id_trx){
        // dd($request->all());
        $pelanggans=Pelanggan::all();
        $barangs=barang::all();
        $datas=barang::select('kode_barang');
        $tgl=date('dmYHis'); 
        $id_trx = "TRX".$tgl;
        $tglInput = date('Y-m-d');
        // dd($request->all());
        Trx_header::create([
            'id_trx'=> $request->id_trx,
            // 'kode_pelanggan'=>'null',
            'tgl_trx'=> $request->tgl_trx,
            'keterangan'=>$request->keterangan,
            'jenis_transaksi'=>'Tunai',
            'status_trx'=>'Lunas',
            'total_bayar'=>$request->total_bayar
        ]);

        $id_jurnal = "JU".$tgl;

        $jurnalHeader = Jurnal_header::create([
            'id_jurnal' => $id_jurnal,
            'status_posting' => '0',
            'tanggal' => $request->tgl_trx,
            'id_trx' => $request->id_trx,
            'keterangan' => 'Penjualan '

        ]);

        $transaksiDetail = Trx_detail::where("id_trx", $request->id_trx)->with('barang')->get();

        foreach ($transaksiDetail as $transaksi) {
            
            Jurnal_detail::create([
                'id_jurnal' => $id_jurnal,
                'id_akun' => 101,
                'debit' => $request->total_bayar,
                'kredit' => 0
            ]);
            
            Jurnal_detail::create([
                'id_jurnal' => $id_jurnal,
                'id_akun' => 400,
                'debit' => 0,
                'kredit' => $request->total_bayar
            ]);    
        }
        $total = 0;
        foreach($transaksiDetail as $trx) {
            $totalPiutang = $total + $trx->total_harga;
        }

        $id_trx = $request->id_trx;
        $tgl_trx = $request->tgl_trx;
        $keterangan = $request->keterangan;
        
        $total_bayar = $totalPiutang;
        $jenis_trx = 'Tunai';
        $pdf = PDF::loadView('admin.Trxtunai.nota', compact('id_trx', 'tgl_trx', 'keterangan', 'total_bayar','totalPiutang', 'jenis_trx', 'transaksiDetail'));
        return $pdf->stream();

        return view('admin.Trxtunai.index',compact('pelanggans','barangs', 'tglInput'),['id_trx'=>$id_trx]);
    }

    public function cekstok($kode_barang){
        
        $cek = barang::where('kode_barang', $kode_barang)->first();

        return response()->json($cek);
    }

    public function cekkurang($id_trx){
        $trx_detail= Trx_detail::where(['id_trx'=> $id_trx])->get();
        $ttl = 0;
        foreach($trx_detail as $trx) {
            $ttl += $trx->total_harga;
        }
        return response()->json(['total' => $ttl]);
    
    }
    public function stok(Request $request,$kode_barang){
        
        $barang = barang::where(['kode_barang'=>$kode_barang])->first();
        $barang->update([
            'stok'=>$request->stok
            ]);
        return response()->json($barang);
    }

    public function daftartrx(){
        $Pelanggan = Pelanggan::all();
        $daftar = Trx_header::where('jenis_transaksi','=', 'Tunai')->get();
        
        return view('admin.Trxtunai.daftartunai',compact('daftar'));
    }
    public function nota(){
        // $pdf = PDF::loadView('admin.Trxtunai.nota');
        // return $pdf->stream();

        return view('admin.Trxtunai.nota');
    }

    public function deletedetail($id_trx){
        $detail = Trx_detail::where('id', $id_trx)->first();
        $detail->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data transaksi berhasil dihapus'
        ]);
        // return redirect(route('tunai.create'));
    }
}
