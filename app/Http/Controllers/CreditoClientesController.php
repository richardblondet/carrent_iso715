<?php

namespace App\Http\Controllers;

use App\CreditoClientes;
use App\Usuarios;
use Illuminate\Http\Request;

class CreditoClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditos = CreditoClientes::with('cliente')->get();
        return view('creditoclientes.index')->with('creditos', $creditos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuarios::where('estado', 1)->get();
        return view('creditoclientes.create')->with('usuarios', $usuarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credito_data = $request->all();
        $credito_data['estado'] = 1;

        $credito = CreditoClientes::create( $credito_data );

        if( $credito ) {
            $request->session()->flash('message', 'Crédito creado exitosamente');
            $request->session()->flash('message-class', 'success');
        }
        else {
            $request->session()->flash('message', 'No se pudo crear el crédito');
            $request->session()->flash('message-class', 'danger');
        }

        return redirect()->route('creditoclientes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CreditoClientes  $creditoClientes
     * @return \Illuminate\Http\Response
     */
    public function show(CreditoClientes $creditoClientes, $id )
    {
        $credito = $creditoClientes->find( $id );
        $usuarios = Usuarios::where('estado', 1)->get();
        return view('creditoclientes.update')->with([
            'usuarios' => $usuarios,
            'credito' => $credito
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CreditoClientes  $creditoClientes
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditoClientes $creditoClientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CreditoClientes  $creditoClientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditoClientes $creditoClientes, $id)
    {
        // <!-- 'usuario_id', 'nombre_tarjeta', 'cvv', 'numberos', 'tipo', 'estado', 'limite_credito' -->
        $credito = $creditoClientes->find( $id );
        $credito->usuario_id = $request->input('usuario_id' );
        $credito->nombre_tarjeta = $request->input('nombre_tarjeta' );
        $credito->cvv = $request->input('cvv' );
        $credito->numberos = $request->input('numberos' );
        $credito->tipo = $request->input('tipo' );
        $credito->estado = ( $request->input('estado' ) == 'on' ) ? 1 : 0;
        $credito->limite_credito = $request->input('limite_credito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CreditoClientes  $creditoClientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditoClientes $creditoClientes)
    {
        //
    }
}
