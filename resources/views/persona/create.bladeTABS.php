@extends('template.base')

@section('title', 'Nuevo Registro')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nuevo Registro - Personas</h1>
</div>
<!-- End of Heading -->

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <!-- Form Personas -->
        <div class="card shadow mb-4">
            <!-- Dropdown - MenuLinks -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Nuevo Registro</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Acciones:</div>
                        <a class="dropdown-item" href="{!!URL::to('/')!!}" title="P&aacute;gina de Inicio"><i class="fas fa-home"></i> Inicio</a>
                        <a class="dropdown-item" href="{!!URL::to('/personas/create')!!}" title="Actualizar P&aacute;gina Actual">
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
				{!! Form::open(['route' => 'personas.store', 'method' => 'post', 'id' => 'personaForm']) !!}
					@include('persona.forms.formulario')
					{{ Form::button('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Guardar</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-icon-split'] )  }}
                {!!Form::close()!!}
                --}}



                {!! Form::open(['route' => 'personas.store', 'method' => 'post', 'id' => 'personaForm']) !!}
                    <!-- Tab list -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-1">Datos Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2">Documentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3">Direcciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-4">Contactos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-5">Correos Electronicos</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <!-- Tab1 -->
                    <div class="tab-content">
                        <div id="tab-1" class="container tab-pane active">
                            <br>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-camera"></i> Foto de Perfil</h6>
                                        </div>
                                        <div class="card-body text-center">
                                            <!-- Profile picture image-->
                                            <img class="img-account-profile rounded-circle mb-2" src="{{URL::asset('/img/profile-1.png')}}" alt="" />
                                            <!-- Profile picture help block-->
                                            <div class="small font-italic text-muted mb-4">JPG o PNG no mayor a 5 MB</div>
                                            <!-- Profile picture upload button-->
                                            <button class="btn btn-secondary btn-icon-split" type="button">
                                                <span class="icon text-white-50"><i class="fas fa-upload"></i></span>
                                                <span class="text">Subir Nueva Foto</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Datos Personales</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Form Group (id) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="id">#C&oacute;digo Identificador</label>
                                                <label class="text-xs" for="id">(Campo Autogenerado)</label>
                                                <input class="form-control" id="id" name="id" type="text" readonly />
                                            </div>
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (nombres) -->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="nombres">Nombres o Raz&oacute;n Social</label>
                                                    <label class="text-xs" for="nombres">(*) Campo Obligatorio</label>
                                                    <input class="form-control" id="nombres" name="nombres" type="text" placeholder="Ingrese Nombres o Raz&oacute;n Social" autofocus />
                                                </div>
                                                <!-- Form Group (apellidos) -->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="apellidos">Apellidos</label>
                                                    <input class="form-control" id="apellidos" name="apellidos" type="text" placeholder="Ingrese Apellidos" />
                                                </div>
                                            </div>
                                            <!-- Form Row -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (fecha_nacimiento) -->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="fecha_nacimiento">Fecha Nacimiento</label>
                                                    <input class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" type="date" />
                                                </div>
                                                <!-- Form Group (tipo_persona) -->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="tipo_persona">Tipo Persona</label>
                                                    <select name="tipo_persona" id="tipo_persona" class="form-control">
                                                        <option value="f">F&iacute;sica</option>
                                                        <option value="j">Jur&iacute;dica</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Form Group (comentario) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="comentario">Comentarios</label>
                                                <textarea id="comentario" name="comentario" class="form-control" rows="3" maxlength="500"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of row-tab1 -->
                        </div>
                        <!-- End of Tab1 -->

                        <!-- Tab2 -->
                        <div id="tab-2" class="container tab-pane fade">
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Documentos Personales</h6>
                                        </div>
                                        <div class="card-body">
                                            @if (count($lista_tiposDocumentos) > 0)
                                                <!-- Form Group (addItem_tipoDocumentoId) -->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="addItem_tipoDocumentoId">Tipo de Documento</label>
                                                    <select name="addItem_tipoDocumentoId" id="addItem_tipoDocumentoId" class="form-control" autofocus="true">
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
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_numeroDocumento">N&uacute;mero de documento</label>
                                                <input class="form-control" id="addItem_numeroDocumento" name="addItem_numeroDocumento" type="text" placeholder="Ingrese N&uacute;mero de documento" />
                                                <div class="invalid-feedback">El campo <b>N&uacute;mero de documento</b> es obligatorio.</div>
                                            </div>
                                            <!-- Form Group (addItem_comentarioDocumento) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_comentarioDocumento">Comentario</label>
                                                <textarea id="addItem_comentarioDocumento" name="addItem_comentarioDocumento" class="form-control" rows="3" maxlength="500"></textarea>
                                            </div>
                                            <!-- Boton Add item a la lista documentos -->
                                            <button id="btn_addItem_createFormDocumento" class="btn btn-secondary btn-icon-split" type="button">
                                                <span class="icon text-white-50"><i class="fas fa-passport"></i></span>
                                                <span class="text">Agregar a la Lista</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"></i> Listado de Registros</h6>
                                        </div>
                                        <div class="card-body">
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
                            </div>
                        </div>
                        <!-- End of Tab2 -->

                        <!-- Tab3 -->
                        <div id="tab-3" class="container tab-pane fade">
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Direcciones</h6>
                                        </div>
                                        <div class="card-body">
                                            @if (count($lista_tiposDirecciones) > 0)
                                                <!-- Form Group (addItem_tipoDireccionId) -->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="addItem_tipoDireccionId">Seleccione Tipo de Direcci&oacute;n</label>
                                                    <select name="addItem_tipoDireccionId" id="addItem_tipoDireccionId" class="form-control ">
                                                        <option selected value="">Seleccione Opcion...</option>
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

                                            <!-- SE TIENE QUE SELECCIONAR PRIMERO CIUDAD Y DE ACUERDO A ESO MOSTRAR BARRIO... -->

                                            @if (count($lista_barrios) > 0)
                                                <!-- Form Group (addItem_barrioId) -->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="addItem_barrioId">Seleccione Barrio</label>
                                                    <select name="addItem_barrioId" id="addItem_barrioId" class="form-control">
                                                        <option selected value="">Seleccione Opcion...</option>
                                                        @foreach ($lista_barrios as $barrio)
                                                            <option value="{{ $barrio->id }}">{{ $barrio->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @else
                                                <div class="alert alert-info" role="alert">
                                                    <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                                                    <strong>Listado:</strong> Barrios
                                                    <br/>
                                                    Debe <a href="{!!URL::to('/barrios/create')!!}" class="alert-link" title="Nuevo Registro">Cargar Datos</a> para Visualizar el Listado.
                                                </div>
                                            @endif

                                            <!-- Form Group (addItem_calle) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_calle">Calle</label>
                                                <label class="text-xs" for="id">(Direcci&oacute;n)</label>
                                                <textarea id="addItem_calle" name="addItem_calle" class="form-control" rows="3" maxlength="500"></textarea>
                                            </div>
                                            <!-- Form Group (addItem_numeroCasa) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_numeroCasa">N&uacute;mero de Casa</label>
                                                <input class="form-control" id="addItem_numeroCasa" name="addItem_numeroCasa" type="text" />
                                            </div>
                                            <!-- Form Group (addItem_departamento) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_departamento">Departamento</label>
                                                <input class="form-control" id="addItem_departamento" name="addItem_departamento" type="text" />
                                            </div>
                                            <!-- Form Group (addItem_piso) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_piso">Piso</label>
                                                <input class="form-control" id="addItem_piso" name="addItem_piso" type="text" />
                                            </div>
                                            <!-- Form Group (addItem_comentarioDireccion) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_comentarioDireccion">Comentario</label>
                                                <textarea id="addItem_comentarioDireccion" name="addItem_comentarioDireccion" class="form-control" rows="3" maxlength="500"></textarea>
                                            </div>
                                            <!-- Add item a la lista -->
                                            <button id="btn_addItem_createFormDireccion" class="btn btn-secondary btn-icon-split" type="button">
                                                <span class="icon text-white-50"><i class="fas fa-map-marker-alt"></i></span>
                                                <span class="text">Agregar a la Lista</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"></i> Listado de Registros</h6>
                                        </div>
                                        <div class="card-body">
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
                            </div>

                        </div>
                        <!-- End of Tab3 -->

                        <!-- Tab4 -->
                        <div id="tab-4" class="container tab-pane fade">
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Contactos</h6>
                                        </div>
                                        <div class="card-body">
                                            @if (count($lista_tiposContactos) > 0)
                                                <!-- Form Group (addItem_tipoContactoId) -->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="addItem_tipoContactoId">Seleccione Tipo de Contacto</label>
                                                    <select name="addItem_tipoContactoId" id="addItem_tipoContactoId" class="form-control">
                                                        <option selected value="">Seleccione Opcion...</option>
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
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_numeroContacto">N&uacute;mero de Contacto</label>
                                                <input class="form-control" id="addItem_numeroContacto" name="addItem_numeroContacto" type="text" placeholder="Ingrese N&uacute;mero de contacto" />
                                            </div>
                                            <!-- Form Group (addItem_comentarioContacto) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_comentarioContacto">Comentario</label>
                                                <textarea id="addItem_comentarioContacto" name="addItem_comentarioContacto" class="form-control" rows="3" maxlength="500"></textarea>
                                            </div>
                                            <!-- Add item a la lista -->
                                            <button id="btn_addItem_createFormContacto" class="btn btn-secondary btn-icon-split" type="button">
                                                <span class="icon text-white-50"><i class="fas fa-mobile-alt"></i></span>
                                                <span class="text">Agregar a la Lista</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"></i> Listado de Registros</h6>
                                        </div>
                                        <div class="card-body">
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
                            </div>

                        </div>
                        <!-- End of Tab4 -->

                        <!-- Tab5 -->
                        <div id="tab-5" class="container tab-pane fade">
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Correos Electronicos</h6>
                                        </div>
                                        <div class="card-body">
                                            @if (count($lista_tiposEmails) > 0)
                                                <!-- Form Group (addItem_tipoEmailId) -->
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="addItem_tipoEmailId">Tipo de Correo Electronico</label>
                                                    <select name="addItem_tipoEmailId" id="addItem_tipoEmailId" class="form-control" autofocus="true">
                                                    <option value="">Seleccione Opci&oacute;n...</option>
                                                        @foreach ($lista_tiposEmails as $tipoEmail)
                                                            <option value="{{ $tipoEmail->id }}">{{ $tipoEmail->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">El campo <b>Tipo de Correo Electronico</b> es obligatorio.</div>
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
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_descripcionEmail">Correo Electronico</label>
                                                <input class="form-control" id="addItem_descripcionEmail" name="addItem_descripcionEmail" type="text" placeholder="Ingrese Correo Electronico" />
                                                <div class="invalid-feedback">El campo <b>Correo Electronico</b> es obligatorio.</div>
                                            </div>
                                            <!-- Form Group (addItem_comentarioEmail) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="addItem_comentarioEmail">Comentario</label>
                                                <textarea id="addItem_comentarioEmail" name="addItem_comentarioEmail" class="form-control" rows="3" maxlength="500"></textarea>
                                            </div>
                                            <!-- Boton Add item a la lista emails -->
                                            <button id="btn_addItem_createFormEmail" class="btn btn-secondary btn-icon-split" type="button">
                                                <span class="icon text-white-50"><i class="fas fa-passport"></i></span>
                                                <span class="text">Agregar a la Lista</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"></i> Listado de Registros</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Alert info emails -->
                                            <div id="alertInfoEmails" class="alert alert-info" role="alert">
                                                <div class="text-xs"><i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema</div>
                                                <strong>Listado:</strong> Correos Electronicos
                                                <br/>
                                                Debe Cargar Datos para Visualizar el Listado.
                                            </div>
                                            <!-- DataTable Email -->
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
                                            <!-- End of DataTable Email -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End of Tab5 -->

                    </div>
                    <!-- End of Tab panes -->
                    {{ Form::button('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Guardar</span>', ['type' => 'submit', 'class' => 'btn btn-primary btn-icon-split'] )  }}
                {!!Form::close()!!}

			</div>
			<!-- End of div card-body -->
        </div>
        <!-- End of Form Personas -->
    </div>
</div>
<!-- End of Content Row -->

@push('scriptsPersona')
	<script>
        var contadorDocumentos = 0;
        var contadorDirecciones = 0;
        var contadorContactos = 0;
        var contadorEmails = 0;

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
                //HACE FALTA INICIALIZAR EL DATATABLE, POR EL MOMENTO DA ERROR AL QUERER USAR...

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
			$("#filaDireccion"+index).remove();
            $("#filaDireccionComentario"+index).remove();

			//Si se eliminan todos los items, se tiene que volver a mostrar el mensaje de alert.
			contadorDirecciones--
			if (contadorDirecciones == 0) {
				$('#listadoDireccion').hide();
				$('#alertInfoDirecciones').show();
			}
		}


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
                //HACE FALTA INICIALIZAR EL DATATABLE, POR EL MOMENTO DA ERROR AL QUERER USAR...

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
                //HACE FALTA INICIALIZAR EL DATATABLE, POR EL MOMENTO DA ERROR AL QUERER USAR...

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

	</script>
@endpush

@endsection