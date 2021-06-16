<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// dependencia o clase para poder utilizar sentencias SQL en este controller.
use Illuminate\Support\Facades\DB;

// mapear al model Direccion.
use App\Direccion;

// mapear al model Persona.
use App\Persona;

// mapear al model TipoDireccion.
use App\TipoDireccion;

// mapear al model Barrio.
use App\Barrio;

use Session;
use Redirect;

class DireccionController extends Controller
{
    public $list_personas;
    public $list_tiposDirecciones;
    public $list_barrios;

    // Constructor
    /**
     * __construct()
     * el array de lista de personas, lista de tiposLugares se utiliza en varias partes, entonces
     * se crea este metodo constructor con el proposito de crear una sola vez
     * las variables $list_personas, $list_tiposDirecciones e inicializarla con los datos correspondientes.
     *
     */
    public function __construct(){
        $this->list_personas = \App\Persona::orderBy('nombres')->pluck('nombres', 'id');
        $this->list_tiposDirecciones = \App\TipoDireccion::orderBy('nombre')->pluck('nombre', 'id');
        $this->list_barrios = \App\Barrio::orderBy('nombre')->pluck('nombre', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones = DB::table('direcciones')
                            ->select('direcciones.*', 'personas.nombres as persona_nombres', 'tipos_direcciones.nombre as tipo_direccion_desc', 'barrios.nombre as barrio_desc')
                            ->leftJoin('personas', 'direcciones.persona', '=', 'personas.id')
                            ->leftJoin('tipos_direcciones', 'direcciones.tipo_direccion', '=', 'tipos_direcciones.id')
                            ->leftJoin('barrios', 'direcciones.barrio', '=', 'barrios.id')
                            ->get();

        return view('direccion.list', compact('direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('direccion.create', ['list_personas' => $this->list_personas,
                                        'list_tiposDirecciones' => $this->list_tiposDirecciones,
                                        'list_barrios' => $this->list_barrios
                                        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Primero, validar campos del form.
        // sino hay error, proceder a insertar nuevo registro en la BD.
        \App\Direccion::create([ 'persona' => $request['persona'],
                                'tipo_direccion' => $request['tipo_direccion'],
                                'barrio' => $request['barrio'],
                                'calle' => $request['calle'],
                                'numero_casa' => $request['numero_casa'],
                                'piso' => $request['piso'],
                                'departamento' => $request['departamento'],
                                'comentario' => $request['comentario']
                                ]);

        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('direccion.create', ['list_personas' => $this->list_personas,
                                        'list_tiposDirecciones' => $this->list_tiposDirecciones,
                                        'list_barrios' => $this->list_barrios
                                        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $direcciones = DB::table('direcciones')
                        ->select('direcciones.*', 'personas.nombres as persona_nombres', 'tipos_direcciones.nombre as tipo_direccion_desc', 'barrios.nombre as barrio_desc')
                        ->leftJoin('personas', 'direcciones.persona', '=', 'personas.id')
                        ->leftJoin('tipos_direcciones', 'direcciones.tipo_direccion', '=', 'tipos_direcciones.id')
                        ->leftJoin('barrios', 'direcciones.barrio', '=', 'barrios.id')
                        ->where('direcciones.id', '=', $id)
                        ->get();

        return view('direccion.show')->with('direcciones', $direcciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $direccion = \App\Direccion::find($id);
        return view('direccion.edit', ['direccion' => $direccion,
                                        'list_personas' => $this->list_personas,
                                        'list_tiposDirecciones' => $this->list_tiposDirecciones,
                                        'list_barrios' => $this->list_barrios
                                        ]);
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
        // Primero, validar campos del form.
        // sino hay error, proceder a actualizar registro existente en la BD.
        $direccion = \App\Direccion::find($id);
        $direccion-> fill(['persona' => $request['persona'],
                            'tipo_direccion' => $request['tipo_direccion'],
                            'barrio' => $request['barrio'],
                            'calle' => $request['calle'],
                            'numero_casa' => $request['numero_casa'],
                            'piso' => $request['piso'],
                            'departamento' => $request['departamento'],
                            'comentario' => $request['comentario']
                        ]);
        $direccion-> save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');

        return view('direccion.edit', ['direccion' => $direccion,
                                        'list_personas' => $this->list_personas,
                                        'list_tiposDirecciones' => $this->list_tiposDirecciones,
                                        'list_barrios' => $this->list_barrios
                                        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direccion = \App\Direccion::find($id);
        $direccion->delete();

        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar

        return Redirect::to('/direcciones');
    }
}
