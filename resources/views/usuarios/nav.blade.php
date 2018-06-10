<div class="masonry-sizer col-md-6"></div>

<div class="col-12 masonry-item">
	<!-- Navegación -->
	<nav class="navbar navbar-expand-lg navbar-light iso-nav">
		 <a class="navbar-brand">Usuarios</a>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				@if( Request::route()->getName() == 'usuarios.create' )
				<li class="nav-item active">
					<a class="nav-link" href="{{ route('usuarios.index') }}">Ver todos</a>
				</li>
				@endif
				@if( Request::route()->getName() == 'usuarios.index' )
				<li class="nav-item">
			    	<a href="{{ route('usuarios.create') }}" class="btn btn-outline-success">
			    		<span class="ti-plus"></span> Agregar
			    	</a>
				</li>
				@endif
			</ul>
		</div>
	</nav>
</div>