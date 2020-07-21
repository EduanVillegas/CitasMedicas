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
Route::get('secretaria/index', 'SecretariaController@index');
Route::post('secretaria/store', 'SecretariaController@store');
Route::get('secretaria/edit/{id}', 'SecretariaController@edit');
Route::put("secretaria/update/{id}","SecretariaController@update");
Route::delete("secretaria/delete/{id}","SecretariaController@destroy");

Route::get('consultorio/index', 'ConsultorioController@index');
Route::post('consultorio/store', 'ConsultorioController@store');
Route::get('consultorio/edit/{id}', 'ConsultorioController@edit');
Route::put("consultorio/update/{id}","ConsultorioController@update");
Route::delete("consultorio/delete/{id}","ConsultorioController@destroy");
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
