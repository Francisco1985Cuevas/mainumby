<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



/*
Laravel incluye un ORM llamado Eloquent, el cual nos permite abstraer aún más las
operaciones de base de datos, puesto que podemos interactuar con «Modelos» (representados
por clases y objetos de PHP) en vez de tener que escribir sentencias SQL manualmente.
*/
// import de las clases: Persona, TipoDocumento, Documento, TipoDireccion, Barrrio, Direccion, TipoContacto, Contacto, TipoEmail, Email
use App\Persona;
use App\TipoDocumento;
use App\Documento;
use App\TipoDireccion;
use App\Barrio;
use App\Direccion;
use App\TipoContacto;
use App\Contacto;
use App\TipoEmail;
use App\Email;
use App\Pais;

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
    public $lista_tiposDocumentos;
    public $lista_tiposDirecciones;
    public $lista_barrios;
    public $lista_tiposContactos;
    public $lista_tiposEmails;

     /**
     *
     * Inicializar todas las listas de valores usadas en diferentes metodos del controller.
     */
    public function __construct(){
        $this->lista_tiposDocumentos = TipoDocumento::orderBy('nombre')->get();
        $this->lista_tiposDirecciones = TipoDireccion::orderBy('nombre')->get();
        $this->lista_barrios = Barrio::orderBy('nombre')->get();
        $this->lista_tiposContactos = TipoContacto::orderBy('nombre')->get();
        $this->lista_tiposEmails = TipoEmail::orderBy('nombre')->get();
        $this->lista_paises = Pais::orderBy('nombre')->get();
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
        //return view('persona.create');
        return view('persona.create', ['lista_tiposDocumentos' =>  $this->lista_tiposDocumentos,
                        'lista_tiposDirecciones' =>  $this->lista_tiposDirecciones,
                        'lista_barrios' =>  $this->lista_barrios,
                        'lista_tiposContactos' =>  $this->lista_tiposContactos,
                        'lista_tiposEmails' =>  $this->lista_tiposEmails,
                        'lista_paises' =>  $this->lista_paises]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r("request: ".$request."<br>");
        //foreach ($request['item_tipoDocumentoId'] as $valor) {
        //    echo " valor ".$valor;
        //}
        //echo is_array($request['item_tipoDocumentoId']) ? 'Array' : 'No es un array';
        //if (is_array($request['item_tipoDocumentoId'])) {
        //    echo "Array"."<br>";
        //} else {
        //    echo "No es un array"."<br>";
        //    $var = NULL;
        //    $request['item_tipoDocumentoId'] = NULL;
        //    $request['item_tipoDocumentoId'] = '';
        //}
        //print_r("request: ".$request."<br>");
        //print_r("errors: ".$errors."<br>");
        //die();

        //convierto previamente los campos(Nombres y Apellidos) a mayusculas, como alguna forma de "unificar" ya
        //que validate() no tiene en cuenta mayusculas ni minusculas y se pueden duplicar registros...
        $request['nombres'] = strtoupper($request['nombres']);

        //Si es una persona fisica, entonces capturar todos los  datos posibles como: apellido,
        //sexo, etc.
        //Si es persona juridica, solo capturar datos relevantes para tipo_persona
        //como: Nombre o Razon Social, Numero de RUC, etc.
        $personaFisica = "F";
        if (strcmp($request['tipo_persona'], $personaFisica) === 0) { //Al comparar los strings, coinciden...
            $request['apellidos'] = strtoupper($request['apellidos']);
        }

        // lógica para validar campos del formulario.
        // FALTA LA PARTE DE VALIDACION DE INGRESO DE NUMERO DE CEDULA
        $this->validate(
            $request,
            //rules
            [
                'nombres' => 'required|min:2|max:100'
            ],
            //messages
            [
                'required' => 'El campo <b>:attribute</b> es obligatorio.',
                'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
            ],
            //atributes
            [
                'nombres' => 'Nombres'
            ]
        );


        // Si pasa las reglas de validación, proceder a insertar nuevo registro.

        // Creacion de registros utilizando Eloquent ORM, se hizo import de la clase(Model:Persona) al
        // principio de este archivo para poder para poder utilizarlo sin necesidad de hacer
        // referencia a su nombre de espacio completo.

        /*if (strcmp($request['tipo_persona'], $personaFisica) === 0) { //Los strings coinciden...
            //Si el tipo_persona==Fisica tomar todos sus datos. Sino tomar solo datos basicos.

            Persona::create([
                'nombres' => $request['nombres'],
                'apellidos' => $request['apellidos'],
                'fecha_nacimiento' => $request['fecha_nacimiento'],
                'tipo_persona' => $request['tipo_persona'],
                'comentario' => $request['comentario']
            ]);
        } else {
            Persona::create([
                'nombres' => $request['nombres'],
                'tipo_persona' => $request['tipo_persona'],
                'comentario' => $request['comentario']
            ]);
        }*/


        //try {
            // DB::beginTransaction();

            //Datos obligatorios: Datos de Persona, por lo menos una ocurrencia
            //para la tabla de documentos.

            if (is_array($request['item_tipoDocumentoId'])) { //SOLUCION PROVISORIA, INVESTIGAR COMO CARGAR EN UN ARRAY DE ERRORES DE LARAVEL

                //Insertar datos en la tabla Personas.
                $persona = new Persona;
                $persona->nombres = $request['nombres'];
                $persona->apellidos = $request['apellidos'];
                $persona->fecha_nacimiento = $request['fecha_nacimiento'];
                $persona->tipo_persona = $request['tipo_persona'];
                $persona->sexo = $request['sexo'];
                $persona->comentario = $request['comentario'];
                $persona-> save();


                //Insertar datos en la tabla Documentos.
                $item_tipoDocumentoId = $request['item_tipoDocumentoId'];
                $item_numeroDocumento = $request['item_numeroDocumento'];
                $item_comentarioDocumento = $request['item_comentarioDocumento'];
                $contadorDocumentos = 0;
                while ($contadorDocumentos < count($item_tipoDocumentoId)) {
                    $documento = new Documento();
                    $documento->persona_id = $persona->id;
                    $documento->tipo_documento_id = $item_tipoDocumentoId[$contadorDocumentos];
                    $documento->numero_documento = $item_numeroDocumento[$contadorDocumentos];
                    $documento->comentario = $item_comentarioDocumento[$contadorDocumentos];
                    $documento-> save();
                    $contadorDocumentos = $contadorDocumentos + 1;
                }


                //Los datos de Direccion no son datos obligatorios, solo si se cargan registros
                //proceder a insertar datos.
                if(count((array)$request['item_tipoDireccionId']) > 0){
                    //Insertar datos en la tabla Direcciones.
                    $item_tipoDireccionId = $request['item_tipoDireccionId'];
                    $item_barrioId = $request['item_barrioId'];
                    $item_calle = $request['item_calle'];
                    $item_numeroCasa = $request['item_numeroCasa'];
                    $item_departamento = $request['item_departamento'];
                    $item_piso = $request['item_piso'];
                    $item_comentarioDireccion = $request['item_comentarioDireccion'];
                    $contadorDirecciones = 0;
                    while ($contadorDirecciones < count($item_tipoDireccionId)) {
                        $direccion = new Direccion();

                        $direccion->persona_id = $persona->id;
                        $direccion->tipo_direccion_id = $item_tipoDireccionId[$contadorDirecciones];
                        $direccion->barrio_id = $item_barrioId[$contadorDirecciones];
                        $direccion->calle = $item_calle[$contadorDirecciones];
                        $direccion->numero_casa = $item_numeroCasa[$contadorDirecciones];
                        $direccion->piso = $item_departamento[$contadorDirecciones];
                        $direccion->departamento = $item_piso[$contadorDirecciones];
                        $direccion->comentario = $item_comentarioDireccion[$contadorDirecciones];

                        $direccion-> save();
                        $contadorDirecciones = $contadorDirecciones + 1;
                    }
                }


                //Los datos de Contacto no son datos obligatorios, solo si se cargan registros
                //proceder a insertar datos.
                if(count((array)$request['item_tipoContactoId']) > 0){
                    //Insertar datos en la tabla Contactos.
                    $item_tipoContactoId = $request['item_tipoContactoId'];
                    $item_numeroContacto = $request['item_numeroContacto'];
                    $item_comentarioContacto = $request['item_comentarioContacto'];

                    $contadorContactos = 0;
                    while ($contadorContactos < count($item_tipoContactoId)) {
                        $contacto = new Contacto();

                        $contacto->persona_id = $persona->id;
                        $contacto->tipo_contacto_id = $item_tipoContactoId[$contadorContactos];
                        $contacto->numero_contacto = $item_numeroContacto[$contadorContactos];
                        $contacto->comentario = $item_comentarioContacto[$contadorContactos];

                        $contacto-> save();
                        $contadorContactos = $contadorContactos + 1;
                    }
                }


                //Los datos de Email no son datos obligatorios, solo si se cargan registros
                //proceder a insertar datos.
                if(count((array)$request['item_tipoEmailId']) > 0){
                    //Insertar datos en la tabla Emails.
                    $item_tipoEmailId = $request['item_tipoEmailId'];
                    $item_descripcionEmail = $request['item_descripcionEmail'];
                    $item_comentarioEmail = $request['item_comentarioEmail'];
                    $contadorEmails = 0;
                    while ($contadorEmails < count($item_tipoEmailId)) {
                        $email = new Email();
                        $email->persona_id = $persona->id;
                        $email->tipo_email_id = $item_tipoEmailId[$contadorEmails];
                        $email->descripcion = $item_descripcionEmail[$contadorEmails];
                        $email->comentario = $item_comentarioEmail[$contadorEmails];
                        $email-> save();
                        $contadorEmails = $contadorEmails + 1;
                    }
                }


                    //DB::commit();
                //} catch () {
                    //DB::rollBack();
                //}

                Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

                return view('persona.create', ['lista_tiposDocumentos' =>  $this->lista_tiposDocumentos,
                                'lista_tiposDirecciones' =>  $this->lista_tiposDirecciones,
                                'lista_barrios' =>  $this->lista_barrios,
                                'lista_tiposContactos' =>  $this->lista_tiposContactos,
                                'lista_tiposEmails' =>  $this->lista_tiposEmails,
                                'lista_paises' =>  $this->lista_paises
                            ]);

            }//end if [ is_array(item_tipoDocumentoId) ]
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

        $direcciones = Direccion::where('persona_id', $persona->id)
                                ->orderBy('numero_casa', 'desc')
                                ->get();

        $contactos = Contacto::where('persona_id', $persona->id)
                                ->orderBy('numero_contacto', 'desc')
                                ->get();

        $emails = Email::where('persona_id', $persona->id)
                                ->orderBy('descripcion', 'desc')
                                ->get();

        return view('persona.show', ['persona' => $persona,
                                        'documentos' => $documentos,
                                        'direcciones' => $direcciones,
                                        'contactos' => $contactos,
                                        'emails' => $emails]);
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

        $direcciones = Direccion::where('persona_id', $persona->id)
                                ->orderBy('numero_casa', 'desc')
                                ->get();

        $contactos = Contacto::where('persona_id', $persona->id)
                                ->orderBy('numero_contacto', 'desc')
                                ->get();

        $emails = Email::where('persona_id', $persona->id)
                                ->orderBy('descripcion', 'desc')
                                ->get();

        return view('persona.edit', ['lista_tiposDocumentos' =>  $this->lista_tiposDocumentos,
                                        'lista_tiposDirecciones' =>  $this->lista_tiposDirecciones,
                                        'lista_barrios' =>  $this->lista_barrios,
                                        'lista_tiposContactos' =>  $this->lista_tiposContactos,
                                        'lista_tiposEmails' =>  $this->lista_tiposEmails,
                                        'lista_paises' =>  $this->lista_paises,
                                        'persona' => $persona,
                                        'documentos' => $documentos,
                                        'direcciones' => $direcciones,
                                        'contactos' => $contactos,
                                        'emails' => $emails]);
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
        if (strcmp($request['tipo_persona'], $personaFisica) === 0) { //Los strings coinciden...
            $request['apellidos'] = strtoupper($request['apellidos']);
        }

        // lógica para validar campos del formulario.
        $this->validate(
            $request,
            //rules
            [
                'nombres' => 'required|min:2|max:100',
            ],
            //messages
            [
                'required' => 'El campo <b>:attribute</b> es obligatorio.',
                'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
            ],
            //atributes
            [
                'nombres' => 'Nombres',
            ]
        );

        // Si pasa las reglas de validación, proceder a actualizar registro.

        // Creacion de registros utilizando Eloquent ORM, se hizo import de la clase(Model:Persona) al
        // principio de este archivo para poder para poder utilizarlo sin necesidad de hacer
        // referencia a su nombre de espacio completo.
        if (strcmp($request['tipo_persona'], $personaFisica) === 0) { //Los strings coinciden...
            $persona = Persona::find($id);
            $persona->fill([
                'nombres' => $request['nombres'],
                'apellidos' => $request['apellidos'],
                'fecha_nacimiento' => $request['fecha_nacimiento'],
                'tipo_persona' => $request['tipo_persona'],
                'comentario' => $request['comentario']
            ]);
        } else {
            $persona = Persona::find($id);
            $persona->fill([
                'nombres' => $request['nombres'],
                'tipo_persona' => 'J',
                'comentario' => $request['comentario']
            ]);
        }
        $persona->save();



        //$deletedRows = App\Flight::where('active', 0)->delete();
        //$persona = Persona::find($id);
        //$persona->delete();

        $deletedDocumentos = Documento::where('persona_id', $id)->delete();


        //Insertar datos en la tabla Documentos.
        $item_tipoDocumentoId = $request['item_tipoDocumentoId'];
        $item_numeroDocumento = $request['item_numeroDocumento'];
        $item_comentarioDocumento = $request['item_comentarioDocumento'];
        $contadorDocumentos = 0;
        while ($contadorDocumentos < count($item_tipoDocumentoId)) {
            $documento = new Documento();
            $documento->persona_id = $persona->id;
            $documento->tipo_documento_id = $item_tipoDocumentoId[$contadorDocumentos];
            $documento->numero_documento = $item_numeroDocumento[$contadorDocumentos];
            $documento->comentario = $item_comentarioDocumento[$contadorDocumentos];
            $documento-> save();
            $contadorDocumentos = $contadorDocumentos + 1;
        }


        //Los datos de Direccion no son datos obligatorios, solo si se cargan registros
        //proceder a actualizar datos.
        if(count((array)$request['item_tipoDireccionId']) > 0) {
            //delete/re-insert datos en la tabla Direcciones.
            Direccion::where('persona_id', $id)->delete();

            //Insertar datos en la tabla Direcciones.
            $item_tipoDireccionId = $request['item_tipoDireccionId'];
            $item_barrioId = $request['item_barrioId'];
            $item_calle = $request['item_calle'];
            $item_numeroCasa = $request['item_numeroCasa'];
            $item_departamento = $request['item_departamento'];
            $item_piso = $request['item_piso'];
            $item_comentarioDireccion = $request['item_comentarioDireccion'];
            $contadorDirecciones = 0;
            while ($contadorDirecciones < count($item_tipoDireccionId)) {
                $direccion = new Direccion();

                $direccion->persona_id = $persona->id;
                $direccion->tipo_direccion_id = $item_tipoDireccionId[$contadorDirecciones];
                $direccion->barrio_id = $item_barrioId[$contadorDirecciones];
                $direccion->calle = $item_calle[$contadorDirecciones];
                $direccion->numero_casa = $item_numeroCasa[$contadorDirecciones];
                $direccion->piso = $item_departamento[$contadorDirecciones];
                $direccion->departamento = $item_piso[$contadorDirecciones];
                $direccion->comentario = $item_comentarioDireccion[$contadorDirecciones];

                $direccion-> save();
                $contadorDirecciones = $contadorDirecciones + 1;
            }
        }


        //Los datos de Contacto no son datos obligatorios, solo si se cargan registros
        //proceder a actualizar datos.
        if(count((array)$request['item_tipoContactoId']) > 0) {
            //delete/re-insert datos en la tabla Direcciones.
            Contacto::where('persona_id', $id)->delete();

            //Insertar datos en la tabla Direcciones.
            $item_tipoContactoId = $request['item_tipoContactoId'];
            $item_numeroContacto = $request['item_numeroContacto'];
            $item_comentarioContacto = $request['item_comentarioContacto'];

            $contadorContactos = 0;
            while ($contadorContactos < count($item_tipoContactoId)) {
                $contacto = new Contacto();

                $contacto->persona_id = $persona->id;
                $contacto->tipo_contacto_id = $item_tipoContactoId[$contadorContactos];
                $contacto->numero_contacto = $item_numeroContacto[$contadorContactos];
                $contacto->comentario = $item_comentarioContacto[$contadorContactos];

                $contacto-> save();
                $contadorContactos = $contadorContactos + 1;
            }
        }


        //Los datos de Email no son datos obligatorios, solo si se cargan registros
        //proceder a actualizar datos.
        if(count((array)$request['item_tipoEmailId']) > 0) {
            //delete/re-insert datos en la tabla Emails.
            Email::where('persona_id', $id)->delete();

            //Insertar datos en la tabla Emails.
            $item_tipoEmailId = $request['item_tipoEmailId'];
            $item_descripcion = $request['item_descripcionEmail'];
            $item_comentarioEmail = $request['item_comentarioEmail'];

            $contadorEmails = 0;
            while ($contadorEmails < count($item_tipoEmailId)) {
                $email = new Email();

                $email->persona_id = $persona->id;
                $email->tipo_email_id = $item_tipoEmailId[$contadorEmails];
                $email->descripcion = $item_descripcion[$contadorEmails];
                $email->comentario = $item_comentarioEmail[$contadorEmails];

                $email-> save();
                $contadorEmails = $contadorEmails + 1;
            }
        }


        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');

        // Obtener la Persona que corresponda con el ID dado (o null si no es encontrado).
        //$persona = Persona::find($id);

        $documentos = Documento::where('persona_id', $persona->id)
                                ->orderBy('numero_documento', 'desc')
                                ->get();

        $direcciones = Direccion::where('persona_id', $persona->id)
                                ->orderBy('numero_casa', 'desc')
                                ->get();

        $contactos = Contacto::where('persona_id', $persona->id)
                                ->orderBy('numero_contacto', 'desc')
                                ->get();

        $emails = Email::where('persona_id', $persona->id)
                                ->orderBy('descripcion', 'desc')
                                ->get();

        //return view('persona.edit', ['persona' => $persona]);
        return view('persona.edit', ['lista_tiposDocumentos' =>  $this->lista_tiposDocumentos,
                                        'lista_tiposDirecciones' =>  $this->lista_tiposDirecciones,
                                        'lista_barrios' =>  $this->lista_barrios,
                                        'lista_tiposContactos' =>  $this->lista_tiposContactos,
                                        'lista_tiposEmails' =>  $this->lista_tiposEmails,
                                        'lista_paises' =>  $this->lista_paises,
                                        'persona' => $persona,
                                        'documentos' => $documentos,
                                        'direcciones' => $direcciones,
                                        'contactos' => $contactos,
                                        'emails' => $emails]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$persona = Persona::find($id);
        //$persona->delete();

        //Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        //Session::flash('mostrar_en_listado', true); //solo le doy un valor de true para probar

        //return Redirect::to('/personas');


        $persona = Persona::find($id);
        $documentos = Documento::where('persona_id', $persona->id)->get();
        $direcciones = Direccion::where('persona_id', $persona->id)->get();
        $contactos = Contacto::where('persona_id', $persona->id)->get();
        $emails = Email::where('persona_id', $persona->id)->get();

        if( (count((array)$documentos) > 0) || (count((array)$direcciones) > 0) || (count((array)$contactos) > 0) || (count((array)$emails) > 0) ) {
            //die("ddd");
            //QUEDA PENDIENTE: SE TIENE QUE MOSTRAR UN MENSAJE DE ERROR SINO SE PUEDE BORRAR
            return Redirect::to('/personas');
        } else {
            //die("eee");
            $persona->delete();

            Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
            Session::flash('mostrar_en_listado', true); //solo le doy un valor de true para probar

            return Redirect::to('/personas');
        }

    }


    //public function listDepartamentos($id)
    //{
        /*echo "LISTA LIST";
        die("ss");*/

        /*if (isset($id)) {
            // Obtener los Departamentos que correspondan con el ID dado (o null si no es encontrado).
            $departamentos = Departamento::find($id);

            return response()->json(['departamentos'=>$departamentos, 'succes'=>true]);
        } else {
            return response()->json(['succes'=>false]);
        }*/

        /*if(isset($_POST['id'])):
            //require "conexion.php";
            //$user=new ApptivaDB();
            //$u=$user->buscar("provincias","departamentos_id=".$_POST['id']);
            $departamentos = Departamento::find($id);
            $html = "";
            foreach ($departamentos as $value)
                $html.="<option value='".$value['id']."'>".$value['nombre']."</option>";

            echo $html;
        endif;*/
    //}

    /*public function getStates($id)
    {
        $states = DB::table("states")->where("countries_id",$id)->pluck("name","id");
        return json_encode($states);
    }*/

    public function getDepartamentos($id)
    {
        $states = DB::table("departamentos")->where("pais_id", $id)->pluck("nombre", "id");
        return json_encode($states);
    }


}
