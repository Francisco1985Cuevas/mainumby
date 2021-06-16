@extends('template.base')

@section('title', 'Nuevo Registro')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Nuevo Registro - Direcciones</h1>
</div>

<!-- Content Row -->
<div class="row">

	<div class="col-xl-12 col-lg-12">

		<!-- Form Direcciones -->
		<div class="card shadow mb-4">

			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Nuevo Registro</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Acciones:</div>
						<a class="dropdown-item" href="{!!URL::to('/')!!}" title="P&aacute;gina de Inicio"><i class="fas fa-home"></i> Inicio</a>
						<a class="dropdown-item" href="{!!URL::to('/direcciones/create')!!}" title="Actualizar P&aacute;gina Actual">
							<i class="fas fa-sync-alt"></i> Actualizar
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{!!URL::to('/direcciones')!!}" title="Volver al listado">
							<i class="fas fa-list"></i> Volver
						</a>
					</div>
				</div>
			</div>

			<div class="card-body">
				@include('alerts.request')

				@if(Session::has('message'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fas fa-check-circle"></i> {{Session::get('message')}} <a href="{!!URL::to('/direcciones')!!}">Ver</a>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif

				{!! Form::open(['route' => 'direcciones.store', 'method' => 'post', 'id' => 'direccionForm']) !!}
					@include('direccion.forms.formulario')
					{{ Form::button('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Guardar</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-icon-split'] )  }}
                    {{ Form::button('<span class="icon text-white-50"><i class="far fa-window-restore"></i></span><span class="text">Cancelar</span>', ['type' => 'reset', 'class' => 'btn btn-secondary btn-icon-split'] )  }}
                {!!Form::close()!!}
			</div>

		</div>

	</div>

</div>

@endsection
