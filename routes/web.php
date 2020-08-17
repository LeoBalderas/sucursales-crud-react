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
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

// Auth::routes();

Route::post('registerjwt', 'UserController@register');
Route::post('loginjwt', 'UserController@authenticate');
Route::post('logout', 'UserController@logOut');
Route::get('test', 'UserController@test');


Route::get('/', 'AppController@inicio');
Route::resource('/marcas', 'MarcaController');

// PÁGINA PARA GESTIONAR LAS SUCURSALES (CRUD)
Route::get('gestor/sucursales', 'SucursalController@index');

Route::get('/home', 'HomeController@index')->name('home');
