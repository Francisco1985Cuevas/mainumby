<div class="form-group">
	{!! Form::label('iddepartamento', '#C&oacute;digo Identificador') !!}
	{!! Form::label('iddepartamento', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombre', 'Nombre Departamento') !!}
	{!! Form::label('nombre', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
	{!! Form::text('nombre', null, ['class'=>'form-control', 'required'=>'required', 'maxlength'=>60, 'id'=>'nombre', 'autofocus'=>true]) !!}
</div>
<div class="form-group">
    {!! Form::label('abreviatura', 'Abreviatura') !!}
    {!! Form::label('abreviatura', '(Max. 3 Caracteres)', ['class' => 'text-xs']); !!}
    {!! Form::text('abreviatura', null, ['class'=>'form-control', 'maxlength'=>3, 'id'=>'abreviatura']) !!}
</div>

@if (count($lista_paises) > 0)
    <div class="form-group">
        {!! Form::label('pais_id', 'Seleccione Pa&iacute;s') !!}
        <select name="pais_id" class="form-control" aria-describedby="pais_idHelp" >
            @foreach ($lista_paises as $pais)
                @if(empty($departamento))
                <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                @else
                    <option value="{{ $pais->id }}" {{ $pais->id == $departamento->pais_id ? 'selected':'' }} >{{ $pais->nombre }}</option>
                @endif
            @endforeach
        </select>
        <div id="pais_idHelp" class="form-text">El pa&iacute;s al cual pertenece este departamento.</div>
    </div>
@else
    <div class="alert alert-info" role="alert">
        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
        <strong>Listado:</strong> Paises
        <br/>
        Debe <a href="{!!URL::to('/paises/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
    </div>
@endif




