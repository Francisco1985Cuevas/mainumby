<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
Laravel incluye un ORM llamado Eloquent, el cual nos permite abstraer aún más las
operaciones de base de datos, puesto que podemos interactuar con «Modelos» (representados
por clases y objetos de PHP) en vez de tener que escribir sentencias SQL manualmente.
*/
// import de las clases: Email, Persona, TipoEmail
use App\Email;
use App\Persona;
use App\TipoEmail;



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
// use Illuminate\Support\Facades\DB;



//use IlluminateValidationRule;
class EmailController extends Controller
{
    public $lista_personas;
    public $lista_tiposEmails;

    /**
     *
     * Inicializar todas las listas de valores usadas en diferentes metodos del controller.
     */
    public function __construct(){
        //$this->lista_personas = Persona::all();
        $this->lista_personas = Persona::where('tipo_persona', 'F')
                                    ->orderBy('nombres', 'asc')
                                    ->get();

        $this->lista_tiposEmails = TipoEmail::orderBy('nombre')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$emails = DB::table('emails')
                            ->select('emails.*', 'personas.nombres as persona_nombres', 'tipos_emails.nombre as tipo_email_desc')
                            ->leftJoin('personas', 'emails.persona', '=', 'personas.id')
                            ->leftJoin('tipos_emails', 'emails.tipo_email_id', '=', 'tipos_emails.id')
                            ->get();*/

        // Se Obtienen registros utilizando Eloquent ORM. Obtener todos los Emails
        // de la tabla Emails.
        $emails = Email::all();
        //return view('email.list', compact('emails'));
        return view('email.list', ['emails' => $emails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('email.create', ['lista_personas' => $this->lista_personas,
                                        'lista_tiposEmails' =>  $this->lista_tiposEmails]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        //ESTE CODIGO ERA EL PRIMERO, ORIGINAL, DE ESTA FORMA YA ANDABA...
        // Primero, validar campos del form.
        // sino hay error, proceder a insertar nuevo registro en la BD.
        \App\Email::create([ 'persona_id' => $request['persona_id'],
                                'tipo_email_id' => $request['tipo_email_id'],
                                'descripcion' => $request['descripcion'],
                                'comentario' => $request['comentario']
                                ]);
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');
        return view('email.create', ['list_personas' => $this->personas,
                                        'list_tiposEmails' => $this->tiposEmails]);
        */



        //PRUEBAS DE VALIDACIONES FALLIDAS PARA LOS CAMPOS UNIQUE(persona_id, tipo_email_id, descripcion)
        /*
        //echo 'persona_id '.$request['persona_id']."<br>";
        //echo 'tipo_email_id '.$request['tipo_email_id']."<br>";
        // lógica para validar campos del formulario.
        $this->validate($request,
        //rules
        [//'nombre' => 'required|min:2|max:60|unique:tipos_emails',
            //'abreviatura' => 'max:3',
            'descripcion' => 'required|min:2|max:60',
            //'persona_id' => 'unique:emails,persona_id,' . $request['persona_id'] . ',id,tipo_email_id,' . $request['tipo_email_id'], //validando campo unico compuesto
            //'persona_id' => 'unique:emails,persona_id,'.$request['persona_id'].',id,tipo_email_id,'.$request['tipo_email_id'],

            //'persona_id' => 'unique:emails,persona_id,'.$request['persona_id'].',id,tipo_email_id,'.$request['tipo_email_id'],

            //"persona_id" => [  Rule::unique("emails")->where(function ($query) {
            //                return $query->where("persona_id", $request->persona_id);
            //            })
            //        ],
            //"tipo_email_id" => [ Rule::unique("emails")->where(function ($query) {
            //                return $query->where("tipo_email_id", $request->tipo_email_id);
            //            })
            //        ]

        ],
        //messages
        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
            'unique' => 'La <b>:attribute</b> que ingreso ya ha sido registrada.',
            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
        ],
        //atributes
        [//'nombre' => 'Descripci&oacute;n',
            //'abreviatura' => 'Abreviatura'
            'persona_id' => 'Persona',
            'descripcion' => 'Descripci&oacute;n',
        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.
        */


        /*
        $validar_update = $this->get('id_persona') > 0 ? $this->get('id_persona') : "NULL";
        return ['tipo_identificacion' => 'required|in:N,E,P',
                'numero_identificacion' => 'required|min:4|max:50',
                'numero_identificacion' => 'unique:personas,numero_identificacion,' . $validar_update . ',id,tipo_identificacion,' . $this->get('tipo_identificacion'), //validando campo unico compuesto
                'nombre' => 'required|min:2|max:100',
                'apellido' => 'required|min:2|max:100',
                'sexo' => 'required|in:M,F',
                'fecha_nacimiento' => 'required|min:10|date'
        ];
        */

        /*
        $validatedData = $request->validate([   "user_id" => ["required",
                                                                Rule::unique("users_groups")->where(function ($query) {
                                                                    return $query->where("group_id", $request->group_id);
                                                                })
                                                            ],
                                                "group_id" => ["required",
                                                                Rule::unique("users_groups")->where(function ($query) {
                                                                    return $query->where("user_id", $request->user_id);
                                                                })
                                                            ]
                                            ]);
        */
        //echo "paso las reglas";
        //PRUEBAS DE VALIDACIONES FALLIDAS PARA LOS CAMPOS UNIQUE(persona_id, tipo_email_id, descripcion)






        // Creacion de registros utilizando Eloquent ORM, se hizo import de la clase(Model:Email) al
        // principio de este archivo para poder para poder utilizarlo sin necesidad de hacer
        // referencia a su nombre de espacio completo.
        Email::create(['persona_id' => $request['persona_id'],
                        'tipo_email_id' => $request['tipo_email_id'],
                        'descripcion' => $request['descripcion'],
                        'comentario' => $request['comentario']
                    ]);

        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('email.create', ['lista_personas' => $this->lista_personas,
                                        'lista_tiposEmails' => $this->lista_tiposEmails]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener el Email que corresponda con el ID dado (o null si no es encontrado).
        //$emails = Email::where('id', '=', $id)->get();
        //return view('email.show')->with('emails', $emails);

        $email = Email::find($id);
        return view('email.show', ['email' => $email]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
        $email = \App\Email::find($id);
        return view('email.edit', ['email' => $email,
                                        'list_personas' => $this->list_personas,
                                        'list_tiposEmails' => $this->list_tiposEmails
                                        ]);
        */

        // Obtener el Email que corresponda con el ID dado (o null si no es encontrado).
        //$email = \App\Email::find($id);
        $email = Email::find($id);
        return view('email.edit', ['email' => $email,
                                    'lista_personas' => $this->lista_personas,
                                    'lista_tiposEmails' => $this->lista_tiposEmails]);
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
        //TODA ESTA VALIDACION PUSE SOLO PARA PODER PROBAR: {{old(campo)}}
        /*
        // lógica para validar campos del formulario.

        $this->validate($request,
        //rules
        ['descripcion' => 'required|min:2|max:60',
        ],
        //messages
        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
            'unique' => 'La <b>:attribute</b> que ingreso ya ha sido registrada.',
            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
        ],
        //atributes
        ['persona_id' => 'Persona',
            'descripcion' => 'Descripci&oacute;n',
        ]);
        */
        //END - TODA ESTA VALIDACION PUSE SOLO PARA PODER PROBAR: {{old(campo)}}


        // Obtener el Email que corresponda con el ID dado (o null si no es encontrado).
        $email = Email::find($id);
        $email-> fill(['persona_id' => $request['persona_id'],
                            'tipo_email_id' => $request['tipo_email_id'],
                            'descripcion' => $request['descripcion'],
                            'comentario' => $request['comentario']
                        ]);
        $email-> save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');

        return view('email.edit', ['email' => $email,
                                        'lista_personas' => $this->lista_personas,
                                        'lista_tiposEmails' => $this->lista_tiposEmails
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
        // Obtener el Email que corresponda con el ID dado (o null si no es encontrado).
        $email = Email::find($id);
        $email->delete();

        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true); //asigno boolean=true para que se pueda visualizar mensaje.

        return Redirect::to('/emails');
    }

}
