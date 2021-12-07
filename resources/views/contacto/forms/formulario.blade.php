<div class="form-group">
	{!! Form::label('idcontacto', '#C&oacute;digo Identificador') !!}
	{!! Form::label('idcontacto', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('persona', 'Persona') !!}
    {!! Form::select('persona', $list_personas, 1, ['class'=>'form-control', 'autofocus'=>true] ) !!}
</div>
<div class="form-group">
    {!! Form::label('tipo_contacto', 'Tipo Contacto') !!}
    {!! Form::select('tipo_contacto', $list_tiposContactos, 1, ['class'=>'form-control'] ) !!}
</div>
<div class="form-group">
	{!! Form::label('numero_contacto', 'Numero Contacto') !!}
	{!! Form::label('numero_contacto', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
	{!! Form::text('numero_contacto', null, ['class'=>'form-control', 'required'=>'required', 'maxlength'=>20, 'id'=>'numero_contacto']) !!}
</div>
<div class="form-group">
    {!! Form::label('comentario', 'Comentarios') !!}
    {!! Form::textarea('',
                        null,
                        ['class' => 'form-control',
                        'rows' => 3,
                        'name' => 'comentario',
                        'id' => 'comentario',
                        'maxlength' => 500]
                    )
                !!}
</div>


