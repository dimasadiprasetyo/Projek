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
    
    //Index Admin
     public function index(){
        return view('admin.JU.index');
    }

    //Index Pemilik
    public function indexpemilik(){
        return view('pemilik.JU.index');
    }

    // Tampil Admin
    public function tampil(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal','=', $year)->whereMonth('tanggal','=', $month)
                        ->where('status_posting','=',1)->get();
        $Jurnaldetail = Jurnal_detail::with('Akun')->get();
        // $Trxheader = Jurnal_header::where('status_posting','=','0')->whereYear('tanggal', '=', $year)
        // ->whereMonth('tanggal', '=', $month)->with('trx_header')->get();
        // dd($Trxheader);
        
        return view('admin.JU.tampil',compact('Jurnalheader','Jurnaldetail'));
    }

    // Tampil Pemilik
    public function tampilpemilik(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
        $Jurnalheader = Jurnal_header::whereYear('tanggal','=', $year)->whereMonth('tanggal','=', $month)
                        ->where('status_posting','=',1)->get();
        $Jurnaldetail = Jurnal_detail::with('Akun')->get();
        // dd($Jurnalheader);
        return view('pemilik.JU.tampil',compact('Jurnaldetail','Jurnalheader'));
    }
    
    //Posting
    public function posting(Request $request,$id_jurnal){
        $month = $request->bulan;
	    $year = $request->tahun;
        
        // dd($id_jurnal);
        $cek = Jurnal_detail::where("id_jurnal", $id_jurnal)->get();
        // dd($cek);
        foreach($cek as $c){
            // dd($c->debit);
            $cekakun = Akun::where('id_akun',$c->id_akun)->first();
                if ($cekakun->jenis_akun == 'Debet') {
                    $cekakun->update([
                    'saldo_akhir'=> $cekakun->saldo_akhir +$c->debit
                    ]);
                } else {
                    $cekakun->update([
                        
                        'saldo_akhir'=> $cekakun->saldo_akhir +$c->kredit
                    ]);
                }
            $update = Jurnal_header::where("id_jurnal",$id_jurnal)->first();
            // dd($update);
            $update->update([
                'status_posting'=>'1',
            ]);
        }
        return redirect()->back();

        // return redirect()->route('tampil.index',[$year,$month])->withToastSuccess("Data Berhasil Diposting");
    }

    //print Out
    public function cetak(Request $request){
        $month = $request->bulan;
	    $year = $request->tahun;
        $dataBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $selectedMonth = str_replace('0','',$month);
        $monthName = $dataBulan[$selectedMonth -1];

        $Jurnalheader = Jurnal_header::whereYear('tanggal','=', $year)
                        ->whereMonth('tanggal','=', $month)
                        ->where('status_posting','=','1')->get();
        $tgl = date('d-m-Y');
        $Jurnaldetail = Jurnal_detail::with('Akun')->get();
        // foreach($Jurnalheader as $date){
        //     $dt = date('M Y',strtotime($date->tanggal));
        // }
        // dd($dt);
        $pdf = PDF::loadview('admin.JU.cetak', compact('Jurnaldetail','Jurnalheader','monthName','year','tgl'))->setPaper('F4','potrait');
        return $pdf->stream();
    }

    
}
