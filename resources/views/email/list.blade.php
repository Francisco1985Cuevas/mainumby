@extends('template.base')

<?php
    $message = Session::get('message')
?>

@section('title', 'Listado')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Listado Principal - Emails</h1>
	<a href="{!!URL::to('/emails/create')!!}" class="btn btn-primary btn-icon-split" title="Nuevo Registro">
		<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
		<span class="text">Nuevo Registro</span>
	</a>
</div>
<!-- End of Heading -->

<!-- Content Row -->
<div class="row">
	<div class="col-xl-12 col-lg-12">

		<!-- DataTales Listado Email -->
		<div class="card shadow mb-4">
            <!-- Dropdown - MenuLinks -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"></i> Listado de Registros</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Acciones:</div>
						<a class="dropdown-item" href="{!!URL::to('/')!!}" title="P&aacute;gina de Inicio"><i class="fas fa-home"></i> Inicio</a>
						<a class="dropdown-item" href="{!!URL::to('/emails')!!}" title="Actualizar P&aacute;gina Actual"><i class="fas fa-sync-alt"></i> Actualizar</a>
					</div>
				</div>
			</div>
            <!-- End of Dropdown MenuLinks -->

			<div class="card-body">
				@if(Session::has('mostrar_en_listado'))
					@if(Session::has('message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<i class="fas fa-check-circle"></i> {{Session::get('message')}}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
				@endif

				@if (count($emails) > 0)
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable_emails" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>#ID</th>
									<th>Persona</th>
                                    <th>Tipo Correo electr&oacute;nico</th>
                                    <th>Correo electr&oacute;nico</th>
                                    <th>Comentario</th>
									<th>Fecha Creaci&oacute;n</th>
									<th>Fecha Actualizaci&oacute;n</th>
									<th>Operaci&oacute;n</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>#ID</th>
									<th>Persona</th>
                                    <th>Tipo Email</th>
                                    <th>Correo electr&oacute;nico</th>
                                    <th>Comentario</th>
									<th>Fecha Creaci&oacute;n</th>
									<th>Fecha Actualizaci&oacute;n</th>
									<th>Operaci&oacute;n</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($emails as $email)
									<tr>
										<td>{{$email -> id}}</td>
                                        <td>{{$email->persona->nombres}}</td>
                                        <td>{{$email->tipo_email->nombre}}</td>
                                        <td>{{$email -> descripcion}}</td>
                                        <td>{{$email -> comentario}}</td>
										<td>{{$email -> created_at}}</td>
										<td>{{$email -> updated_at}}</td>
										<td>
											<a href="{{ URL::route('emails.edit', [$email -> id]) }}" class="btn btn-primary" title="Editar Registro">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{ URL::route('emails.show', [$email -> id]) }}" class="btn btn-success" title="Ver Detalles del Registro">
												<i class="fas fa-info"></i>
											</a>

											<!-- link(enlace) al Modal -->
											<a href="#" id="btn_delete_listEmail" class="btn btn-danger" title="Eliminar Registro">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>

                    <!-- delete question Modal-->
					<div class="modal fade" id="modal_delete_listEmail" tabindex="-1" role="dialog" aria-labelledby="listModalLabelEmail" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="listModalLabelEmail">Eliminar Registro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
								<form id="form_delete_listEmail" action="" method="post">
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
                    <!-- End of delete question Modal-->
				@else
                    <!-- Empty - Alert -->
					<div class="alert alert-info" role="alert">
                        <h4 class="alert-heading"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</h4>
                        <hr />
                        <p>
                            <strong>Tabla:</strong> Emails
                            <br/>
                            <strong>Mensaje:</strong> No existen Registros para Mostrar.
                        </p>
                        <p>
                            Debe <a href="{!!URL::to('/emails/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
                        </p>
                    </div>
				@endif
			</div>

		</div>
        <!-- End of DataTales Listado Email -->
	</div>
</div>
<!-- End of Content Row -->
@endsection
