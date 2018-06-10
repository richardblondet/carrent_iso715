@extends('shared.app')

@section('content')

@include('roles.nav')

<!-- Main -->
<section class="iso-section">
	<div class="container-fluid">
		<div class="row gap-20 pos-r">
			<div class=" col-md-6">
				<div class="bgc-white p-20 bd">
					<h6 class="c-grey-900">Crear Rol</h6>
					<div class="mT-30">
						<form action="{{ route('roles.store') }}" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="exampleInputEmail1">Nombre de Rol</label>
								<input type="text" class="form-control" id="nombreRol" aria-describedby="rolHelp" placeholder="Nombre del rol, ej: autor" name="nombre">
								<small id="emailHelp" class="form-text text-muted">Asigna un nombre a los roles. Ejemplo: editor</small>
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
		</div>
	</div>
</section>


@endsection