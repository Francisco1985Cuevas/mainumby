@extends('template.base')

<?php
    $message = Session::get('message');
?>

@section('title', 'Listado')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Listado Principal - Periodos Fiscales</h1>
	<a href="{!!URL::to('/periodosfiscales/create')!!}" class="btn btn-primary btn-icon-split" title="Nuevo Registro">
		<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
		<span class="text">Nuevo Registro</span>
	</a>
</div>
<!-- End of Heading -->

<!-- Content Row -->
<div class="row">
	<div class="col-xl-12 col-lg-12">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!URL::to('/')!!}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Listado de Registros</li>
            </ol>
        </nav>
        <!-- End of Breadcrumb -->
		<!-- DataTales Listado Periodo Fiscal -->
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
						<a class="dropdown-item" href="{!!URL::to('/periodosfiscales')!!}" title="Actualizar P&aacute;gina Actual"><i class="fas fa-sync-alt"></i> Actualizar</a>
					</div>
				</div>
			</div>
            <!-- End of Dropdown MenuLinks -->

			<div class="card-body">
                @if(Session::has('validated'))
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
                @else
                    @if(Session::has('message'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="alert-heading">
                                <i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema
                            </h4>
                            <hr>
                            <p>
                                <ul><li>{{Session::get('message')}}</li></ul>
                            </p>
                        </div>
                    @endif
                @endif

				@if (count($periodosFiscales) > 0)
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable_periodosFiscales" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>#ID</th>
									<th>Usuario</th>
                                    <th>Periodo</th>
									<th>Descripcion</th>
									<th>Comentario</th>
									<th>Fecha de creaci&oacute;n</th>
									<th>Fecha de actualizaci&oacute;n</th>
									<th>Operaci&oacute;n</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>#ID</th>
									<th>Usuario</th>
                                    <th>Periodo</th>
									<th>Descripcion</th>
									<th>Comentario</th>
									<th>Fecha de creaci&oacute;n</th>
									<th>Fecha de actualizaci&oacute;n</th>
									<th>Operaci&oacute;n</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($periodosFiscales as $periodoFiscal)
									<tr>
										<td>{{$periodoFiscal->id}}</td>
                                        <td>{{$periodoFiscal->user->name}}</td>
                                        <td>{{$periodoFiscal->periodo}}</td>
                                        <td>{{$periodoFiscal->descripcion}}</td>
										<td>{{$periodoFiscal->comentario}}</td>
										<td>{{$periodoFiscal->created_at}}</td>
										<td>{{$periodoFiscal->updated_at}}</td>
										<td>
											<a href="{{ URL::route('periodosfiscales.edit', [$periodoFiscal -> id]) }}" class="btn btn-primary" title="Editar Registro">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{ URL::route('periodosfiscales.show', [$periodoFiscal -> id]) }}" class="btn btn-success" title="Ver Detalles del Registro">
												<i class="fas fa-info"></i>
											</a>

											<!-- link(enlace) al Modal -->
											<a href="#" id="btn_delete_listDepartamento" class="btn btn-danger" title="Eliminar Registro">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- render(): Paginacion, hace referencia a la variable pasada a esta pagina por medio del
					Controlador "DepartamentoController" que realiza la paginacion de los recursos mostrados. -->

                    <!-- delete question Modal -->
					<div class="modal fade" id="modal_delete_listDepartamento" tabindex="-1" role="dialog" aria-labelledby="listModalLabelDepartamento" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="listModalLabelDepartamento">Eliminar Registro</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
								<form id="form_delete_listDepartamento" action="" method="post">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <input type="hidden" name="_method" value="DELETE"/>
                                        Esta Seguro de que desea Eliminar este Registro?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End of delete question Modal -->
				@else
                    <!-- Empty - Alert -->
					<div class="alert alert-info" role="alert">
                        <h4 class="alert-heading"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</h4>
                        <hr />
                        <p>
                            <strong>Tabla:</strong> Periodos Fiscales
                            <br/>
                            <strong>Mensaje:</strong> No existen Registros para Mostrar.
                        </p>
                        <p>
                            Debe <a href="{!!URL::to('/periodosfiscales/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
                        </p>
                    </div>
				@endif
			</div>

		</div>
        <!-- End of DataTales Listado Periodo Fiscal -->
	</div>
</div>
<!-- End of Content Row -->

@push('periodoFiscal.list')
<script>
    //DataTable list Periodos Fiscales
	$('#dataTable_periodosFiscales').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_periodosFiscales

    //boton eliminar del listado.
    var dataTablePeriodosFiscales = $('#dataTable_periodosFiscales').DataTable();
    dataTablePeriodosFiscales.on('click', '#btn_delete_listDepartamento', function(){//hace referencia al link del listado a href delete
        //alert("entro aca");
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataDepartamento = dataTablePeriodosFiscales.row($tr).data();
        console.log("dataDepartamento: "+dataDepartamento);

        //$('#id').val(data[0]);
        $('#form_delete_listDepartamento').attr('action', '/periodosfiscales/'+dataDepartamento[0]);
        $('#modal_delete_listDepartamento').modal('show');
    });

</script>
@endpush

@endsection
