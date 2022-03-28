<?php

namespace App\Http\Controllers;

use App\Lappen;
use App\Trx_detail;
use Illuminate\Http\Request;

class LappenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
        return view('admin.Lappen.index');
    }
    
    public function tampilindex(Request $request)
    {
        $month = $request->bulan;
	    $year = $request->tahun;
		
	    $inboxs = Trx_detail::with('barang')->whereYear('created_at', '=', $year)
                      ->whereMonth('created_at', '=', $month)->get();
        // dd($inboxs);
        return view('admin.Lappen.tampil',compact('inboxs'));
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
     * @param  \App\Lappen  $lappen
     * @return \Illuminate\Http\Response
     */
    public function show(Lappen $lappen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lappen  $lappen
     * @return \Illuminate\Http\Response
     */
    public function edit(Lappen $lappen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lappen  $lappen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lappen $lappen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lappen  $lappen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lappen $lappen)
    {
        //
    }
}
