<div class="form-group">
	{!! Form::label('iddepartamento', '#C&oacute;digo Identificador') !!}
	{!! Form::label('iddepartamento', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>

@if (count($lista_paises) > 0)
    <div class="form-group">
        {!! Form::label('pais_id', 'Pa&iacute;s') !!}
        <select id="pais_id" name="pais_id" class="form-control" required>
            <option value="">Seleccione Opcion...</option>
            @foreach ($lista_paises as $pais)
                @if(empty($departamento))
                    <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                @else
                    <option value="{{ $pais->id }}" {{ $pais->id == $departamento->region->pais->id ? 'selected':'' }} >{{ $pais->nombre }}</option>
                @endif
            @endforeach
        </select>
    </div>
@else
    <div class="alert alert-info" role="alert">
        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
        <strong>Listado:</strong> Paises
        <br/>
        Debe <a href="{!!URL::to('/paises/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
    </div>
@endif

<!-- Form Group (region_id) -->
<div class="form-group">
    <label for="region_id">Region</label>
    <select id="region_id" name="region_id" class="form-control" required>
        <!-- Las opciones se cargan dinamicamente a traves de JQuery/JavaScript -->
    </select>
</div>
<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::label('nombre', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
	{!! Form::text('nombre', null, ['id'=>'nombre', 'class'=>'form-control', 'required'=>'required', 'minlength'=>2, 'maxlength'=>255, 'autofocus'=>true]) !!}
</div>
<div class="form-group">
    {!! Form::label('abreviatura', 'Abreviatura') !!}
    {!! Form::label('abreviatura', '(Campo opcional m&aacute;ximo 3 caracteres)', ['class' => 'text-xs']); !!}
    {!! Form::text('abreviatura', null, ['id'=>'abreviatura', 'class'=>'form-control', 'maxlength'=>3]) !!}
</div>
