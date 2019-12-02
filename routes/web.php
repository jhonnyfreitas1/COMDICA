<?php


Auth::routes();
//Rotas da calculadora
Route::get('/calculadora', ['as' => 'calculadora.index', 'uses' => 'CalculadoraController@index']);
Route::get('/sou_doador', ['as' => 'soudoador', 'uses' => 'HomeController@sou_doador']);
Route::get('/calculadora/doacao/{valor}/{ir}', ['as' => 'calculadora.doacao', 'uses' => 'CalculadoraController@doacao']);

//Rotas gerencianet
Route::post('/calculadora/gerar_boleto', ['as' => 'gerencianet.gerar_boleto', 'uses' =>'GerenciaNetController@gerar_boleto']);
Route::post('/calculadora/gerar_carne', ['as' => 'gerencianet.gerar_carne', 'uses' =>'GerenciaNetController@gerar_carne']);
Route::get('/calculadora/cancelar_transacao/{id}', ['as' => 'gerencianet.cancelar', 'uses' =>'GerenciaNetController@cancelar_transacao']);
Route::post('boleto/gerar' , ['as' => 'gerarboleto', 'uses' => 'CalculadoraController@gerarBoleto']);
Route::post('carne/gerar' , ['as' => 'gerarboleto', 'uses' => 'CalculadoraController@gerarCarne']);
Route::get('boleto/detalhes' , ['as' => 'boleto_detail', 'uses' => 'CalculadoraController@detalhes_boleto']);

//Rotas do site 
Route::get('/', 'HomeController@index')->name('home');
Route::get('/notfound', 'HomeController@notfound')->name('home');
Route::get('/home1', 'HomeController@home1')->name('home1');
Route::get('/postagem/{id}', ['as' => 'postagem', 'uses' => 'HomeController@postagem']);
Route::get('/porque_doar', ['as' => 'porque_doar', 'uses' => 'HomeController@pq_doar']);
Route::get('/contato', ['as' => 'contato', 'uses' => 'HomeController@contato']);
Route::get('/status', ['as' => 'status', 'uses' => 'HomeController@status']);
Route::post('/contato/save', ['as' => 'home.contato', 'uses' => 'HomeController@create_contato']);
Route::get('/pdf/pagador/{id}','HomeController@gerarPdf');
Route::get('/pdf/pagador/carne/{id}','HomeController@gerarPdfCarne');
Route::get('/calculadora/termos_e_regras','HomeController@termo');
Route::get('sou_doador/verificar/pagamento/','HomeController@verificar_recibo');

//Rotas admin
Route::get('/admin/comdica', ['as' => 'admin', 'uses' => 'AdminController@index'])->middleware('auth');
Route::get('/admin/contato', ['as' => 'admin.contato', 'uses' => 'AdminController@contato'])->middleware('auth');
Route::get('/admin/contato/{id}', ['as' => 'admin.contato.id', 'uses' => 'AdminController@contato_single'])->middleware('auth');
Route::get('/admin/doacoes', ['as' => 'admin.boleto', 'uses' => 'AdminController@doacoes_boleto'])->middleware('auth');
Route::get('/admin/back', ['as' => 'admin.back', 'uses' => 'AdminController@back'])->middleware('auth');
Route::get('/auth/logout', 'Auth\LoginController@logout')->middleware('auth');
Route::get('/admin/update', ['as' => 'admin.update', 'uses' => 'AdminController@update'])->middleware('auth');
Route::post('/admin/update/save', ['as' => 'admin.update.save', 'uses' => 'AdminController@store'])->middleware('auth');


Route::post('/admin/update_save/{id}', ['as' => 'admin.update_save', 'uses' => 'PostagemController@update_save'])->middleware('auth');
Route::get('/admin/minhas_postagens', ['as' => 'admin.minhas_postagens', 'uses' => 'PostagemController@minhas_postagens'])->middleware('auth');
Route::get('/admin/post/delete/{id}', ['as' => 'delete_postagem', 'uses' => 'PostagemController@destroy'])->middleware('auth');
Route::get('/admin/nova-postagem', ['as' => 'admin.nova', 'uses' => 'PostagemController@nova_postagem'])->middleware('auth');
Route::post('/admin/postagem_save', ['as' => 'admin.salvar', 'uses' => 'PostagemController@salvar_postagem'])->middleware('auth');
Route::get('/admin/postagem_edit/{id}', ['as' => 'admin.postagem_edit', 'uses' => 'PostagemController@edit'])->middleware('auth');

//Rotas de email 
Route::get('/email/verify/{email}', ['as' => 'status', 'uses' => 'EmailsController@verificar']);