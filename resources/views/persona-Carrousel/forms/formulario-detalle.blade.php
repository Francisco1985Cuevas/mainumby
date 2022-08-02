<!-- div Datos Personales -->
<h1 class="h3 mb-0 text-gray-800">Datos Personales</h1>
<hr>

<p class="info"><strong>#C&oacute;digo Identificador</strong>:&nbsp;&nbsp;{{$persona->id}}</p>
<p class="info"><strong>Nombres</strong>:&nbsp;&nbsp;{{$persona->nombres}}</p>
<p class="info"><strong>Apellidos</strong>:&nbsp;&nbsp;{{$persona->apellidos}}</p>
<p class="info"><strong>Fecha Nacimiento</strong>:&nbsp;&nbsp;{{$persona->fecha_nacimiento}}</p>
<p class="info"><strong>Tipo Persona</strong>:&nbsp;&nbsp;{{ ($persona->tipo_persona) == 'F' ? 'Fisica' : 'Juridica' }}</p>
<p class="info"><strong>Fecha Creaci&oacute;n</strong>:&nbsp;&nbsp;{{$persona->created_at}}</p>
<p class="info"><strong>Fecha Actualizaci&oacute;n</strong>:&nbsp;&nbsp;{{$persona->updated_at}}</p>

<!-- div Documentos -->
<h1 class="h3 mb-0 text-gray-800">Documentos</h1>
<hr>
<div class="table-responsive">
	<table class="table table-bordered" id="dataTable_documentosPersonaShow" width="100%" cellspacing="0">
		<thead>
            <tr>
                <th>#Item Nro.</th>
                <th>Numero Documento</th>
                <th>Tipo Documento</th>
                <th>Comentario</th>
            </tr>
		</thead>
		<tfoot>
            <tr>
                <th>#Item Nro.</th>
                <th>Numero Documento</th>
                <th>Tipo Documento</th>
                <th>Comentario</th>
            </tr>
		</tfoot>
        <tbody>
            @foreach($documentos as $documento)
                <tr>
                    <td>{{$documento -> id}}</td>
                    <td>{{$documento -> numero_documento}}</td>
                    <td>{{$documento -> tipoDocumento -> nombre}}</td>
                    <td>{{$documento -> comentario}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- div Direcciones -->
<h1 class="h3 mb-0 text-gray-800">Direcciones</h1>
<hr>
<div class="table-responsive">
	<table class="table table-bordered" id="dataTable_direccionesPersonaShow" width="100%" cellspacing="0">
		<thead>
            <tr>
                <th>#Item Nro.</th>
                <th>Barrio</th>
                <th>Calle</th>
                <th>Numero Casa</th>
                <th>Tipo Direcci&oacute;n</th>
                <th>Piso</th>
                <th>Departamento</th>
                <th>Comentario</th>
            </tr>
		</thead>
		<tfoot>
            <tr>
                <th>#Item Nro.</th>
                <th>Barrio</th>
                <th>Calle</th>
                <th>Numero Casa</th>
                <th>Tipo Direcci&oacute;n</th>
                <th>Piso</th>
                <th>Departamento</th>
                <th>Comentario</th>
            </tr>
		</tfoot>
        <tbody>
            @foreach($direcciones as $direccion)
                <tr>
                    <td>{{$direccion -> id}}</td>
                    <td>{{$direccion -> barrio -> nombre}}</td>
                    <td>{{$direccion -> calle}}</td>
                    <td>{{$direccion -> numero_casa}}</td>
                    <td>{{$direccion -> tipoDireccion -> nombre}}</td>
                    <td>{{$direccion -> piso}}</td>
                    <td>{{$direccion -> departamento}}</td>
                    <td>{{$direccion -> comentario}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- div Contactos -->
<h1 class="h3 mb-0 text-gray-800">Contactos</h1>
<hr>
<div class="table-responsive">
	<table class="table table-bordered" id="dataTable_contactosPersonaShow" width="100%" cellspacing="0">
		<thead>
            <tr>
                <th>#Item Nro.</th>
                <th>Numero Contacto</th>
                <th>Tipo Contacto</th>
                <th>Comentario</th>
            </tr>
		</thead>
		<tfoot>
            <tr>
                <th>#Item Nro.</th>
                <th>Numero Contacto</th>
                <th>Tipo Contacto</th>
                <th>Comentario</th>
            </tr>
		</tfoot>
        <tbody>
            @foreach($contactos as $contacto)
                <tr>
                    <td>{{$contacto -> id}}</td>
                    <td>{{$contacto -> numero_contacto}}</td>
                    <td>{{$contacto -> tipoContacto -> nombre}}</td>
                    <td>{{$contacto -> comentario}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- div Emails -->
<h1 class="h3 mb-0 text-gray-800">Emails</h1>
<hr>
<div class="table-responsive">
	<table class="table table-bordered" id="dataTable_emailsPersonaShow" width="100%" cellspacing="0">
		<thead>
            <tr>
                <th>#Item Nro.</th>
                <th>Correo Electronico</th>
                <th>Tipo Correo Electronico</th>
                <th>Comentario</th>
            </tr>
		</thead>
		<tfoot>
            <tr>
                <th>#Item Nro.</th>
                <th>Correo Electronico</th>
                <th>Tipo Correo Electronico</th>
                <th>Comentario</th>
            </tr>
		</tfoot>
        <tbody>
            @foreach($emails as $email)
                <tr>
                    <td>{{$email -> id}}</td>
                    <td>{{$email -> descripcion}}</td>
                    <td>{{$email -> tipo_email -> nombre}}</td>
                    <td>{{$email -> comentario}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
