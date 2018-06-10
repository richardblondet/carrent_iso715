<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $roles = Roles::all();
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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

        $rol = Roles::create([
            'nombre' => $nombre,
            'estado' => 1
        ]);

        # notify user
        if( $rol ) {
            $request->session()->flash('message', 'Nuevo rol creado');
            $request->session()->flash('message-class', 'success');
        }
        else {
            $request->session()->flash('message', 'No se pudo crear el rol');
            $request->session()->flash('message-class', 'danger');   
        }
        return view('roles.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles, $role )
    {
        return view('roles.update')->with('rol', $roles->findOrFail( $role ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Roles $roles, $id )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $roles, $id)
    {   
        $rol = $roles->findOrFail( $id );

        if( !$rol ) {
            $request->session()->flash('message', 'Ningún rol seleccionado');
            $request->session()->flash('message-class', 'danger' );
        }
        $rol->nombre = $request->input('nombre');
        $rol->estado = ( $request->input('estado') == 'on' ) ? 1 : 0;

        $rol->save();

        $request->session()->flash('message', sprintf( 'Rol %s actualizado exitosamente', $rol->nombre ));
            $request->session()->flash('message-class', 'success' );

        return redirect()->route('roles.show',  $rol->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Roles $roles, $id )
    {
        $rol = $roles->find( $id );

        if( $rol ) {
            $rol->delete();    
            $request->session()->flash('message', sprintf('Rol %s eliminado existosamente', $rol->nombre ));
            $request->session()->flash('message-class', 'success' );
        }

        return redirect()->route('roles.index');
    }
}
