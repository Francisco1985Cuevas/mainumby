<div class="form-group">
	{!! Form::label('idtipoDocumento', '#C&oacute;digo Identificador') !!}
	{!! Form::label('idtipoDocumento', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombre', 'Tipo Documento') !!}
	{!! Form::label('nombre', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
	{!! Form::text('nombre', null, ['class'=>'form-control', 'required'=>'required', 'maxlength'=>60, 'id'=>'nombre', 'autofocus'=>true]) !!}
</div>
<div class="form-group">
    {!! Form::label('abreviatura', 'Abreviatura') !!}
    {!! Form::label('abreviatura', '(Max. 3 Caracteres)', ['class' => 'text-xs']); !!}
    {!! Form::text('abreviatura', null, ['class'=>'form-control', 'maxlength'=>3, 'id'=>'abreviatura']) !!}
</div>
