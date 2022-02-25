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
use App\Departamento;//NO SE USA



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



class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $paises = Pais::all();
        //foreach ($paises as $pais) {
        //    echo $pais->nombre;
        //}
        return view('pais.list', ['paises' => $paises]);


        /*
        $paises = Pais::withCount('departamentos')->get();
        return view('pais.list', ['paises' => $paises]);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pais.create');
    }

    /**
     * Create a new pais instance.
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
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
                        ['nombre' => 'required|min:2|max:255|unique:paises',
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            //'unique' => 'El <b>Nombre de Pais</b> que ingreso ya ha sido registrado.',
                            'unique' => 'El <b>:attribute</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a insertar nuevo registro.

        // Creacion de registros utilizando Eloquent ORM, se hizo import de la clase(Model:Pais) al
        // principio de este archivo para poder para poder utilizarlo sin necesidad de hacer
        // referencia a su nombre de espacio completo.
        Pais::create(['nombre' => $request['nombre'],
                            'abreviatura' => $request['abreviatura']
                        ]);
        Session::flash('validated', true);
        Session::flash('message', 'El Nuevo Registro Ingresado, se guardo Exitosamente en la Base de Datos!');

        return view('pais.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener el Pais que corresponda con el ID dado (o null si no es encontrado).
        $pais = Pais::find($id);
        return view('pais.show', ['pais' => $pais]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtener el Pais que corresponda con el ID dado (o null si no es encontrado).
        $pais = Pais::find($id);
        return view('pais.edit', ['pais' => $pais]);
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
                        ['nombre' => 'required|min:2|max:255|unique:paises,nombre,'.$id,
                            'abreviatura' => 'max:3'
                        ],
                        //messages
                        ['required' => 'El campo <b>:attribute</b> es obligatorio.',
                            //'unique' => 'El <b>Nombre de Pais</b> que ingreso ya ha sido registrado.',
                            'unique' => 'El <b>:attribute</b> que ingreso ya ha sido registrado.',
                            'max' => 'El campo <b>:attribute</b> no debe ser mayor que :max caracteres.',
                            'min' => 'El campo <b>:attribute</b> debe contener al menos :min caracteres.'
                        ],
                        //atributes
                        ['nombre' => 'Nombre',
                            'abreviatura' => 'Abreviatura'
                        ]);

        // Si pasa las reglas de validación, proceder a actualizar registro.

       // Obtener el Pais que corresponda con el ID dado (o null si no es encontrado).
        $pais = Pais::find($id);
        $pais-> fill(['nombre' => $request['nombre'],
                        'abreviatura' => $request['abreviatura']
                    ]);
        $pais-> save();

        Session::flash('validated', true);
        Session::flash('message', 'El Registro se Actualizo Exitosamente en la Base de Datos!');
        return view('pais.edit', ['pais' => $pais]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //// Obtener el Pais que corresponda con el ID dado (o null si no es encontrado).
        //$pais = Pais::find($id);
        //$pais->delete();

        //Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        //Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar

        //return Redirect::to('/paises');


        ////Validar que No existan Departamentos relacionados con el Pais que se trata de eliminar.
        //$departamentos = Departamento::where('pais_id', $id)->get();
        //if (count($departamentos) > 0) {
        //    Session::flash('message', 'No se puede eliminar este registro porque tiene asociado Departamentos, Verifique!');
        //    Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        //} else {
        //   // Obtener el Pais que corresponda con el ID dado (o null si no es encontrado).
        //    $pais = Pais::find($id);
        //    $pais->delete();
        //    Session::flash('validated', true);
        //    Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
        //    Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        //}
        //return Redirect::to('/paises');


        //Obtener el Pais que corresponda con el ID dado (o null si no es encontrado).
        //$pais = Pais::withCount('departamentos')->findOrFail($id);
        //$pais = Pais::withCount('departamentos')->find($id);
        $pais = Pais::withCount('regiones')->find($id);
        //if ($pais->departamentos_count > 0) {
        if ($pais->regiones_count > 0) {
            Session::flash('message', 'El Registro No se puede eliminar de la Base de Datos porque tiene registros de Regiones que estan relacionados, Verifique!');
            Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        }else {
            $pais->delete();
            Session::flash('validated', true);
            Session::flash('message', 'El Registro se elimino exitosamente de la Base de datos!');
            Session::flash('mostrar_en_listado', true);//solo le doy un valor de true para probar
        }

        return Redirect::to('/paises');
    }

}
