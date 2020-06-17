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

// PÁGINA WEB
Route::get('/', 'AppController@inicio');
Route::resource('/marcas', 'MarcaController');

// PÁGINA PARA GESTIONAR LAS SUCURSALES (CRUD)
Route::get('gestor/sucursales', function () {
    return view('pages.sucursales');
});