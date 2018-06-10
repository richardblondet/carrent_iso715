<!-- Navegación -->
<section class="iso-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light iso-nav">
					<a class="navbar-brand">Roles</a>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active">
								<a class="nav-link" href="{{ route('roles.index') }}">Ver todos</a>

							</li>
							@if( Request::route()->getName() == 'roles.index' )
							<li class="nav-item">
						    	<a href="{{ route('roles.create') }}" class="btn btn-outline-success">
						    		<span class="ti-plus"></span> Agregar
						    	</a>
							</li>
							@endif
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>

@if ( session()->has('message') )
	<section class="iso-section">
		<div class="container-fluid">
			<div class="alert alert-{{ session('message-class') }}" role="alert">
	    		{{ session('message') }}
	    	</div>
	    </div>
    </section>
@endif