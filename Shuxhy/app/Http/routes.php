<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

 // lo primero es el enlace que se usara para acceder que esta en view lo segundo es el controlador que usara esta ruta hay que hace uno para cada ruta

Route::resource('almacen/cliente','ClienteController');

Route::resource('almacen/suplidor','SuplidorController');

Route::resource('almacen/producto','ProductoController');

Route::resource('almacen/pedido','PedidoController');

Route::resource('almacen/factura','FacturaController');

Route::resource('almacen/compra','CompraController');

Route::resource('almacen/material','MaterialController');

Route::resource('almacen/combo','ComboController');

Route::resource('almacen/receta','RecetaController');

Route::resource('administracion/usuario','UsuarioController');

Route::resource('administracion/forma','FormaController');

Route::resource('administracion/unidad','UnidadController');

Route::resource('administracion/relleno','RellenoController');

Route::resource('administracion/topping','ToppingController');

Route::resource('administracion/sabor','SaborController');

Route::get('reportes/ventas','ReporteController@create');

Route::resource('almacen/produccion','ProduccionController');

Route::resource('almacen/inventario','InventarioController');

Route::post('reportes/ventas', 'ReporteController@displayReport');

Route::get('reportes/produccion','ReporteProdController@create');

Route::post('reportes/produccion', 'ReporteProdController@displayReport');

Route::get('reportes/ganancias','ReporteGanController@create');

Route::post('reportes/ganancias', 'ReporteGanController@displayReport');
#Route::resource('reportes/ventas','ReporteController');

Route::auth();

Route::get('/index', function () {
	return view ('index');
});

Route::get('/menu', function () {
	return view ('menu');
});

Route::get('/welcome', function () {
	return view ('welcome');
});

Route::get('/menu1', function () {
	return view ('menu1');
});





