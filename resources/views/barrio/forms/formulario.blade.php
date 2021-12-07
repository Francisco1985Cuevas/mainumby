<div class="form-group">
	{!! Form::label('idbarrio', '#C&oacute;digo Identificador') !!}
	{!! Form::label('idbarrio', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombre', 'Nombre Barrio') !!}
	{!! Form::label('nombre', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
	{!! Form::text('nombre', null, ['class'=>'form-control', 'required'=>'required', 'maxlength'=>60, 'id'=>'nombre', 'autofocus'=>true]) !!}
</div>
<div class="form-group">
    {!! Form::label('abreviatura', 'Abreviatura') !!}
    {!! Form::label('abreviatura', '(Max. 3 Caracteres)', ['class' => 'text-xs']); !!}
    {!! Form::text('abreviatura', null, ['class'=>'form-control', 'maxlength'=>3, 'id'=>'abreviatura']) !!}
</div>

@if (count($lista_ciudades) > 0)
    <div class="form-group">
        <label for="ciudad_id" class="form-label">Seleccione Ciudad</label>
        <select name="ciudad_id" class="form-control" autofocus="true" aria-describedby="ciudad_idHelp" >
            @foreach ($lista_ciudades as $ciudad)
                @if(empty($barrio))
                    <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                @else
                    <option value="{{ $ciudad->id }}" {{ $ciudad->id == $barrio->ciudad_id ? 'selected':'' }} >{{ $ciudad->nombre }}</option>
                @endif
            @endforeach
        </select>
        <div id="ciudad_idHelp" class="form-text">La ciudad a la cual pertenece este barrio.</div>
    </div>
@else
    <div class="alert alert-info" role="alert">
        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
        <strong>Listado:</strong> Ciudades
        <br/>
        Debe <a href="{!!URL::to('/ciudades/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
    </div>
@endif
