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