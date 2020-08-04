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
Route::post("secretaria/update/{id}","SecretariaController@update");
Route::delete("secretaria/delete/{id}","SecretariaController@destroy");

Route::get('consultorio/index', 'ConsultorioController@index');
Route::post('consultorio/store', 'ConsultorioController@store');
Route::get('consultorio/edit/{id}', 'ConsultorioController@edit');
Route::put("consultorio/update/{id}","ConsultorioController@update");
Route::delete("consultorio/delete/{id}","ConsultorioController@destroy");

Route::get('doctor/index', 'DoctorController@index');
Route::post('doctor/store', 'DoctorController@store');
Route::get('doctor/edit/{id}', 'DoctorController@edit');
Route::post("doctor/update/{id}","DoctorController@update");
Route::delete("doctor/delete/{id}","DoctorController@destroy");

Route::get('paciente/index', 'PacienteController@index');
Route::post('paciente/store', 'PacienteController@store');
Route::get('paciente/edit/{id}', 'PacienteController@edit');
Route::post("paciente/update/{id}","PacienteController@update");
Route::delete("paciente/delete/{id}","PacienteController@destroy");

Route::get('agenda/index', 'AgendaController@index');
Route::post('agenda/store', 'AgendaController@store');
Route::get('agenda/edit/{id}', 'AgendaController@edit');
Route::post("agenda/update/{id}","AgendaController@update");
Route::delete("agenda/delete/{id}","AgendaController@destroy");
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
