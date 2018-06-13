<?php

namespace App\Http\Controllers;

use App\Renta;
use App\Usuarios;
use App\Inspeccion;
use Illuminate\Http\Request;

class RentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentas = Renta::with(['cliente:id,nombre', 'empleado:id,nombre'])->get();
        
        return view('renta.index')->with('rentas', $rentas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $usuarios = Usuarios::where('estado', 1)->get();
        $inspecciones = Inspeccion::where('estado', 1)->get();

        // back to user
        return view('renta.create')->with([
            'inspecciones' => $inspecciones,
            'usuarios'  => $usuarios
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
        $renta_data = $request->all();

        foreach ($renta_data as $renKey => $rentValue) {
            if( $rentValue == 'on' ) {
                $renta_data[ $renKey ] = 1;
            }
            if( $rentValue == 'off' ) {
                $renta_data[ $renKey ] = 0;
            }
        }

        $renta = Renta::create( $renta_data );

        if( $renta ) {
            $request->session()->flash('message', 'Renta creada exitosamente');
            $request->session()->flash('message-class', 'success');
        }
        else {
            $request->session()->flash('message', 'Renta no pudo creada');
            $request->session()->flash('message-class', 'danger');
        }

        return redirect()->route('renta.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function show(Renta $renta_instace, $renta )
    {   
        $r = $renta_instace->with(['cliente', 'empleado', 'inspeccion'])->find( $renta );

        $usuarios = Usuarios::where('estado', 1)->get();
        $inspecciones = Inspeccion::where('estado', 1)->get();

        // back to user
        return view('renta.update')->with([
            'renta' => $r,
            'inspecciones' => $inspecciones,
            'usuarios'  => $usuarios
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function edit(Renta $renta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renta $renta_instance, $renta)
    {
        $r = $renta_instance->find( $renta );

        $renta_data = $request->all();

        foreach ($renta_data as $renKey => $rentValue) {
            if( $rentValue == 'on' ) {
                $renta_data[ $renKey ] = 1;
            }
            if( $rentValue == 'off' ) {
                $renta_data[ $renKey ] = 0;
            }
        }

        $r->update( $renta_data );

        if( $renta ) {
            $request->session()->flash('message', 'Renta actualizada exitosamente');
            $request->session()->flash('message-class', 'success');
        }
        else {
            $request->session()->flash('message', 'Renta no pudo actualizarse');
            $request->session()->flash('message-class', 'danger');
        }

        return redirect()->route('renta.update', $renta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Renta $renta_instance, $renta)
    {
        $r = $renta_instance->find( $renta );

        if( $r ) {
            $r->delete();

            $request->session()->flash('message', 'Renta eliminada exitosamente');
            $request->session()->flash('message-class', 'success');
        }
        return redirect()->route('renta.index');
    }
}
