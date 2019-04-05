<?php

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
Auth::routes();

Route::get('/', 'ContatoController@lista');

Route::get('/mostra/{id}', 'ContatoController@mostra')->where('id', '[0-9]+');

Route::get('/novo', 'ContatoController@novo');

Route::get('/edita/{id}', 'ContatoController@edita');

Route::post('/adiciona', 'ContatoController@salva');

Route::get('/remove/{id}', 'ContatoController@remove');

Route::get('/telefone/novo/{id}', 'TelefoneController@novo');

Route::post('/telefone/adiciona', 'TelefoneController@salva');

Route::get('/telefone/edita/{id}', 'TelefoneController@edita');

Route::get('/telefone/remove/{id}', 'TelefoneController@remove');