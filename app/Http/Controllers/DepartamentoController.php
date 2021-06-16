<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// dependencia o clase para poder utilizar sentencias SQL en este controller.
use Illuminate\Support\Facades\DB;

// mapear al model Pais.
use App\Pais;

use Session;
use Redirect;

// Request Validations
//use App\Http\Requests\StoreDepartamentoRequest;
//use App\Http\Requests\UpdateDepartamentoRequest;

class DepartamentoController extends Controller
{
    public $list_paises;

    // Constructor
    /**
     * __construct()
     * el array de lista de paises se utiliza en varias partes, entonces
     * se crea este metodo constructor con el proposito de crear una sola vez
     * la variable $list_paises e inicializarla con los datos correspondientes.
     *
     */
    public function __construct(){
        $this->list_paises = \App\Pais::orderBy('nombre')->pluck('nombre', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = DB::table('departamentos')
            ->join('paises', 'departamentos.pais', '=', 'paises.id')
            ->select('departamentos.*', 'paises.nombre as nombre_pais')
            ->get();

        return view('departamento.list', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.create', ['list_paises' => $this->list_paises]);
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
                        ['nombre' => 'required|min:2|max:60|unique:departamentos',
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El <b>Nombre de Departamento</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre Departamento',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.
        \App\Departamento::create([ 'nombre' => $request['nombre'],
                                    'abreviatura' => $request['abreviatura'],
                                    'pais' => $request['pais'] ]);
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');
        return view('departamento.create', ['list_paises' => $this->list_paises]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = DB::table('departamentos')
                            ->select('departamentos.id', 'departamentos.nombre', 'departamentos.abreviatura', 'departamentos.pais', 'departamentos.created_at', 'departamentos.updated_at', 'paises.nombre as nombre_pais')
                            ->join('paises', function ($join) {
                                $join->on('departamentos.pais', '=', 'paises.id');
                                })
                                ->where('departamentos.id', '=', $id)
                            ->get();

        //foreach ($departamento as $depto) {
        //    echo $depto->id;
        //}
        //die();

        return view('departamento.show')->with('departamento', $departamento);
        //return view('departamento.show', ['departamento' => $departamento]);
        //return view('departamento.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = \App\Departamento::find($id);
        return view('departamento.edit', ['departamento' => $departamento, 'list_paises' => $this->list_paises]);
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
                        ['nombre' => 'required|min:2|max:60|unique:departamentos,nombre,'.$id,
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El <b>Nombre de Departamento</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre Departamento',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a actualizar registro.
        $departamento = \App\Departamento::find($id);
        $departamento-> fill(['nombre' => $request['nombre'],
                            'abreviatura' => $request['abreviatura'],
                            'pais' => $request['pais']
                        ]);
        $departamento-> save();
        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');
        return view('departamento.edit', ['departamento' => $departamento, 'list_paises' => $this->list_paises]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = \App\Departamento::find($id);
        $departamento->delete();
        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        return Redirect::to('/departamentos');
    }
}
