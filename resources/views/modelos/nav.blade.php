<div class="masonry-sizer col-md-6"></div>

<div class="col-12 masonry-item">
	<!-- Navegación -->
	<nav class="navbar navbar-expand-lg navbar-light iso-nav">
		 <a class="navbar-brand">Modelos De Vehículos</a>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				@if( Request::route()->getName() != 'modelos.index' )
				<li class="nav-item active">
					<a class="nav-link" href="{{ route('modelos.index') }}">Ver todos</a>
				</li>
				@endif
				@if( Request::route()->getName() == 'modelos.index' )
				<li class="nav-item">
			    	<a href="{{ route('modelos.create') }}" class="btn btn-outline-success">
			    		<span class="ti-plus"></span> Agregar
			    	</a>
				</li>
				@endif
			</ul>
		</div>
	</nav>
</div>

@if ( session()->has('message') )
	<section class="col-12 masonry-item">
		<div class="alert alert-{{ session('message-class') }}" role="alert">
    		{{ session('message') }}
    	</div>
    </section>
@endif