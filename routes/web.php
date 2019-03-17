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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/perfil', function () {
    return redirect('/explorar');
});
Route::get('/perfil/{username}', 'PageController@perfil')->name('perfil');

Route::get('/explorar', 'PageController@explorar')->name('explorar');
Route::post('/explorar', 'UserController@encontrarUsuarios');

Route::post('/perguntar', 'PerguntaController@store');

Route::get('/perguntas_recebidas', 'PerguntaController@perguntasRecebidas')->name('perguntas_recebidas');

Route::post('/responder', 'RespostaController@store');

Route::post('/like', 'LikeController@store');
