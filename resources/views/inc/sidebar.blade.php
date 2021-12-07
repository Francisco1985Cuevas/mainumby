<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{!!URL::to('/')!!}">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-dove"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Mainumby</div>
	</a>
	<!-- Divider -->
	<hr class="sidebar-divider my-0">
	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="{!!URL::to('/')!!}">
			<i class="fas fa-home"></i>
			<span>Inicio</span>
		</a>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
		Tablas Genericas
	</div>
	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Tablas Genericas</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Custom Components:</h6>
				<a class="collapse-item" href="http://127.0.0.1:8000/paises">Paises</a>
				<a class="collapse-item" href="http://127.0.0.1:8000/departamentos">Departamentos</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/ciudades">Ciudades</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/barrios">Barrios</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/tiposdirecciones">Tipos Direcciones</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/tiposcontactos">Tipos Contactos</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/tiposdocumentos">Tipos Documentos</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/tiposemails">Tipos Emails</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/personas">Personas</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/contactos">Contactos x Persona</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/documentos">Documentos x Persona</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/direcciones">Direcciones x Persona</a>
                <a class="collapse-item" href="http://127.0.0.1:8000/emails">Emails x Persona</a>
			</div>
		</div>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">
	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>
<!-- End of Sidebar -->
