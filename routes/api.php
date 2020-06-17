<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Rutas API para el gestor de sucursales, utilizando el controlador SucursalController.abnf

// Listar las sucursales
Route::get('sucursales/list','SucursalController@getAll');
// Crear una sucursal
Route::post('sucursal/create','SucursalController@create');
// Actualizar una sucursal
Route::patch('sucursal/update/{sucursal}','SucursalController@update');
// Eliminar una sucursal
Route::delete('sucursal/delete/{id}','SucursalController@delete');
