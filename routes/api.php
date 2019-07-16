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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/boleto/notification', ['as' => 'gerencianet.gerar_carne', 'uses' =>'GerenciaNetController@notification']);

Route::post('/boleto/atualizar', ['as' => 'gerencianet.atualizar', 'uses' =>'GerenciaNetController@atualizar_boletos']);


