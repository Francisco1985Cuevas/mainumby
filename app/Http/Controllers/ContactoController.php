<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// dependencia o clase para poder utilizar sentencias SQL en este controller.
use Illuminate\Support\Facades\DB;

// mapear al model Contacto.
use App\Contacto;

// mapear al model Persona.
use App\Persona;

// mapear al model TipoContacto.
use App\TipoContacto;

use Session;
use Redirect;

class ContactoController extends Controller
{
    public $list_personas;
    public $list_tiposContactos;

    // Constructor
    /**
     * __construct()
     * el array de lista de personas, lista de tiposLugares se utiliza en varias partes, entonces
     * se crea este metodo constructor con el proposito de crear una sola vez
     * las variables $list_personas, $list_tiposContactos e inicializarla con los datos correspondientes.
     *
     */
    public function __construct(){
        $this->list_personas = \App\Persona::orderBy('nombres')->pluck('nombres', 'id');
        $this->list_tiposContactos = \App\TipoContacto::orderBy('nombre')->pluck('nombre', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = DB::table('contactos')
                            ->select('contactos.*', 'personas.nombres as persona_nombres', 'tipos_contactos.nombre as tipo_contacto_desc')
                            ->leftJoin('personas', 'contactos.persona', '=', 'personas.id')
                            ->leftJoin('tipos_contactos', 'contactos.tipo_contacto', '=', 'tipos_contactos.id')
                            ->get();

        return view('contacto.list', compact('contactos'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacto.create', ['list_personas' => $this->list_personas,
                                        'list_tiposContactos' => $this->list_tiposContactos
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
        \App\Contacto::create([ 'persona' => $request['persona'],
                                'tipo_contacto' => $request['tipo_contacto'],
                                'numero_contacto' => $request['numero_contacto'],
                                'comentario' => $request['comentario']
                                ]);
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');
        return view('contacto.create', ['list_personas' => $this->list_personas,
                                        'list_tiposContactos' => $this->list_tiposContactos
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
        $contactos = DB::table('contactos')
                ->select('contactos.*', 'personas.nombres as persona_nombres', 'tipos_contactos.nombre as tipo_contacto_desc')
                ->leftJoin('personas', 'contactos.persona', '=', 'personas.id')
                ->leftJoin('tipos_contactos', 'contactos.tipo_contacto', '=', 'tipos_contactos.id')
                ->where('contactos.id', '=', $id)
                ->get();

        return view('contacto.show')->with('contactos', $contactos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = \App\Contacto::find($id);
        return view('contacto.edit', ['contacto' => $contacto,
                                        'list_personas' => $this->list_personas,
                                        'list_tiposContactos' => $this->list_tiposContactos
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
        $contacto = \App\Contacto::find($id);
        $contacto-> fill(['persona' => $request['persona'],
                            'tipo_contacto' => $request['tipo_contacto'],
                            'descripcion' => $request['descripcion'],
                            'comentario' => $request['comentario']
                        ]);
        $contacto-> save();
        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');
        return view('contacto.edit', ['contacto' => $contacto,
                                        'list_personas' => $this->list_personas,
                                        'list_tiposContactos' => $this->list_tiposContactos
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
        $contacto = \App\Contacto::find($id);
        $contacto->delete();
        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        return Redirect::to('/contactos');
    }
}
