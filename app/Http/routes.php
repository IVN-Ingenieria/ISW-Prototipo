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

Route::get('/', 'Prototipo@index');
Route::post('store', 'Prototipo@store');
Route::get('delete/{id}', 'Prototipo@destroy');








































Route::get('siete/{p1}/{p2}', 'Siete@ocho');

Route::get('sobrino/{parametro}', 'Siete@show');