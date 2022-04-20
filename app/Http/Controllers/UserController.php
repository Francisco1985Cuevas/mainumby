<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



/*
Laravel incluye un ORM llamado Eloquent, el cual nos permite abstraer aún más las
operaciones de base de datos, puesto que podemos interactuar con «Modelos» (representados
por clases y objetos de PHP) en vez de tener que escribir sentencias SQL manualmente.
*/
// import de las clases: User, Persona
use App\User;
use App\Persona;



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
//use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public $listaPersonas;

    // Constructor
    /**
     * __construct()
     * el array de lista de personas se utiliza en varias partes, entonces
     * se crea este metodo constructor con el proposito de crear una sola vez
     * la variable $listaPersonas e inicializarla con los datos correspondientes.
     *
     */
    public function __construct(){
        $this->listaPersonas = Persona::orderBy('primer_nombre')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('user.list', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', ['listaPersonas' =>  $this->listaPersonas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['name' => 'required|min:2|max:255|unique:users',
                            'email' => 'required|email|unique:users'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El campo <b>:attribute</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.',
                            'email' => '<b>:attribute</b> no es un correo válido.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre',
                            'email' => 'correo electrónico'
                        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.

        // Creacion de registros utilizando Eloquent ORM, se hizo import de la clase(Model:User) al
        // principio de este archivo para poder para poder utilizarlo sin necesidad de hacer
        // referencia a su nombre de espacio completo.
        User::create(['name' => $request['name'],
                            'email' => $request['email'],
                            'persona_id' => $request['persona_id'],
                            'password' => $request['password']
                            ]);

        Session::flash('validated', true);
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('user.create', ['listaPersonas' => $this->listaPersonas]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener el Usuario que corresponda con el ID dado (o null si no es encontrado).
        $usuario = User::find($id);
        return view('user.show', ['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtener el Usuario que corresponda con el ID dado (o null si no es encontrado).
        $usuario = User::find($id);
        return view('user.edit', ['usuario' => $usuario,
                                            'listaPersonas' => $this->listaPersonas]);
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
        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['name' => 'required|min:2|max:255|unique:users,name,'.$id,
                            'email' => 'required|email|unique:users'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El campo <b>:attribute</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.',
                            'email' => '<b>:attribute</b> no es un correo válido.'
                        ],
                        //atributes
                        ['name' => 'Nombre',
                            'email' => 'correo electrónico'
                        ]);

        // Si pasa las reglas de validación, proceder a actualizar registro.

        // Obtener el Usuario que corresponda con el ID dado (o null si no es encontrado).
        $usuario = User::find($id);
        $usuario->fill(['name' => $request['name'],
                        'email' => $request['email'],
                        'persona_id' => $request['persona_id']
                        ]);
        $usuario->save();

        Session::flash('validated', true);
        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');

        return view('user.edit', ['usuario' => $usuario,
                                    'listaPersonas' => $this->listaPersonas
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
        //Obtener el Usuario que corresponda con el ID dado (o null si no es encontrado).
        //$usuario = User::withCount('persona')->find($id);
        //if ($usuario->personas_count > 0) {
            //Session::flash('message', 'El Registro No se puede eliminar de la Base de Datos porque tiene registros de Personas que estan relacionados, Verifique!');
            //Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        //}else {
            $usuario = User::find($id);
            $usuario->delete();
            Session::flash('validated', true);
            Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
            Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        //}

        return Redirect::to('/usuarios');
    }
}
