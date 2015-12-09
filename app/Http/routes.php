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

//Route::get('/', 'Prototipo@index');
Route::get('/', 'HomeController@index');
Route::post('store', 'Prototipo@store');
Route::get('delete/{id}', 'Prototipo@destroy');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('home', 'HomeController@index');

Route::get('reportes', 'Reportes@index');
Route::get('reportes/{id}', ['uses'=>'Reportes@generate', 'as'=>'reporte']);