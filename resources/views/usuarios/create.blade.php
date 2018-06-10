@extends('shared.app')

@section('content')

<div class="masonry-sizer col-md-6"></div>

@include('usuarios.nav')

<div class="col-md-6 masonry-item">
	<div class="bgc-white p-20 bd">
		<h6 class="c-grey-900">Agregar Usuario</h6>
		
		<div class="mT-30">
			<form action="{{ route('usuarios.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="nombreRol">Nombre</label>
					<input type="text" class="form-control" id="nombreRol" aria-describedby="rolHelp" placeholder="Nombre del rol, ej: autor" name="nombre">
				</div>
				<div class="form-group">
					<label for="cedulaUsuario">Cédula</label>
					<input type="text" class="form-control" id="cedulaUsuario" aria-describedby="rolHelp" placeholder="00000000000" name="cedula">
				</div>
				<div class="form-group">
					<label for="emailUsuario">Email</label>
					<input type="email" class="form-control" id="emailUsuario" aria-describedby="rolHelp" placeholder="email@ejemplo.com" name="email">
				</div>
				<div class="form-group">
					<label for="celularUsuario">Celular</label>
					<input type="text" class="form-control" id="celularUsuario" aria-describedby="rolHelp" placeholder="Celular sin espacios ni caracteres" name="celular">
				</div>
				<div class="form-group">
					<label for="licenciaUsuario">Licencia</label>
					<input type="text" class="form-control" id="licenciaUsuario" aria-describedby="rolHelp" placeholder="Licencia vigente" name="celular">
				</div>
				<div class="form-group">
					<label for="licenciaUsuario">Rol</label>
					<select name="rol_id" id="rolUsuario" class="form-control">
						@forelse( $roles as $rol )
						<option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
						@empty
						<option value="">No existen roles que mostrar</option>
						@endforelse
					</select>
				</div>
				<!-- <div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
					<input type="checkbox" id="estadoRol" name="estado" class="peer">
					<label for="estadoRol" class=" peers peer-greed js-sb ai-c">
						<span class="peer peer-greed">Estado</span>
					</label>
				</div> -->

				<button type="submit" class="btn btn-primary">Agregar</button>
			</form>
		</div>
	</div>
</div>

@endsection

