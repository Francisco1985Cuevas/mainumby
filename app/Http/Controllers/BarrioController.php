<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// dependencia o clase para poder utilizar sentencias SQL en este controller.
use Illuminate\Support\Facades\DB;

// mapear al model Barrio.
use App\Pais;

// mapear al model Ciudad.
use App\Ciudad;

use Session;
use Redirect;

class BarrioController extends Controller
{
    public $list_ciudades;

    // Constructor
    /**
     * __construct()
     * el array de lista de ciudades se utiliza en varias partes, entonces
     * se crea este metodo constructor con el proposito de crear una sola vez
     * la variable $list_ciudades e inicializarla con los datos correspondientes.
     *
     */
    public function __construct(){
        $this->list_ciudades = \App\Ciudad::orderBy('nombre')->pluck('nombre', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barrios = DB::table('barrios')
            ->join('ciudades', 'barrios.ciudad', '=', 'ciudades.id')
            ->select('barrios.*', 'ciudades.nombre as nombre_ciudad')
            ->get();

        return view('barrio.list', compact('barrios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barrio.create', ['list_ciudades' => $this->list_ciudades]);
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
                        ['nombre' => 'required|min:2|max:60|unique:barrios',
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El <b>Nombre de Barrio</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre Barrio',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.
        \App\Barrio::create([ 'nombre' => $request['nombre'],
                                'abreviatura' => $request['abreviatura'],
                                'ciudad' => $request['ciudad'] ]);

        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('barrio.create', ['list_ciudades' => $this->list_ciudades]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barrios = DB::table('barrios')
                    ->select('barrios.id', 'barrios.nombre', 'barrios.abreviatura', 'barrios.ciudad', 'barrios.created_at', 'barrios.updated_at', 'ciudades.nombre as nombre_ciudad')
                    ->join('ciudades', function ($join) {
                        $join->on('barrios.ciudad', '=', 'ciudades.id');
                        })
                        ->where('barrios.id', '=', $id)
                    ->get();

        return view('barrio.show')->with('barrios', $barrios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barrio = \App\Barrio::find($id);

        return view('barrio.edit', ['barrio' => $barrio, 'list_ciudades' => $this->list_ciudades]);
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
        $request['nombre'] = strtoupper($request['nombre']);
        $request['abreviatura'] = strtoupper($request['abreviatura']);

        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['nombre' => 'required|min:2|max:60|unique:barrios,nombre,'.$id,
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El <b>Nombre de Pais</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre Barrio',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a actualizar registro.
        $barrio = \App\Barrio::find($id);
        $barrio-> fill(['nombre' => $request['nombre'],
                            'abreviatura' => $request['abreviatura'],
                            'ciudad' => $request['ciudad']
                        ]);
        $barrio-> save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');

        return view('barrio.edit', ['barrio' => $barrio, 'list_ciudades' => $this->list_ciudades]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barrio = \App\Barrio::find($id);
        $barrio->delete();

        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar

        return Redirect::to('/barrios');
    }
}
