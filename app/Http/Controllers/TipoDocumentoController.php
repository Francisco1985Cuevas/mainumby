<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// mapear al model TipoDocumento.
use App\TipoDocumento;

// Request Validations
//use App\Http\Requests\StoreTipoDocumentoRequest;
//use App\Http\Requests\UpdateTipoDocumentoRequest;

use Session;
use Redirect;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposDocumentos = \App\TipoDocumento::all();

        return view('tipoDocumento.list', compact('tiposDocumentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoDocumento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreTipoDocumentoRequest $request)
    public function store(Request $request)
    {
        /*
        // Primero a traves del Request Validate(StoreTipoDocumentoRequest), validar campos del form.
        // sino hay error, proceder a insertar nuevo registro en la BD.
        $tipoDocumento = new TipoDocumento;
        $tipoDocumento->nombre = strtoupper($request->nombre);
        $tipoDocumento->abreviatura = strtoupper($request->abreviatura);
        $tipoDocumento->save();
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');
        return view('tipoDocumento.create');
        */

        //convierto previamente los campos a mayusculas, como alguna forma de "unificar" ya
        //que validate() no tiene en cuenta mayusculas ni minusculas y se pueden duplicar registros...
        $request['nombre'] = strtoupper($request['nombre']);
        $request['abreviatura'] = strtoupper($request['abreviatura']);

        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['nombre' => 'required|min:2|max:60|unique:tipos_documentos',
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El <b>:attribute</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Descripci&oacute;n',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.
        $tipoDocumento = new TipoDocumento;
        $tipoDocumento->nombre = $request->nombre;
        $tipoDocumento->abreviatura = $request->abreviatura;
        $tipoDocumento->save();

        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('tipoDocumento.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoDocumento = \App\TipoDocumento::find($id);

        return view('tipoDocumento.show', ['tipoDocumento' => $tipoDocumento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDocumento = \App\TipoDocumento::find($id);
        return view('tipoDocumento.edit', ['tipoDocumento' => $tipoDocumento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateTipoDocumentoRequest $request, $id)
    public function update(Request $request, $id)
    {
        /*
        // Primero a traves del Request Validate(UpdateTipoDocumentoRequest), validar campos del form.
        // sino hay error, proceder a actualizar registro existente en la BD.
        $tipoDocumento = \App\TipoDocumento::find($id);
        $tipoDocumento->nombre = strtoupper($request['nombre']);
        $tipoDocumento->abreviatura = strtoupper($request['abreviatura']);
        $tipoDocumento->save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');
        return view('tipoDocumento.edit', ['tipoDocumento' => $tipoDocumento]);
        */

        //convierto previamente los campos a mayusculas, como alguna forma de "unificar" ya
        //que validate() no tiene en cuenta mayusculas ni minusculas y se pueden duplicar registros...
        $request['nombre'] = strtoupper($request['nombre']);
        $request['abreviatura'] = strtoupper($request['abreviatura']);

        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['nombre' => 'required|min:2|max:60|unique:tipos_documentos,nombre,'.$id,
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'La <b>:attribute</b> que ingreso ya ha sido registrada.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Descripci&oacute;n',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a actualizar registro.
        $tipoDocumento = \App\TipoDocumento::find($id);
        $tipoDocumento->nombre = $request['nombre'];
        $tipoDocumento->abreviatura = $request['abreviatura'];
        $tipoDocumento->save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');
        return view('tipoDocumento.edit', ['tipoDocumento' => $tipoDocumento]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoDocumento = \App\TipoDocumento::find($id);
        $tipoDocumento->delete();
        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        return Redirect::to('/tiposdocumentos');
    }
}
