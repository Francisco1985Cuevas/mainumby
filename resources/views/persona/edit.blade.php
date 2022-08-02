@extends('template.base')

@section('title', 'Actualizar Registro')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Actualizar Registro - Personas</h1>
    <!--
    <a href="{!!URL::to('/documentos/create')!!}" class="btn btn-primary btn-icon-split" title="Nuevo Documento">
		<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
		<span class="text">Nuevo Documento</span>
	</a>
    <a href="{!!URL::to('/contactos/create')!!}" class="btn btn-primary btn-icon-split" title="Nuevo Contacto">
		<span class="icon text-white-50"><i class="fas fa-plus"></i></span>
		<span class="text">Nuevo Contacto</span>
	</a>
    -->
</div>
<!-- End of Heading -->

<!-- Content Row -->
<div class="row">
	<div class="col-xl-12 col-lg-12">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!URL::to('/')!!}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{!!URL::to('/personas')!!}">Listado de Registros</a></li>
                <li class="breadcrumb-item active" aria-current="page">Actualizar Registro</li>
            </ol>
        </nav>
        <!-- End of Breadcrumb -->
		<!-- Form Persona -->
		<div class="card shadow mb-4">
            <!-- Dropdown - MenuLinks -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Actualizar Registro</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Acciones:</div>
						<a class="dropdown-item" href="{!!URL::to('/')!!}" title="P&aacute;gina de Inicio"><i class="fas fa-home"></i> Inicio</a>
						<a class="dropdown-item" href="{{ URL::route('personas.edit', [$persona->id]) }}" title="Actualizar P&aacute;gina Actual">
							<i class="fas fa-sync-alt"></i> Actualizar
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{!!URL::to('/personas')!!}" title="Volver al listado">
							<i class="fas fa-list"></i> Volver
						</a>
					</div>
				</div>
			</div>
            <!-- End of Dropdown MenuLinks -->

			<div class="card-body">
				@include('alerts.request')

				@if(Session::has('message'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fas fa-check-circle"></i> {{Session::get('message')}} <a href="{!!URL::to('/personas')!!}">Ver</a>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif

				{!! Form::model( $persona, ['route' => ['personas.update', $persona->id], 'method' => 'PUT' ]) !!}
					@include('persona.forms.formulario')
                    {{ Form::button('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Guardar</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-icon-split'] )  }}
                    {{ Form::button('<span class="icon text-white-50"><i class="far fa-window-restore"></i></span><span class="text">Cancelar</span>', ['type' => 'reset', 'class' => 'btn btn-secondary btn-icon-split'] )  }}

					<!-- link(enlace) al Modal -->
					<a data-id="{{$persona->id}}" href="#" id="btn_delete_editFormPersona" class="btn btn-danger btn-icon-split" title="Eliminar Registro">
						<span class="icon text-white-50"><i class="fas fa-trash"></i></span>
						<span class="text">Eliminar</span>
					</a>
				{!!Form::close()!!}

				<!-- delete question Modal -->
				<div class="modal fade" id="modal_delete_editFormPersona" tabindex="-1" role="dialog" aria-labelledby="editFormModalLabelPersona" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editFormModalLabelPersona">Eliminar Registro</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="form_delete_editFormPersona" action="" method="post">
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
			</div>

		</div>
         <!-- End of Form Persona -->
	</div>
</div>
<!-- End of Content Row -->

@push('persona.edit')
<script>
    //Host Name and Protocol
    var host = window.location.protocol + "//" + window.location.host; //obtiene por ejemplo: http://localhost:8080

    //Inicializar selects dependientes de Pais-Region-Departamento-Ciudad
    jQuery(document).ready(function (){
        var paisId = jQuery('select[name="pais_id"]').val();
        console.log("paisId: "+paisId);

        if(paisId){
            jQuery.ajax({
                url : host+'/regiones/findByPais/' +paisId,
                type : "GET",
                dataType : "json",
                success:function(data) {
                    jQuery('select[name="region_id"]').empty();
                    $('select[name="region_id"]').append('<option value="">Seleccione Opci&oacute;n...</option>');
                    jQuery.each(data, function(key, value){
                        if (value.id == {{$persona->ciudad->departamento->region->id}}) {
                            $('select[name="region_id"]').append('<option value="'+ value.id +'" selected>'+ value.nombre +'</option>');
                        } else  {
                            $('select[name="region_id"]').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                        }
                    });
                }
            });
        } else {
            $('select[name="region_id"]').empty();
        }
    });

    jQuery(document).ready(function (){
        var regionId = {{$persona->ciudad->departamento->region->id}}

        if(regionId){
            jQuery.ajax({
                url : host+'/departamentos/findByRegion/' +regionId,
                type : "GET",
                dataType : "json",
                success:function(data) {
                    jQuery('select[name="departamento_id"]').empty();
                    $('select[name="departamento_id"]').append('<option value="">Seleccione Opci&oacute;n...</option>');
                    jQuery.each(data, function(key, value){
                        if (value.id == {{$persona->ciudad->departamento->id}}) {
                            $('select[name="departamento_id"]').append('<option value="'+ value.id +'" selected>'+ value.nombre +'</option>');
                        } else  {
                            $('select[name="departamento_id"]').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                        }
                    });
                }
            });
        } else {
            $('select[name="departamento_id"]').empty();
        }
    });

    jQuery(document).ready(function (){
        var departamentoId = {{$persona->ciudad->departamento->id}}

        if(departamentoId){
            jQuery.ajax({
                url : host+'/ciudades/findByDepartamento/' +departamentoId,
                type : "GET",
                dataType : "json",
                success:function(data) {
                    jQuery('select[name="ciudad_id"]').empty();
                    $('select[name="ciudad_id"]').append('<option value="">Seleccione Opci&oacute;n...</option>');
                    jQuery.each(data, function(key, value){
                        if (value.id == {{$persona->ciudad->id}}) {
                            $('select[name="ciudad_id"]').append('<option value="'+ value.id +'" selected>'+ value.nombre +'</option>');
                        } else  {
                            $('select[name="ciudad_id"]').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                        }
                    });
                }
            });
        } else {
            $('select[name="ciudad_id"]').empty();
        }
    });
    //End Inicializar selects dependientes de Pais-Region-Departamento-Ciudad


    //Selects dependientes de Regiones por Pais, Departamentos por Region, Ciudades por Departamento
    jQuery(document).ready(function () {
        jQuery('select[name="pais_id"]').on('change', function() {
            var paisId = jQuery(this).val();
            if(paisId){
                jQuery.ajax({
                    url : host+'/regiones/findByPais/' +paisId,
                    type : "GET",
                    dataType : "json",
                    success:function(data) {
                        jQuery('select[name="region_id"]').empty();
                        jQuery('select[name="departamento_id"]').empty();
                        jQuery('select[name="ciudad_id"]').empty();
                        $('select[name="region_id"]').append('<option value="">Seleccione Opci&oacute;n...</option>');
                        jQuery.each(data, function(key, value){
                            $('select[name="region_id"]').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                        });
                    }
                });
            } else {
                $('select[name="region_id"]').empty();
                $('select[name="departamento_id"]').empty();
                $('select[name="ciudad_id"]').empty();
            }
        });
    });

    jQuery(document).ready(function () {
        jQuery('select[name="region_id"]').on('change', function() {
            var regionId = jQuery(this).val();
            if(regionId){
                jQuery.ajax({
                    url : host+'/departamentos/findByRegion/' +regionId,
                    type : "GET",
                    dataType : "json",
                    success:function(data) {
                        jQuery('select[name="departamento_id"]').empty();
                        jQuery('select[name="ciudad_id"]').empty();
                        $('select[name="departamento_id"]').append('<option value="">Seleccione Opci&oacute;n...</option>');
                        jQuery.each(data, function(key, value){
                            $('select[name="departamento_id"]').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                        });
                    }
                });
            } else {
                $('select[name="departamento_id"]').empty();
                jQuery('select[name="ciudad_id"]').empty();
            }
        });
    });

    jQuery(document).ready(function () {
        jQuery('select[name="departamento_id"]').on('change', function() {
            var departamentoId = jQuery(this).val();
            if(departamentoId){
                jQuery.ajax({
                    url : host+'/ciudades/findByDepartamento/' +departamentoId,
                    type : "GET",
                    dataType : "json",
                    success:function(data) {
                        jQuery('select[name="ciudad_id"]').empty();
                        $('select[name="ciudad_id"]').append('<option value="">Seleccione Opci&oacute;n...</option>');
                        jQuery.each(data, function(key, value){
                            $('select[name="ciudad_id"]').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                        });
                    }
                });
            } else {
                $('select[name="ciudad_id"]').empty();
            }
        });
    });


    //--- Documentos ---//
    //DataTable list Documentos
	$('#dataTable_documentos').DataTable({
		language: {
            url: '/js/localisation/Spanish.json'
        }
	});//close dataTable_documentos


	//boton eliminar del form edit.
	$("#btn_delete_editFormDocumento").click(function() {
        dataId = $(this).attr("data-id");

        $('#form_delete_editFormDocumento').attr('action', '/documentos/'+dataId);
        $('#modal_delete_editFormDocumento').modal('show');
    });


	//boton eliminar del listado.
	var dataTableDocumentos = $('#dataTable_documentos').DataTable();
    dataTableDocumentos.on('click', '#btn_delete_listDocumento', function(){//hace referencia al link del listado a href delete
        var $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var dataDocumento = dataTableDocumentos.row($tr).data();

        $('#form_delete_listDocumento').attr('action', '/documentos/'+dataDocumento[0]);
        $('#modal_delete_listDocumento').modal('show');
    });
    //--- End Documentos ---//

</script>
@endpush

@endsection
