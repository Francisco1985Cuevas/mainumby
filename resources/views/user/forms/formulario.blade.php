<div class="form-group">
	{!! Form::label('iduser', '#C&oacute;digo Identificador') !!}
	{!! Form::label('iduser', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>

@if (count($listaPersonas) > 0)
    <div class="form-group">
        {!! Form::label('persona_id', 'Persona') !!}
        <select id="persona_id" name="persona_id" class="form-control" required>
            <option value="">Seleccione Opcion...</option>
            @foreach ($listaPersonas as $persona)
                @if(empty($usuario))
                    <option value="{{ $persona->id }}">{{ $persona->primer_nombre }} {{ $persona->primer_apellido }}</option>
                @else
                    <option value="{{ $persona->id }}" {{ $persona->id == $usuario->persona->id ? 'selected':'' }} >{{ $persona->primer_nombre }} {{ $persona->primer_apellido }}</option>
                @endif
            @endforeach
        </select>
    </div>
@else
    <div class="alert alert-info" role="alert">
        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
        <strong>Listado:</strong> Personas
        <br/>
        Debe <a href="{!!URL::to('/personas/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
    </div>
@endif

<div class="form-group">
	{!! Form::label('name', 'Nombre') !!}
	{!! Form::label('name', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
	{!! Form::text('name', null, ['id'=>'name', 'class'=>'form-control', 'required'=>'required', 'minlength'=>2, 'maxlength'=>255, 'autofocus'=>true]) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::label('email', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
    {!! Form::email('email', null, ['id' => 'email', 'class'=>'form-control', 'required'=>'required', 'minlength'=>2, 'maxlength'=>255]) !!}
</div>
@if(empty($usuario))
    <div class="form-group">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::label('password', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
        {!! Form::password('password', ['id'=>'password', 'class'=>'form-control', 'required'=>'required', 'minlength'=>2, 'maxlength'=>255]) !!}
    </div>
@endif
