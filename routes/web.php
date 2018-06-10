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
    return view('welcome');
});

// Route resources
Route::resources([
	'roles' 			=> 'RolesController',
	'usuarios' 			=> 'UsuariosController',
	'creditoclientes' 	=> 'CreditoClientesController',
	'tiposvehiculos' 	=> 'TiposVehiculosController',
	'marcas' 			=> 'MarcasController',
	'modelos' 			=> 'ModelosController',
	'tiposcombustibles' => 'TiposCombustiblesController',
	'vehiculos' 		=> 'VehiculosController',
	'inspeccion' 		=> 'InspeccionController',
	'renta' 			=> 'RentaController'
]);

Route::get('/roles/{id}/delete', 'RolesController@destroy')->name('roles.destroy');
Route::get('/usuarios/{id}/delete', 'UsuariosController@destroy')->name('usuarios.destroy');
Route::get('/creditoclientes/{id}/delete', 'CreditoClientesController@destroy')->name('creditoclientes.destroy');
Route::get('/tiposvehiculos/{id}/delete', 'TiposVehiculosController@destroy')->name('tiposvehiculos.destroy');
Route::get('/marcas/{id}/delete', 'MarcasController@destroy')->name('marcas.destroy');
Route::get('/modelos/{id}/delete', 'ModelosController@destroy')->name('modelos.destroy');
Route::get('/tiposcombustibles/{id}/delete', 'TiposCombustiblesController@destroy')->name('tiposcombustibles.destroy');
Route::get('/vehiculos/{id}/delete', 'VehiculosController@destroy')->name('vehiculos.destroy');
Route::get('/inspeccion/{id}/delete', 'InspeccionController@destroy')->name('inspeccion.destroy');
Route::get('/renta/{id}/delete', 'RentaController@destroy')->name('renta.destroy');