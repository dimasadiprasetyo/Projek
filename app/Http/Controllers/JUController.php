<?php

namespace App\Http\Controllers;

use App\JU;
use App\Trx_header;
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
        $Trxheader = Trx_header::whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)->get();
        return view('admin.JU.tampil',compact('Trxheader'));
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
