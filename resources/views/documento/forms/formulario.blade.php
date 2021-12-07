<div class="form-group">
	{!! Form::label('iddocumento', '#C&oacute;digo Identificador') !!}
	{!! Form::label('iddocumento', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('persona', 'Persona') !!}
    {!! Form::select('persona', $list_personas, 1, ['class'=>'form-control'] ) !!}
</div>
<div class="form-group">
    {!! Form::label('tipo_documento', 'Tipo Documento') !!}
    {!! Form::select('tipo_documento', $list_tiposDocumentos, 1, ['class'=>'form-control'] ) !!}
</div>
<div class="form-group">
	{!! Form::label('numero_documento', 'Numero Documento') !!}
	{!! Form::label('numero_documento', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
	{!! Form::text('numero_documento', null, ['class'=>'form-control', 'required'=>'required', 'maxlength'=>20, 'id'=>'numero_documento']) !!}
</div>

