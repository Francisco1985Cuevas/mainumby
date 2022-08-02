<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('paises', 'PaisController');

Route::resource('regiones', 'RegionController');
Route::get('regiones/findByPais/{id}','RegionController@findByPais');

Route::resource('departamentos', 'DepartamentoController');
Route::get('departamentos/findByRegion/{id}','DepartamentoController@findByRegion');
Route::get('departamentos/findByRegionByPais/{id}','DepartamentoController@findByRegionByPais');

Route::resource('ciudades', 'CiudadController');
Route::get('ciudades/findByDepartamento/{id}','CiudadController@findByDepartamento');

Route::resource('barrios', 'BarrioController');

Route::resource('tiposdirecciones', 'TipoDireccionController');

Route::resource('tiposcontactos', 'TipoContactoController');

Route::resource('tipospersonas', 'TipoPersonaController');

Route::resource('tiposdocumentos', 'TipoDocumentoController');

Route::resource('personas', 'PersonaController');

Route::resource('direcciones', 'DireccionController');

Route::resource('contactos', 'ContactoController');

Route::resource('emails', 'EmailController');

Route::resource('documentos', 'DocumentoController');

Route::resource('tiposemails', 'TipoEmailController');

Route::resource('emails', 'EmailController');

Route::resource('nacionalidades', 'NacionalidadController');

Route::resource('usuarios', 'UserController');

Route::resource('roles', 'RolController');

Route::resource('monedas', 'MonedaController');

Route::resource('periodosfiscales', 'PeriodoFiscalController');

//Route::get('/list', 'DepartamentoController@list');
//Route::get('/list','PersonaController@list');
//Route::post('/listDepartamentos', 'DepartamentoController@listDepartamentos');
//Route::get('listDepartamentos','PersonaController@listDepartamentos');
//Route::resource('personas/listDepartamentos', 'PersonaController@listDepartamentos');
//Route::get('personas/listDepartamentos', 'PersonaController@listDepartamentos');
//Route::get('/personas/listDepartamentos', 'PersonaController@listDepartamentos');
//Route::get('/listDepartamentos', 'PersonaController@listDepartamentos');

//Route::get('dropdownlist','DataController@getCountries');
//Route::get('dropdownlist/getstates/{id}','DataController@getStates');
//Route::get('dropdownlist','DataController@getCountries');
//Route::get('dropdownlist/getdepartamentos/{id}','PersonaController@getDepartamentos');
//Route::get('getdepartamentos/{id}','PersonaController@getDepartamentos');

//Route::get('dropdownlist','DataController@getCountries');
//Route::get('dropdownlist/getstates/{id}','DataController@getStates');

Route::get('dropdownlist/DepartamentosPais/{id}','DataController@DepartamentosPais');
//Route::get('http://127.0.0.1:8000/dropdownlist/getdepartamentos/{id}','DataController@getDepartamentos');
Route::get('dropdownlist/CiudadesDepartamento/{id}','DataController@CiudadesDepartamento');
Route::get('dropdownlist/BarriosCiudad/{id}','DataController@BarriosCiudad');



