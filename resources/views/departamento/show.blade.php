@php
    //var_dump($departamento);
@endphp
{{-- @foreach ($departamento as $w)
    {{ $w->id }}
    {{ $w->nombre }}
    {{ $w->abreviatura }}
    {{ $w->pais }}
    {{ $w->nombre_pais }}
@endforeach --}}
{{-- {{ $departamento->id }} --}}
{{-- @foreach ($departamento as $call)
    <p> {{ $call->id }} event </p>
@endforeach --}}
<?php
    //echo "<br>"."AAA"."<br>";
    //dd($departamento);
    //var_dump("departamento: ".$departamento);
    //foreach ($departamento as $depto) {
    //    $id = $depto->id;
    //    $nombre = $depto->nombre;
    //    $abreviatura = $depto->abreviatura;
    //    $pais = $depto->pais;
    //    $nombrePais = $depto->nombre_pais;
    //    //echo $id;
    //}
    //die();
?>
{{-- {{ $i = 0 }}
@foreach ($departamento as $index)
   <p>aaa{{ $i = $index->id }}aaa</p>
@endforeach --}}
{{-- @foreach ($departamento as $depto)
   {{ $id = $depto->id }}
   {{ $nombre = $depto->nombre }}
   {{ $abreviatura = $depto->abreviatura }}
   {{ $id = $depto->pais }}
   {{ $id = $depto->nombre_pais }}
@endforeach --}}


@extends('template.base')

@section('title', 'Detalles del Registro')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Detalles del Registro - Departamentos</h1>
</div>
<!-- End of Heading -->

<!-- Content Row -->
<div class="row">
	<div class="col-xl-12 col-lg-12">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!URL::to('/')!!}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{!!URL::to('/departamentos')!!}">Listado de Registros</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles del Registro</li>
            </ol>
        </nav>
        <!-- End of Breadcrumb -->
		<!-- Detalles Departamento -->
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
						<a class="dropdown-item" href="{{ URL::route('departamentos.show', [$departamento->id]) }}" title="Actualizar P&aacute;gina Actual">
                            <i class="fas fa-sync-alt"></i> Actualizar
                        </a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{!!URL::to('/departamentos')!!}" title="Volver al listado">
							<i class="fas fa-list"></i> Volver
						</a>
					</div>
				</div>
			</div>
            <!-- End of Dropdown MenuLinks -->

			<div class="card-body">
				{!!Form::model($departamento, ['route'=>  ['departamentos.show', $departamento->id], 'method'=>'POST', 'files'=> true])!!}
                    @include('departamento.forms.formulario-detalle')
                    <a href="{!!URL::to('/departamentos')!!}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50"><i class="fa fa-arrow-left"></i></span>
                        <span class="text">Volver</span>
                    </a>
                {!!Form::close()!!}
			</div>

		</div>
        <!-- End of Detalles Departamento -->
	</div>
</div>
<!-- End of Content Row -->
@endsection
