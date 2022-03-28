<?php

namespace App\Http\Controllers;

use App\Buku_besar;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.BB.index');
    }

    public function tampilindex()
    {
        return view('admin.BB.tampil');
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
     * @param  \App\Buku_besar  $buku_besar
     * @return \Illuminate\Http\Response
     */
    public function show(Buku_besar $buku_besar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku_besar  $buku_besar
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku_besar $buku_besar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku_besar  $buku_besar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku_besar $buku_besar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku_besar  $buku_besar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku_besar $buku_besar)
    {
        //
    }
}
