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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JU  $jU
     * @return \Illuminate\Http\Response
     */
    public function show(JU $jU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JU  $jU
     * @return \Illuminate\Http\Response
     */
    public function edit(JU $jU)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JU  $jU
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JU $jU)
    {
        //
    }

    public function cetak(){
        $pdf = PDF::loadview('admin.JU.cetak');
        return $pdf->stream();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JU  $jU
     * @return \Illuminate\Http\Response
     */
    public function destroy(JU $jU)
    {
        //
    }
}
