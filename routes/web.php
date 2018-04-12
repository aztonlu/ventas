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
    return view('auth/login');//originalmente era welcome
});

Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/articulo','ArticuloController');
Route::resource('ventas/cliente','ClienteController');
Route::resource('compras/proveedor','ProveedorController');
Route::resource('compras/ingreso','IngresoController');
Route::resource('ventas/venta','VentaController');
Route::get('/getExport','ExcelController@getExport');

Auth::routes();
Route::get('/logout','Auth\LoginController@logout');
Route::resource('seguridad/usuario','UsuarioController');

Route::get('/home', 'HomeController@index')->name('home');//era todo /home y despues 'home'
Route::get('/{slug?}', 'HomeController@index');
