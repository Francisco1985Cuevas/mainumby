@extends('template.base')

@section('title', 'Nuevo Registro')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Nuevo Registro - Barrios</h1>
</div>
<!-- End of Heading -->

<!-- Content Row -->
<div class="row">
	<div class="col-xl-12 col-lg-12">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!URL::to('/')!!}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{!!URL::to('/barrios')!!}">Listado de Registros</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nuevo Registro</li>
            </ol>
        </nav>
        <!-- End of Breadcrumb -->
		<!-- Form Barrios -->
		<div class="card shadow mb-4">
            <!-- Dropdown - MenuLinks -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Nuevo Registro</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Acciones:</div>
						<a class="dropdown-item" href="{!!URL::to('/')!!}" title="P&aacute;gina de Inicio"><i class="fas fa-home"></i> Inicio</a>
						<a class="dropdown-item" href="{!!URL::to('/barrios/create')!!}" title="Actualizar P&aacute;gina Actual">
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

				{!! Form::open(['route' => 'barrios.store', 'method' => 'post', 'id' => 'barrioForm']) !!}
					@include('barrio.forms.formulario')
					{{ Form::button('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Guardar</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-icon-split'] )  }}
                    {{ Form::button('<span class="icon text-white-50"><i class="far fa-window-restore"></i></span><span class="text">Cancelar</span>', ['type' => 'reset', 'class' => 'btn btn-secondary btn-icon-split'] )  }}
                {!!Form::close()!!}
			</div>
		</div>
        <!-- End of Form Barrios -->
	</div>
</div>
<!-- End of Content Row -->

@push('barrio.create')
<script>
    //Host Name and Protocol
    var host = window.location.protocol + "//" + window.location.host; //obtiene por ejemplo: http://localhost:8080

    //Selects dependientes de Regiones por Pais, Departamentos por Region
    jQuery(document).ready(function (){
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

    jQuery(document).ready(function (){
        jQuery('select[name="region_id"]').on('change', function() {
            var regionId = jQuery(this).val();
            if(regionId){
                jQuery.ajax({
                    url : host+'/departamentos/findByRegion/' +regionId,
                    type : "GET",
                    dataType : "json",
                    success:function(data) {
                        jQuery('select[name="departamento_id"]').empty();
                        $('select[name="departamento_id"]').append('<option value="">Seleccione Opci&oacute;n...</option>');
                        jQuery.each(data, function(key, value){
                            $('select[name="departamento_id"]').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                        });
                    }
                });
            } else {
                $('select[name="departamento_id"]').empty();
            }
        });
    });

    jQuery(document).ready(function (){
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

</script>
@endpush

@endsection
