<?php

namespace App\Http\Controllers;

use App\Angsuran;
use App\Pelanggan;
use App\Trx_detail;
use App\Trx_header;
use PDF;
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
        $Trxheader = Trx_header::where('jenis_transaksi','=', 'Kredit')->where('status_trx','=','Belum Lunas')->with('Pelanggan','Trx_detail')->get();
// dd($Trxheader);
        return view('admin.Angsuran.index', compact('Trxheader'));
    }

    public function indexbayar($id_trx){
        // dd($request->all());
        // iki kan nggon nampilke halaman angsuran kan?
        //haa lur bener
        // la terus sing post angsurane?
        $angsuran = Angsuran::where('id_trx', $id_trx)->get();
        $Trxheader = Trx_header::where('id_trx','=', $id_trx)->with('Pelanggan','Trx_detail','barang')->first();
        // dd($Trxheader);

        $tglInput = date('Y-m-d');
        $tgl=date('dmYHis'); 
        $id_asr = "ASR-".$tgl;
        return view('admin.Angsuran.bayarindex', compact('Trxheader','tglInput','id_asr','angsuran', 'id_trx'));
    }
    
    public function store(Request $request, $id_trx)
    
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
        
        return redirect(route('bayarindex.index',$id_trx))->withToastSuccess("Data Berhasil Ditambahkan");
    }


    public function cetak(){
        $pdf = PDF::loadview('admin.angsuran.cetak');
        return $pdf->stream();
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
