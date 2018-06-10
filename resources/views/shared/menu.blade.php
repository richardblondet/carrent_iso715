<!-- ### $Sidebar Menu ### -->
<ul class="sidebar-menu scrollable pos-r">
	<li class="nav-item dropdown">
		<a class="dropdown-toggle" href="javascript:void(0);">
			<span class="icon-holder">
				<i class="ti-star"></i>
			</span>
			<span class="title">Rentas</span>
			<span class="arrow">
				<i class="ti-angle-right"></i>
			</span>
		</a>
		<ul class="dropdown-menu">
			<li>
				<a class='sidebar-link' href="{{ route('renta.index') }}">Gestionar Rentas</a>
			</li>
			<li>
				<a class='sidebar-link' href="{{ route('inspeccion.index') }}">Inspecciones</a>
			</li>
			<li>
				<a class='sidebar-link' href="{{ route('creditoclientes.index') }}">Créditos Clientes</a>
			</li>
		</ul>
	</li>
	<li class="nav-item dropdown">
		<a class="dropdown-toggle" href="javascript:void(0);">
			<span class="icon-holder">
				<i class="ti-user"></i>
			</span>
			<span class="title">Usuarios</span>
			<span class="arrow">
				<i class="ti-angle-right"></i>
			</span>
		</a>
		<ul class="dropdown-menu">
			<li>
				<a class='sidebar-link' href="{{ route('usuarios.index') }}">Gestionar Usuarios</a>
			</li>
			<li>
				<a class='sidebar-link' href="{{ route('roles.index') }}">Roles</a>
			</li>
		</ul>
	</li>
	<li class="nav-item dropdown">
		<a class="dropdown-toggle" href="javascript:void(0);">
			<span class="icon-holder">
				<i class="ti-car"></i>
			</span>
			<span class="title">Vehículos</span>
			<span class="arrow">
				<i class="ti-angle-right"></i>
			</span>
		</a>
		<ul class="dropdown-menu">
			<li>
				<a class='sidebar-link' href="{{ route('vehiculos.index') }}">Gestionar Vehículos</a>
			</li>
			<li>
				<a class='sidebar-link' href="{{ route('tiposvehiculos.index') }}">Tipos de Vehículos</a>
			</li>
			<li>
				<a class='sidebar-link' href="{{ route('modelos.index') }}">Modelos</a>
			</li>
			<li>
				<a class='sidebar-link' href="{{ route('marcas.index') }}">Marcas</a>
			</li>
			<li>
				<a class='sidebar-link' href="{{ route('tiposcombustibles.index') }}">Combustibles</a>
			</li>
		</ul>
	</li>
</ul>