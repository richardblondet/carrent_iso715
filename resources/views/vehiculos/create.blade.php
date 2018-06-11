@extends('shared.app')

@section('content')

@include('vehiculos.nav')

<div class="col-md-6 masonry-item">
	<div class="bgc-white p-20 bd">
		<h6 class="c-grey-900">Agregar Vehículo</h6>
		
		
		<div class="mT-30">
			<form action="{{ route('vehiculos.store') }}" method="post">
				{{ csrf_field() }}
				<!-- 'nombre', 'chassis', 'numero_motor', 'ano', 'placa', 'tipo_vehiculo_id', 'marca_id', 'modelo_id', 'tipo_combustible_id', 'estado' -->
				<div class="form-group">
					<label for="marca_id">Marca:</label>
					<select name="marca_id" id="marca_id" class="form-control" required>
						@forelse( $marcas as $marca )
						<option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
						@empty
						<option value="">No existen marcas que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="modelo_id">Modelos:</label>
					<select name="modelo_id" id="modelo_id" class="form-control" required >
						<option value="">SELECCIONA MODELO</option>
						@forelse( $modelos as $modelo )
						<option value="{{ $modelo->id }}" data-marca="{{ $modelo->marca->id }}" data-marca-name="{{ $modelo->marca->nombre }}">{{ $modelo->modelo }}</option>
						@empty
						<option value="">No existen modelos que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="year">Año</label>
					<input type="text" class="form-control" id="year" aria-describedby="rolHelp" name="ano">
				</div>
				<div class="form-group">
					<label for="nombreRol">Tipo de vehículo</label>
					<select name="tipo_vehiculo_id" id="tipo_vehiculo_id" class="form-control" required>
						@forelse( $tipos as $tipo )
						<option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
						@empty
						<option value="">No existen tipos de vehículos que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="tipo_combustible_id">Tipo de Combustible</label>
					<select name="tipo_combustible_id" id="tipo_combustible_id" class="form-control" required>
						@forelse( $combustibles as $combustible )
						<option value="{{ $combustible->id }}">{{ $combustible->nombre }}</option>
						@empty
						<option value="">No existen tipos de combustibles que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="chasis">Chasis</label>
					<input type="text" class="form-control" id="chasis" aria-describedby="rolHelp" name="chassis">
				</div>
				<div class="form-group">
					<label for="motor">No Motor</label>
					<input type="text" class="form-control" id="motor" aria-describedby="rolHelp" name="numero_motor">
				</div>
				<div class="form-group">
					<label for="nombreRol">Nombre</label>
					<input type="text" class="form-control" id="nombreRol" aria-describedby="rolHelp" name="nombre">
				</div>
				<div class="form-group">
					<label for="placa">Placa</label>
					<input type="text" class="form-control" id="placa" aria-describedby="rolHelp" name="placa">
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

@section('script')
<script type="text/javascript">
	(function () {
		var marcas = document.getElementById('marca_id')
		var modelos = document.getElementById('modelo_id')

		if( marcas.value ) {
			[].forEach.call( modelos.options, function( opt ) {
				// console.log( opt.getAttribute( 'data-marca' ) != marcas.value );
				if( opt.getAttribute( 'data-marca' ) != marcas.value ) {
					opt.style.display = "none";
					opt.setAttribute( 'disabled', 'disabled' );
					console.log( opt );
				}
			});
		}

		marcas.addEventListener('change', function( event ) {
			var marca = this.value;
			[].forEach.call( modelos.options, function( opt ) {
				modelos.value = "";
				// console.log( opt );
				if( opt.getAttribute('data-marca') == String( marca ) ) {
					opt.style.display = "block";
					opt.removeAttribute( 'disabled' );
				} 
				else {
					opt.style.display = "none"
					opt.setAttribute( 'disabled', 'disabled' );
				}
			});
		}, true);
	}());
</script>
@stop