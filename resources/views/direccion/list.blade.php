@extends('template.base')

<?php $message=Session::get('message') ?>

@section('title', 'Listado')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Listado Principal - Direcciones</h1>
	<a href="{!!URL::to('/direcciones/create')!!}" class="btn btn-primary btn-icon-split" title="Nuevo Registro">
		<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
		<span class="text">Nuevo Registro</span>
	</a>
</div>

<!-- Content Row -->
<div class="row">

	<div class="col-xl-12 col-lg-12">

		<!-- DataTales Listado Direccion -->
		<div class="card shadow mb-4">

			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"></i> Listado de Registros</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Acciones:</div>
						<a class="dropdown-item" href="{!!URL::to('/')!!}" title="P&aacute;gina de Inicio"><i class="fas fa-home"></i> Inicio</a>
						<a class="dropdown-item" href="{!!URL::to('/direcciones')!!}" title="Actualizar P&aacute;gina Actual"><i class="fas fa-sync-alt"></i> Actualizar</a>
					</div>
				</div>
			</div>

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

				@if (count($direcciones) > 0)
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable_direcciones" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>#ID</th>
									<th>Persona</th>
									<th>Tipo Direcci&oacute;n</th>
                                    <th>Barrio</th>
                                    <th>Calle</th>
                                    <th>Numero Casa</th>
                                    <th>Piso</th>
                                    <th>Departamento</th>
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
									<th>Tipo Direcci&oacute;n</th>
                                    <th>Barrio</th>
                                    <th>Calle</th>
                                    <th>Numero Casa</th>
                                    <th>Piso</th>
                                    <th>Departamento</th>
                                    <th>Comentario</th>
									<th>Fecha Creaci&oacute;n</th>
									<th>Fecha Actualizaci&oacute;n</th>
									<th>Operaci&oacute;n</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($direcciones as $direccion)
									<tr>
										<td>{{$direccion -> id}}</td>
										<td>{{$direccion -> persona_nombres}}</td>
										<td>{{$direccion -> tipo_direccion_desc}}</td>
                                        <td>{{$direccion -> barrio_desc}}</td>
                                        <td>{{$direccion -> calle}}</td>
                                        <td>{{$direccion -> numero_casa}}</td>
                                        <td>{{$direccion -> piso}}</td>
                                        <td>{{$direccion -> departamento}}</td>
                                        <td>{{$direccion -> comentario}}</td>
										<td>{{$direccion -> created_at}}</td>
										<td>{{$direccion -> updated_at}}</td>
										<td>
											<a href="{{ URL::route('direcciones.edit', [$direccion -> id]) }}" class="btn btn-primary" title="Editar Registro">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{ URL::route('direcciones.show', [$direccion -> id]) }}" class="btn btn-success" title="Ver Detalles del Registro">
												<i class="fas fa-info"></i>
											</a>

											<!-- link(enlace) al Modal -->
											<a href="#" id="btn_delete_listDireccion" class="btn btn-danger" title="Eliminar Registro">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- render(): Paginacion, hace referencia a la variable pasada a esta pagina por medio del
					Controlador "DireccionController" que realiza la paginacion de los recursos mostrados. -->

					<div class="modal fade" id="modal_delete_listDireccion" tabindex="-1" role="dialog" aria-labelledby="listModalLabelDireccion" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="listModalLabelDireccion">Eliminar Registro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
								<form id="form_delete_listDireccion" action="" method="post">
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

				@else
					<div class="alert alert-info" role="alert">
                        <h4 class="alert-heading"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</h4>
                        <hr />
                        <p>
                            <strong>Tabla:</strong> Direcciones
                            <br/>
                            <strong>Mensaje:</strong> No existen Registros para Mostrar.
                        </p>
                        <p>
                            Debe <a href="{!!URL::to('/direcciones/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
                        </p>
                    </div>
				@endif

			</div>

		</div>
	</div>

</div>

@endsection
