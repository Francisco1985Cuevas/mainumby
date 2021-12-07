<p class="info"><strong>#C&oacute;digo Identificador</strong>:&nbsp;&nbsp;{{$persona->id}}</p>
<p class="info"><strong>Nombres</strong>:&nbsp;&nbsp;{{$persona->nombres}}</p>
<p class="info"><strong>Apellidos</strong>:&nbsp;&nbsp;{{$persona->apellidos}}</p>
<p class="info"><strong>Fecha Nacimiento</strong>:&nbsp;&nbsp;{{$persona->fecha_nacimiento}}</p>
<p class="info"><strong>Tipo Persona</strong>:&nbsp;&nbsp;{{ ($persona->tipo_persona) == 'F' ? 'Fisica' : 'Juridica' }}</p>
<p class="info"><strong>Fecha Creaci&oacute;n</strong>:&nbsp;&nbsp;{{$persona->created_at}}</p>
<p class="info"><strong>Fecha Actualizaci&oacute;n</strong>:&nbsp;&nbsp;{{$persona->updated_at}}</p>
