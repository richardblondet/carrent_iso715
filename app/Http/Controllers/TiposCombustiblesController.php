<?php

namespace App\Http\Controllers;

use App\TiposCombustibles;
use Illuminate\Http\Request;

class TiposCombustiblesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TiposCombustibles::all();
        return view('tiposcombustibles.index')->with('tipos', $tipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposcombustibles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $tipo_data = $request->all();

        $tipo_data['estado'] = 1;

        $tipo = TiposCombustibles::create( $tipo_data );

        if( $tipo ) {
            $request->session()->flash('message', 'Tipo de combustible creado exitosamente');
            $request->session()->flash('message-class', 'success');
        }
        else {
            $request->session()->flash('message', 'No se pudo crear el tipo de combustible');
            $request->session()->flash('message-class', 'danger');   
        }

        return redirect()->route('tiposcombustibles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TiposCombustibles  $tiposCombustibles
     * @return \Illuminate\Http\Response
     */
    public function show(TiposCombustibles $tiposCombustibles, $id)
    {
        $tipo = $tiposCombustibles->find( $id );

        return view('tiposcombustibles.update')->with( 'tipo', $tipo );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TiposCombustibles  $tiposCombustibles
     * @return \Illuminate\Http\Response
     */
    public function edit(TiposCombustibles $tiposCombustibles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TiposCombustibles  $tiposCombustibles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposCombustibles $tiposCombustibles, $id)
    {
        $tipo = $tiposCombustibles->find( $id );

        $tipo->nombre = $request->input('nombre');
        $tipo->costo = $request->input('costo');
        $tipo->estado = ( $request->input('estado') == 'on' ) ? 1 : 0;

        $tipo->save();

        $request->session()->flash('message', 'Tipo de combustible actualizado exitosamente');
        $request->session()->flash('message-class', 'success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TiposCombustibles  $tiposCombustibles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TiposCombustibles $tiposCombustibles, $id)
    {
        $tipo = $tiposCombustibles->find( $id );

        if( $tipo ) {
            $tipo->delete();    
            $request->session()->flash('message', sprintf('Tipo de combustible "%s" eliminado existosamente', $tipo->tipo ));
            $request->session()->flash('message-class', 'success' );
        }

        return redirect()->route('tiposcombustibles.index');
    }
}
