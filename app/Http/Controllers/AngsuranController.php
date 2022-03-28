<?php

namespace App\Http\Controllers;

use App\Angsuran;
use App\Pelanggan;
use App\Trx_detail;
use App\Trx_header;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();        
        $Trxheader = Trx_header::where('jenis_transaksi','=', 'Kredit')->with('Pelanggan','Trx_detail')->get();
// dd($Trxheader);
        return view('admin.Angsuran.index', compact('Trxheader'));
    }

    public function indexbayar($id_trx){
        $angsuran = Angsuran::where('id_trx', $id_trx)->get();
        $Trxheader = Trx_header::where('id_trx','=', $id_trx)->with('Pelanggan','Trx_detail','barang')->first();
        // dd($Trxheader);
        $tglInput = date('Y-m-d');
        $tgl=date('dmYHis'); 
        $id_asr = "ASR-".$tgl;
        return view('admin.Angsuran.bayarindex', compact('Trxheader','tglInput','id_asr','angsuran'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Angsuran::create([
            'kode_angsuran'=>$request->kode_angsuran,
            'tanggal_ang'=>$request->tanggal_ang,
            'id_trx'=>$request->id_trx,
            'angsuran_ke'=>$request->ang_ke,
            'jml_bayar'=>$request->bayar,
            'kurang_bayar'=>$request->kurang_bayar,
        ]);

        $trxHeader = Trx_header::where('id_trx', $request->id_trx)->first();
        $updateKurangBayarHeader =  $trxHeader->kurang_bayar - $request->bayar;
        if($updateKurangBayarHeader == 0){
            $updateStatusHeader = 'Lunas';
        } else {
            $updateStatusHeader = 'Belum Lunas';
        }
        $trxHeader->update([
            'kurang_bayar' => $updateKurangBayarHeader,
            'status_trx' => $updateStatusHeader
        ]);
        
        return redirect(route('bayarindex.index'))->withToastSuccess("Data Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function show(Angsuran $angsuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function edit(Angsuran $angsuran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angsuran $angsuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Angsuran $angsuran)
    {
        //
    }
}
