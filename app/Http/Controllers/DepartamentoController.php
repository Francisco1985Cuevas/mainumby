<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



/*
Laravel incluye un ORM llamado Eloquent, el cual nos permite abstraer aún más las
operaciones de base de datos, puesto que podemos interactuar con «Modelos» (representados
por clases y objetos de PHP) en vez de tener que escribir sentencias SQL manualmente.
*/
// import de las clases: Pais, Departamento
use App\Pais;
use App\Departamento;



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



class DepartamentoController extends Controller
{
    public $lista_paises;

    // Constructor
    /**
     * __construct()
     * el array de lista de paises se utiliza en varias partes, entonces
     * se crea este metodo constructor con el proposito de crear una sola vez
     * la variable $list_paises e inicializarla con los datos correspondientes.
     *
     */
    public function __construct(){
        //$this->list_paises = \App\Pais::orderBy('nombre')->pluck('nombre', 'id');
        $this->lista_paises = Pais::orderBy('nombre')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamento.list', ['departamentos' => $departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.create', ['lista_paises' =>  $this->lista_paises]);
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
                        ['nombre' => 'required|min:2|max:255|unique:departamentos',
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El campo <b>:attribute</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.

        // Creacion de registros utilizando Eloquent ORM, se hizo import de la clase(Model:Departamento) al
        // principio de este archivo para poder para poder utilizarlo sin necesidad de hacer
        // referencia a su nombre de espacio completo.
        Departamento::create(['nombre' => $request['nombre'],
                                'abreviatura' => $request['abreviatura'],
                                'region_id' => $request['region_id']
                            ]);

        Session::flash('validated', true);
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('departamento.create', ['lista_paises' => $this->lista_paises]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener el Departamento que corresponda con el ID dado (o null si no es encontrado).
        $departamento = Departamento::find($id);
        return view('departamento.show', ['departamento' => $departamento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtener el Departamento que corresponda con el ID dado (o null si no es encontrado).
        $departamento = Departamento::find($id);
        return view('departamento.edit', ['departamento' => $departamento,
                                            'lista_paises' => $this->lista_paises]);
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
                        ['nombre' => 'required|min:2|max:255|unique:departamentos,nombre,'.$id,
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El campo <b>:attribute</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a actualizar registro.

        // Obtener el Departamento que corresponda con el ID dado (o null si no es encontrado).
        $departamento = Departamento::find($id);
        $departamento-> fill(['nombre' => $request['nombre'],
                                'abreviatura' => $request['abreviatura'],
                                'region_id' => $request['region_id']
                            ]);
        $departamento-> save();

        Session::flash('validated', true);
        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');

        return view('departamento.edit', ['departamento' => $departamento,
                                            'lista_paises' => $this->lista_paises
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
        //Obtener el Departamento que corresponda con el ID dado (o null si no es encontrado).
        //EL REGISTRO NO SE PUDO ELIMINAR DE LA BASE DE DATOS PORQUE CONTIENE REGISTROS DE CIUDADES QUE ESTAN RELACIONADOS, VERIFIQUE!
        $departamento = Departamento::withCount('ciudades')->find($id);
        if ($departamento->ciudades_count > 0) {
            Session::flash('message', 'El Registro No se puede eliminar de la Base de Datos porque tiene registros de Ciudades que estan relacionados, Verifique!');
            Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        }else {
            $departamento->delete();
            Session::flash('validated', true);
            Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
            Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        }

        return Redirect::to('/departamentos');
    }

    /**
     * Display a listing of the resource filter by Region.
     *
     * @return \Illuminate\Http\Response
     */
    public function findByRegion($id)
    {
        $departamentos = Departamento::where('region_id', $id)
                            ->orderBy('nombre', 'desc')
                            ->get();
        return json_encode($departamentos);
    }

    /*public function list($id)
    {
        //echo "im in AjaxController index";
        if (isset($id)) {
            // Obtener los Departamentos que correspondan con el ID dado (o null si no es encontrado).
            $departamentos = Departamento::find($id);

            return response()->json(['departamentos'=>$departamentos, 'succes'=>true]);
        } else {
            return response()->json(['succes'=>false]);
        }
    }*/

}
