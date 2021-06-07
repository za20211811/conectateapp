<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => ['cors']], function () {
    Route::post('auth/login', 'AuthController@login');
    Route::post('auth/logout', 'AuthController@logout');
    Route::post('auth/me', 'AuthController@me');
});
Route::group(['middleware' => ['auth.jwt']], function() {
    Route::resource('favoritos','FavoritosController',['except'=>['index','create','edit','update','destroy']]);
    Route::post('favoritos/quitar','FavoritosController@quitar');
});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::resource('usuarios','UsuariosController',['except'=>['index','create','edit','destroy']]);
Route::resource('enfermedades','EnfermedadesController',['except'=>['create','edit','destroy']]);
Route::get('enfermedades/listado/{tipo}','EnfermedadesController@listado');
Route::get('enfermedades/buscar/{tipo}','EnfermedadesController@buscar');
Route::resource('subenfermedades','SubEnfermedadesController',['except'=>['create','edit','destroy']]);
Route::resource('tipos','TiposEnfermedadesController',['except'=>['create','edit','destroy']]);

