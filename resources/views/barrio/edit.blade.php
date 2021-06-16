@extends('template.base')

@section('title', 'Actualizar Registro')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Actualizar Registro - Barrios</h1>
</div>

<!-- Content Row -->
<div class="row">

	<div class="col-xl-12 col-lg-12">

		<!-- Form Barrio -->
		<div class="card shadow mb-4">

			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Actualizar Registro</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Acciones:</div>
						<a class="dropdown-item" href="{!!URL::to('/')!!}" title="P&aacute;gina de Inicio"><i class="fas fa-home"></i> Inicio</a>
						<a class="dropdown-item" href="{{ URL::route('barrios.edit', [$barrio->id]) }}" title="Actualizar P&aacute;gina Actual">
							<i class="fas fa-sync-alt"></i> Actualizar
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{!!URL::to('/barrios')!!}" title="Volver al listado">
							<i class="fas fa-list"></i> Volver
						</a>
					</div>
				</div>
			</div>

			<div class="card-body">
				@include('alerts.request')

				@if(Session::has('message'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fas fa-check-circle"></i> {{Session::get('message')}} <a href="{!!URL::to('/barrios')!!}">Ver</a>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif

				{!! Form::model( $barrio, ['route' => ['barrios.update', $barrio->id], 'method' => 'PUT' ]) !!}
					@include('barrio.forms.formulario')
                    {{ Form::button('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Guardar</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-icon-split'] )  }}
                    {{ Form::button('<span class="icon text-white-50"><i class="far fa-window-restore"></i></span><span class="text">Cancelar</span>', ['type' => 'reset', 'class' => 'btn btn-secondary btn-icon-split'] )  }}

					<!-- link(enlace) al Modal -->
					<a data-id="{{$barrio->id}}" href="#" id="btn_delete_editFormBarrio" class="btn btn-danger" title="Eliminar Registro">
						<span class="icon text-white-50"><i class="fas fa-trash"></i></span>
						<span class="text">Eliminar</span>
					</a>
				{!!Form::close()!!}

				<!-- Modal Question Delete -->
				<div class="modal fade" id="modal_delete_editFormBarrio" tabindex="-1" role="dialog" aria-labelledby="editFormModalLabelBarrio" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editFormModalLabelBarrio">Eliminar Registro</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form id="form_delete_editFormBarrio" action="" method="post">
								<div class="modal-body">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}

									<input type="hidden" name="_method" value="DELETE"/>
									Esta Seguro de que desea Eliminar este Registro?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary">Aceptar</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

</div>

@endsection
