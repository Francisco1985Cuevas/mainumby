<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// dependencia o clase para poder utilizar sentencias SQL en este controller.
use Illuminate\Support\Facades\DB;

// mapear al model Persona.
use App\Persona;

use Session;
use Redirect;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = \App\Persona::all();

        return view('persona.list', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('persona.create');
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
        $request['nombres'] = strtoupper($request['nombres']);
        $personaFisica = "F";
        if (strcmp($request['tipo_persona'], $personaFisica) === 0){ //Los strings coinciden...
            $request['apellidos'] = strtoupper($request['apellidos']);
        }

        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['nombres' => 'required|min:2|max:100'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombres'
                        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.
        if (strcmp($request['tipo_persona'], $personaFisica) === 0){ //Los strings coinciden...
            \App\Persona::create([ 'nombres' => $request['nombres'],
                                    'apellidos' => $request['apellidos'],
                                    'fecha_nacimiento' => $request['fecha_nacimiento'],
                                    'tipo_persona' => $request['tipo_persona'],
                                    'comentario' => $request['comentario']
                                ]);
        }else{
            \App\Persona::create([ 'nombres' => $request['nombres'],
                                    'tipo_persona' => 'J',
                                    'comentario' => $request['comentario']
                                ]);
        }
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('persona.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personas = \App\Persona::find($id);
        return view('persona.show', ['personas' => $personas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = \App\Persona::find($id);
        return view('persona.edit', ['persona' => $persona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //convierto previamente los campos a mayusculas, como alguna forma de "unificar" ya
        //que validate() no tiene en cuenta mayusculas ni minusculas y se pueden duplicar registros...
        $request['nombres'] = strtoupper($request['nombres']);
        $personaFisica = "F";
        if (strcmp($request['tipo_persona'], $personaFisica) === 0){ //Los strings coinciden...
            $request['apellidos'] = strtoupper($request['apellidos']);
        }

        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['nombres' => 'required|min:2|max:100',
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombres' => 'Nombres',
                        ]);

        // Si pasa las reglas de validación, proceder a actualizar registro.
        if (strcmp($request['tipo_persona'], $personaFisica) === 0){ //Los strings coinciden...
            $persona = \App\Persona::find($id);
            $persona-> fill(['nombres' => $request['nombres'],
                                'apellidos' => $request['apellidos'],
                                'fecha_nacimiento' => $request['fecha_nacimiento'],
                                'tipo_persona' => $request['tipo_persona'],
                                'comentario' => $request['comentario']
                            ]);
        }else{
            $persona = \App\Persona::find($id);
            $persona-> fill(['nombres' => $request['nombres'],
                                'tipo_persona' => 'J',
                                'comentario' => $request['comentario']
                            ]);
        }
        $persona-> save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');

        return view('persona.edit', ['persona' => $persona]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = \App\Persona::find($id);
        $persona->delete();

        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar

        return Redirect::to('/personas');
    }

}
