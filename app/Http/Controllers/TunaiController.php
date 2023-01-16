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
    //tampil
    public function create()
    {
        $pelanggans = Pelanggan::all();
        $barangs = barang::all();
        $datas = barang::select('kode_barang');
        $tglInput = date('Y-m-d');
        $tgl = date('dmYHis');
        $id_trx = "TRX" . $tgl;
        // dd($id_trx);
        return view('admin.Trxtunai.index', compact('pelanggans', 'barangs', 'tglInput'), ['id_trx' => $id_trx]);
    }

    //tambah detail
    public function detailStore(Request $request)
    {
        $kodebarang = $request->kode_barang;
        $barang = barang::where('kode_barang', $kodebarang)->first();

        $dis = 0;
        if ($request->qty >= 20) {
            $dis = (10 / 100) * $barang->harga * $request->qty;
        }
        $totalHarga = $barang->harga * $request->qty - $dis;
        Trx_detail::create([
            'id_trx' => $request->id_trx,
            'barang_id' => $request->kode_barang,
            'qty' => $request->qty,
            'diskon' => $dis,
            'total_harga' => $totalHarga,
        ]);
        // barang::
    }

    //index detail
    public function detailIndex($id_trx)
    {
        $trx_detail = Trx_detail::where('id_trx', $id_trx)->with('barang')->get();
        $total = 0;
        foreach ($trx_detail as $detail) {
            $total += $detail->total_harga;
        }
        // dd($trx_detail);
        return response()->json([
            'trx_detail' => $trx_detail,
            'total_penjualan' => $total
        ]);
    }

    //store/tambah header
    public function headerstoretunai(Request $request, $id_trx)
    {

        $pelanggans = Pelanggan::all();
        $barangs = barang::all();
        $datas = barang::select('kode_barang');
        $tgl = date('dmYHis');
        $id_trx = "TRX" . $tgl;
        $tglInput = date('Y-m-d');

        Trx_header::create([
            'id_trx' => $request->id_trx,
            'pelanggan' => $request->pelanggan,
            'tgl_trx' => $request->tgl_trx,
            'keterangan' => $request->keterangan,
            'jenis_transaksi' => 'Tunai',
            'ongkos' => reverseRupiah($request->ongkos),
            'status_trx' => 'Lunas',
            'total_bayar' => $request->total_bayar
        ]);

        $id_jurnal = "JU" . $tgl;

        $jurnalHeader = Jurnal_header::create([
            'id_jurnal' => $id_jurnal,
            'status_posting' => '1',
            'tanggal' => $request->tgl_trx,
            'id_trx' => $request->id_trx,
            'keterangan' => 'Penjualan '

        ]);

        // $transaksiDetail = Trx_detail::where("id_trx", $request->id_trx)->with('Trx_header')->get();
        $transaksidetail = Trx_detail::where("id_trx", $request->id_trx)->with('barang')->get();
        $transaksiDetail = Trx_header::where("id_trx", $request->id_trx)->with('barang', 'Trx_detail', 'Pelanggan')->get();

        // dd($transaksiDetail);
        $totalDiskon = 0;
        foreach ($transaksiDetail as $trx) {
            // $totalDiskon += $trx->diskon;
            $totalDiskon += $trx->Trx_detail->diskon;
        }
        // dd($totalDiskon);

        // foreach ($transaksiDetail as $transaksi) {

        Jurnal_detail::create([
            'id_jurnal' => $id_jurnal,
            'id_akun' => 101,
            'debit' => reverseRupiah($request->total_bayar),
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
        // dd($transaksi);    
        // }
        $total = 0;
        foreach ($transaksiDetail as $detail) {
            // $total += $detail->total_harga;
            // $subTotal = $total + $detail->Trx_header->ongkos;
            $total = $trx->total_bayar;
            $subTotal = $trx->total_bayar + $trx->ongkos;
        }
        foreach ($transaksiDetail as $trx1) {
            $pelanggan1 = $trx1->pelanggan;
        }

        $total_bayar = $total;

        $id_trx = $request->id_trx;
        $tgl_trx = $request->tgl_trx;
        $keterangan = $request->keterangan;
        $subtotal = $subTotal;
        $Pelanggan = $pelanggan1;
        $ongkir = $request->ongkos;

        $jenis_trx = 'Tunai';
        $pdf = PDF::loadView('admin.Trxtunai.nota', compact(
            'id_trx','tgl_trx',
            'ongkir',
            'Pelanggan',
            'keterangan',
            'total_bayar',
            'subtotal',
            'jenis_trx',
            'transaksiDetail',
            'transaksidetail'    
        ))->setpaper('F4','potrait');
        return $pdf->stream();

        return view('admin.Trxtunai.index',compact('pelanggans','barangs', 'tglInput'),['id_trx'=>$id_trx]);
    }

    //cek stok
    public function cekstok($kode_barang)
    {

        $cek = barang::where('kode_barang', $kode_barang)->first();

        return response()->json($cek);
    }

    //cek kurang
    public function cekkurang($id_trx)
    {
        $trx_detail = Trx_detail::where(['id_trx' => $id_trx])->get();
        $ttl = 0;
        foreach ($trx_detail as $trx) {
            $ttl += $trx->total_harga;
        }
        return response()->json(['total' => $ttl]);
    }

    //stok
    public function stok(Request $request, $kode_barang)
    {

        $barang = barang::where(['kode_barang' => $kode_barang])->first();
        $barang->update([
            'stok' => $request->stok
        ]);
        return response()->json($barang);
    }

    //daftar trx
    public function daftartrx()
    {
        $Pelanggan = Pelanggan::all();
        $daftar = Trx_header::where('jenis_transaksi', '=', 'Tunai')->get();

        return view('admin.Trxtunai.daftartunai', compact('daftar'));
    }

    //tidak ada
    public function nota()
    {
        // $pdf = PDF::loadView('admin.Trxtunai.nota');
        // return $pdf->stream();

        // return view('admin.Trxtunai.nota');
    }


    public function deletedetail($id_trx)
    {
        $detail = Trx_detail::where('id', $id_trx)->first();
        $detail->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data transaksi berhasil dihapus'
        ]);
        // return redirect(route('tunai.create'));
    }

    public function updatedetail($id_trx)
    {
        $detail = Trx_detail::where('id', $id_trx)->first();
    }
}
