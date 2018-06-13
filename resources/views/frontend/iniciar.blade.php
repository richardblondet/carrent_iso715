@extends('shared.app')

@section('content')

@include('frontend.nav')

<div class="masonry-item w-100">
	<div class="row gap-20">
		@forelse( $vehiculos as $vehiculo )
		<div class='col-md-3'>
			<div class="layers bd bgc-white p-20">
				<div class="layer w-100 mB-10">
					<h6 class="lh-1">{{ $vehiculo->nombre }}</h6>
				</div>
				<div class="layer w-100">
					<div class="peers ai-sb fxw-nw">
						<div class="peer peer-greed iso-box-concept">
							<span class="ti-car"></span>
						</div>
						<div class="peer">
							<div class="btn-group" role="group" aria-label="Basic example">
								<a href="{{ route('vehiculos.show', $vehiculo->id ) }}" class="btn btn-primary">
									Rentar
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
					<h6 class="lh-1">No existen vehículos</h6>
				</div>
				<div class="layer w-100">
					<div class="peers ai-sb fxw-nw">
						<div class="peer peer-greed iso-box-concept">
							<span class="ti-car"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforelse
	</div>
</div>


@endsection