@extends('shared.app')

@section('content')

@include('usuarios.nav')

<div class="col-md-6 masonry-item">
	<div class="bgc-white p-20 bd">
		<h6 class="c-grey-900">Editar Usuario <span class="ti-arrow-right"></span> {{ $usuario->nombre }}</h6>
		
		<div class="mT-30">
			<form action="{{ route('usuarios.update', $usuario->id ) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label for="nombreRol">Nombre</label>
					<input type="text" class="form-control" id="nombreRol" aria-describedby="rolHelp" placeholder="Nombre del rol, ej: autor" name="nombre" value="{{ $usuario->nombre }}">
				</div>
				<div class="form-group">
					<label for="cedulaUsuario">Cédula</label>
					<input type="text" class="form-control" id="cedulaUsuario" aria-describedby="rolHelp" placeholder="00000000000" name="cedula" value="{{ $usuario->cedula }}">
				</div>
				<div class="form-group">
					<label for="emailUsuario">Email</label>
					<input type="email" class="form-control" id="emailUsuario" aria-describedby="rolHelp" placeholder="email@ejemplo.com" name="email" value="{{ $usuario->email }}">
				</div>
				<div class="form-group">
					<label for="celularUsuario">Celular</label>
					<input type="text" class="form-control" id="celularUsuario" aria-describedby="rolHelp" placeholder="Celular sin espacios ni caracteres" name="celular" value="{{ $usuario->celular }}">
				</div>
				<div class="form-group">
					<label for="licenciaUsuario">Licencia</label>
					<input type="text" class="form-control" id="licenciaUsuario" aria-describedby="rolHelp" placeholder="Licencia vigente" name="licencia" value="{{ $usuario->licencia }}">
				</div>
				<div class="form-group">
					<label for="licenciaUsuario">Rol</label>
					<select name="rol_id" id="rolUsuario" class="form-control">
						@forelse( $roles as $rol )
						<option value="{{ $rol->id }}" {{ ( $usuario->rol_id == $rol->id ) ? 'selected="selected"' : '' }} >{{ $rol->nombre }}</option>
						@empty
						<option value="">No existen roles que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="licenciaUsuario">Contraseña</label>
					<input type="password" class="form-control" id="licenciaUsuario" aria-describedby="rolHelp" placeholder="Inserte una contraseña para este usuario" name="password">
				</div>
				<div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
					<input type="checkbox" id="estadoRol" name="estado" class="peer" {{ $usuario->estado ? 'checked="checked"' : '' }}>
					<label for="estadoRol" class=" peers peer-greed js-sb ai-c">
						<span class="peer peer-greed">Estado</span>
					</label>
				</div>

				<button type="submit" class="btn btn-primary">Actualizar</button>
			</form>
		</div>
	</div>
</div>

@endsection

