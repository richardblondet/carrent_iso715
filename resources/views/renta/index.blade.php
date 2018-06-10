@extends('shared.app')

@section('content')

@include('renta.nav')

<div class="masonry-item w-100">
	<div class="row gap-20">
		@forelse( $rentas as $renta )
		<div class='col-md-3'>
			<div class="layers bd bgc-white p-20 {{ $renta->estado ? '' : 'iso-inactive-item' }}">
				<div class="layer w-100 mB-10">
					<h6 class="lh-1">{{ $renta->created_at }}</h6>
				</div>
				<div class="layer w-100">
					<div class="peers ai-sb fxw-nw">
						<div class="peer peer-greed iso-box-concept">
							<span class="ti-star"></span>
						</div>
						<div class="peer">
							<div class="btn-group" role="group" aria-label="Basic example">
								<a href="{{ route('renta.show', $renta->id ) }}" class="btn btn-primary">
									<span class="ti-pencil"></span>
								</a>
								<a href="{{ route('renta.destroy', $renta->id ) }}" class="btn btn-secondary">
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
					<h6 class="lh-1">No existen registros de rentas</h6>
				</div>
				<div class="layer w-100">
					<div class="peers ai-sb fxw-nw">
						<div class="peer peer-greed iso-box-concept">
							<span class="ti-star"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforelse
	</div>
</div>


@endsection