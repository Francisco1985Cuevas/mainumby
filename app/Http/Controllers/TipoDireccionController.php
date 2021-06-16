<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// mapear al model TipoDireccion.
use App\TipoDireccion;

use Session;
use Redirect;

class TipoDireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposDirecciones = \App\TipoDireccion::all();

        return view('tipoDireccion.list', compact('tiposDirecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoDireccion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //convierto previamente los campos a mayusculas, como alguna forma de "unificar" ya
        //que validate() no tiene en cuenta mayusculas ni minusculas y se pueden duplicar registros...
        $request['nombre'] = strtoupper($request['nombre']);
        $request['abreviatura'] = strtoupper($request['abreviatura']);

        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['nombre' => 'required|min:2|max:60|unique:tipos_direcciones',
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

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.
        $tipoDireccion = new TipoDireccion;
        $tipoDireccion->nombre = $request->nombre;
        $tipoDireccion->abreviatura = $request->abreviatura;
        $tipoDireccion->save();

        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('tipoDireccion.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoDireccion = \App\TipoDireccion::find($id);

        return view('tipoDireccion.show', ['tipoDireccion' => $tipoDireccion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDireccion = \App\TipoDireccion::find($id);

        return view('tipoDireccion.edit', ['tipoDireccion' => $tipoDireccion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateTipoDireccionRequest $request, $id)
    public function update(Request $request, $id)
    {
        //convierto previamente los campos a mayusculas, como alguna forma de "unificar" ya
        //que validate() no tiene en cuenta mayusculas ni minusculas y se pueden duplicar registros...
        $request['nombre'] = strtoupper($request['nombre']);
        $request['abreviatura'] = strtoupper($request['abreviatura']);

        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['nombre' => 'required|min:2|max:60|unique:tipos_direcciones,nombre,'.$id,
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
        $tipoDireccion = \App\TipoDireccion::find($id);
        $tipoDireccion->nombre = $request['nombre'];
        $tipoDireccion->abreviatura = $request['abreviatura'];
        $tipoDireccion->save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');

        return view('tipoDireccion.edit', ['tipoDireccion' => $tipoDireccion]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoDireccion = \App\TipoDireccion::find($id);
        $tipoDireccion->delete();
        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        return Redirect::to('/tiposdirecciones');
    }
}
