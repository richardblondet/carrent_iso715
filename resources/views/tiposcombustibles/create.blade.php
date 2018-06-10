@extends('shared.app')

@section('content')

@include('tiposcombustibles.nav')

<div class="col-md-6 masonry-item">
	<div class="bgc-white p-20 bd">
		<h6 class="c-grey-900">Agregar Tipo de Combustible</h6>
		
		
		<div class="mT-30">
			<form action="{{ route('tiposcombustibles.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="nombreRol">Nombre de combustible</label>
					<input type="text" class="form-control" id="nombreRol" aria-describedby="rolHelp" name="nombre">
				</div>
				<div class="form-group">
					<label for="costo">Costo</label>
					<input type="number" class="form-control" id="costo" aria-describedby="rolHelp" name="costo">
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

