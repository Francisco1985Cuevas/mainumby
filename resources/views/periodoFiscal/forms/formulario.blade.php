<div class="form-group">
	{!! Form::label('idperiodoFiscal', '#C&oacute;digo Identificador') !!}
	{!! Form::label('idperiodoFiscal', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
	{!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>

@if (count($listaUsuarios) > 0)
    <div class="form-group">
        {!! Form::label('user_id', 'Usuario') !!}
        <select id="user_id" name="user_id" class="form-control" required>
            <option value="">Seleccione Opcion...</option>
            @foreach ($listaUsuarios as $usuario)
                @if(empty($periodoFiscal))
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @else
                    <option value="{{ $usuario->id }}" {{ $usuario->id == $periodoFiscal->user->id ? 'selected':'' }} >{{ $usuario->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
@else
    <div class="alert alert-info" role="alert">
        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
        <strong>Listado:</strong> Usuarios
        <br/>
        Debe <a href="{!!URL::to('/usuarios/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
    </div>
@endif

<div class="form-group">
	{!! Form::label('periodo', 'Periodo') !!}
	{!! Form::label('periodo', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
	{!! Form::number('periodo', null, ['id'=>'periodo', 'class'=>'form-control', 'required'=>'required', 'minlength'=>0, 'autofocus'=>true]) !!}
</div>
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion') !!}
    {!! Form::label('descripcion', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
    {!! Form::text('descripcion', null, ['id'=>'descripcion', 'class'=>'form-control', 'required'=>'required', 'minlength'=>2, 'maxlength'=>500]) !!}
</div>
<div class="form-group">
    {!! Form::label('comentario', 'Comentario') !!}
    {!! Form::label('comentario', '(Campo opcional)', ['class' => 'text-xs']); !!}
    <textarea id="comentario" name="comentario" class="form-control" rows="5" cols="5">
        @isset($periodoFiscal)
			{{ $periodoFiscal->comentario }}
		@endisset
    </textarea>
</div>
