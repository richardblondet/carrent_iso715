<?php

namespace App\Http\Controllers;

use App\Usuarios;
use App\Roles;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();

        return view('usuarios.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // Relationship
        $roles = Roles::all();
        return view('usuarios.create')->with('roles', $roles );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Gather all user info
        $user_data = $request->all();

        // Process password
        $user_data['password'] = bcrypt( $request->input('password') );
        $user_data['estado'] = 1;

        // Create user
        $usuario = Usuarios::create( $user_data );

        # notify user
        if( $usuario ) {
            $request->session()->flash('message', 'Nuevo usuario creado');
            $request->session()->flash('message-class', 'success');
        }
        else {
            $request->session()->flash('message', 'No se pudo crear el usuario');
            $request->session()->flash('message-class', 'danger');   
        }

        return redirect()->route('usuarios.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios, $id)
    {
        $usuario = $usuarios->findOrFail( $id );
        
        $roles = Roles::all();

        // return $usuario;
        return view('usuarios.update')->with( 'usuario', $usuario )->with( 'roles', $roles );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuarios, $id)
    {
        $usuario = $usuarios->find( $id );
        $usuario->nombre = $request->input('nombre');
        $usuario->cedula = $request->input('cedula');
        $usuario->email = $request->input('email');
        $usuario->celular = $request->input('celular');
        $usuario->licencia = $request->input('licencia');
        $usuario->rol_id = $request->input('rol_id');
        $usuario->estado = ( $request->input('estado') ) ? 1 : 0;

        if(! empty( $request->input('password') )) {
            $usuario->password = bcrypt( $request->input('password') );
        }

        $usuario->save();

        $request->session()->flash('message', sprintf( 'Rol %s actualizado exitosamente', $usuario->nombre ));
        $request->session()->flash('message-class', 'success' );

        return redirect()->route('usuarios.show', $id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
}
