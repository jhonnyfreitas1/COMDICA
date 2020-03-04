<?php


Auth::routes();
//Rotas da calculadora
Route::get('/calculadora', ['as' => 'calculadora.index', 'uses' => 'CalculadoraController@index']);
Route::get('/sou_doador', ['as' => 'soudoador', 'uses' => 'HomeController@sou_doador']);
Route::get('/calculadora/doacao/{valor}/{ir}', ['as' => 'calculadora.doacao', 'uses' => 'CalculadoraController@doacao']);

//Rotas gerencianet
// Route::post('/calculadora/gerar_boleto', ['as' => 'gerencianet.gerar_boleto', 'uses' =>'GerenciaNetController@gerar_boleto']);
// Route::post('/calculadora/gerar_carne', ['as' => 'gerencianet.gerar_carne', 'uses' =>'GerenciaNetController@gerar_carne']);
// Route::get('/calculadora/cancelar_transacao/{id}', ['as' => 'gerencianet.cancelar', 'uses' =>'GerenciaNetController@cancelar_transacao']);
Route::post('boleto/gerar' , ['as' => 'gerarboleto', 'uses' => 'CalculadoraController@gerarBoleto']);
Route::post('carne/gerar' , ['as' => 'gerarboleto', 'uses' => 'CalculadoraController@gerarCarne']);
Route::get('boleto/detalhes' , ['as' => 'boleto_detail', 'uses' => 'CalculadoraController@detalhes_boleto']);

//New Front Routes
Route::view('newIndex', 'newFront.index')->name('newIndex');
Route::view('portifolio', 'newFront.portifolio')->name('portifolio');
Route::view('sobre', 'newFront.sobre')->name('sobre');
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
Route::get('carousel','HomeController@carousel');
//Rotas admin
Route::get('/auth/logout', 'Auth\LoginController@logout')->middleware('auth');
Route::group(['prefix' => '/admin', 'middleware'=> 'auth'],function(){
	// rotas do usuario
	Route::get('/register', ['as' => 'admin.register', 'uses' => 'Auth\RegisterController@redirectCreate']);	
	Route::get('/listusers', ['as' => 'admin.list_users', 'uses' => 'AdminController@list_users']);
	Route::get('/showuser/{id}', ['as' => 'admin.show_user', 'uses' => 'AdminController@show_user']);
	Route::get('/edituser/{id}', ['as' => 'admin.edit_user', 'uses' => 'AdminController@edit_user']);
	Route::get('/destroyuser/{id}', ['as' => 'admin.destroy_user', 'uses' => 'AdminController@destroy_user']);

	Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);
	Route::get('/comdica', ['as' => 'admin.comdica', 'uses' => 'AdminController@index']);
	Route::get('/contato', ['as' => 'admin.contato', 'uses' => 'AdminController@contato']);
	Route::get('/contato/{id}', ['as' => 'admin.contato.id', 'uses' => 'AdminController@contato_single']);
	Route::get('/doacoes', ['as' => 'admin.boleto', 'uses' => 'AdminController@doacoes_boleto']);
	Route::get('/back', ['as' => 'admin.back', 'uses' => 'AdminController@back']);
	Route::get('/update', ['as' => 'admin.update', 'uses' => 'AdminController@update']);
	Route::post('/update/save', ['as' => 'admin.update.save', 'uses' => 'AdminController@store']);

	Route::post('/update_save/{id}', ['as' => 'admin.update_save', 'uses' => 'PostagemController@update_save']);
	Route::get('/minhas_postagens', ['as' => 'admin.minhas_postagens', 'uses' => 'PostagemController@minhas_postagens']);
	Route::get('/lista_denuncias', ['as' => 'admin.lista_denuncias', 'uses' => 'DenunciaController@lista_denuncias']);
	Route::get('/show_denuncia/{id}', ['as' => 'admin.show_denuncia', 'uses' => 'DenunciaController@show_denuncia']);
	Route::get('/post/delete/{id}', ['as' => 'delete_postagem', 'uses' => 'PostagemController@destroy']);
	Route::get('/nova-postagem', ['as' => 'admin.nova', 'uses' => 'PostagemController@nova_postagem']);
	Route::post('/postagem_save', ['as' => 'admin.salvar', 'uses' => 'PostagemController@salvar_postagem']);
	Route::get('/postagem_edit/{id}', ['as' => 'admin.postagem_edit', 'uses' => 'PostagemController@edit']);

//Rotas de instituições
	Route::get('/instituicoes', ['as' => 'instituicao.index', 'uses' => 'instituicoesController@index']);
	Route::get('/instituicoes/create',['as' => 'instituicao.create', 'uses' => 'instituicoesController@create']);
	Route::post('/instituicoes/store',['as' => 'instituicao.store', 'uses' => 'instituicoesController@store']);
	Route::get('/instituicoes/{id}',['as' => 'instituicao.show', 'uses' => 'instituicoesController@show']);
	Route::get('/instituicoes/edit/{id}',['as' => 'instituicao.edit', 'uses' => 'instituicoesController@edit']);
	Route::put('/instituicoes/update/{id}',['as' => 'instituicao.update', 'uses' => 'instituicoesController@update']);
	Route::get('/instituicoes/destroy/{id}',['as' => 'instituicao.destroy', 'uses' => 'instituicoesController@destroy']);
});



//Rotas de email
Route::get('/email/verify/{email}', ['as' => 'status', 'uses' => 'EmailsController@verificar']);

//Rotas de Denuncia
Route::put('/denuncia/store', ['as' => 'denuncia.store', 'uses' => 'DenunciaController@store']);
Route::get('/denuncia', ['as' => 'denuncia', 'uses' => 'DenunciaController@denuncia']);
Route::get('/offline', ['as' => 'offline', 'uses' => 'DenunciaController@offline']);
Route::get('/success', ['as' => 'success', 'uses' => 'DenunciaController@success']);

