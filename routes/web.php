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

Route::get('/', function () { return view('welcome'); });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//////////////////////// DENUNCIAS

Route::post('/denuncias/comentar', 'DenunciaController@comentar')->name('crear');

Route::get('/denuncias', 'DenunciaController@index')->name('denuncias');


Route::get('/denuncias/crear', 'DenunciaController@create')->name('crear');

Route::get('/noticias', 'NoticiasController@index')->name('noticia');



Route::post('noticias1', 'NoticiasController@categoria');

Route::get('/noticias/crear', 'NoticiasController@create')->name('crear1');



Route::get('/denuncias/responder', 'AdminDenuncias@index')->name('comentar1');

Route::get('/denuncias/show/{id}', 'AdminDenuncias@show')->name('comentar');

Route::get('/denuncias/write/{id}', 'AdminDenuncias@edit')->name('editar');

Route::post('denuncias', 'DenunciaController@store');

Route::post('noticias', 'NoticiasController@store');

Route::post('responder', 'DenunciaController@store');


//////////////////////// CHAT

// Pestaña donde te conectas a un chat
Route::get('/chat', 'ChatController@index')->name('chat');

// Chat al que te has unido
Route::get('/chat/unirse/{sala}', 'ChatController@unirse');
Route::get('/chat/unirse/{id}', 'ChatController@unirse')->name('unirse');

Route::post('chat', 'ChatController@store');

Route::get('/chat/mensaje/{id}/{mensaje}', 'ChatController@guardarMensaje')->name('mensajes');

// funcion cargar ultimos 20 mensajes
Route::get('/chat/ultimosMensajes/{sala}', 'ChatController@ultimosMensajes');

// funcion actualizar chat
Route::get('/chat/actualizar/{sala}/{hora}', 'ChatController@actualizacionChat');