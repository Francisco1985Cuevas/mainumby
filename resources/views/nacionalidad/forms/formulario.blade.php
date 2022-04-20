<div class="form-group">
	{!! Form::label('idnacionalidad', '#C&oacute;digo Identificador') !!}
	{!! Form::label('idnacionalidad', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>

@if (count($listaPaises) > 0)
    <div class="form-group">
        {!! Form::label('pais_id', 'Pa&iacute;s') !!}
        <select id="pais_id" name="pais_id" class="form-control" required>
            <option value="">Seleccione Opcion...</option>
            @foreach ($listaPaises as $pais)
                @if(empty($nacionalidad))
                    <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                @else
                    <option value="{{ $pais->id }}" {{ $pais->id == $nacionalidad->pais->id ? 'selected':'' }} >{{ $pais->nombre }}</option>
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
<div class="form-group">
    {!! Form::label('comentario', 'Comentario') !!}
    {!! Form::label('comentario', '(Campo opcional)', ['class' => 'text-xs']); !!}
    <textarea id="comentario" name="comentario" class="form-control" rows="5" cols="5">
        @isset($nacionalidad)
			{{ $nacionalidad->comentario }}
		@endisset
    </textarea>
</div>
