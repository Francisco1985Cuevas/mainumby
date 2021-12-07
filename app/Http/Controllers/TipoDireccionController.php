<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
Laravel incluye un ORM llamado Eloquent, el cual nos permite abstraer aún más las
operaciones de base de datos, puesto que podemos interactuar con «Modelos» (representados
por clases y objetos de PHP) en vez de tener que escribir sentencias SQL manualmente.
*/
// import de la clase: TipoDireccion
use App\TipoDireccion;



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



class TipoDireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Se Obtienen registros utilizando Eloquent ORM. Obtener todos los Tipos Direcciones
        // de la tabla TiposDirecciones.
        $tiposDirecciones = TipoDireccion::all();
        return view('tipoDireccion.list', ['tiposDirecciones' => $tiposDirecciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoDireccion.create');
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
                        ['nombre' => 'required|min:2|max:60|unique:tipos_direcciones',
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El campo <b>:attribute</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Tipo Direcci&oacute;n',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.

        // Creacion de registros utilizando Eloquent ORM, se hizo import de la clase(Model:TipoDireccion) al
        // principio de este archivo para poder para poder utilizarlo sin necesidad de hacer
        // referencia a su nombre de espacio completo.
        TipoDireccion::create(['nombre' => $request['nombre'],
                                'abreviatura' => $request['abreviatura']
                            ]);

        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('tipoDireccion.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener el Tipo Direccion que corresponda con el ID dado (o null si no es encontrado).
        $tipoDireccion = TipoDireccion::find($id);
        return view('tipoDireccion.show', ['tipoDireccion' => $tipoDireccion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtener el Tipo Direccion que corresponda con el ID dado (o null si no es encontrado).
        $tipoDireccion = TipoDireccion::find($id);
        return view('tipoDireccion.edit', ['tipoDireccion' => $tipoDireccion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateTipoDireccionRequest $request, $id)
    public function update(Request $request, $id)
    {
        //convierto previamente los campos a mayusculas, como alguna forma de "unificar" ya
        //que validate() no tiene en cuenta mayusculas ni minusculas y se pueden duplicar registros...
        $request['nombre'] = strtoupper($request['nombre']);
        $request['abreviatura'] = strtoupper($request['abreviatura']);

        // lógica para validar campos del formulario.
        $this->validate($request,
                        //rules
                        ['nombre' => 'required|min:2|max:60|unique:tipos_direcciones,nombre,'.$id,
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            'unique' => 'El campo <b>:attribute</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Tipo Direcci&oacute;n',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a actualizar registro.

        // Obtener el Tipo Direccion que corresponda con el ID dado (o null si no es encontrado).
        $tipoDireccion = TipoDireccion::find($id);
        $tipoDireccion-> fill(['nombre' => $request['nombre'],
                                'abreviatura' => $request['abreviatura']
                            ]);
        $tipoDireccion-> save();

        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');
        return view('tipoDireccion.edit', ['tipoDireccion' => $tipoDireccion]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtener el Tipo Direccion que corresponda con el ID dado (o null si no es encontrado).
        $tipoDireccion = TipoDireccion::find($id);
        $tipoDireccion->delete();

        Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar

        return Redirect::to('/tiposdirecciones');
    }
}
