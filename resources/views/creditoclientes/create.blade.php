@extends('shared.app')

@section('content')

@include('creditoclientes.nav')

<div class="col-md-6 masonry-item">
	<div class="bgc-white p-20 bd">
		<h6 class="c-grey-900">Agregar Crédito Cliente</h6>
		
		<!-- 'usuario_id', 'nombre_tarjeta', 'cvv', 'numberos', 'tipo', 'estado', 'limite_credito' -->
		<div class="mT-30">
			<form action="{{ route('creditoclientes.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="usuario_id">Cliente:</label>
					<select name="usuario_id" id="usuario_id" class="form-control" required>
						@forelse( $usuarios as $usuario )
						<option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
						@empty
						<option value="">No existen usuarios que mostrar</option>
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="cardname">Nombre en la Tarjeta</label>
					<input type="text" class="form-control" id="cardname" aria-describedby="rolHelp" name="nombre_tarjeta">
				</div>
				<div class="form-group">
					<label for="cardnumber">Número frontal</label>
					<input type="text" class="form-control" id="cardnumber" aria-describedby="rolHelp" name="numberos">
				</div>
				<div class="form-group">
					<label for="cvvcode">Código CVV</label>
					<input type="text" class="form-control" id="cvvcode" aria-describedby="rolHelp" name="cvv">
				</div>
				<div class="form-group">
					<label for="tipo">Tipo</label>
					<select name="tipo" id="tipo" class="form-control" required>
						<option value="">SELECCIONE OPCIÓN</option>
						<option value="visa">Visa</option>
						<option value="mastercard">Mastercard</option>
						<option value="visa">Visa</option>
					</select>
				</div>
				<div class="form-group">
					<label for="limite_credito">Crédito permitido</label>
					<input type="text" name="limite_credito" id="limite_credito" class="form-control">
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
