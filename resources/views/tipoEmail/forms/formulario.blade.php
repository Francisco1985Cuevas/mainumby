<div class="form-group">
	{!! Form::label('idtipoEmail', '#C&oacute;digo Identificador') !!}
	{!! Form::label('idtipoEmail', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>
<div class="form-group">
    <label for="nombre" class="form-label">Tipo Correo electr&oacute;nico</label>
    <label for="nombre" class="text-xs">(*) Campo Obligatorio</label>
    <input id="nombre" name="nombre" type="text" class="form-control" autofocus required minlength="2" maxlength="60" value="{{  empty($tipoEmail) ? old('nombre') : (empty(old('nombre')) ? $tipoEmail->nombre : old('nombre')) }}" >
    <label for="nombre" class="text-xs">Es como aparecera en la lista de Tipos correos electr&oacute;nicos.</label>
</div>
<div class="form-group">
    {!! Form::label('abreviatura', 'Abreviatura') !!}
    {!! Form::label('abreviatura', '(Max. 3 Caracteres)', ['class' => 'text-xs']); !!}
    {{-- {!! Form::text('abreviatura', null, ['class'=>'form-control', 'maxlength'=>3, 'id'=>'abreviatura']) !!} --}}
    <input id="abreviatura" name="abreviatura" type="text" class="form-control" maxlength="3" value="{{  empty($tipoEmail) ? old('abreviatura') : (empty(old('abreviatura')) ? $tipoEmail->abreviatura : old('abreviatura')) }}" >
    {!! Form::label('abreviatura', 'Campo Opcional, es solo una abreviacion del tipo que puede ser usado para la visualizacion en los Reportes.', ['class' => 'text-xs']); !!}
</div>
