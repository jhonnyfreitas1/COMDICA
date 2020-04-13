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
// newIndex tem os imports
Route::view('newIndex', 'newFront.index')->name('newIndex'); /*-> Tem ''''''que ir pro Controller para pegar o php, por isso estou alterando para a principal */
Route::get('portifolio', 'HomeController@entidadeList')->name('portifolio');
Route::get('portifolio/{id}', 'HomeController@entidade')->name('portifolioVer');
Route::view('denuncias', 'newFront.denuncias')->name('denuncias');
Route::get('sobre', ['as' => 'sobre', 'uses' => 'HomeController@sobre']);
Route::get('postagens', 'HomeController@postList')->name('postagens');
Route::view('postagemVer', 'newFront.verPostagem')->name('postagemVer');
//Rotas do site
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/notfound', 'HomeController@notfound')->name('notfound');
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
	Route::group(['prefix' => '/users'],function(){
		Route::get('/', ['as' => 'usuario.index', 'uses' => 'Admin\UserController@index']);
		Route::get('/create', ['as' => 'usuario.register', 'uses' => 'Admin\UserController@create']);
		Route::post('/store', ['as' => 'usuario.store', 'uses' => 'Admin\UserController@store']);
		Route::get('/show/{id}', ['as' => 'usuario.show', 'uses' => 'Admin\UserController@show']);
		Route::get('/edit/{id}', ['as' => 'usuario.edit', 'uses' => 'Admin\UserController@edit']);
		Route::put('/update/{id}', ['as' => 'usuario.update', 'uses' => 'Admin\UserController@update']);
		Route::post('/destroy/{id}', ['as' => 'usuario.destroy', 'uses' => 'Admin\UserController@destroy']);
	});

	//Rotas de instituições
	Route::group(['prefix' => '/instituicoes'],function(){
		Route::get('', ['as' => 'instituicao.index', 'uses' => 'Admin\InstituicoesController@index']);
		Route::get('/create',['as' => 'instituicao.create', 'uses' => 'Admin\InstituicoesController@create']);
		Route::post('/store',['as' => 'instituicao.store', 'uses' => 'Admin\InstituicoesController@store']);
		Route::get('/{id}',['as' => 'instituicao.show', 'uses' => 'Admin\InstituicoesController@show']);
		Route::get('/edit/{id}',['as' => 'instituicao.edit', 'uses' => 'Admin\InstituicoesController@edit']);
		Route::put('/update/{id}',['as' => 'instituicao.update', 'uses' => 'Admin\InstituicoesController@update']);
		Route::get('/destroy/{id}',['as' => 'instituicao.destroy', 'uses' => 'Admin\InstituicoesController@destroy']);
	});

    //Rotas de pdf
	Route::group(['prefix' => '/pdf'],function(){
        Route::get('/destroy/{id}',['as' => 'pdf.destroy', 'uses' => 'Admin\PostagemController@destroyPdf']);
    });

    //Rotas de postagens
	Route::group(['prefix' => '/postagens'],function(){
        Route::get('/', ['as' => 'postagens.index', 'uses' => 'Admin\PostagemController@index']);
		Route::get('/create',['as' => 'postagens.create', 'uses' => 'Admin\PostagemController@create']);
		Route::post('/store',['as' => 'postagens.store', 'uses' => 'Admin\PostagemController@store']);
		Route::get('/edit/{id}',['as' => 'postagens.edit', 'uses' => 'Admin\PostagemController@edit']);
		Route::put('/update/{id}',['as' => 'postagens.update', 'uses' => 'Admin\PostagemController@update']);
		Route::get('/destroy/{id}',['as' => 'postagens.destroy', 'uses' => 'Admin\PostagemController@destroy']);
		Route::get('/minhaspostagens', ['as' => 'postagens.minhas_postagens', 'uses' => 'Admin\PostagemController@minhas_postagens']);
		Route::get('/arquivadas', ['as' => 'postagens.arquivadas', 'uses' => 'Admin\PostagemController@arquivadas']);
		Route::get('/arquivar/{id}', ['as' => 'postagens.arquivar', 'uses' => 'Admin\PostagemController@arquivar']);
	});

    //Rotas de Auth
    Route::group(['prefix' => '/auth'],function(){
        Route::get('/edit', ['as' => 'admin.auth.edit', 'uses' => 'Admin\AdminController@edit']);
        Route::post('/update', ['as' => 'admin.auth.update', 'uses' => 'Admin\AdminController@update']);
    });

    Route::get('/', ['as' => 'admin', 'uses' => 'Admin\AdminController@index']);
	Route::get('/comdica', ['as' => 'admin.comdica', 'uses' => 'Admin\AdminController@index']);
	Route::get('/contato', ['as' => 'admin.contato', 'uses' => 'Admin\AdminController@contato']);
	Route::get('/contato/{id}', ['as' => 'admin.contato.id', 'uses' => 'Admin\AdminController@contato_single']);
	Route::get('/doacoes', ['as' => 'admin.boleto', 'uses' => 'Admin\AdminController@doacoes_boleto']);
	Route::get('/back', ['as' => 'admin.back', 'uses' => 'Admin\AdminController@back']);

	Route::get('/lista_denuncias', ['as' => 'admin.lista_denuncias', 'uses' => 'DenunciaController@lista_denuncias']);
    Route::get('/show_denuncia/{id}', ['as' => 'admin.show_denuncia', 'uses' => 'DenunciaController@show_denuncia']);

	// Route::post('/update_save/{id}', ['as' => 'admin.update_save', 'uses' => 'PostagemController@update_save']);
	// Route::get('/post/delete/{id}', ['as' => 'delete_postagem', 'uses' => 'PostagemController@destroy']);
	// Route::get('/nova-postagem', ['as' => 'admin.nova', 'uses' => 'PostagemController@nova_postagem']);
	// Route::post('/postagem_save', ['as' => 'admin.salvar', 'uses' => 'PostagemController@salvar_postagem']);
	// Route::get('/postagem_edit/{id}', ['as' => 'admin.postagem_edit', 'uses' => 'PostagemController@edit']);
	// Route::post('/postagem__arquivada', ['as' => 'admin.postagem_arquivada', 'uses' => 'PostagemController@postagens_arquivadas']);

});



//Rotas de email
Route::get('/email/verify/{email}', ['as' => 'status', 'uses' => 'EmailsController@verificar']);

//Rotas de Denuncia
Route::put('/denuncia/store', ['as' => 'denuncia.store', 'uses' => 'DenunciaController@store']);
Route::get('/denuncia', ['as' => 'denuncia', 'uses' => 'DenunciaController@denuncia']);
Route::get('/offline', ['as' => 'offline', 'uses' => 'DenunciaController@offline']);
Route::get('/success', ['as' => 'success', 'uses' => 'DenunciaController@success']);

