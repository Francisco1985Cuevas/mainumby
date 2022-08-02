<div class="form-group">
    {!! Form::label('idpersona', '#C&oacute;digo Identificador') !!}
    {!! Form::label('idpersona', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
    {!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('tipo_persona', 'Tipo Persona') !!}
    {!! Form::label('primer_nombre', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
    <select name="tipo_persona" id="tipo_persona" class="form-select" autofocus>
        @if(empty($persona))
            <option value="f">F&iacute;sica</option>
            <option value="j" selected>Jur&iacute;dica</option>
        @else
            <option value="f" {{ $persona->tipo_persona == "f" ? 'selected':'' }}>F&iacute;sica</option>
            <option value="j" {{ $persona->tipo_persona == "j" ? 'selected':'' }}>Jur&iacute;dica</option>
        @endif
    </select>
</div>
@if(empty($persona))
    <div class="form-group">
        {!! Form::label('numero_documento', 'N&uacute;mero Documento/RUC') !!}
        {!! Form::label('numero_documento', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
        {!! Form::text('numero_documento', null, ['id'=>'numero_documento', 'class'=>'form-control', 'required'=>'required', 'minlength'=>2, 'maxlength'=>60]) !!}
    </div>
@endif
<div class="form-group">
    {!! Form::label('primer_nombre', 'Primer Nombre/Raz&oacute;n Social') !!}
    {!! Form::label('primer_nombre', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
    {!! Form::text('primer_nombre', null, ['id'=>'primer_nombre', 'class'=>'form-control', 'required'=>'required', 'minlength'=>2, 'maxlength'=>255]) !!}
</div>
<div class="form-group">
    {!! Form::label('segundo_nombre', 'Segundo Nombre') !!}
    {!! Form::label('segundo_nombre', '(Campo opcional)', ['class' => 'text-xs']); !!}
    {!! Form::text('segundo_nombre', null, ['id'=>'segundo_nombre', 'class'=>'form-control', 'maxlength'=>255]) !!}
</div>
<div class="form-group">
    {!! Form::label('primer_apellido', 'Primer Apellido') !!}
    {!! Form::label('primer_apellido', '(Campo opcional)', ['class' => 'text-xs']); !!}
    {!! Form::text('primer_apellido', null, ['id'=>'primer_apellido', 'class'=>'form-control', 'maxlength'=>255]) !!}
</div>
<div class="form-group">
    {!! Form::label('segundo_apellido', 'Segundo Apellido') !!}
    {!! Form::label('segundo_apellido', '(Campo opcional)', ['class' => 'text-xs']); !!}
    {!! Form::text('segundo_apellido', null, ['id'=>'segundo_apellido', 'class'=>'form-control', 'maxlength'=>255]) !!}
</div>
<div class="form-group">
    {!! Form::label('estado_civil', 'Estado Civil') !!}
    {!! Form::label('estado_civil', '(Campo opcional)', ['class' => 'text-xs']); !!}
    @if(empty($persona))
        <select id="estado_civil" name="estado_civil" class="form-control">
            <option value="s" selected >Soltero/a</option>
            <option value="c">Casado/a</option>
            <option value="v">Viudo/a</option>
            <option value="d">Divorciado/a</option>
        </select>
    @else
        <select id="estado_civil" name="estado_civil" class="form-control">
            <option value="s" {{ $persona->estado_civil == "s" ? 'selected':'' }}>Soltero/a</option>
            <option value="c" {{ $persona->estado_civil == "c" ? 'selected':'' }}>Casado/a</option>
            <option value="v" {{ $persona->estado_civil == "v" ? 'selected':'' }}>Viudo/a</option>
            <option value="d" {{ $persona->estado_civil == "d" ? 'selected':'' }}>Divorciado/a</option>
        </select>
    @endif
</div>
@if (count($listaPaises) > 0)
    <div class="form-group">
        {!! Form::label('pais_id', 'Pa&iacute;s') !!}
        <select id="pais_id" name="pais_id" class="form-control" required>
            <option value="">Seleccione Opcion...</option>
            @foreach ($listaPaises as $pais)
                @if(empty($persona))
                    <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                @else
                    <option value="{{ $pais->id }}" {{ $pais->id == $persona->ciudad->departamento->region->pais->id ? 'selected':'' }} >{{ $pais->nombre }}</option>
                @endif
            @endforeach
        </select>
    </div>
@else
    <div class="alert alert-info" role="alert">
        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
        <strong>Listado:</strong> Paises
        <br/>
        Debe <a href="{!!URL::to('/paises/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
    </div>
@endif
<!-- Form Group (region_id) -->
<div class="form-group">
    <label for="region_id">Region</label>
    <select id="region_id" name="region_id" class="form-control" required>
        <!-- Las opciones se cargan dinamicamente a traves de JQuery/JavaScript -->
    </select>
</div>
<!-- Form Group (departamento_id) -->
<div class="form-group">
    <label for="departamento_id">Departamento</label>
    <select id="departamento_id" name="departamento_id" class="form-control" required>
        <!-- Las opciones se cargan dinamicamente a traves de JQuery/JavaScript -->
    </select>
</div>
<!-- Form Group (ciudad_id) -->
<div class="form-group">
    <label for="ciudad_id">Ciudad</label>
    <select id="ciudad_id" name="ciudad_id" class="form-control" required>
        <!-- Las opciones se cargan dinamicamente a traves de JQuery/JavaScript -->
    </select>
</div>

<div class="form-group">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento') !!}
    {!! Form::label('fecha_nacimiento', '(Campo opcional)', ['class' => 'text-xs']); !!}
    {!! Form::input('date', 'fecha_nacimiento', $value = null, $options = array('class'=>'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('sexo', 'Sexo') !!}
    {!! Form::label('sexo', '(Campo opcional)', ['class' => 'text-xs']); !!}
    @if(empty($persona))
        <select name="sexo" id="sexo" class="form-control">
            <option value="f">Femenino</option>
            <option value="m" selected >Masculino</option>
        </select>
    @else
        <select name="sexo" id="sexo" class="form-control">
            <option value="f" {{ $persona->sexo == "f" ? 'selected':'' }}>Femenino</option>
            <option value="m" {{ $persona->sexo == "m" ? 'selected':'' }} >Masculino</option>
        </select>
    @endif
</div>
<div class="form-group">
    {!! Form::label('foto', 'Foto') !!}
    {!! Form::label('foto', '(Campo opcional)', ['class' => 'text-xs']); !!}
    <input id="foto" name="foto" class="form-control" type="file">
</div>
<div class="form-group">
    {!! Form::label('comentario', 'Comentarios') !!}
    {!! Form::label('comentario', '(Campo opcional)', ['class' => 'text-xs']); !!}
    <textarea id="comentario" name="comentario" class="form-control" rows="3" maxlength="500">
        @isset($persona)
			{{ $persona->comentario }}
		@endisset
    </textarea>
</div>
@isset($persona)
    <div class="form-group">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::label('estado', '(Campo opcional)', ['class' => 'text-xs']); !!}
        <select id="estado" name="estado"  class="form-control">
            <option value="activo" {{ $persona->estado == "activo" ? 'selected':'' }}>ACTIVO</option>
            <option value="inactivo" {{ $persona->estado == "inactivo" ? 'selected':'' }} >INACTIVO</option>
        </select>
    </div>
@endisset


<!-- Div Documentos -->
@isset($documentos)
    <hr>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Documentos</h1>
        <a href="{!!URL::to('/documentos/create')!!}" class="btn btn-primary btn-icon-split" title="Nuevo Registro">
            <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
            <span class="text">Nuevo Registro</span>
        </a>
    </div>
    <!-- End of Heading -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <!-- DataTales Listado Documento -->
            <div class="card shadow mb-4">
                <!-- Dropdown - MenuLinks -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"></i> Listado de Registros</h6>
                </div>
                <!-- End of Dropdown MenuLinks -->

                <div class="card-body">
                    @if (count($documentos) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable_documentos" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Numero Documento</th>
                                        <th>Tipo Documento</th>
                                        <th>Fecha Emision</th>
                                        <th>Fecha Vencimiento</th>
                                        <th>Comentario</th>
                                        <th>Fecha de creaci&oacute;n</th>
									    <th>Fecha de actualizaci&oacute;n</th>
									    <th>Operaci&oacute;n</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Numero Documento</th>
                                        <th>Tipo Documento</th>
                                        <th>Fecha Emision</th>
                                        <th>Fecha Vencimiento</th>
                                        <th>Comentario</th>
                                        <th>Fecha de creaci&oacute;n</th>
									    <th>Fecha de actualizaci&oacute;n</th>
									    <th>Operaci&oacute;n</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($documentos as $documento)
                                        <tr>
                                            <td>{{$documento->id}}</td>
                                            <td>{{$documento->numero_documento}}</td>
                                            <td>{{$documento->tipoDocumento->nombre}}</td>
                                            <td>{{$documento->fecha_emision}}</td>
                                            <td>{{$documento->fecha_vencimiento}}</td>
                                            <td>{{$documento->comentario}}</td>
                                            <td>{{$documento->created_at}}</td>
                                            <td>{{$documento->updated_at}}</td>
                                            <td>
                                                <a href="{{ URL::route('documentos.edit', [$documento -> id]) }}" class="btn btn-primary" title="Editar Registro">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ URL::route('documentos.show', [$documento -> id]) }}" class="btn btn-success" title="Ver Detalles del Registro">
                                                    <i class="fas fa-info"></i>
                                                </a>

                                                <!-- link(enlace) al Modal -->
                                                <a href="#" id="btn_delete_listDocumento" class="btn btn-danger" title="Eliminar Registro">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- delete question Modal -->
                        <div class="modal fade" id="modal_delete_listDocumento" tabindex="-1" role="dialog" aria-labelledby="listModalLabelDocumento" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="listModalLabelDocumento">Eliminar Registro</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="form_delete_listDocumento" action="" method="post">
                                        <div class="modal-body">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <input type="hidden" name="_method" value="DELETE"/>
                                            Esta Seguro de que desea Eliminar este Registro?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End of delete question Modal -->
                    @else
                        <!-- Empty - Alert -->
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</h4>
                            <hr />
                            <p>
                                <strong>Tabla:</strong> Documentos
                                <br/>
                                <strong>Mensaje:</strong> No existen Registros para Mostrar.
                            </p>
                            <p>
                                Debe <a href="{!!URL::to('/documentos/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
                            </p>
                        </div>
                    @endif
                </div>

            </div>
            <!-- End of DataTales Listado Documento -->
        </div>
    </div>
    <!-- End of Content Row -->

@endisset
