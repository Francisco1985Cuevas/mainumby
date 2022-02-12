@extends('template.base')

@section('title', 'Actualizar Registro')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Actualizar Registro - Personas</h1>
</div>
<!-- End of Heading -->

<!-- Content Row -->
<div class="row">
	<div class="col-xl-12 col-lg-12">
		<!-- Form Persona -->
		<div class="card shadow mb-4">
            <!-- Dropdown - MenuLinks -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Actualizar Registro</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Acciones:</div>
						<a class="dropdown-item" href="{!!URL::to('/')!!}" title="P&aacute;gina de Inicio"><i class="fas fa-home"></i> Inicio</a>
						<a class="dropdown-item" href="{{ URL::route('personas.edit', [$persona->id]) }}" title="Actualizar P&aacute;gina Actual">
							<i class="fas fa-sync-alt"></i> Actualizar
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{!!URL::to('/personas')!!}" title="Volver al listado">
							<i class="fas fa-list"></i> Volver
						</a>
					</div>
				</div>
			</div>
            <!-- End of Dropdown MenuLinks -->

			<div class="card-body">
                <div class="px-3 py-5 bg-gradient-info text-white">
                    <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                    Expandir para Visualizar las Grillas de Datos.
                </div>

				@include('alerts.request')

				@if(Session::has('message'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fas fa-check-circle"></i> {{Session::get('message')}} <a href="{!!URL::to('/personas')!!}">Ver</a>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif





                {{--
				{!! Form::model( $persona, ['route' => ['personas.update', $persona->id], 'method' => 'PUT' ]) !!}
                    @include('persona.forms.formulario')
                    {{ Form::button('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Guardar</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-icon-split'] )  }}
                    {{ Form::button('<span class="icon text-white-50"><i class="far fa-window-restore"></i></span><span class="text">Cancelar</span>', ['type' => 'reset', 'class' => 'btn btn-secondary btn-icon-split'] )  }}
                    <!-- link(enlace) al Modal -->
					<!-- <a data-id="{{$persona->id}}" href="#" id="btn_delete_editFormPersona" class="btn btn-danger" title="Eliminar Registro">
						<span class="icon text-white-50"><i class="fas fa-trash"></i></span>
						<span class="text">Eliminar</span>
					</a> -->
				{!!Form::close()!!}
                --}}
				<!-- delete question Modal -->
				<!-- <div class="modal fade" id="modal_delete_editFormPersona" tabindex="-1" role="dialog" aria-labelledby="editFormModalLabelPersona" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editFormModalLabelPersona">Eliminar Registro</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form id="form_delete_editFormPersona" action="" method="post">
								<div class="modal-body">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}

									<input type="hidden" name="_method" value="DELETE"/>
									Esta Seguro de que desea Eliminar este Registro?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary">Aceptar</button>
								</div>
							</form>
						</div>
					</div>
				</div> -->
                <!-- End of delete question Modal -->








                {!! Form::model( $persona, ['route' => ['personas.update', $persona->id], 'method' => 'PUT', 'id' => 'personaFormEdit' ]) !!}
                    <div class="accordion" id="accordionPersonaEdit">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    DATOS PERSONALES <div class="text-xs">(Expandir para visualizar)</div>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionPersona">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <code>Los Datos Personales son Obligatorios.</code>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('idpersona', '#C&oacute;digo Identificador') !!}
                                        {!! Form::label('idpersona', '(Campo Autogenerado)', ['class' => 'text-xs']); !!}
                                        {!! Form::text('id', null, $attributes = ['class'=>'form-control', 'readonly'=>'true']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('nombres', 'Nombres/Raz&oacute;n Social') !!}
                                        {!! Form::label('nombres', '(*) Campo Obligatorio', ['class' => 'text-xs']); !!}
                                        {!! Form::text('nombres', null, ['class'=>'form-control', 'required'=>'required', 'maxlength'=>60, 'id'=>'nombres', 'autofocus'=>true]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('apellidos', 'Apellidos') !!}
                                        {!! Form::text('apellidos', null, ['class'=>'form-control', 'maxlength'=>60, 'id'=>'apellidos']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento') !!}
                                        {!! Form::input('date', 'fecha_nacimiento', $value = null, $options = array('class'=>'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('tipo_persona', 'Tipo Persona') !!}
                                        <select name="tipo_persona" id="tipo_persona" class="form-control">
                                            @if ($persona->tipo_persona == "f")
                                                <option value="f" selected>F&iacute;sica</option>
                                                <option value="j">Jur&iacute;dica</option>
                                            @else
                                                <option value="f">F&iacute;sica</option>
                                                <option value="j" selected>Jur&iacute;dica</option>
                                            @endif

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('sexo', 'Sexo') !!}
                                        <select name="sexo" id="sexo" class="form-control">
                                            <option value="f">Femenino</option>
                                            <option value="m">Masculino</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('comentario', 'Comentarios') !!}
                                        {!! Form::label('comentario', ' (Campo opcional, puede ingresar algun breve comentario sobre los datos personales)', ['class' => 'text-xs']); !!}
                                        <textarea id="comentario" name="comentario" class="form-control" rows="3" maxlength="500">
                                            {!! $persona->comentario !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwoo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoo" aria-expanded="false" aria-controls="collapseTwoo">
                                    DOCUMENTOS <div class="text-xs">(Expandir para visualizar)</div>
                                </button>
                            </h2>
                            <div id="collapseTwoo" class="accordion-collapse collapse" aria-labelledby="headingTwoo" data-bs-parent="#accordionPersona">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <code>Los Datos de Documento son Obligatorios.</code>
                                    </div>

                                    @if (count($lista_tiposDocumentos) > 0)
                                        <!-- Form Group (addItem_tipoDocumentoId) -->
                                        <div class="form-group">
                                            <label for="addItem_tipoDocumentoId">Seleccione el Tipo de Documento</label>
                                            <select name="addItem_tipoDocumentoId" id="addItem_tipoDocumentoId" class="form-control">
                                            <option value="">Seleccione Opci&oacute;n...</option>
                                                @foreach ($lista_tiposDocumentos as $tipoDocumento)
                                                    <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->nombre }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">El campo <b>Tipo de Documento</b> es obligatorio.</div>
                                        </div>
                                    @else
                                        <div class="alert alert-info" role="alert">
                                            <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                                            <strong>Listado:</strong> Tipos de Documentos
                                            <br/>
                                            Debe <a href="{!!URL::to('/tiposdocumentos/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
                                        </div>
                                    @endif

                                    <!-- Form Group (addItem_numeroDocumento) -->
                                    <div class="form-group">
                                        <label for="addItem_numeroDocumento">Ingrese el N&uacute;mero de Documento</label>
                                        <input class="form-control" id="addItem_numeroDocumento" name="addItem_numeroDocumento" type="text" />
                                        <div class="invalid-feedback">El campo <b>N&uacute;mero de documento</b> es obligatorio.</div>
                                    </div>
                                    <!-- Form Group (addItem_comentarioDocumento) -->
                                    <div class="form-group">
                                        <label for="addItem_comentarioDocumento">Comentario</label>
                                        <label for="addItem_comentarioDocumento" class="text-xs">(Opcional, puede agregar un breve comentario acerca del Documento ingresado...)</label>
                                        <textarea id="addItem_comentarioDocumento" name="addItem_comentarioDocumento" class="form-control" rows="3" maxlength="500"></textarea>
                                    </div>
                                    <!-- Boton Add item a la lista documentos -->
                                    <button id="btn_addItem_createFormDocumento" class="btn btn-secondary btn-icon-split" type="button">
                                        <span class="icon text-white-50"><i class="fas fa-passport"></i></span>
                                        <span class="text">Agregar a la Lista</span>
                                    </button>
                                    <br>
                                    <br>
                                    <!-- Alert info documentos -->
                                    <div id="alertInfoDocumentos" class="alert alert-info" role="alert">
                                        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                                        <strong>Listado:</strong> Documentos
                                        <br/>
                                        Debe Cargar Datos para Visualizar el Listado.
                                    </div>
                                    <!-- DataTales Documento -->
                                    <div id="listadoDocumento" class="table-responsive" style="display: none">
                                        <table class="table" id="dataTableDocumentos" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Tipo Documento</th>
                                                    <th>N&uacute;mero Doc.</th>
                                                    <th>Estado</th>
                                                    <th>Fecha Creaci&oacute;n</th>
                                                    <th>Fecha Actualizaci&oacute;n</th>
                                                    <th class="row d-flex justify-content-center" >Operaci&oacute;n</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Tipo Documento</th>
                                                    <th>N&uacute;mero Doc.</th>
                                                    <th>Estado</th>
                                                    <th>Fecha Creaci&oacute;n</th>
                                                    <th>Fecha Actualizaci&oacute;n</th>
                                                    <th class="row d-flex justify-content-center" >Operaci&oacute;n</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <!-- El listado se carga a traves de Jquery/JavaScript -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End of DataTales Documento -->

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    DIRECCIONES <div class="text-xs">(Expandir para visualizar)</div>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionPersona">
                                <div class="accordion-body">
                                    @if (count($lista_tiposDirecciones) > 0)
                                        <!-- Form Group (addItem_tipoDireccionId) -->
                                        <div class="form-group">
                                            <label for="addItem_tipoDireccionId">Seleccione el Tipo de Direcci&oacute;n</label>
                                            <select id="addItem_tipoDireccionId" name="addItem_tipoDireccionId" class="form-control ">
                                                <option selected value="">Seleccione Opci&oacute;n...</option>
                                                @foreach ($lista_tiposDirecciones as $tipoDireccion)
                                                    <option value="{{ $tipoDireccion->id }}">{{ $tipoDireccion->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="alert alert-info" role="alert">
                                            <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                                            <strong>Listado:</strong> Tipos de Direcciones
                                            <br/>
                                            Debe <a href="{!!URL::to('/tiposdirecciones/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
                                        </div>
                                    @endif

                                    <!-- Form Group (addItem_paisId) -->
                                    <div class="form-group">
                                        <label for="addItem_paisId">Seleccione Pa&iacute;s</label>
                                        <select id="addItem_paisId" name="addItem_paisId" class="form-control">
                                            <option selected value="">Seleccione Opci&oacute;n...</option>
                                            @foreach ($lista_paises as $pais)
                                                <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Form Group (addItem_departamentoId) -->
                                    <div class="form-group">
                                        <label for="addItem_departamentoId">Seleccione Departamento</label>
                                        <select id="addItem_departamentoId" name="addItem_departamentoId" class="form-control">
                                            <!-- Las opciones se cargan dinamicamente a traves de JQuery/JavaScript -->
                                        </select>
                                    </div>
                                    <!-- Form Group (addItem_ciudadId) -->
                                    <div class="form-group">
                                        <label for="addItem_ciudadId">Seleccione Ciudad</label>
                                        <select id="addItem_ciudadId" name="addItem_ciudadId" class="form-control">
                                            <!-- Las opciones se cargan dinamicamente a traves de JQuery/JavaScript -->
                                        </select>
                                    </div>
                                    <!-- Form Group (addItem_barrioId) -->
                                    <div class="form-group">
                                        <label for="addItem_barrioId">Seleccione Barrio</label>
                                        <select id="addItem_barrioId" name="addItem_barrioId" class="form-control">
                                            <!-- Las opciones se cargan dinamicamente a traves de JQuery/JavaScript -->
                                        </select>
                                    </div>
                                    <!-- Form Group (addItem_calle) -->
                                    <div class="form-group">
                                        <label for="addItem_calle">Calle</label>
                                        <label class="text-xs" for="id">(Direcci&oacute;n)</label>
                                        <textarea id="addItem_calle" name="addItem_calle" class="form-control" rows="3" maxlength="500"></textarea>
                                    </div>
                                    <!-- Form Group (addItem_numeroCasa) -->
                                    <div class="form-group">
                                        <label for="addItem_numeroCasa">N&uacute;mero de Casa</label>
                                        <input id="addItem_numeroCasa" name="addItem_numeroCasa" type="text" class="form-control" maxlength="10" />
                                    </div>
                                    <!-- Form Group (addItem_departamento) -->
                                    <div class="form-group">
                                        <label for="addItem_departamento">Departamento</label>
                                        <input id="addItem_departamento" name="addItem_departamento" type="text" class="form-control" maxlength="20"/>
                                    </div>
                                    <!-- Form Group (addItem_piso) -->
                                    <div class="form-group">
                                        <label for="addItem_piso">Piso</label>
                                        <input id="addItem_piso" name="addItem_piso" type="text" class="form-control" maxlength="10"/>
                                    </div>
                                    <!-- Form Group (addItem_comentarioDireccion) -->
                                    <div class="form-group">
                                        <label for="addItem_comentarioDireccion">Comentario</label>
                                        <textarea id="addItem_comentarioDireccion" name="addItem_comentarioDireccion" class="form-control" rows="3" maxlength="500"></textarea>
                                    </div>
                                    <!-- Add item a la lista -->
                                    <button id="btn_addItem_createFormDireccion" class="btn btn-secondary btn-icon-split" type="button">
                                        <span class="icon text-white-50"><i class="fas fa-map-marker-alt"></i></span>
                                        <span class="text">Agregar a la Lista</span>
                                    </button>

                                    <br>
                                    <br>
                                    <!-- Alert info direcciones -->
                                    <div id="alertInfoDirecciones" class="alert alert-info" role="alert">
                                        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                                        <strong>Listado:</strong> Direcciones
                                        <br/>
                                        Debe Cargar Datos para Visualizar el Listado.
                                    </div>

                                    <!-- DataTales Direccion -->
                                    <div id="listadoDireccion" class="table-responsive" style="display: none">
                                        <table class="table" id="dataTableDirecciones" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Tipo Direcci&oacute;n</th>
                                                    <th>Barrio</th>
                                                    <th>Calle</th>
                                                    <th>Num. Casa</th>
                                                    <th>Departamento</th>
                                                    <th>Piso</th>
                                                    <th>Estado</th>
                                                    <th>Fecha Creaci&oacute;n</th>
                                                    <th>Fecha Actualizaci&oacute;n</th>
                                                    <th class="row d-flex justify-content-center" >Operaci&oacute;n</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Tipo Direcci&oacute;n</th>
                                                    <th>Barrio</th>
                                                    <th>Calle</th>
                                                    <th>Num. Casa</th>
                                                    <th>Departamento</th>
                                                    <th>Piso</th>
                                                    <th>Estado</th>
                                                    <th>Fecha Creaci&oacute;n</th>
                                                    <th>Fecha Actualizaci&oacute;n</th>
                                                    <th class="row d-flex justify-content-center" >Operaci&oacute;n</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <!-- El listado se carga a traves de Jquery/JavaScript -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End of DataTales Direccion -->

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    CONTACTOS <div class="text-xs">(Expandir para visualizar)</div>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionPersona">
                                <div class="accordion-body">
                                    @if (count($lista_tiposContactos) > 0)
                                        <!-- Form Group (addItem_tipoContactoId) -->
                                        <div class="form-group">
                                            <label for="addItem_tipoContactoId">Seleccione Tipo de Contacto</label>
                                            <select id="addItem_tipoContactoId" name="addItem_tipoContactoId" class="form-control ">
                                                <option selected value="">Seleccione Opci&oacute;n...</option>
                                                @foreach ($lista_tiposContactos as $tipoContacto)
                                                    <option value="{{ $tipoContacto->id }}">{{ $tipoContacto->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="alert alert-info" role="alert">
                                            <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                                            <strong>Listado:</strong> Tipos de Contactos
                                            <br/>
                                            Debe <a href="{!!URL::to('/tiposcontactos/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
                                        </div>
                                    @endif

                                    <!-- Form Group (addItem_numeroContacto) -->
                                    <div class="form-group">
                                        <label for="addItem_numeroContacto">N&uacute;mero de Contacto</label>
                                        <input class="form-control" id="addItem_numeroContacto" name="addItem_numeroContacto" type="text" />
                                    </div>
                                    <!-- Form Group (addItem_comentarioContacto) -->
                                    <div class="form-group">
                                        <label for="addItem_comentarioContacto">Comentario</label>
                                        <textarea id="addItem_comentarioContacto" name="addItem_comentarioContacto" class="form-control" rows="3" maxlength="500"></textarea>
                                    </div>
                                    <!-- Add item a la lista -->
                                    <button id="btn_addItem_createFormContacto" class="btn btn-secondary btn-icon-split" type="button">
                                        <span class="icon text-white-50"><i class="fas fa-mobile-alt"></i></span>
                                        <span class="text">Agregar a la Lista</span>
                                    </button>

                                    <br>
                                    <br>
                                    <!-- Alert info contactos -->
                                    <div id="alertInfoContactos" class="alert alert-info" role="alert">
                                        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                                        <strong>Listado:</strong> Contactos
                                        <br/>
                                        Debe Cargar Datos para Visualizar el Listado.
                                    </div>
                                    <!-- DataTales Contacto -->
                                    <div id="listadoContacto" class="table-responsive" style="display: none">
                                        <table class="table" id="dataTableContactos" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Tipo Contacto</th>
                                                    <th>N&uacute;mero Contacto</th>
                                                    <th>Estado</th>
                                                    <th>Fecha Creaci&oacute;n</th>
                                                    <th>Fecha Actualizaci&oacute;n</th>
                                                    <th class="row d-flex justify-content-center" >Operaci&oacute;n</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Tipo Contacto</th>
                                                    <th>N&uacute;mero Contacto</th>
                                                    <th>Estado</th>
                                                    <th>Fecha Creaci&oacute;n</th>
                                                    <th>Fecha Actualizaci&oacute;n</th>
                                                    <th class="row d-flex justify-content-center" >Operaci&oacute;n</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <!-- El listado se carga a traves de Jquery/JavaScript -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End of DataTales Contacto -->

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    CORREOS ELECTRONICOS <div class="text-xs">(Expandir para visualizar)</div>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionPersona">
                                <div class="accordion-body">
                                    @if (count($lista_tiposEmails) > 0)
                                        <!-- Form Group (addItem_tipoEmailId) -->
                                        <div class="form-group">
                                            <label for="addItem_tipoEmailId">Seleccione Tipo de Correo Electronico</label>
                                            <select id="addItem_tipoEmailId" name="addItem_tipoEmailId" class="form-control ">
                                                <option selected value="">Seleccione Opci&oacute;n...</option>
                                                @foreach ($lista_tiposEmails as $tipoEmail)
                                                    <option value="{{ $tipoEmail->id }}">{{ $tipoEmail->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="alert alert-info" role="alert">
                                            <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                                            <strong>Listado:</strong> Tipos de Correos
                                            <br/>
                                            Debe <a href="{!!URL::to('/tiposemails/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
                                        </div>
                                    @endif

                                    <!-- Form Group (addItem_descripcionEmail) -->
                                    <div class="form-group">
                                        <label for="addItem_descripcionEmail">Correo Electronico</label>
                                        <input class="form-control" id="addItem_descripcionEmail" name="addItem_descripcionEmail" type="text" />
                                    </div>
                                    <!-- Form Group (addItem_comentarioEmail) -->
                                    <div class="form-group">
                                        <label for="addItem_comentarioEmail">Comentario</label>
                                        <textarea id="addItem_comentarioEmail" name="addItem_comentarioEmail" class="form-control" rows="3" maxlength="500"></textarea>
                                    </div>
                                    <!-- Add item a la lista -->
                                    <button id="btn_addItem_createFormEmail" class="btn btn-secondary btn-icon-split" type="button">
                                        <span class="icon text-white-50"><i class="fas fa-envelope-square"></i></span>
                                        <span class="text">Agregar a la Lista</span>
                                    </button>

                                    <br>
                                    <br>
                                    <!-- Alert info emails -->
                                    <div id="alertInfoEmails" class="alert alert-info" role="alert">
                                        <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                                        <strong>Listado:</strong> Correos Electronicos
                                        <br/>
                                        Debe Cargar Datos para Visualizar el Listado.
                                    </div>

                                    <!-- DataTales Email -->
                                    <div id="listadoEmail" class="table-responsive" style="display: none">
                                        <table class="table" id="dataTableEmails" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Tipo Correo Electronico</th>
                                                    <th>Correo Electronico</th>
                                                    <th>Estado</th>
                                                    <th>Fecha Creaci&oacute;n</th>
                                                    <th>Fecha Actualizaci&oacute;n</th>
                                                    <th class="row d-flex justify-content-center" >Operaci&oacute;n</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Tipo Correo Electronico</th>
                                                    <th>Correo Electronico</th>
                                                    <th>Estado</th>
                                                    <th>Fecha Creaci&oacute;n</th>
                                                    <th>Fecha Actualizaci&oacute;n</th>
                                                    <th class="row d-flex justify-content-center" >Operaci&oacute;n</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <!-- El listado se carga a traves de Jquery/JavaScript -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End of DataTales Email -->

                                </div>
                            </div>
                        </div>

                    </div>

                    <br />
					{{ Form::button('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Guardar</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-icon-split'] )  }}
                {!!Form::close()!!}












			</div>

		</div>
        <!-- End of Form Persona -->
	</div>
</div>
<!-- End of Content Row -->

@push('scriptsPersonaEdit')
	<script>
        var contadorDocumentos = 0;
        var contadorDirecciones = 0;
        var contadorContactos = 0;
        var contadorEmails = 0;

        //Host Name and Protocol
        var host = window.location.protocol + "//" + window.location.host; //obtiene por ejemplo: http://localhost:8080

        //Cuando se carga esta pagina de edicion, se le pasan parametros desde el Controller, que son arrays con los datos
        //que corresponden a los registros relacionados con la tabla Persona.

        //Si existen detalles de documentos Relacionados con Persona, inicializar la grilla de detalles-Documentos
        @if (count($documentos) > 0)
            @foreach ($documentos as $documento)
                $( document ).ready(function() {
                    var tipoDocumentoNombre = " {{$documento -> tipoDocumento -> nombre}} ";
                    var comentarioDocumento = " {{$documento -> comentario}} ";
                    var created_at = " {{$documento -> created_at}} ";
                    var updated_at = " {{$documento -> updated_at}} ";

                    var filaDocumento = '<tr id="filaDocumento'+contadorDocumentos+'">'
                                +'<td><input type="hidden" name="item_tipoDocumentoId[]" value="'+ {{ $documento->tipo_documento_id }} +'">'+ tipoDocumentoNombre +'</td>'
                                +'<td><input type="hidden" name="item_numeroDocumento[]" value="'+ {{ $documento->numero_documento }} +'">'+ {{ $documento->numero_documento }} +'</td>'
                                +'<td><span class="badge bg-success">Registrado</span></td>'
                                +'<td>'+ created_at +'</td>'
                                +'<td>'+ updated_at +'</td>'
                                +'<td class="row d-flex justify-content-center">'
                                +'<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="eliminarDocumento('+contadorDocumentos+');" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" ><i class="fas fa-trash"></i></button>'
                                +'</td>'
                                +'</tr>'
                                +'<input type="hidden" id="filaDocumentoComentario'+contadorDocumentos+'" name="item_comentarioDocumento[]" value="'+ comentarioDocumento +'">';

                    contadorDocumentos++;

                    $('#listadoDocumento').show();
                    $('#alertInfoDocumentos').hide();

                    $('#dataTableDocumentos').append(filaDocumento);
                });
            @endforeach
        @endif


        //boton Agregar item Documento
        $("#btn_addItem_createFormDocumento").click(function() {
            var isInvalidDocumento = false;

            var item_tipoDocumentoId = $( "#addItem_tipoDocumentoId" ).val();
			var item_tipoDocumentoId_descripcion = $( "#addItem_tipoDocumentoId option:selected" ).text();

			var item_numeroDocumento = $( "#addItem_numeroDocumento" ).val();

            var item_comentarioDocumento = $( "#addItem_comentarioDocumento" ).val();

			var hoy = new Date();
			var fecha = hoy.getDate()+'-'+(hoy.getMonth()+1)+'-'+hoy.getFullYear();
			var hora = hoy.getHours()+':'+hoy.getMinutes()+':'+hoy.getSeconds();
			var fechaHora = fecha + ' '+ hora;


            if (item_tipoDocumentoId == "") {
                isInvalidDocumento = true;
                $("#addItem_tipoDocumentoId").addClass( "is-invalid" );
            }else {
                $("#addItem_tipoDocumentoId").removeClass( "is-invalid" );
            }

            if (item_numeroDocumento == "") {
                isInvalidDocumento = true;
                $("#addItem_numeroDocumento").addClass( "is-invalid" );
            }else {
                $("#addItem_numeroDocumento").removeClass( "is-invalid" );
            }

            if(isInvalidDocumento == false) {
                var filaDocumento = '<tr id="filaDocumento'+contadorDocumentos+'">'
                                    +'<td><input type="hidden" name="item_tipoDocumentoId[]" value="'+item_tipoDocumentoId+'">'+item_tipoDocumentoId_descripcion+'</td>'
                                    +'<td><input type="hidden" name="item_numeroDocumento[]" value="'+item_numeroDocumento+'">'+item_numeroDocumento+'</td>'
                                    +'<td><span class="badge badge-light text-dark">Pendiente</span></td><td>'+fechaHora+'</td>'
                                    +'<td>'+fechaHora+'</td>'
                                    +'<td class="row d-flex justify-content-center">'
                                    +'<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="eliminarDocumento('+contadorDocumentos+');" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" ><i class="fas fa-trash"></i></button>'
                                    +'</td>'
                                    +'</tr>'
                                    +'<input type="hidden" id="filaDocumentoComentario'+contadorDocumentos+'" name="item_comentarioDocumento[]" value="'+item_comentarioDocumento+'">';

                contadorDocumentos++;

                $('#listadoDocumento').show();
			    $('#alertInfoDocumentos').hide();

                $('#dataTableDocumentos').append(filaDocumento);

                //limpiar o dejar en blanco los inputs para volver a utilizarlos para la siguiente recarga de datos.
                $("#addItem_tipoDocumentoId").val("");
                $("#addItem_numeroDocumento").val("");
                $("#addItem_comentarioDocumento").val("");
            }
		});

        function eliminarDocumento (index) {
			$("#filaDocumento"+index).remove();
            $("#filaDocumentoComentario"+index).remove();

			//Si se eliminan todos los items, se tiene que volver a mostrar el mensaje de alert.
			contadorDocumentos--
			if (contadorDocumentos == 0) {
				$('#listadoDocumento').hide();
				$('#alertInfoDocumentos').show();
			}
		}


        //Si existen detalles de direcciones Relacionados con Persona, inicializar la grilla de detalles-Direcciones
        @if (count($direcciones) > 0)
            @foreach ($direcciones as $direccion)
                $( document ).ready(function() {
                    var tipoDireccionNombre = " {{$direccion -> tipoDireccion -> nombre}} ";
                    var barrio = " {{$direccion -> Barrio -> nombre}} ";
                    var calle = " {{$direccion -> calle}} ";
                    var numeroCasa = " {{$direccion -> numero_casa}} ";
                    var piso = " {{$direccion -> piso}} ";
                    var departamento = " {{$direccion -> departamento}} ";
                    var comentarioDireccion = " {{$direccion -> comentario}} ";
                    var direccionCreated_at = " {{$direccion -> created_at}} ";
                    var direccionUpdated_at = " {{$direccion -> updated_at}} ";

                    var filaDireccion = '<tr id="filaDireccion'+contadorDirecciones+'">'
                                +'<td><input type="hidden" name="item_tipoDireccionId[]" value="'+ {{ $direccion->tipo_direccion_id }} +'">'+ tipoDireccionNombre +'</td>'
                                +'<td><input type="hidden" name="item_barrioId[]" value="'+ {{ $direccion->barrio_id }} +'">'+barrio+'</td>'
                                +'<td><input type="hidden" name="item_calle[]" value="'+calle+'">'+calle+'</td>'
                                +'<td><input type="hidden" name="item_numeroCasa[]" value="'+numeroCasa+'">'+numeroCasa+'</td>'
                                +'<td><input type="hidden" name="item_departamento[]" value="'+departamento+'">'+departamento+'</td>'
                                +'<td><input type="hidden" name="item_piso[]" value="'+piso+'">'+piso+'</td>'
                                +'<td><span class="badge bg-success">Registrado</span></td>'
                                +'<td>'+ direccionCreated_at +'</td>'
                                +'<td>'+ direccionUpdated_at +'</td>'
                                +'<td class="row d-flex justify-content-center">'
                                +'<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="eliminarDireccion('+contadorDirecciones+');" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" ><i class="fas fa-trash"></i></button>'
                                +'</td>'
                                +'</tr>'
                                +'<input type="hidden" id="filaDireccionComentario'+contadorDirecciones+'" name="item_comentarioDireccion[]" value="'+ comentarioDireccion +'">';

                    contadorDirecciones++;

                    $('#listadoDireccion').show();
                    $('#alertInfoDirecciones').hide();

                    $('#dataTableDirecciones').append(filaDireccion);
                });
            @endforeach
        @endif


        //boton Agregar item Direccion
        $("#btn_addItem_createFormDireccion").click(function() {
            var isInvalidDireccion = false;

            var item_tipoDireccionId = $( "#addItem_tipoDireccionId" ).val();
			var item_tipoDireccionId_descripcion = $( "#addItem_tipoDireccionId option:selected" ).text();

            var item_barrioId = $( "#addItem_barrioId" ).val();
			var item_barrioId_descripcion = $( "#addItem_barrioId option:selected" ).text();

			var item_calle = $( "#addItem_calle" ).val();
            var item_numeroCasa = $( "#addItem_numeroCasa" ).val();
            var item_departamento = $( "#addItem_departamento" ).val();
            var item_piso = $( "#addItem_piso" ).val();
            var item_comentarioDireccion = $( "#addItem_comentarioDireccion" ).val();

			var hoy = new Date();
			var fecha = hoy.getDate()+'-'+(hoy.getMonth()+1)+'-'+hoy.getFullYear();
			var hora = hoy.getHours()+':'+hoy.getMinutes()+':'+hoy.getSeconds();
			var fechaHora = fecha + ' '+ hora;


            if (item_tipoDireccionId == "") {
                isInvalidDireccion = true;
                $("#addItem_tipoDireccionId").addClass( "is-invalid" );
            }else {
                $("#addItem_tipoDireccionId").removeClass( "is-invalid" );
            }

            if (item_barrioId == "") {
                isInvalidDireccion = true;
                $("#addItem_barrioId").addClass( "is-invalid" );
            }else {
                $("#addItem_barrioId").removeClass( "is-invalid" );
            }

            if (item_calle == "") {
                isInvalidDireccion = true;
                $("#addItem_calle").addClass( "is-invalid" );
            }else {
                $("#addItem_calle").removeClass( "is-invalid" );
            }


            if(isInvalidDireccion == false) {
                var filaDireccion = '<tr id="filaDireccion'+contadorDirecciones+'">'
                        +'<td><input type="hidden" name="item_tipoDireccionId[]" value="'+item_tipoDireccionId+'">'+item_tipoDireccionId_descripcion+'</td>'
                        +'<td><input type="hidden" name="item_barrioId[]" value="'+item_barrioId+'">'+item_barrioId_descripcion+'</td>'
                        +'<td><input type="hidden" name="item_calle[]" value="'+item_calle+'">'+item_calle+'</td>'
                        +'<td><input type="hidden" name="item_numeroCasa[]" value="'+item_numeroCasa+'">'+item_numeroCasa+'</td>'
                        +'<td><input type="hidden" name="item_departamento[]" value="'+item_departamento+'">'+item_departamento+'</td>'
                        +'<td><input type="hidden" name="item_piso[]" value="'+item_piso+'">'+item_piso+'</td>'
                        +'<td><span class="badge badge-light text-dark">Pendiente</span></td><td>'+fechaHora+'</td>'
                        +'<td>'+fechaHora+'</td>'
                        +'<td class="row d-flex justify-content-center">'
                        +'<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="eliminarDireccion('+contadorDirecciones+');" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" ><i class="fas fa-trash"></i></button>'
                        +'</td>'
                        +'</tr>'
                        +'<input type="hidden" id="filaDireccionComentario'+contadorDirecciones+'" name="item_comentarioDireccion[]" value="'+item_comentarioDireccion+'">';

                contadorDirecciones++;

                $('#listadoDireccion').show();
			    $('#alertInfoDirecciones').hide();

                $('#dataTableDirecciones').append(filaDireccion);

                //limpiar o dejar en blanco los inputs para volver a utilizarlos para la siguiente recarga de datos.
                $("#addItem_tipoDireccionId").val("");
                $("#addItem_barrioId").val("");
                $("#addItem_calle").val("");
                $("#addItem_numeroCasa").val("");
                $("#addItem_departamento").val("");
                $("#addItem_piso").val("");
                $("#addItem_comentarioDireccion").val("");
            }
		});

        function eliminarDireccion (index) {
            alert("index: "+index);
			$("#filaDireccion"+index).remove();
            $("#filaDireccionComentario"+index).remove();

			//Si se eliminan todos los items, se tiene que volver a mostrar el mensaje de alert.
			contadorDirecciones--
			if (contadorDirecciones == 0) {
				$('#listadoDireccion').hide();
				$('#alertInfoDirecciones').show();
			}
		}


        //Si existen detalles de contactos Relacionados con Persona, inicializar la grilla de detalles-Contactos
        @if (count($contactos) > 0)
            @foreach ($contactos as $contacto)
                $( document ).ready(function() {
                    var tipoContactoNombre = " {{$contacto -> tipoContacto -> nombre}} ";
                    var comentarioContacto = " {{$contacto -> comentario}} ";
                    var created_at = " {{$contacto -> created_at}} ";
                    var updated_at = " {{$contacto -> updated_at}} ";

                    var filaContacto = '<tr id="filaContacto'+contadorContactos+'">'
                                +'<td><input type="hidden" name="item_tipoContactoId[]" value="'+ {{ $contacto->tipo_contacto_id }} +'">'+ tipoContactoNombre +'</td>'
                                +'<td><input type="hidden" name="item_numeroContacto[]" value="'+ {{ $contacto->numero_contacto }} +'">'+ {{ $contacto->numero_contacto }} +'</td>'
                                +'<td><span class="badge bg-success">Registrado</span></td>'
                                +'<td>'+ created_at +'</td>'
                                +'<td>'+ updated_at +'</td>'
                                +'<td class="row d-flex justify-content-center">'
                                +'<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="eliminarContacto('+contadorContactos+');" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" ><i class="fas fa-trash"></i></button>'
                                +'</td>'
                                +'</tr>'
                                +'<input type="hidden" id="filaContactoComentario'+contadorContactos+'" name="item_comentarioContacto[]" value="'+ comentarioContacto +'">';

                    contadorContactos++;

                    $('#listadoContacto').show();
                    $('#alertInfoContactos').hide();

                    $('#dataTableContactos').append(filaContacto);
                });
            @endforeach
        @endif


        //boton Agregar item Contacto
        $("#btn_addItem_createFormContacto").click(function() {
            var isInvalidContacto = false;

            var item_tipoContactoId = $( "#addItem_tipoContactoId" ).val();
			var item_tipoContactoId_descripcion = $( "#addItem_tipoContactoId option:selected" ).text();

			var item_numeroContacto = $( "#addItem_numeroContacto" ).val();

            var item_comentarioContacto = $( "#addItem_comentarioContacto" ).val();

			var hoy = new Date();
			var fecha = hoy.getDate()+'-'+(hoy.getMonth()+1)+'-'+hoy.getFullYear();
			var hora = hoy.getHours()+':'+hoy.getMinutes()+':'+hoy.getSeconds();
			var fechaHora = fecha + ' '+ hora;


            if (item_tipoContactoId == "") {
                isInvalidContacto = true;
                $("#addItem_tipoContactoId").addClass( "is-invalid" );
            }else {
                $("#addItem_tipoContactoId").removeClass( "is-invalid" );
            }

            if (item_numeroContacto == "") {
                isInvalidContacto = true;
                $("#addItem_numeroContacto").addClass( "is-invalid" );
            }else {
                $("#addItem_numeroContacto").removeClass( "is-invalid" );
            }

            if(isInvalidContacto == false) {

                var filaContacto = '<tr id="filaContacto'+contadorContactos+'">'
                        +'<td><input type="hidden" name="item_tipoContactoId[]" value="'+item_tipoContactoId+'">'+item_tipoContactoId_descripcion+'</td>'
                        +'<td><input type="hidden" name="item_numeroContacto[]" value="'+item_numeroContacto+'">'+item_numeroContacto+'</td>'
                        +'<td><span class="badge badge-light text-dark">Pendiente</span></td><td>'+fechaHora+'</td>'
                        +'<td>'+fechaHora+'</td>'
                        +'<td class="row d-flex justify-content-center">'
                        +'<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="eliminarContacto('+contadorContactos+');" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" ><i class="fas fa-trash"></i></button>'
                        +'</td>'
                        +'</tr>'
                        +'<input type="hidden" id="filaContactoComentario'+contadorContactos+'" name="item_comentarioContacto[]" value="'+item_comentarioContacto+'">';

                contadorContactos++;

                $('#listadoContacto').show();
			    $('#alertInfoContactos').hide();

                $('#dataTableContactos').append(filaContacto);

                //limpiar o dejar en blanco los inputs para volver a utilizarlos para la siguiente recarga de datos.
                $("#addItem_tipoContactoId").val("");
                $("#addItem_numeroContacto").val("");
                $("#addItem_comentarioContacto").val("");
            }
		});

        function eliminarContacto (index) {
			$("#filaContacto"+index).remove();
            $("#filaContactoComentario"+index).remove();

			//Si se eliminan todos los items, se tiene que volver a mostrar el mensaje de alert.
			contadorContactos--
			if (contadorContactos == 0) {
				$('#listadoContacto').hide();
				$('#alertInfoContactos').show();
			}
		}





        //Si existen detalles de emails Relacionados con Persona, inicializar la grilla de detalles-Emails
        @if (count($emails) > 0)
            @foreach ($emails as $email)
                $( document ).ready(function() {
                    var tipoEmailNombre = " {{$email -> tipoEmail -> nombre}} ";
                    var descripcionEmail = " {{$email -> descripcion}} ";
                    var comentarioEmail = " {{$email -> comentario}} ";
                    var created_at = " {{$email -> created_at}} ";
                    var updated_at = " {{$email -> updated_at}} ";

                    var filaEmail = '<tr id="filaEmail'+contadorEmails+'">'
                                +'<td><input type="hidden" name="item_tipoEmailId[]" value="'+ {{ $email->tipo_email_id }} +'">'+ tipoEmailNombre +'</td>'
                                +'<td><input type="hidden" name="item_descripcionEmail[]" value="'+ descripcionEmail +'">'+ descripcionEmail +'</td>'
                                +'<td><span class="badge bg-success">Registrado</span></td>'
                                +'<td>'+ created_at +'</td>'
                                +'<td>'+ updated_at +'</td>'
                                +'<td class="row d-flex justify-content-center">'
                                +'<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="eliminarEmail('+contadorEmails+');" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" ><i class="fas fa-trash"></i></button>'
                                +'</td>'
                                +'</tr>'
                                +'<input type="hidden" id="filaEmailComentario'+contadorEmails+'" name="item_comentarioEmail[]" value="'+ comentarioEmail +'">';

                    contadorEmails++;

                    $('#listadoEmail').show();
                    $('#alertInfoEmails').hide();

                    $('#dataTableEmails').append(filaEmail);
                });
            @endforeach
        @endif


        //boton Agregar item Email
        $("#btn_addItem_createFormEmail").click(function() {
            var isInvalidEmail = false;

            var item_tipoEmailId = $( "#addItem_tipoEmailId" ).val();
			var item_tipoEmailId_descripcion = $( "#addItem_tipoEmailId option:selected" ).text();

			var item_descripcionEmail = $( "#addItem_descripcionEmail" ).val();
            var item_comentarioEmail = $( "#addItem_comentarioEmail" ).val();

			var hoy = new Date();
			var fecha = hoy.getDate()+'-'+(hoy.getMonth()+1)+'-'+hoy.getFullYear();
			var hora = hoy.getHours()+':'+hoy.getMinutes()+':'+hoy.getSeconds();
			var fechaHora = fecha + ' '+ hora;


            if (item_tipoEmailId == "") {
                isInvalidEmail = true;
                $("#addItem_tipoEmailId").addClass( "is-invalid" );
            }else {
                $("#addItem_tipoEmailId").removeClass( "is-invalid" );
            }

            if (item_descripcionEmail == "") {
                isInvalidEmail = true;
                $("#addItem_descripcionEmail").addClass( "is-invalid" );
            }else {
                $("#addItem_descripcionEmail").removeClass( "is-invalid" );
            }

            if(isInvalidEmail == false) {

                var filaEmail = '<tr id="filaEmail'+contadorEmails+'">'
                        +'<td><input type="hidden" name="item_tipoEmailId[]" value="'+item_tipoEmailId+'">'+item_tipoEmailId_descripcion+'</td>'
                        +'<td><input type="hidden" name="item_descripcionEmail[]" value="'+item_descripcionEmail+'">'+item_descripcionEmail+'</td>'
                        +'<td><span class="badge badge-light text-dark">Pendiente</span></td><td>'+fechaHora+'</td>'
                        +'<td>'+fechaHora+'</td>'
                        +'<td class="row d-flex justify-content-center">'
                        +'<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="eliminarEmail('+contadorEmails+');" data-toggle="tooltip" data-placement="top" title="Eliminar Registro" ><i class="fas fa-trash"></i></button>'
                        +'</td>'
                        +'</tr>'
                        +'<input type="hidden" id="filaEmailComentario'+contadorEmails+'" name="item_comentarioEmail[]" value="'+item_comentarioEmail+'">';

                contadorEmails++;

                $('#listadoEmail').show();
			    $('#alertInfoEmails').hide();

                $('#dataTableEmails').append(filaEmail);

                //limpiar o dejar en blanco los inputs para volver a utilizarlos para la siguiente recarga de datos.
                $("#addItem_tipoEmailId").val("");
                $("#addItem_descripcionEmail").val("");
                $("#addItem_comentarioEmail").val("");
            }
		});

        function eliminarEmail (index) {
			$("#filaEmail"+index).remove();
            $("#filaEmailComentario"+index).remove();

			//Si se eliminan todos los items, se tiene que volver a mostrar el mensaje de alert.
			contadorEmails--
			if (contadorEmails == 0) {
				$('#listadoEmail').hide();
				$('#alertInfoEmails').show();
			}
		}












        //Selects dependientes de Pais-Departamento-Ciudad-Barrios.
        jQuery(document).ready(function (){
            jQuery('select[name="addItem_paisId"]').on('change', function() {
                var pais_id = jQuery(this).val();
                if(pais_id){
                    jQuery.ajax({
                        url : host+'/dropdownlist/DepartamentosPais/' +pais_id,
                        type : "GET",
                        dataType : "json",
                        success:function(data) {
                            jQuery('select[name="addItem_departamentoId"]').empty();
                            $('select[name="addItem_departamentoId"]').append('<option value="">Seleccione Opci&oacute;n...</option>');
                            jQuery.each(data, function(key, value){
                                $('select[name="addItem_departamentoId"]').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="addItem_departamentoId"]').empty();
                }
            });
        });

        jQuery(document).ready(function (){
            jQuery('select[name="addItem_departamentoId"]').on('change', function() {
                var departamento_id = jQuery(this).val();
                if(departamento_id){
                    jQuery.ajax({
                        url : host+'/dropdownlist/CiudadesDepartamento/' +departamento_id,
                        type : "GET",
                        dataType : "json",
                        success:function(data) {
                            jQuery('select[name="addItem_ciudadId"]').empty();
                            $('select[name="addItem_ciudadId"]').append('<option value="">Seleccione Opci&oacute;n...</option>');
                            jQuery.each(data, function(key, value){
                                $('select[name="addItem_ciudadId"]').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="addItem_ciudadId"]').empty();
                }
            });
        });

        jQuery(document).ready(function (){
            jQuery('select[name="addItem_ciudadId"]').on('change', function() {
                var ciudad_id = jQuery(this).val();
                if(ciudad_id){
                    jQuery.ajax({
                        url : host+'/dropdownlist/BarriosCiudad/' +ciudad_id,
                        type : "GET",
                        dataType : "json",
                        success:function(data) {
                            jQuery('select[name="addItem_barrioId"]').empty();
                            $('select[name="addItem_barrioId"]').append('<option value="">Seleccione Opci&oacute;n...</option>');
                            jQuery.each(data, function(key, value){
                                $('select[name="addItem_barrioId"]').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="addItem_barrioId"]').empty();
                }
            });
        });

    </script>
@endpush

@endsection
