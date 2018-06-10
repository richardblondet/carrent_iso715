@extends('shared.app')

@section('content')

@include('creditoclientes.nav')

<div class="masonry-item w-100">
	<div class="row gap-20">
		@forelse( $creditos as $credito )
		<div class='col-md-3'>
			<div class="layers bd bgc-white p-20 {{ $credito->estado ? '' : 'iso-inactive-item' }}">
				<div class="layer w-100 mB-10">
					<h6 class="lh-1">{{ $credito->nombre }}</h6>
				</div>
				<div class="layer w-100">
					<div class="peers ai-sb fxw-nw">
						<div class="peer peer-greed iso-box-concept">
							<span class="ti-star"></span>
						</div>
						<div class="peer">
							<div class="btn-group" role="group" aria-label="Basic example">
								<a href="{{ route('creditoclientes.show', $credito->id ) }}" class="btn btn-primary">
									<span class="ti-pencil"></span>
								</a>
								<a href="{{ route('creditoclientes.destroy', $credito->id ) }}" class="btn btn-secondary">
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
					<h6 class="lh-1">No existe ningún crédito de usuarios</h6>
				</div>
				<div class="layer w-100">
					<div class="peers ai-sb fxw-nw">
						<div class="peer peer-greed iso-box-concept">
							<span class="ti-money"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforelse
	</div>
</div>


@endsection