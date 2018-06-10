<?php

namespace App\Http\Controllers;

use App\TiposVehiculos;
use Illuminate\Http\Request;

class TiposVehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TiposVehiculos::all();

        return view('tiposvehiculos.index')->with('tipos', $tipos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposvehiculos.create');
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

        $tipo_vehiculo = TiposVehiculos::create([
            'nombre' => $nombre,
            'estado' => 1
        ]);

        # notify user
        if( $tipo_vehiculo ) {
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
     * @param  \App\TiposVehiculos  $tiposVehiculos
     * @return \Illuminate\Http\Response
     */
    public function show(TiposVehiculos $tiposVehiculos, $id)
    {
        $tipo = $tiposVehiculos->find( $id );
        return view('tiposvehiculos.update')->with('tipo', $tipo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TiposVehiculos  $tiposVehiculos
     * @return \Illuminate\Http\Response
     */
    public function edit(TiposVehiculos $tiposVehiculos, $id)
    {
        $tipo = $tiposVehiculos->find( $id );
        return view('tiposvehiculos.update')->with('tipo', $tipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TiposVehiculos  $tiposVehiculos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposVehiculos $tiposVehiculos, $id)
    {
        $tipo = $tiposVehiculos->find( $id );

        $tipo->nombre = $request->input('nombre');
        $tipo->estado = ( $request->input('estado') == 'on' ) ? 1 : 0;

        $tipo->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TiposVehiculos  $tiposVehiculos
     * @return \Illuminate\Http\Response
     */
    public function destroy(TiposVehiculos $tiposVehiculos)
    {
        //
    }
}
