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
Route::group(['middleware'=>['guest']],function(){
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});
 

Route::group(['middleware'=>['auth']],function(){
    
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/main', function () {
        return view('content/content');
    })->name('main');
    
    Route::group(['middleware' => ['Almacenero']], function () {
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
        Route :: get('/articulo/buscarArticulo','ArticuloController@buscarArticulo');
        Route :: get('/articulo/listarArticulo','ArticuloController@listarArticulo');

        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

        Route::get('/ingreso', 'IngresoController@index');
        Route :: post('/ingreso/registrar','IngresoController@store');
        Route :: put('/ingreso/desactivar','IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');

    });
    
    Route::group(['middleware' => ['Vendedor']], function () {
        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');
        Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');

        Route :: get('/articulo/buscarArticuloVenta','ArticuloController@buscarArticuloVenta');
        Route :: get('/articulo/listarArticuloVenta','ArticuloController@listarArticuloVenta');
        
        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
    });

    Route::group(['middleware' => ['Administrador']], function () {
        Route :: get('/categoria','CategoriaController@index');
        Route :: post('/categoria/registrar','CategoriaController@store');
        Route :: put('/categoria/actualizar','CategoriaController@update');
        Route :: put('/categoria/cambiarCondicion','CategoriaController@cambiarCondicion');
        Route :: get('/categoria/selectCategoria','CategoriaController@selectCategoria');

        Route :: get('/articulo','ArticuloController@index');
        Route :: post('/articulo/registrar','ArticuloController@store');
        Route :: put('/articulo/actualizar','ArticuloController@update');
        Route :: put('/articulo/cambiarCondicion','ArticuloController@cambiarCondicion');
        Route :: get('/articulo/buscarArticulo','ArticuloController@buscarArticulo');
        Route :: get('/articulo/listarArticulo','ArticuloController@listarArticulo');
        Route :: get('/articulo/buscarArticuloVenta','ArticuloController@buscarArticuloVenta');
        Route :: get('/articulo/listarArticuloVenta','ArticuloController@listarArticuloVenta');

        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');
        Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');

        Route::get('/rol', 'RolController@index');
        Route::get('/rol/selectRol', 'RolController@selectRol');
        
        Route :: get('/user','UserController@index');
        Route :: post('/user/registrar','UserController@store');
        Route :: put('/user/actualizar','UserController@update');
        Route :: put('/user/desactivarActivar','UserController@desactivarActivar');

        Route::get('/ingreso', 'IngresoController@index');
        Route :: post('/ingreso/registrar','IngresoController@store');
        Route :: put('/ingreso/desactivar','IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');

        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
    });
    
});


//Auth::routes();
//Route::get('/', 'Auth\LoginController@showLoginForm');
//Route::post('/login', 'Auth\LoginController@login')->name('login');
//Route::get('/home', 'HomeController@index')->name('home');
