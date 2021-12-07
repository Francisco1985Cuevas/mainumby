<div class="form-group">
	{!! Form::label('idpersona', '#C&oacute;digo Identificador') !!}
	{!! Form::label('idpersona', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>
<div class="form-group">
	{!! Form::label('nombres', 'Nombres') !!}
	{!! Form::label('nombres', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
	{!! Form::text('nombres', null, ['class'=>'form-control', 'required'=>'required', 'maxlength'=>100, 'id'=>'nombres', 'autofocus'=>true]) !!}
</div>
<div class="form-group">
	{!! Form::label('apellidos', 'Apellidos') !!}
	{!! Form::text('apellidos', null, ['class'=>'form-control', 'maxlength'=>100, 'id'=>'apellidos']) !!}
</div>
<div class="form-group">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento') !!}
    {!! Form::date('fecha_nacimiento', \Carbon\Carbon::now(), ['class'=>'form-control', 'id'=>'fecha_nacimiento'])  !!}
</div>
<div class="form-group">
    {!! Form::label('tipo_persona', 'Tipo Persona') !!}
    {{-- {!! Form::text('tipo_persona', null, ['class'=>'form-control', 'maxlength'=>20, 'id'=>'tipo_persona']) !!} --}}
    {!! Form::select('tipo_persona', ['F' => 'Fisica', 'J' => 'Juridica'], 'F', ['class'=>'form-control', 'id'=>'tipo_persona']) !!}
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

