<?php

namespace App\Http\Controllers;

use App\Vehiculos;
use App\Marcas;
use App\Modelos;
use App\TiposVehiculos;
use App\TiposCombustibles;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculos::all();
        
        return view('vehiculos.index')->with('vehiculos', $vehiculos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marcas::where('estado', 1)->get();
        $modelos = Modelos::where('estado', 1)->with('marca')->get();
        $tiposvehiculos = TiposVehiculos::where('estado',  1)->get();
        $combustibles = TiposCombustibles::where('estado', 1)->get();
        
        return view('vehiculos.create')->with([
            'marcas' => $marcas,
            'modelos' => $modelos,
            'tipos' => $tiposvehiculos,
            'combustibles' => $combustibles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['estado'] = 1;

        $vehiculo = Vehiculos::create( $data );

        if( $vehiculo ) {
            $request->session()->flash('message', 'Vehículo creado exitosamente');
            $request->session()->flash('message-class', 'success');
        }
        else {
            $request->session()->flash('message', 'No se pudo crear el vehículo');
            $request->session()->flash('message-class', 'danger');   
        }

        return redirect()->route('vehiculos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculos $vehiculos, $id )
    {
        $vehiculo = $vehiculos->find( $id );
        $marcas = Marcas::where('estado', 1)->get();
        $modelos = Modelos::where('estado', 1)->with('marca')->get();
        $tiposvehiculos = TiposVehiculos::where('estado',  1)->get();
        $combustibles = TiposCombustibles::where('estado', 1)->get();

        // return $vehiculo;
        return view('vehiculos.update')->with([
            'vehiculo' => $vehiculo,
            'marcas' => $marcas,
            'modelos' => $modelos,
            'tipos' => $tiposvehiculos,
            'combustibles' => $combustibles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculos $vehiculos, $id )
    {
        // <!-- 'nombre', 'chassis', 'numero_motor', 'ano', 'placa', 'tipo_vehiculo_id', 'marca_id', 'modelo_id', 'tipo_combustible_id', 'estado' -->

        $vehiculo = $vehiculos->find( $id );
        $vehiculo->nombre = $request->input('nombre');
        $vehiculo->chassis = $request->input('chassis');
        $vehiculo->numero_motor = $request->input('numero_motor');
        $vehiculo->ano = $request->input('ano');
        $vehiculo->placa = $request->input('placa');
        $vehiculo->tipo_vehiculo_id = $request->input('tipo_vehiculo_id');
        $vehiculo->marca_id = $request->input('marca_id');
        $vehiculo->modelo_id = $request->input('modelo_id');
        $vehiculo->tipo_combustible_id = $request->input('tipo_combustible_id');
        $vehiculo->estado = ( $request->input('estado') == 'on' ) ? 1 : 0;

        $vehiculo->save();

        $request->session()->flash('message', 'Vehículo actualizado exitosamente');
        $request->session()->flash('message-class', 'success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vehiculos $vehiculos, $id )
    {
        $vehiculo = $vehiculos->find( $id );

        if( $vehiculo ) {
            $vehiculo->delete();    
            $request->session()->flash('message', sprintf('Vehículo "%s" eliminado existosamente', $vehiculo->nombre ));
            $request->session()->flash('message-class', 'success' );
        }

        return redirect()->route('vehiculos.index');
    }
}
