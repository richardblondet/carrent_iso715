<?php

namespace App\Http\Controllers;

use App\Modelos;
use App\Marcas;
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
        $modelos = Modelos::with('marca')->get();
        return view('modelos.index')->with('modelos', $modelos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marcas::where('estado', 1)->get();
        return view('modelos.create')->with('marcas', $marcas );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // All data
        $modelo_data = $request->all();

        // Add estado
        $modelo_data['estado'] = 1;

        $modelo = Modelos::create( $modelo_data );

        if( $modelo ) {
            # notify user
            $request->session()->flash('message', 'Creado exitosamente');
            $request->session()->flash('message-class', 'success');
        }
        else {
            $request->session()->flash('message', 'No se pudo crear, inténtelo nuevamente');
            $request->session()->flash('message-class', 'danger');   
        }

        return redirect()->route('modelos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function show(Modelos $modelos, $id)
    {
        $marcas = Marcas::where('estado', 1)->get();
        $modelo = $modelos->find( $id );
        return view('modelos.update')->with('modelo', $modelo)->with('marcas', $marcas);
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
    public function update(Request $request, Modelos $modelos, $id )
    {
        $modelo = $modelos->find( $id );
        $modelo->modelo = $request->input('modelo');
        $modelo->estado = ( $request->input('estado') == 'on' ) ? 1 : 0;
        $modelo->marca_id = $request->input('marca_id');

        $modelo->save();

        $request->session()->flash('message', 'Actualizado exitosamente');
        $request->session()->flash('message-class', 'success');

        return redirect()->route('modelos.update', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Modelos $modelos, $id)
    {
        $modelo = $modelos->find( $id );

        if( $modelo ) {
            $modelo->delete();    
            $request->session()->flash('message', sprintf('Modelo "%s" eliminado existosamente', $modelo->modelo ));
            $request->session()->flash('message-class', 'success' );
        }

        return redirect()->route('modelos.index');
    }
}
