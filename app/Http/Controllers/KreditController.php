<?php

namespace App\Http\Controllers;

use App\barang;
use App\Jurnal_detail;
use App\Jurnal_header;
use App\Pelanggan;
use App\Trx_detail;
use App\Trx_header;
use PDF;
use Illuminate\Http\Request;

class KreditController extends Controller
{
    //tambah
    public function create(){
        $pelanggans=Pelanggan::all();
        $barangs=barang::all();
        $datas=barang::select('kode_barang');
        $tgl=date('dmYHis'); 
        $tglInput = date('Y-m-d');
        $id_trx = "TRX".$tgl;
            return view('admin.Trxkredit.index', compact('pelanggans','barangs', 'id_trx', 'tglInput'));
    }

    //tambah detail
    public function detailStore(Request $request){

        $kodebarang=$request->kode_barang;
        $barang = barang::where('kode_barang',$kodebarang)->first();
        $dis= 0;
        if($request->qty >= 30){
            $dis=(10/100)*$barang->harga*$request->qty;
        }
        $totalHarga = $barang->harga*$request->qty-$dis;
        Trx_detail::create([
            'id_trx'=>$request->id_trx,
            'barang_id'=>$request->kode_barang,
            'qty'=>$request->qty,
            'diskon'=>$dis,
            'total_harga'=>reverseRupiah($totalHarga),
        ]);
    }

    //Index detail
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
                'total_penjualan' => reverseRupiah($total)]);
    }

    // Tambah header
    public function headerstoretunai(Request $request){
        $pelanggans=Pelanggan::all();
        $barangs=barang::all();
        $datas=barang::select('kode_barang');
        $tgl=date('dmYHis'); 
        $id_trx = "TRX".$tgl;
        $tglInput = date('Y-m-d');
        $tambah_tanggal = mktime(0,0,0,date('m')+1,date('d'),date('Y')); // angka 2,7,1 yang dicetak tebal bisa dirubah rubah
        
        Trx_header::create([
            'id_trx'=> $request->id_trx,
            'kode_pelanggan'=>$request->kode_pelanggan,
            'tgl_trx'=> $request->tgl_trx,
            'keterangan'=>$request->keterangan,
            'jenis_transaksi'=>'Kredit',
            'ongkos' =>reverseRupiah($request->ongkos),
            'status_trx'=>'Belum Lunas',
            'bayar_uangmuka'=>reverseRupiah($request->bayar_uangmuka),
            'total_bayar'=>reverseRupiah($request->total_bayar),
            'kurang_bayar'=>reverseRupiah($request->kurang_bayar),
            'tgl_jatuhtemp'=>$request->tgl_jatuhtemp
        ]);
        $id_jurnal = "JU".$tgl;

        $jurnalHeader = Jurnal_header::create([
            'id_jurnal' => $id_jurnal,
            'status_posting' => '1',
            'tanggal' => $request->tgl_trx,
            'id_trx' => $request->id_trx,
            'keterangan' => 'Penjualan Kredit'

        ]);

        $transaksidetail = Trx_detail::where("id_trx", $request->id_trx)->with('barang')->get();
        $transaksiDetail = Trx_header::where("id_trx", $request->id_trx)->with('barang','Trx_detail','Pelanggan')->get();

        $totalDiskon = 0;
        foreach ($transaksiDetail as $transaksi) {
            $totalDiskon += $transaksi->Trx_detail->diskon;
        }
            Jurnal_detail::create([
                'id_jurnal' => $id_jurnal,
                'id_akun' => 101,
                'debit' => reverseRupiah($request->total_bayar) - reverseRupiah($request->kurang_bayar),
                'kredit' => 0
            ]);

            Jurnal_detail::create([
                'id_jurnal' => $id_jurnal,
                'id_akun' => 103,
                'debit' => reverseRupiah($request->kurang_bayar),
                'kredit' => 0
            ]);
            
            Jurnal_detail::create([
                'id_jurnal' => $id_jurnal,
                'id_akun' => 400,
                'debit' => 0,
                'kredit' => reverseRupiah($request->total_bayar)
            ]);
            Jurnal_detail::create([
                'id_jurnal' => $id_jurnal,
                'id_akun' => 402,
                'debit' => reverseRupiah($totalDiskon),
                'kredit' => 0
            ]);
            
            
            // dd($transaksiDetail);
        
        
        $total = 0;
        foreach($transaksiDetail as $trx) {
            $uangmuka = $trx->total_bayar - $trx->kurang_bayar;
            $total = $trx->kurang_bayar;
            $subTotal = $trx->kurang_bayar + $trx->ongkos;
        }

        foreach($transaksiDetail as $trx1){
            $pelanggan = $trx1->Pelanggan->nama_pelanggan;
            $pelanggan2 = $trx1->Pelanggan->alamat;
        }

        $id_trx = $request->id_trx;
        $kode_pelanggan = $pelanggan;
        $alamat = $pelanggan2;
        $tgl_jatuhtemp = $request-> tgl_jatuhtemp;
        $tgl_trx = $request->tgl_trx;
        $keterangan = $request->keterangan;
        $total_bayar = $total;
        $subtotal = $subTotal;
        $ongkir = $request->ongkos;
        $uangmuka = $uangmuka;
        $jenis_trx = 'Kredit';
        $pdf = PDF::loadView('admin.Trxkredit.nota', compact('id_trx','kode_pelanggan','alamat',
                            'tgl_jatuhtemp', 'tgl_trx', 'keterangan', 'total_bayar','ongkir', 'subtotal','uangmuka',
                            'jenis_trx', 'transaksiDetail','transaksidetail'))->setPaper('F4','potrait');
        return $pdf->stream();
            return view('admin.Trxkredit.index',compact('pelanggans','barangs', 'tglInput'),['id_trx'=>$id_trx]);
    }

    // cek kurang alert
    public function cekkurang($id_trx){
        $trx_detail= Trx_detail::where(['id_trx'=> $id_trx])->get();
        $ttl = 0;
        foreach($trx_detail as $trx) {
            $ttl += $trx->total_harga;
        }
        return response()->json(['total' => $ttl]);
    
    }
    
    // cek stokkredit
    public function cekstokkredit($kode_barang){
        
        $cek = barang::where('kode_barang', $kode_barang)->first();

        return response()->json($cek);
    }

    // stok
    public function stokkredit(Request $request,$kode_barang){
        
        $barang = barang::where(['kode_barang'=>$kode_barang])->first();
        $barang->update([
            'stok'=>$request->stok
            ]);
        return response()->json($barang);
    }

    //daftar trx kredit
    public function daftartrxkredit(){
        $Pelanggan= Pelanggan::all();
        $daftar = Trx_header::where('jenis_transaksi','=','Kredit')->get();
    
    }

    //print out
    public function nota(){
        $pdf = PDF::loadview('admin.Trxkredit.nota');
        return $pdf->stream();
    }

    //delete
    public function deletedetailkredit($id_trx){
        $detail = Trx_detail::where('id', $id_trx)->first();
        $detail->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data transaksi berhasil dihapus'
        ]);
    }
}
