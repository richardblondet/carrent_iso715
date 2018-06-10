@extends('shared.app')

@section('content')

@include('tiposvehiculos.nav')

<div class="col-md-6 masonry-item">
	<div class="bgc-white p-20 bd">
		<h6 class="c-grey-900">Editar Tipo de vehículo <span class="ti-arrow-">
			<right> {{ $tipo->name }}</right>
		</span></h6>
		
		<div class="mT-30">
			<form action="{{ route('tiposvehiculos.update', $tipo->id ) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label for="nombreRol">Nombre</label>
					<input type="text" class="form-control" id="nombreRol" aria-describedby="rolHelp" placeholder="Ejemplo: carro, deportivo" name="nombre" value="{{ $tipo->nombre }}">
				</div>
				<div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
					<input type="checkbox" id="estadoRol" name="estado" class="peer" {{ $tipo->estado ? 'checked=checked' : '' }}>
					<label for="estadoRol" class=" peers peer-greed js-sb ai-c">
						<span class="peer peer-greed">Estado</span>
					</label>
				</div>

				<button type="submit" class="btn btn-primary">Agregar</button>
			</form>
		</div>
	</div>
</div>

@endsection

