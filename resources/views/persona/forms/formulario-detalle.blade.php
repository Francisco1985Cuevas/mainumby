<!-- div Datos Personales -->
<h1 class="h3 mb-0 text-gray-800">Datos Personales</h1>
<hr>

<p class="info"><strong>#C&oacute;digo Identificador</strong>:&nbsp;&nbsp;{{$persona->id}}</p>
<p class="info"><strong>Primer Nombre</strong>:&nbsp;&nbsp;{{$persona->primer_nombre}}</p>
<p class="info"><strong>Segundo Nombre</strong>:&nbsp;&nbsp;{{$persona->segundo_nombre}}</p>
<p class="info"><strong>Primer Apellido</strong>:&nbsp;&nbsp;{{$persona->primer_apellido}}</p>
<p class="info"><strong>Segundo Apellido</strong>:&nbsp;&nbsp;{{$persona->segundo_apellido}}</p>
<p class="info"><strong>Lugar de Nacimiento</strong>:&nbsp;&nbsp;{{$persona->ciudad->nombre}}</p>
<p class="info"><strong>Fecha de Nacimiento</strong>:&nbsp;&nbsp;{{$persona->fecha_nacimiento}}</p>
<p class="info"><strong>Tipo Personeria</strong>:&nbsp;&nbsp;{{$persona->tipo_persona=='f'?'FISICA':'JURIDICA'}}</p>
<p class="info"><strong>Estado Civil</strong>:&nbsp;&nbsp;
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
{{strtoupper($estadoCivilDesc)}}
</p>
<p class="info"><strong>Sexo</strong>:&nbsp;&nbsp;{{strtoupper($persona->sexo=='m'?'MASCULINO':'FEMENINO')}}</p>
<p class="info"><strong>Estado</strong>:&nbsp;&nbsp;{{strtoupper($persona->estado)}}</p>
<p class="info"><strong>Comentario</strong>:&nbsp;&nbsp;{{$persona->comentario}}</p>
<p class="info"><strong>Fecha de Creaci&oacute;n</strong>:&nbsp;&nbsp;{{$persona->created_at}}</p>
<p class="info"><strong>Fecha de Actualizaci&oacute;n</strong>:&nbsp;&nbsp;{{$persona->updated_at}}</p>

<!-- div Documentos -->
<h1 class="h3 mb-0 text-gray-800">Documentos</h1>
<hr>
<div class="table-responsive">
	<table class="table table-bordered" id="dataTable_documentosPersonaShow" width="100%" cellspacing="0">
		<thead>
            <tr>
                <th>#C&oacute;digo Identificador</th>
                <th>Numero Documento</th>
                <th>Tipo Documento</th>
                <th>Comentario</th>
                <th>Fecha de creaci&oacute;n</th>
                <th>Fecha de actualizaci&oacute;n</th>
            </tr>
		</thead>
		<tfoot>
            <tr>
                <th>#C&oacute;digo Identificador</th>
                <th>Numero Documento</th>
                <th>Tipo Documento</th>
                <th>Comentario</th>
                <th>Fecha de creaci&oacute;n</th>
                <th>Fecha de actualizaci&oacute;n</th>
            </tr>
		</tfoot>
        <tbody>
            @foreach($documentos as $documento)
                <tr>
                    <td>{{$documento->id}}</td>
                    <td>{{$documento->numero_documento}}</td>
                    <td>{{$documento->tipoDocumento->nombre}}</td>
                    <td>{{$documento->comentario}}</td>
                    <td>{{$documento->created_at}}</td>
                    <td>{{$documento->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

