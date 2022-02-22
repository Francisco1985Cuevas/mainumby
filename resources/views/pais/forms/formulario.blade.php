<div class="form-group">
	{!! Form::label('idpais', '#C&oacute;digo Identificador') !!}
	{!! Form::label('idpais', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
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
