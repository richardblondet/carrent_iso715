@extends('shared.app')

@section('content')

@include('roles.nav')

<div class="col-md-6 masonry-item">
	<div class="bgc-white p-20 bd">
		<h6 class="c-grey-900">Actualizar Rol <span class="ti-arrow-right"></span> {{ $rol->nombre }}</h6>
		<div class="mT-30">
			<form action="{{ route('roles.update', $rol->id ) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre de Rol</label>
					<input type="text" class="form-control" id="nombreRol" aria-describedby="rolHelp" placeholder="Nombre del rol, ej: autor" name="nombre" value="{{ $rol->nombre }}">
					<small id="emailHelp" class="form-text text-muted">Asigna un nombre a los roles. Ejemplo: editor</small>
				</div>
				<div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
					<input type="checkbox" id="estadoRol" name="estado" class="peer" {{ $rol->estado ? 'checked=checked' : '' }}>
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