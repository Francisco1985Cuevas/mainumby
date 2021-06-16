<div class="form-group">
	{!! Form::label('idpais', '#C&oacute;digo Identificador') !!}
	{!! Form::label('idpais', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>

@if (count($lista_personas) > 0)
    <div class="form-group">
        <label for="persona_id" class="form-label">Seleccione Persona</label>
        <select name="persona_id" class="form-control" autofocus="true" aria-describedby="persona_idHelp" >
            @foreach ($lista_personas as $persona)
                @if(empty($email))
                    <option value="{{ $persona->id }}">{{ $persona->nombres }}</option>
                @else
                    <option value="{{ $persona->id }}" {{ $persona->id == $email->persona_id ? 'selected':'' }} >{{ $persona->nombres }}</option>
                @endif
            @endforeach
        </select>
        <div id="persona_idHelp" class="form-text">La persona a la cual pertenece este correo.</div>
    </div>
@else
    <div class="alert alert-info" role="alert">
        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
        <strong>Listado:</strong> Personas
        <br/>
        Debe <a href="{!!URL::to('/personas/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
    </div>
@endif

@if (count($lista_tiposEmails) > 0)
    <div class="form-group">
        {!! Form::label('tipo_email_id', 'Seleccione Tipo de Correo electr&oacute;nico') !!}
        <select name="tipo_email_id" class="form-control" aria-describedby="tipo_email_idHelp" >
            @foreach ($lista_tiposEmails as $tipoEmail)
                @if(empty($email))
                <option value="{{ $tipoEmail->id }}">{{ $tipoEmail->nombre }}</option>
                @else
                    <option value="{{ $tipoEmail->id }}" {{ $tipoEmail->id == $email->tipo_email_id ? 'selected':'' }} >{{ $tipoEmail->nombre }}</option>
                @endif
            @endforeach
        </select>
        <div id="tipo_email_idHelp" class="form-text">El tipo de Correo electr&oacute;nico.</div>
    </div>
@else
    <div class="alert alert-info" role="alert">
        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
        <strong>Listado:</strong> Tipos de Emails
        <br/>
        Debe <a href="{!!URL::to('/tiposemails/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
    </div>
@endif

<div class="form-group">
	{!! Form::label('descripcion', 'Correo electr&oacute;nico') !!}
	{!! Form::label('descripcion', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
	{!! Form::text('descripcion', old('descripcion'), ['class'=>'form-control', 'required'=>'required', 'maxlength'=>60, 'id'=>'descripcion']) !!}
</div>
<div class="form-group">
    {!! Form::label('comentario', 'Comentarios', ['class' => 'form-label']) !!}
    <textarea id="comentario" name="comentario" class="form-control" rows="3" aria-describedby="comentarioHelp">
        @if(empty($email))
            {{ old('comentario') }}
        @else
            @if(empty(old('comentario')))
                {{ $email->comentario }}
            @else
                {{ old('comentario') }}
            @endif
        @endif
    </textarea>
    <div id="comentarioHelp" class="form-text">Opcional, puede agregar un breve comentario acerca del uso de este Correo electr&oacute;nico.</div>
</div>
