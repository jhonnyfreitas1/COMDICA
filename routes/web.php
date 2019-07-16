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
//Rotas da calculadora
Route::get('/calculadora', ['as' => 'calculadora.index', 'uses' => 'CalculadoraController@index']);
Route::get('/sou_doador', ['as' => 'soudoador', 'uses' => 'HomeController@sou_doador']);
Route::get('/calculadora/doacao/{valor}/{ir}', ['as' => 'calculadora.doacao', 'uses' => 'CalculadoraController@doacao']);

//Rotas gerencianet
Route::post('/calculadora/gerar_boleto', ['as' => 'gerencianet.gerar_boleto', 'uses' =>'GerenciaNetController@gerar_boleto']);
Route::post('/calculadora/gerar_carne', ['as' => 'gerencianet.gerar_carne', 'uses' =>'GerenciaNetController@gerar_carne']);
Route::get('/calculadora/cancelar_transacao/{id}', ['as' => 'gerencianet.cancelar', 'uses' =>'GerenciaNetController@cancelar_transacao']);


//Rotas do site 
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home1', 'HomeController@home1')->name('home1');
Route::get('/postagem/{id}', ['as' => 'postagem', 'uses' => 'HomeController@postagem']);
Route::get('/porque_doar', ['as' => 'porque_doar', 'uses' => 'HomeController@pq_doar']);
Route::get('/contato', ['as' => 'contato', 'uses' => 'HomeController@contato']);
Route::get('/status', ['as' => 'status', 'uses' => 'HomeController@status']);


//Rotas admin
Route::get('/admin/comdica', ['as' => 'admin', 'uses' => 'AdminController@index'])->middleware('auth');
Route::get('/admin/doacoes', ['as' => 'admin.boleto', 'uses' => 'AdminController@doacoes_boleto'])->middleware('auth');
Route::get('/admin/minhas_postagens', ['as' => 'minhas_postagens', 'uses' => 'AdminController@minhas_postagens'])->middleware('auth');
Route::get('/auth/logout', 'Auth\LoginController@logout')->middleware('auth');
Route::get('/admin/post/delete/{id}', ['as' => 'delete_postagem', 'uses' => 'AdminController@destroy'])->middleware('auth');
Route::get('/admin/nova-postagem', ['as' => 'admin.nova', 'uses' => 'AdminController@nova_postagem'])->middleware('auth');
Route::post('/admin/postagem_save', ['as' => 'admin.salvar', 'uses' => 'AdminController@salvar_postagem'])->middleware('auth');


