@extends('shared.app')

@section('content')

@include('modelos.nav')

<div class="col-md-6 masonry-item">
	<div class="bgc-white p-20 bd">
		<h6 class="c-grey-900">Agregar modelo</h6>
		
		@if( $marcas->count() > 0 )
		<div class="mT-30">
			<form action="{{ route('modelos.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="nombreRol">Nombre</label>
					<input type="text" class="form-control" id="nombreRol" aria-describedby="rolHelp" placeholder="Ejemplo: corola, series-3" name="modelo">
				</div>
				<div class="form-group">
					<label for="licenciaUsuario">Marca</label>
					<select name="marca_id" id="marca_id" class="form-control">
						@forelse( $marcas as $marca )
						<option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
						@empty
						<option value="">No existen marcas que mostrar</option>
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
		@else
		<p>
			No existen modelos que agregar. Agrégalos <a href="{{ route('marcas.create') }}">aquí</a>
		</p>
		@endif

	</div>
</div>

@endsection

