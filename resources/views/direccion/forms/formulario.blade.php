<div class="form-group">
	{!! Form::label('iddireccion', '#C&oacute;digo Identificador') !!}
	{!! Form::label('iddireccion', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('persona', 'Persona') !!}
    {!! Form::select('persona', $list_personas, 1, ['class'=>'form-control', 'autofocus'=>true] ) !!}
</div>
<div class="form-group">
    {!! Form::label('tipo_direccion', 'Tipo Direcci&oacute;n') !!}
    {!! Form::select('tipo_direccion', $list_tiposDirecciones, 1, ['class'=>'form-control'] ) !!}
</div>
<div class="form-group">
    {!! Form::label('barrio', 'Barrio') !!}
    {!! Form::select('barrio', $list_barrios, 1, ['class'=>'form-control'] ) !!}
</div>
<div class="form-group">
	{!! Form::label('calle', 'Calle') !!}
	{!! Form::text('calle', null, ['class'=>'form-control', 'maxlength'=>500, 'id'=>'calle']) !!}
</div>
<div class="form-group">
	{!! Form::label('numero_casa', 'Numero Casa') !!}
	{!! Form::text('numero_casa', null, ['class'=>'form-control', 'maxlength'=>10, 'id'=>'numero_casa']) !!}
</div>
<div class="form-group">
	{!! Form::label('piso', 'Piso') !!}
	{!! Form::text('piso', null, ['class'=>'form-control', 'maxlength'=>10, 'id'=>'piso']) !!}
</div>
<div class="form-group">
	{!! Form::label('departamento', 'Departamento') !!}
	{!! Form::text('departamento', null, ['class'=>'form-control', 'maxlength'=>20, 'id'=>'departamento']) !!}
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

