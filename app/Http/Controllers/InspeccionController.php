<?php

namespace App\Http\Controllers;

use App\Inspeccion;
use App\Usuarios;
use App\Vehiculos;
use Illuminate\Http\Request;

class InspeccionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$inspecciones = Inspeccion::with('empleado')->with('vehiculo')->get();

		// return $inspecciones; 
		return view('inspeccion.index')->with( 'inspecciones', $inspecciones );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{   
		$usuarios = Usuarios::where('estado', 1)->get();
		$vehiculos = Vehiculos::where('estado', 1)->get();
		
		return view('inspeccion.create')->with([
			'usuarios' => $usuarios,
			'vehiculos' => $vehiculos
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
		$inspeccion_data = $request->all();


		foreach ($inspeccion_data as $dkey => $dvalue) {
			if( $dvalue == 'on' ) {
				$inspeccion_data[ $dkey ] = 1;
			}
			if( $dvalue == 'off' ) {
				$inspeccion_data[ $dkey ] = 0;
			}
		}

		$inspeccion = Inspeccion::create( $inspeccion_data );

		if( $inspeccion ) {
			$request->session()->flash('message', 'Inspeccion creada exitosamente');
			$request->session()->flash('message-class', 'success');
		}
		else {
			$request->session()->flash('message', 'No se pudo crear la inspeccion');
			$request->session()->flash('message-class', 'danger');
		}

		return redirect()->route('inspeccion.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Inspeccion  $inspeccion
	 * @return \Illuminate\Http\Response
	 */
	public function show(Inspeccion $insp, $id )
	{
		// 'vehiculo_id', 'tiene_rayaduras', 'estado_combustible', 'goma_repuesta', 'gato', 'cristales_rotos', 'estado_gomas', 'empleado_id', 'estado'
		$inspec = $insp->with(['vehiculo', 'empleado'])->find( $id );
		
		if(! $inspec ) {
			return "Not found";
		}
		// return $inspec;
		$usuarios = Usuarios::where('estado', 1)->get();
		$vehiculos = Vehiculos::where('estado', 1)->get();
		
		return view('inspeccion.update')->with([
			'inspeccion' => $inspec,
			'usuarios' => $usuarios,
			'vehiculos' => $vehiculos
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Inspeccion  $inspeccion
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Inspeccion $inspeccion)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Inspeccion  $inspeccion
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Inspeccion $inspeccion_instance, $inspeccion )
	{
		// Find inspeccion
		$inspec = $inspeccion_instance->find( $inspeccion  );

		// data
		$inspec_data = $request->all();

		foreach ($inspec_data as $dkey => $dvalue) {
			if( $dvalue == 'on' ) {
				$inspec_data[ $dkey ] = 1;
			}
			if( $dvalue == 'off' ) {
				$inspec_data[ $dkey ] = 0;
			}
		}
		$inspec->update( $inspec_data );

		$request->session()->flash('message', 'Inspección actualizada exitosamente');
		$request->session()->flash('message-class', 'success');

		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Inspeccion  $inspeccion
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, Inspeccion $inspeccion_instance, $inspeccion)
	{
		$insp = $inspeccion_instance->find( $inspeccion );

		if( $insp ) {
			$insp->delete();
			$request->session()->flash('message', sprintf('Inspección "%s" eliminada existosamente', $insp->id ));
            $request->session()->flash('message-class', 'success' );
		}

		return redirect()->route('inspeccion.index');
	}
}
