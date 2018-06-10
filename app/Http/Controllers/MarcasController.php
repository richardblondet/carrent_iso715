<?php

namespace App\Http\Controllers;

use App\Marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marcas::all();

        return view('marcas.index')->with('marcas', $marcas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->input('nombre');

        $marca = Marcas::create([
            'nombre' => $nombre,
            'estado' => 1
        ]);

        if( $marca ) {
            # notify user
            $request->session()->flash('message', 'Creado exitosamente');
            $request->session()->flash('message-class', 'success');
        }
        else {
            $request->session()->flash('message', 'No se pudo crear, inténtelo nuevamente');
            $request->session()->flash('message-class', 'danger');   
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function show(Marcas $marcas, $id)
    {
        $marca = $marcas->find( $id );
        return view('marcas.update')->with('marca', $marca);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function edit(Marcas $marcas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marcas $marcas, $id)
    {
        $marca = $marcas->find( $id );
        $marca->nombre = $request->input('nombre');
        $marca->estado = ( $request->input('estado') == 'on' ) ? 1 : 0;

        $marca->save();

        $request->session()->flash('message', sprintf('Marca "%s" actualizada existosamente', $marca->nombre ));
        $request->session()->flash('message-class', 'success' );

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marcas $marcas, $id)
    {
        $marca = $marcas->find( $id );

        if( $marca ) {
            $marca->delete();    
            $request->session()->flash('message', sprintf('Marca "%s" eliminada existosamente', $marca->nombre ));
            $request->session()->flash('message-class', 'success' );
        }

        return redirect()->route('marcas.index');
    }
}
