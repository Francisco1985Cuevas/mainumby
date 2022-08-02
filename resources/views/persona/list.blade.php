@extends('template.base')

<?php
    $message = Session::get('message');
?>

@section('title', 'Listado')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Listado Principal - Personas</h1>
	<a href="{!!URL::to('/personas/create')!!}" class="btn btn-primary btn-icon-split" title="Nuevo Registro">
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
		<!-- DataTales Listado Persona -->
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
						<a class="dropdown-item" href="{!!URL::to('/personas')!!}" title="Actualizar P&aacute;gina Actual"><i class="fas fa-sync-alt"></i> Actualizar</a>
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

				@if (count($personas) > 0)
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable_personas" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>#ID</th>
                                    <th>Nombres/Raz&oacute;n Social</th>
                                    <th>Apellidos</th>
									<th>Lugar Nacimiento</th>
									<th>Fecha Nacimiento</th>
                                    <th>Sexo</th>
                                    <th>Tipo Persona</th>
                                    <th>Estado Civil</th>
                                    <th>Estado</th>
									<th>Fecha de creaci&oacute;n</th>
									<th>Fecha de actualizaci&oacute;n</th>
									<th>Operaci&oacute;n</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>#ID</th>
                                    <th>Nombres/Raz&oacute;n Social</th>
                                    <th>Apellidos</th>
									<th>Lugar Nacimiento</th>
									<th>Fecha Nacimiento</th>
                                    <th>Sexo</th>
                                    <th>Tipo Persona</th>
                                    <th>Estado Civil</th>
                                    <th>Estado</th>
									<th>Fecha de creaci&oacute;n</th>
									<th>Fecha de actualizaci&oacute;n</th>
									<th>Operaci&oacute;n</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($personas as $persona)
                                    @switch($persona->estado_civil)
                                        @case('c')
                                            @php ($estadoCivilDesc = "Casado/a")
                                            @break
                                        @case('d')
                                            @php ($estadoCivilDesc = "Divorciado/a")
                                            @break
                                        @case('v')
                                            @php ($estadoCivilDesc = "Viudo/a")
                                            @break
                                        @default
                                            @php ($estadoCivilDesc = "Soltero/a")
                                    @endswitch
									<tr>
										<td>{{$persona->id}}</td>
                                        <td>{{$persona->primer_nombre}} {{$persona->segundo_nombre}}</td>
                                        <td>{{$persona->primer_apellido}} {{$persona->segundo_apellido}}</td>
                                        <td>{{$persona->ciudad->nombre}}</td>
										<td>{{$persona->fecha_nacimiento}}</td>
                                        <td>{{$persona->sexo=='m'?'MASCULINO':'FEMENINO'}}</td>
                                        <td>{{$persona->tipo_persona=='f'?'FISICA':'JURIDICA'}}</td>
                                        <td>{{strtoupper($estadoCivilDesc)}}</td>
                                        <td>{{strtoupper($persona->estado)}}</td>
										<td>{{$persona->created_at}}</td>
										<td>{{$persona->updated_at}}</td>
										<td>
											<a href="{{ URL::route('personas.edit', [$persona -> id]) }}" class="btn btn-primary" title="Editar Registro">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{ URL::route('personas.show', [$persona -> id]) }}" class="btn btn-success" title="Ver Detalles del Registro">
												<i class="fas fa-info"></i>
											</a>

											<!-- link(enlace) al Modal -->
											<a href="#" id="btn_delete_listPersona" class="btn btn-danger" title="Eliminar Registro">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- render(): Paginacion, hace referencia a la variable pasada a esta pagina por medio del
					Controlador "PersonaController" que realiza la paginacion de los recursos mostrados. -->

                    <!-- delete question Modal -->
					<div class="modal fade" id="modal_delete_listPersona" tabindex="-1" role="dialog" aria-labelledby="listModalLabelPersona" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="listModalLabelPersona">Eliminar Registro</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
								<form id="form_delete_listPersona" action="" method="post">
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
                            <strong>Tabla:</strong> Personas
                            <br/>
                            <strong>Mensaje:</strong> No existen Registros para Mostrar.
                        </p>
                        <p>
                            Debe <a href="{!!URL::to('/personas/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
                        </p>
                    </div>
				@endif
			</div>

		</div>
        <!-- End of DataTales Listado Persona -->
	</div>
</div>
<!-- End of Content Row -->

@push('persona.list')
<script>
    //DataTable list Personas
	$('#dataTable_personas').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_personas

    //boton eliminar del listado.
    var dataTablePersonas = $('#dataTable_personas').DataTable();
    dataTablePersonas.on('click', '#btn_delete_listPersona', function(){//hace referencia al link del listado a href delete
        //alert("entro aca");
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataPersona = dataTablePersonas.row($tr).data();
        console.log("dataPersona: "+dataPersona);

        //$('#id').val(data[0]);
        $('#form_delete_listPersona').attr('action', '/personas/'+dataPersona[0]);
        $('#modal_delete_listPersona').modal('show');
    });

</script>
@endpush

@endsection
