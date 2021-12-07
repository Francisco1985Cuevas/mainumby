<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// dependencia o clase para poder utilizar sentencias SQL en este controller.
use Illuminate\Support\Facades\DB;

// mapear al model Documento.
use App\Documento;

// mapear al model Persona.
use App\Persona;

// mapear al model TipoDocumento.
use App\TipoDocumento;

use Session;
use Redirect;

class DocumentoController extends Controller
{
    public $list_personas;
    public $list_tiposDocumentos;

    // Constructor
    /**
     * __construct()
     * el array de lista de personas, lista de tiposDocumentos se utiliza en varias partes, entonces
     * se crea este metodo constructor con el proposito de crear una sola vez
     * las variables $list_personas, $list_tiposDocumentos e inicializarla con los datos correspondientes.
     *
     */
    public function __construct(){
        $this->list_personas = \App\Persona::orderBy('nombres')->pluck('nombres', 'id');
        $this->list_tiposDocumentos = \App\TipoDocumento::orderBy('nombre')->pluck('nombre', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = DB::table('documentos')
                            ->select('documentos.*', 'personas.nombres as persona_nombres', 'tipos_documentos.nombre as tipo_documento_desc')
                            ->leftJoin('personas', 'documentos.persona', '=', 'personas.id')
                            ->leftJoin('tipos_documentos', 'documentos.tipo_documento', '=', 'tipos_documentos.id')
                            ->get();

        return view('documento.list', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documento.create', ['list_personas' => $this->list_personas,
                                        'list_tiposDocumentos' => $this->list_tiposDocumentos
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
        \App\Documento::create([ 'persona' => $request['persona'],
                                'tipo_documento' => $request['tipo_documento'],
                                'numero_documento' => $request['numero_documento']
                                ]);
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');
        return view('documento.create', ['list_personas' => $this->list_personas,
                                        'list_tiposDocumentos' => $this->list_tiposDocumentos
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
        $documentos = DB::table('documentos')
                        ->select('documentos.*', 'personas.nombres as persona_nombres', 'tipos_documentos.nombre as tipo_documento_desc')
                        ->leftJoin('personas', 'documentos.persona', '=', 'personas.id')
                        ->leftJoin('tipos_documentos', 'documentos.tipo_documento', '=', 'tipos_documentos.id')
                        ->where('documentos.id', '=', $id)
                        ->get();

        return view('documento.show')->with('documentos', $documentos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = \App\Documento::find($id);
        return view('documento.edit', ['documento' => $documento,
                                        'list_personas' => $this->list_personas,
                                        'list_tiposDocumentos' => $this->list_tiposDocumentos
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
        $documento = \App\Documento::find($id);
        $documento-> fill(['persona' => $request['persona'],
                            'tipo_documento' => $request['tipo_documento'],
                            'numero_documento' => $request['numero_documento']
                        ]);
        $documento-> save();
        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');
        return view('documento.edit', ['documento' => $documento,
                                        'list_personas' => $this->list_personas,
                                        'list_tiposDocumentos' => $this->list_tiposDocumentos
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
        $documento = \App\Documento::find($id);
        $documento->delete();
        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        return Redirect::to('/documentos');
    }

}
