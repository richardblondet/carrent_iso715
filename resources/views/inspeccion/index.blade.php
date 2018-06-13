@extends('shared.app')

@section('content')

@include('inspeccion.nav')

<div class="masonry-item w-100">
	<div class="row gap-20">
		@forelse( $inspecciones as $inspeccion )
		<div class='col-md-3'>
			<div class="layers bd bgc-white p-20 {{ $inspeccion->estado ? '' : 'iso-inactive-item' }}">
				<div class="layer w-100 mB-10">
					<h6 class="lh-1">Inspección {{ $inspeccion->created_at }} 
						<br><br>
						<small>Vehiculo {{ $inspeccion->vehiculo->nombre }}</small>
						<br>
						<small>Empleado {{ $inspeccion->empleado->nombre }}</small>
					</h6>
				</div>
				<div class="layer w-100">
					<div class="peers ai-sb fxw-nw">
						<div class="peer peer-greed iso-box-concept">
							<span class="ti-star"></span>
						</div>
						<div class="peer">
							<div class="btn-group" role="group" aria-label="Basic example">
								<a href="{{ route('inspeccion.show', $inspeccion->id ) }}" class="btn btn-primary">
									<span class="ti-pencil"></span>
								</a>
								<a href="{{ route('inspeccion.destroy', $inspeccion->id ) }}" class="btn btn-secondary">
									<span class="ti-trash"></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@empty
		<div class='col-md-3'>
			<div class="layers bd bgc-white p-20 iso-inactive-item">
				<div class="layer w-100 mB-10">
					<h6 class="lh-1">No existe ninguna inspección realizada</h6>
				</div>
				<div class="layer w-100">
					<div class="peers ai-sb fxw-nw">
						<div class="peer peer-greed iso-box-concept">
							<span class="ti-notepad"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforelse
	</div>
</div>


@endsection