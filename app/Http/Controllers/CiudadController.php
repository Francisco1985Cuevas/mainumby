<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// dependencia o clase para poder utilizar sentencias SQL en este controller.
use Illuminate\Support\Facades\DB;

// mapear al model Ciudad.
use App\Ciudad;

// mapear al model Departamento.
use App\Departamento;

use Session;
use Redirect;


class CiudadController extends Controller
{

    public $list_departamentos;

    // Constructor
    /**
     * __construct()
     * el array de lista de departamentos se utiliza en varias partes, entonces
     * se crea este metodo constructor con el proposito de crear una sola vez
     * la variable $list_departamentos e inicializarla con los datos correspondientes.
     *
     */
    public function __construct(){
        $this->list_departamentos = \App\Departamento::orderBy('nombre')->pluck('nombre', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = DB::table('ciudades')
            ->join('departamentos', 'ciudades.departamento', '=', 'departamentos.id')
            ->select('ciudades.*', 'departamentos.nombre as nombre_departamento')
            ->get();

        return view('ciudad.list', compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciudad.create', ['list_departamentos' => $this->list_departamentos]);
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
                        ['nombre' => 'required|min:2|max:60|unique:ciudades',
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El <b>Nombre de Ciudad</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre Ciudad',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.
        \App\Ciudad::create([ 'nombre' => $request['nombre'],
                                'abreviatura' => $request['abreviatura'],
                                'departamento' => $request['departamento'] ]);
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('ciudad.create', ['list_departamentos' => $this->list_departamentos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudades = DB::table('ciudades')
                            ->select('ciudades.id', 'ciudades.nombre', 'ciudades.abreviatura', 'ciudades.departamento', 'ciudades.created_at', 'ciudades.updated_at', 'departamentos.nombre as nombre_departamento')
                            ->join('departamentos', function ($join) {
                                $join->on('ciudades.departamento', '=', 'departamentos.id');
                                })
                                ->where('ciudades.id', '=', $id)
                            ->get();
        return view('ciudad.show')->with('ciudades', $ciudades);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudad = \App\Ciudad::find($id);
        return view('ciudad.edit', ['ciudad' => $ciudad, 'list_departamentos' => $this->list_departamentos]);
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
                        ['nombre' => 'required|min:2|max:60|unique:ciudades,nombre,'.$id,
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El <b>Nombre de Ciudad</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre Ciudad',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a actualizar registro.
        $ciudad = \App\Ciudad::find($id);
        $ciudad->nombre = $request['nombre'];
        $ciudad->abreviatura = $request['abreviatura'];
        $ciudad->departamento = $request['departamento'];
        $ciudad->save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');
        return view('ciudad.edit', ['ciudad' => $ciudad, 'list_departamentos' => $this->list_departamentos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciudad = \App\Ciudad::find($id);
        $ciudad->delete();
        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        return Redirect::to('/ciudades');
    }
}
