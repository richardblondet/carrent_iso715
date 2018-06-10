<?php

namespace App\Http\Controllers;

use App\Modelos;
use Illuminate\Http\Request;

class ModelosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = Modelos::all();
        return view('modelos.index')->with('modelos', $modelos);
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
     * @param  \App\Modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function show(Modelos $modelos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelos $modelos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelos $modelos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelos $modelos)
    {
        //
    }
}
