<div class="masonry-sizer col-md-6"></div>

<div class="col-12 masonry-item">
	<!-- Navegación -->
	<nav class="navbar navbar-expand-lg navbar-light iso-nav">
		 <a class="navbar-brand">Rentas ISO715</a>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				
				<li class="nav-item active">
					<a class="nav-link" href="{{ route('marcas.index') }}">Ver todos</a>
				</li>
				
				<li class="nav-item">
			    	<a href="{{ route('marcas.create') }}" class="btn btn-outline-success">
			    		<span class="ti-plus"></span> Agregar
			    	</a>
				</li>
				
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