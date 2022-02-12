<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



/*
Laravel incluye un ORM llamado Eloquent, el cual nos permite abstraer aún más las
operaciones de base de datos, puesto que podemos interactuar con «Modelos» (representados
por clases y objetos de PHP) en vez de tener que escribir sentencias SQL manualmente.
*/
// import de las clases: Pais
use App\Pais;
use App\Departamento;
use App\Ciudad;
use App\Barrio;

/*
Las Facades proveen una interfaz «estática» a las clases disponibles en el contenedor de servicios de la aplicación.
Todas las facades de Laravel se definen en el namespace Illuminate\Support\Facades.
DB = Database: Query Builder
El generador de consultas de base de datos de Laravel proporciona una interfaz cómoda y fluida para crear y
ejecutar consultas de base de datos. Se puede utilizar para realizar la mayoría de las operaciones de base
de datos en su aplicación y funciona en todos los sistemas de base de datos compatibles.
*/
//use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    //
    //use DB;

    /*public function getCountries()
    {
        $countries = DB::table('countries')->pluck("name","id");
        return view('dropdown',compact('countries'));
    }*/

    /*public function getStates($id)
    {
        $states = DB::table("states")->where("countries_id",$id)->pluck("name","id");
        return json_encode($states);
    }*/

    public function DepartamentosPais($id)
    {
        $departamentos = Departamento::where('pais_id', $id)
                                        ->orderBy('nombre', 'desc')
                                        ->get();
        return json_encode($departamentos);
    }

    public function CiudadesDepartamento($id)
    {
        $ciudades = Ciudad::where('departamento_id', $id)
                                        ->orderBy('nombre', 'desc')
                                        ->get();
        return json_encode($ciudades);
    }

    public function BarriosCiudad($id)
    {
        $barrios = Barrio::where('ciudad_id', $id)
                                        ->orderBy('nombre', 'desc')
                                        ->get();
        return json_encode($barrios);
    }

}
