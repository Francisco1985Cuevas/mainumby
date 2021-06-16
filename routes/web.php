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

Route::resource('departamentos', 'DepartamentoController');

Route::resource('ciudades', 'CiudadController');

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
