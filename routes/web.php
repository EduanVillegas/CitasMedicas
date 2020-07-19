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

Route::get('/', function () {
    return view('contenido/main');
});
Route::get('secretaria/index', 'UsuarioController@index');
Route::post('secretaria/store', 'UsuarioController@store');
Route::get('secretaria/edit/{id}', 'UsuarioController@edit');
Route::put("secretaria/update/{id}","UsuarioController@update");
Route::delete("secretaria/delete/{id}","UsuarioController@destroy");

Route::get('consultorio/index', 'ConsultorioController@index');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
