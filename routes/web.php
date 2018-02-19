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

Route::get('/denuncias', 'DenunciaController@index')->name('denuncias');

Route::get('/denuncias/crear', 'DenunciaController@create')->name('crear');

Route::get('/denuncias/responder', 'AdminDenuncias@index')->name('comentar');

Route::get('/denuncias/show/{id}', 'AdminDenuncias@show')->name('comentar');

Route::get('/denuncias/write/{id}', 'AdminDenuncias@edit')->name('editar');

Route::post('denuncias', 'DenunciaController@store');

Route::post('responder', 'DenunciaController@store');


// Pestaña donde te conectas a un chat
Route::get('/chat', 'ChatController@index')->name('chat');

// Chat al que te has unido
Route::get('/chat/unirse/{id}', 'ChatController@unirse')->name('unrise');

Route::post('chat', 'ChatController@store');