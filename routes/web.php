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
Route::get('secretaria/index', 'UsuarioController@index')->name('usuario_listar');
Route::post('secretaria/store', 'UsuarioController@store');
Route::get('secretaria/show', 'UsuarioController@show');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
