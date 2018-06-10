@extends('shared.app')

@section('content')

@include('roles.nav')

<!-- Main -->
<section class="iso-section">
	<div class="container-fluid">
		<div class="row gap-20">
			
			@forelse( $roles as $rol )
			<div class='col-md-3'>
				<div class="layers bd bgc-white p-20 {{ $rol->estado ? '' : 'iso-inactive-item' }}">
					<div class="layer w-100 mB-10">
						<h6 class="lh-1">{{ $rol->nombre }}</h6>
					</div>
					<div class="layer w-100">
						<div class="peers ai-sb fxw-nw">
							<div class="peer peer-greed iso-box-concept">
								<span class="ti-user"></span>
							</div>
							<div class="peer">
								<div class="btn-group" role="group" aria-label="Basic example">
									<a href="{{ route('roles.show', $rol->id ) }}" class="btn btn-primary">
										<span class="ti-pencil"></span>
									</a>
									<a href="{{ route('roles.destroy', $rol->id ) }}" class="btn btn-secondary">
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
						<h6 class="lh-1">No existe ningún rol</h6>
					</div>
					<div class="layer w-100">
						<div class="peers ai-sb fxw-nw">
							<div class="peer peer-greed iso-box-concept">
								<span class="ti-user"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforelse
		</div>
	</div>
</section>


@endsection