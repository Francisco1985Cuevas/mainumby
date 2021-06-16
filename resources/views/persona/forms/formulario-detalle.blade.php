<p class="info"><strong>#C&oacute;digo Identificador</strong>:&nbsp;&nbsp;{{$personas->id}}</p>
<p class="info"><strong>Nombres</strong>:&nbsp;&nbsp;{{$personas->nombres}}</p>
<p class="info"><strong>Apellidos</strong>:&nbsp;&nbsp;{{$personas->apellidos}}</p>
<p class="info"><strong>Fecha Nacimiento</strong>:&nbsp;&nbsp;{{$personas->fecha_nacimiento}}</p>
<p class="info"><strong>Tipo Persona</strong>:&nbsp;&nbsp;{{ ($personas -> tipo_persona) == 'F' ? 'Fisica' : 'Juridica' }}</p>
<p class="info"><strong>Fecha Creaci&oacute;n</strong>:&nbsp;&nbsp;{{$personas->created_at}}</p>
<p class="info"><strong>Fecha Actualizaci&oacute;n</strong>:&nbsp;&nbsp;{{$personas->updated_at}}</p>
