<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



/*
Laravel incluye un ORM llamado Eloquent, el cual nos permite abstraer aún más las
operaciones de base de datos, puesto que podemos interactuar con «Modelos» (representados
por clases y objetos de PHP) en vez de tener que escribir sentencias SQL manualmente.
*/
// import de las clases: Persona, Pais
use App\Persona;
use App\Pais;
use App\TipoDocumento;
use App\Documento;


/*
Una sesión es la conexión que se establece entre un usuario (el equipo cliente) y un
servidor Web, así las variables de sesión se utilizan para almacenar información de
forma temporal en dicha conexión, es decir funcionan como un mecanismo para almacenar
datos e información sobre un usuario, un evento o cualquier cosa durante un periodo
en nuestra aplicación.
Uso
Para usar las sesiones en un proyecto de Laravel podemos hacerlo de varias maneras:
Por medio de la Facade Session
*/
use Session;



/*
Las respuestas de redireccionamiento son instancias de la Illuminate\Http\RedirectResponseclase y
contienen los encabezados adecuados necesarios para redirigir al usuario a otra URL.
*/
use Redirect;



/*
Las Facades proveen una interfaz «estática» a las clases disponibles en el contenedor de servicios de la aplicación.
Todas las facades de Laravel se definen en el namespace Illuminate\Support\Facades.
DB = Database: Query Builder
El generador de consultas de base de datos de Laravel proporciona una interfaz cómoda y fluida para crear y
ejecutar consultas de base de datos. Se puede utilizar para realizar la mayoría de las operaciones de base
de datos en su aplicación y funciona en todos los sistemas de base de datos compatibles.
*/
use Illuminate\Support\Facades\DB;


class PersonaController extends Controller
{
    public $listaPaises;

    // Constructor
    /**
     * __construct()
     * el array de lista de paises se utiliza en varias partes, entonces
     * se crea este metodo constructor con el proposito de crear una sola vez
     * la variable $listPaises e inicializarla con los datos correspondientes.
     *
     */
    public function __construct(){
        $this->listaPaises = Pais::orderBy('nombre')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Se Obtienen registros utilizando Eloquent ORM. Obtener todas las Personas
        // de la tabla Personas.
        $personas = Persona::all();
        return view('persona.list', ['personas' => $personas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persona.create', ['listaPaises' =>  $this->listaPaises]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //convierto previamente los campos(primer_nombre, segundo_nombre y primer_apellido, segundo_apellido) a
        //mayusculas, como alguna forma de "unificar" ya que validate() no tiene en cuenta mayusculas
        //ni minusculas y se pueden duplicar registros...
        $request['primer_nombre'] = strtoupper(trim($request['primer_nombre']));


        //Si es una persona fisica, entonces capturar todos los  datos posibles de una
        //persona fisica como: apellido, sexo, estadoCivil, etc.
        //Si es persona juridica, posiblemente son los datos de una empresa, entonces
        //solo capturar datos relevantes como: Primer_Nombre o Razon Social, Numero de RUC, etc.
        $personaFisica = "f";
        if (strcmp($request['tipo_persona'], $personaFisica) === 0) { //Al comparar los strings, coinciden...
            $request['segundo_nombre'] = strtoupper(trim($request['segundo_nombre']));
            $request['primer_apellido'] = strtoupper(trim($request['primer_apellido']));
            $request['segundo_apellido'] = strtoupper(trim($request['segundo_apellido']));
            //$tipoDocumento = DB::table('tipos_documentos')->where('nombre', 'like', 'CEDULA%')->get();
            $tipoDocumento = TipoDocumento::where('nombre','like', 'CEDULA%')->get();
            foreach($tipoDocumento as $documento) {
                $tipoDocumentoId = $documento->id;
            }
        } else {
            $tipoDocumento = TipoDocumento::where('nombre','like', 'RUC%')->get();
            foreach($tipoDocumento as $documento) {
                $tipoDocumentoId = $documento->id;
            }
        }

        if ($request->hasFile("foto")) {
            /*Se debe realizar tratamiento  a la imagen como reducir el tamaño,
            el peso, redimensionarla o cambiar de formato.
            - La imagen debe tener el tamaño adecuado en altura y ancho
            - La imagen debe tener el peso adecuado en relación con su tamaño.
            - La imagen debe estar entre los formatos JPG, JPEG, PNG, GIF de las más usados en una aplicación web.
            */
            $img = $request->file("foto");
            $nombreImg = $request['numero_documento'].".".$img->guessExtension();
            $ruta = public_path("img/post/");
            copy($img->getRealPath(), $ruta.$nombreImg);
        } else {
            $nombreImg = "";
        }

        // lógica para validar campos del formulario.
        $this->validate(
            $request,
            //rules
            [
                'primer_nombre' => 'required|min:2|max:100',
                'numero_documento' => 'required|min:2|max:60'
            ],
            //messages
            [
                'required' => 'El campo <b>:attribute</b> es obligatorio.',
                'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
            ],
            //atributes
            [
                'primer_nombre' => 'Primer Nombre/Razon Social',
                'numero_documento' => 'Numero Documento/RUC'
            ]
        );

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.

        // Creacion de registros utilizando Eloquent ORM, se hizo import de la clase(Model:Persona) al
        // principio de este archivo para poder para poder utilizarlo sin necesidad de hacer
        // referencia a su nombre de espacio completo.

        //Insertar datos en la tabla Personas.
        $persona = new Persona;
        $persona->primer_nombre = $request['primer_nombre'];
        $persona->segundo_nombre = $request['segundo_nombre'];
        $persona->primer_apellido = $request['primer_apellido'];
        $persona->segundo_apellido = $request['segundo_apellido'];
        $persona->ciudad_id = $request['ciudad_id'];
        $persona->fecha_nacimiento = $request['fecha_nacimiento'];
        $persona->tipo_persona = $request['tipo_persona'];
        $persona->estado_civil = $request['estado_civil'];
        $persona->sexo = $request['sexo'];
        $persona->foto = $nombreImg;
        $persona->estado = 'activo';
        $persona->comentario = $request['comentario'];
        $persona-> save();


        //Insertar datos por default en la tabla Documentos.
        $documento = new Documento();
        $documento->persona_id = $persona->id;
        $documento->tipo_documento_id = $tipoDocumentoId;
        $documento->numero_documento = $request['numero_documento'];
        $documento-> save();

        Session::flash('validated', true);
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('persona.create', ['listaPaises' => $this->listaPaises]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener la Persona que corresponda con el ID dado (o null si no es encontrado).
        $persona = Persona::find($id);

        $documentos = Documento::where('persona_id', $persona->id)
                                ->orderBy('numero_documento', 'desc')
                                ->get();

        return view('persona.show', ['persona' => $persona,
                                        'documentos' => $documentos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtener la Persona que corresponda con el ID dado (o null si no es encontrado).
        $persona = Persona::find($id);

        $documentos = Documento::where('persona_id', $persona->id)
                                ->orderBy('numero_documento', 'desc')
                                ->get();

        return view('persona.edit', ['listaPaises' =>  $this->listaPaises,
                                    'persona' => $persona,
                                    'documentos' => $documentos]);
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

        //convierto previamente los campos(primer_nombre, segundo_nombre y primer_apellido, segundo_apellido) a
        //mayusculas, como alguna forma de "unificar" ya que validate() no tiene en cuenta mayusculas
        //ni minusculas y se pueden duplicar registros...
        $request['primer_nombre'] = strtoupper(trim($request['primer_nombre']));


        //Si es una persona fisica, entonces capturar todos los  datos posibles como: apellido,
        //sexo, etc.
        //Si es persona juridica, solo capturar datos relevantes para tipo_persona
        //como: Primer_Nombre o Razon Social, Numero de RUC, etc.
        $personaFisica = "f";
        if (strcmp($request['tipo_persona'], $personaFisica) === 0) { //Al comparar los strings, coinciden...
            $request['segundo_nombre'] = strtoupper(trim($request['segundo_nombre']));
            $request['primer_apellido'] = strtoupper(trim($request['primer_apellido']));
            $request['segundo_apellido'] = strtoupper(trim($request['segundo_apellido']));
        }

        if ($request->hasFile("foto")) {
            /*Se debe realizar tratamiento  a la imagen como reducir el tamaño,
            el peso, redimensionarla o cambiar de formato.
            - La imagen debe tener el tamaño adecuado en altura y ancho
            - La imagen debe tener el peso adecuado en relación con su tamaño.
            - La imagen debe estar entre los formatos JPG, JPEG, PNG, GIF de las más usados en una aplicación web.
            */
            $img = $request->file("foto");
            $nombreImg = $request['numero_documento'].".".$img->guessExtension();
            $ruta = public_path("img/post/");
            copy($img->getRealPath(), $ruta.$nombreImg);
        } else {
            $nombreImg = "";
        }

        // lógica para validar campos del formulario.
        $this->validate(
            $request,
            //rules
            [
                'primer_nombre' => 'required|min:2|max:100'
            ],
            //messages
            [
                'required' => 'El campo <b>:attribute</b> es obligatorio.',
                'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
            ],
            //atributes
            [
                'primer_nombre' => 'Primer Nombre/Razon Social'
            ]
        );

        // Si pasa las reglas de validación, proceder a actualizar registro.

        // Creacion de registros utilizando Eloquent ORM, se hizo import de la clase(Model:Persona) al
        // principio de este archivo para poder para poder utilizarlo sin necesidad de hacer
        // referencia a su nombre de espacio completo.

        $persona = Persona::find($id);
        $persona->fill(['primer_nombre'=>$request['primer_nombre'],
                        'segundo_nombre'=>$request['segundo_nombre'],
                        'primer_apellido'=>$request['primer_apellido'],
                        'segundo_apellido'=>$request['segundo_apellido'],
                        'ciudad_id'=>$request['ciudad_id'],
                        'fecha_nacimiento'=>$request['fecha_nacimiento'],
                        'tipo_persona'=>$request['tipo_persona'],
                        'estado_civil'=>$request['estado_civil'],
                        'sexo'=>$request['sexo'],
                        'foto'=>$nombreImg,
                        'comentario'=>$request['comentario'],
                        'estado'=>$request['estado']
                    ]);

        $persona->save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');

        // Obtener la Persona que corresponda con el ID dado (o null si no es encontrado).
        $persona = Persona::find($id);

        return view('persona.edit', ['listaPaises' =>  $this->listaPaises,
                                        'persona' => $persona]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
