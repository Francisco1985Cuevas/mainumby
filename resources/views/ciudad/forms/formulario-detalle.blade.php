<p class="info"><strong>#C&oacute;digo Identificador</strong>:&nbsp;&nbsp;{{$ciudad->id}}</p>
<p class="info"><strong>Pa&iacute;s</strong>:&nbsp;&nbsp;{{$ciudad->departamento->region->pais->nombre}}</p>
<p class="info"><strong>Region</strong>:&nbsp;&nbsp;{{$ciudad->departamento->region->nombre}}</p>
<p class="info"><strong>Departamento</strong>:&nbsp;&nbsp;{{$ciudad->departamento->nombre}}</p>
<p class="info"><strong>Nombre</strong>:&nbsp;&nbsp;{{$ciudad->nombre}}</p>
<p class="info"><strong>Abreviatura</strong>:&nbsp;&nbsp;{{$ciudad->abreviatura}}</p>
<p class="info"><strong>Fecha Creaci&oacute;n</strong>:&nbsp;&nbsp;{{$ciudad->created_at}}</p>
<p class="info"><strong>Fecha Actualizaci&oacute;n</strong>:&nbsp;&nbsp;{{$ciudad->updated_at}}</p>
