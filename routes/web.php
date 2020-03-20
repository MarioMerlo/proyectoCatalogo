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



##########################
##### CRUD DE MARCAS #####
##########################

Route::get('/adminMarcas', 'MarcaController@index');
Route::get('/agregarMarca', 'MarcaController@create');
Route::post('/agregarMarca', 'MarcaController@store');


##########################
#### CRUD DE USUARIOS ####
##########################

Route::get('/adminUsuarios', 'UsuarioController@index');


##########################
#### CRUD DE PRODUCTOS ###
##########################

Route::get('/adminProductos', 'ProductoController@index');
Route::get('/agregarProducto', 'ProductoController@create');

