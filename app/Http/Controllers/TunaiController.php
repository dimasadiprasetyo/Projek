<?php

namespace App\Http\Controllers;

use App\barang;
use App\Pelanggan;
use App\Trx_detail;
use App\Trx_header;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        // $data = $request->all();
        // $stok= barang::findOrFail($kodebarang);
        // $stok['stok'] = $stok['stok'] - $data['qty'];
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
        // return view('admin.Trxtunai.index', compact('trx_detail'));
    }
    
    public function headerstoretunai(Request $request){
        $pelanggans=Pelanggan::all();
        $barangs=barang::all();
        $datas=barang::select('kode_barang');
        $tgl=date('dmYHis'); 
        $id_trx = "TRX".$tgl;
        $tglInput = date('Y-m-d');
        // dd($request->all());
        Trx_header::create([
            'id_trx'=> $request->id_trx,
            'tgl_trx'=> $request->tgl_trx,
            'keterangan'=>$request->keterangan,
            'jenis_transaksi'=>'Tunai',
            'status_trx'=>'Lunas',
            'total_bayar'=>$request->total_bayar
        ]);
        
        return view('admin.Trxtunai.index',compact('pelanggans','barangs', 'tglInput'),['id_trx'=>$id_trx])->withToastSuccess("Data Berhasil Di Edit");
    }
    public function cekstok($kode_barang){
        
        $cek = barang::where('kode_barang', $kode_barang)->first();

        
        return response()->json($cek);
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
        return view('admin.Trxtunai.nota');
    }
    public function deletedetail($id_trx){
        $detail = Trx_detail::where('id', $id_trx)->first();
        $detail->delete();
        return response()->json(['succes'=>'Record has been deleted!']);
    }
}
