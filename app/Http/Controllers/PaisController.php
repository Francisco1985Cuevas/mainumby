<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// mapear al model Pais.
use App\Pais;

// Request Validations
//use App\Http\Requests\StorePaisRequest;
//use App\Http\Requests\UpdatePaisRequest;

use Session;
use Redirect;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = \App\Pais::all();
        //foreach ($paises as $pais) {
        //    echo $pais->nombre;
        //}
        return view('pais.list', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pais.create');
    }

    /**
     * Create a new pais instance.
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    //public function store(StorePaisRequest $request)
    {
        //convierto previamente los campos a mayusculas, como alguna forma de "unificar" ya
        //que validate() no tiene en cuenta mayusculas ni minusculas y se pueden duplicar registros...
        $request['nombre'] = strtoupper($request['nombre']);
        $request['abreviatura'] = strtoupper($request['abreviatura']);

        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['nombre' => 'required|min:2|max:60|unique:paises',
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El <b>Nombre de Pais</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre Pais',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.
        $pais = new Pais;
        $pais->nombre = $request->nombre;
        $pais->abreviatura = $request->abreviatura;
        $pais->save();
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');
        return view('pais.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais = \App\Pais::find($id);
        return view('pais.show', ['pais' => $pais]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = \App\Pais::find($id);
        return view('pais.edit', ['pais' => $pais]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    //public function update(UpdatePaisRequest $request, $id)
    {
        //convierto previamente los campos a mayusculas, como alguna forma de "unificar" ya
        //que validate() no tiene en cuenta mayusculas ni minusculas y se pueden duplicar registros...
        $request['nombre'] = strtoupper($request['nombre']);
        $request['abreviatura'] = strtoupper($request['abreviatura']);

        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['nombre' => 'required|min:2|max:60|unique:paises,nombre,'.$id,
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El <b>Nombre de Pais</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre Pais',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a actualizar registro.
        $pais = \App\Pais::find($id);
        $pais->nombre = $request['nombre'];
        $pais->abreviatura = $request['abreviatura'];
        $pais->save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');
        return view('pais.edit', ['pais' => $pais]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais = \App\Pais::find($id);
        $pais->delete();
        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        return Redirect::to('/paises');
    }
}
