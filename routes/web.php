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
    return view('content/content');
});

Route :: get('/categoria','CategoriaController@index');
Route :: post('/categoria/registrar','CategoriaController@store');
Route :: put('/categoria/actualizar','CategoriaController@update');
//Route :: put('/categoria/desactivar','CategoriaController@desactivar');
//Route :: put('/categoria/activar','CategoriaController@activar');
Route :: put('/categoria/cambiarCondicion','CategoriaController@cambiarCondicion');
Route :: get('/categoria/selectCategoria','CategoriaController@selectCategoria');

Route :: get('/articulo','ArticuloController@index');
Route :: post('/articulo/registrar','ArticuloController@store');
Route :: put('/articulo/actualizar','ArticuloController@update');
Route :: put('/articulo/cambiarCondicion','ArticuloController@cambiarCondicion');

Route::get('/cliente', 'ClienteController@index');
Route::post('/cliente/registrar', 'ClienteController@store');
Route::put('/cliente/actualizar', 'ClienteController@update');