@extends('template.base')

@section('title', 'Detalles del Registro')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Detalles del Registro - Ciudades</h1>
</div>
<!-- End of Heading -->

<!-- Content Row -->
<div class="row">
	<div class="col-xl-12 col-lg-12">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!URL::to('/')!!}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{!!URL::to('/ciudades')!!}">Listado de Registros</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles del Registro</li>
            </ol>
        </nav>
        <!-- End of Breadcrumb -->
		<!-- Detalles Ciudad -->
		<div class="card shadow mb-4">
            <!-- Dropdown - MenuLinks -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i> Detalles del Registro</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Acciones:</div>
						<a class="dropdown-item" href="{!!URL::to('/')!!}" title="P&aacute;gina de Inicio"><i class="fas fa-home"></i> Inicio</a>

                        <a class="dropdown-item" href="{{ URL::route('ciudades.show', [$ciudad->id]) }}" title="Actualizar P&aacute;gina Actual">
                            <i class="fas fa-sync-alt"></i> Actualizar
                        </a>

						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{!!URL::to('/ciudades')!!}" title="Volver al listado">
							<i class="fas fa-list"></i> Volver
						</a>
					</div>
				</div>
			</div>
            <!-- End of Dropdown MenuLinks -->

			<div class="card-body">
                {!!Form::model($ciudad, ['route'=>  ['ciudades.show', $ciudad->id], 'method'=>'POST', 'files'=> true])!!}
                    @include('ciudad.forms.formulario-detalle')
                    <a href="{!!URL::to('/ciudades')!!}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50"><i class="fa fa-arrow-left"></i></span>
                        <span class="text">Volver</span>
                    </a>
                {!!Form::close()!!}
			</div>

		</div>
        <!-- End of Detalles Ciudad -->
	</div>
</div>
<!-- End of Content Row -->
@endsection
