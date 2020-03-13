<?php

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
    //return view('welcome');
    return view('index');
});


##########################
### CRUD DE CATEGORÍAS ###
##########################

Route::get('/adminCategorias', 'CategoriaController@index'); // indico petición luego el controlador, y luego de la @ el método al que llamo.

Route::get('/adminMarcas', 'MarcaController@index');

Route::get('/adminUsuarios', 'UsuarioController@index');
