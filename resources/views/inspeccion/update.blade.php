@extends('shared.app')

@section('content')

@include('inspeccion.nav')

<div class="col-md-6 masonry-item">
	<div class="bgc-white p-20 bd">
		<h6 class="c-grey-900">Crear Inspección</h6>
		
		
		<div class="mT-30">
			<form action="{{ route('inspeccion.update', $inspeccion->id ) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label for="empleado_id">Empleado</label>
					<select name="empleado_id" id="empleado_id" class="form-control" required>
						@forelse( $usuarios as $usuario )
						<option value="{{ $usuario->id }}" {{ $inspeccion->empleado->id == $usuario->id ? 'selected="selected"' : '' }}>{{ $usuario->nombre }}</option>
						@empty
						<option value="">No existen empleados que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="vehiculo_id">Vehículo</label>
					<select name="vehiculo_id" id="vehiculo_id" class="form-control" required>
						@forelse( $vehiculos as $vehiculo )
						<option value="{{ $vehiculo->id }}">{{ $vehiculo->nombre }}</option>
						@empty
						<option value="">No existen vehículos que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
					<input type="checkbox" id="tiene_rayaduras" name="estado" class="peer" {{ $inspeccion->estado ? 'checked="checked"' : '' }}>
					<label for="tiene_rayaduras" class=" peers peer-greed js-sb ai-c">
						<span class="peer peer-greed">Rayaduras</span>
					</label>
				</div>
				<div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
					<input type="checkbox" id="goma_repuesta" name="goma_repuesta" class="peer" {{ $inspeccion->goma_repuesta ? 'checked="checked"' : '' }}>
					<label for="goma_repuesta" class=" peers peer-greed js-sb ai-c">
						<span class="peer peer-greed">Goma respuesta</span>
					</label>
				</div>
				<div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
					<input type="checkbox" id="gato" name="gato" class="peer" {{ $inspeccion->gato ? 'checked="checked"' : '' }}>
					<label for="gato" class=" peers peer-greed js-sb ai-c">
						<span class="peer peer-greed">Posee gato</span>
					</label>
				</div>
				<div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
					<input type="checkbox" id="cristales_rotos" name="cristales_rotos" class="peer" {{ $inspeccion->cristales_rotos ? 'checked="checked"' : '' }}>
					<label for="cristales_rotos" class=" peers peer-greed js-sb ai-c">
						<span class="peer peer-greed">Cristales Rotos</span>
					</label>
				</div>
				<div class="form-group">
					<label for="estado_gomas">Estado Gomas</label>
					<input type="text" name="estado_gomas" id="estado_gomas" class="form-control" value="{{ $inspeccion->estado_gomas }}">
				</div>
				<div class="form-group">
					<label for="estado_combustible">Estado Combustible</label>
					<input type="text" name="estado_combustible" id="estado_combustible" class="form-control" value="{{ $inspeccion->estado_combustible }}">
				</div>
				<div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
					<input type="checkbox" id="estadoRol" name="estado" class="peer" {{ $inspeccion->estado ? 'checked="checked"' : '' }}>
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
