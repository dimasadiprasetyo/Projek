<?php

namespace App\Http\Controllers;

use App\Neraca;
use Illuminate\Http\Request;

class NeracaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Neraca.index');
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
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function show(Neraca $neraca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function edit(Neraca $neraca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Neraca $neraca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Neraca $neraca)
    {
        //
    }
}
