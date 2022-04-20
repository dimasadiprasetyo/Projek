<?php

namespace App\Http\Controllers;

use App\Akun;
use App\JU;
use App\Trx_header;
use App\Jurnal_header;
use App\Jurnal_detail;
use PDF;
use Illuminate\Http\Request;

class JUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.JU.index');
    }

    public function tampil(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
        $Trxheader = Jurnal_header::whereYear('tanggal', '=', $year)
        ->whereMonth('tanggal', '=', $month)->with('trx_header')->get();
        return view('admin.JU.tampil',compact('Trxheader'));
    }
    
    public function posting($id_jurnal){
        // dd($id_jurnal);
        $cek = Jurnal_detail::where("id_jurnal", $id_jurnal)->get();
        // dd($cek);
        foreach($cek as $c){
            // dd($c->debit);
            $cekakun = Akun::where('id_akun',$c->id_akun)->first();
            // dd($cekakun);
            if ($cekakun->jenis_akun == 'Debet') {
                // dd($cekakun->saldo_akhir + $c->debit);
                $cekakun->update([
                    'saldo_akhir'=> $cekakun->saldo_akhir +$c->debit
                ]);
            } else {
                $cekakun->update([
                    
                    'saldo_akhir'=> $cekakun->saldo_akhir +$c->kredit
                ]);
            }
            $update = Jurnal_header::where("id_jurnal",$id_jurnal)->first();
            $update->update([
                'status_posting'=>'1',
            ]);
        }
        redirect(route('tampil.index'));
    }

    public function cetak(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
        // $Jurnalheader = Jurnal_header::whereYear('tanggal', '=', $year)
        // ->whereMonth('tanggal', '=', $month)->with('Jurnal_detail')->get();
        // $jurnalDetail = Jurnal_detail::with('Jurnal_header')->whereMonth('jurnal_header.tanggal', $month)->whereYear('jurnal_header.tanggal', $year)->get();
        // dd($Jurnalheader);
        // $akuns = Akun::all();
        $Jurnalheader = Jurnal_header::whereYear('tanggal','=', $year)->whereMonth('tanggal','=', $month)->get();
        $Jurnaldetail = Jurnal_detail::with('Akun')->get();
        // dd($Jurnalheader);
        $pdf = PDF::loadview('admin.JU.cetak', compact('Jurnaldetail','Jurnalheader'));
        return $pdf->stream();
    }

    
}
