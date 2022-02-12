@extends('template.base')

@section('title', 'Detalles del Registro')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Detalles del Registro - Documentos</h1>
</div>

<!-- Content Row -->
<div class="row">

	<div class="col-xl-12 col-lg-12">

		<!-- Detalles Documento -->
		<div class="card shadow mb-4">

			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i> Detalles del Registro</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Acciones:</div>
						<a class="dropdown-item" href="{!!URL::to('/')!!}" title="P&aacute;gina de Inicio"><i class="fas fa-home"></i> Inicio</a>
                        @foreach ($documentos as $documento)
                            <a class="dropdown-item" href="{{ URL::route('documentos.show', [$documento->id]) }}" title="Actualizar P&aacute;gina Actual">
                                <i class="fas fa-sync-alt"></i> Actualizar
                            </a>
                        @endforeach
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{!!URL::to('/documentos')!!}" title="Volver al listado">
							<i class="fas fa-list"></i> Volver
						</a>
					</div>
				</div>
			</div>
			<div class="card-body">
                @foreach ($documentos as $documento)
                    {!!Form::model($documentos, ['route'=>  ['documentos.show', $documento->id], 'method'=>'POST', 'files'=> true])!!}
                        @include('documento.forms.formulario-detalle')
                    {!!Form::close()!!}
                @endforeach
			</div>
		</div>

	</div>

</div>

@endsection