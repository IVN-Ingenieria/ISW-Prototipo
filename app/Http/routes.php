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

Route::get('/', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('home', 'HomeController@index');

Route::get('report', ['uses'=>'Reportes@index', 'middleware' => 'auth']);
Route::get('report/list', ['uses'=>'Reportes@index', 'middleware' => 'auth']);
Route::get('report/generate/todos', ['uses'=>'Reportes@generate_all', 'middleware' => 'auth']);
Route::get('report/generate/{id}', ['uses'=>'Reportes@generate', 'as'=>'reporte', 'middleware' => 'auth']);
Route::get('report/show/{id}', ['uses' => 'Reportes@show', 'as' => 'show-report', 'middleware' => 'auth']);

Route::get('report/xml', ['uses' => 'Reportes@xmlReport', 'as' => 'xml-report', 'middleware' => 'auth']);

Route::resource('afp','AfpController');


Route::get('lista', 'ControladorTrabajadores@index');
Route::get('lista/crear', 'ControladorTrabajadores@create');
Route::get('lista/ver/{id}', 'ControladorTrabajadores@show');
Route::post('lista', 'ControladorTrabajadores@store');

Route::get('usuarios/crear', 'UsuariosController@create');
Route::get('usuarios/mostrar', 'UsuariosController@show');
Route::get('usuarios/actualizar', 'UsuariosController@update');
Route::get('usuarios/borrar', 'UsuariosController@delete');

Route::resource('usuarios','UsuariosController');