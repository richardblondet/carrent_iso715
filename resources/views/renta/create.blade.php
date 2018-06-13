@extends('shared.app')

@section('content')

@include('renta.nav')

<div class="col-md-6 masonry-item">
	<div class="bgc-white p-20 bd">
		<h6 class="c-grey-900">Nueva Renta</h6>
		
		<!-- '', '', '', '', '', '', '', 'lugar_devolucion' -->
		<div class="mT-30">
			<form action="{{ route('renta.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="empleado_id">Empleado</label>
					<select name="empleado_id" id="empleado_id" class="form-control" required>
						@forelse( $usuarios as $usuario )
						<option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
						@empty
						<option value="">No existen empleados que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="cliente_id">Cliente</label>
					<select name="cliente_id" id="cliente_id" class="form-control" required>
						@forelse( $usuarios as $usuario )
						<option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
						@empty
						<option value="">No existen clientes que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="inspeccion_id">Inspeccion</label>
					<select name="inspeccion_id" id="inspeccion_id" class="form-control" required>
						<option value="" selected="selected">Ninguna</option>
						@forelse( $inspecciones as $inspeccion )
						<option value="{{ $inspeccion->id }}">{{ $inspeccion->vehiculo->nombre }} - {{ $inspeccion->created_at->format('d M, Y') }}</option>
						@empty
						<option value="">No existen Inspecciones que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="monto_por_dia">Monto por día</label>
					<input type="number" min="0" name="monto_por_dia" id="monto_por_dia" class="form-control" >
				</div>
				<div class="form-group">
					<label for="comision_empleado">Comisión Empleado</label>
					<input type="number" min="0" name="comision_empleado" id="comision_empleado" class="form-control" >
				</div>
				<div class="form-group">
					<label for="comentario">Comentario</label>
					<textarea name="comentario" id="comentario" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="lugar_renta">Lugar de Renta</label>
					<input type="text" name="lugar_renta" id="lugar_renta" class="form-control" >
				</div>
				<div class="form-group">
					<label for="lugar_devolucion">Lugar de Devolución</label>
					<input type="text" name="lugar_devolucion" id="lugar_devolucion" class="form-control">
				</div>
				<div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
					<input type="checkbox" id="estadoRol" name="estado" class="peer">
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
