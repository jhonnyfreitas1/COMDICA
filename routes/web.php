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
Route::view('portifolioComdica', 'newFront.portifolioComdica')->name('comdica');
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
Route::group(['prefix' => '/admin', 'middleware'=> 'auth'],function(){

    //Rotas das padrões do administrador
    Route::get('/', ['as' => 'admin', 'uses' => 'Admin\AdminController@index']);
    Route::get('/comdica', ['as' => 'admin.comdica', 'uses' => 'Admin\AdminController@index']);
    Route::get('/back', ['as' => 'admin.back', 'uses' => 'Admin\AdminController@back']);

	//Rotas do usuario
	Route::group(['prefix' => '/users', 'middleware'=> 'admin-comdica'],function(){
        Route::get('/', ['as' => 'usuario.index', 'uses' => 'Admin\UserController@index']);
		Route::get('/create', ['as' => 'usuario.register', 'uses' => 'Admin\UserController@create']);
		Route::post('/store', ['as' => 'usuario.store', 'uses' => 'Admin\UserController@store']);
		Route::get('/show/{id}', ['as' => 'usuario.show', 'uses' => 'Admin\UserController@show']);
		Route::get('/edit/{id}', ['as' => 'usuario.edit', 'uses' => 'Admin\UserController@edit']);
		Route::put('/update/{id}', ['as' => 'usuario.update', 'uses' => 'Admin\UserController@update']);
		Route::post('/destroy/{id}', ['as' => 'usuario.destroy', 'uses' => 'Admin\UserController@destroy']);
	});

	//Rotas de instituições
	Route::group(['prefix' => '/instituicoes', 'middleware'=> 'admin-comdica'],function(){
        Route::get('', ['as' => 'instituicao.index', 'uses' => 'Admin\InstituicoesController@index']);
		Route::get('/create',['as' => 'instituicao.create', 'uses' => 'Admin\InstituicoesController@create']);
		Route::post('/store',['as' => 'instituicao.store', 'uses' => 'Admin\InstituicoesController@store']);
		Route::get('/{id}',['as' => 'instituicao.show', 'uses' => 'Admin\InstituicoesController@show']);
		Route::get('/edit/{id}',['as' => 'instituicao.edit', 'uses' => 'Admin\InstituicoesController@edit']);
		Route::put('/update/{id}',['as' => 'instituicao.update', 'uses' => 'Admin\InstituicoesController@update']);
		Route::get('/destroy/{id}',['as' => 'instituicao.destroy', 'uses' => 'Admin\InstituicoesController@destroy']);
    });
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
                // NEW ROTAS
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
	//Rotas de atas
	Route::group(['prefix' => '/atas', 'middleware'=> 'admin-comdica'],function(){
        Route::get('', ['as' => 'atas.index', 'uses' => 'Admin\AtasController@index']);
		Route::get('/create',['as' => 'atas.create', 'uses' => 'Admin\AtasController@create']);
		Route::post('/store',['as' => 'atas.store', 'uses' => 'Admin\AtasController@store']);
		Route::get('/{id}',['as' => 'atas.show', 'uses' => 'Admin\AtasController@show']);
		Route::get('/edit/{id}',['as' => 'atas.edit', 'uses' => 'Admin\AtasController@edit']);
		Route::put('/update/{id}',['as' => 'atas.update', 'uses' => 'Admin\AtasController@update']);
		Route::get('/destroy/{id}',['as' => 'atas.destroy', 'uses' => 'Admin\AtasController@destroy']);
    });

	//Rotas de resoluções
	Route::group(['prefix' => '/resolucoes', 'middleware'=> 'admin-comdica'],function(){
        Route::get('', ['as' => 'resolucao.index', 'uses' => 'Admin\ResolucoesController@index']);
		Route::get('/create',['as' => 'resolucao.create', 'uses' => 'Admin\ResolucoesController@create']);
		Route::post('/store',['as' => 'resolucao.store', 'uses' => 'Admin\ResolucoesController@store']);
		Route::get('/{id}',['as' => 'resolucao.show', 'uses' => 'Admin\ResolucoesController@show']);
		Route::get('/edit/{id}',['as' => 'resolucao.edit', 'uses' => 'Admin\ResolucoesController@edit']);
		Route::put('/update/{id}',['as' => 'resolucao.update', 'uses' => 'Admin\ResolucoesController@update']);
		Route::get('/destroy/{id}',['as' => 'resolucao.destroy', 'uses' => 'Admin\ResolucoesController@destroy']);
	});

    //Rotas de galeria
	Route::group(['prefix' => '/galeria', 'middleware'=> 'admin-comdica'],function(){
        Route::get('', ['as' => 'galeria.index', 'uses' => 'Admin\GaleriaController@index']);
		Route::get('/create',['as' => 'galeria.create', 'uses' => 'Admin\GaleriaController@create']);
		Route::post('/store',['as' => 'galeria.store', 'uses' => 'Admin\GaleriaController@store']);
		Route::get('/{id}',['as' => 'galeria.show', 'uses' => 'Admin\GaleriaController@show']);
		Route::get('/edit/{id}',['as' => 'galeria.edit', 'uses' => 'Admin\GaleriaController@edit']);
		Route::put('/update/{id}',['as' => 'galeria.update', 'uses' => 'Admin\GaleriaController@update']);
		Route::get('/destroy/{id}',['as' => 'galeria.destroy', 'uses' => 'Admin\GaleriaController@destroy']);
	});

// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
    //Rotas de pdf
	Route::group(['prefix' => '/pdf', 'middleware'=> 'admin-comdica'],function(){
        Route::get('/destroy/{id}',['as' => 'pdf.destroy', 'uses' => 'Admin\PostagemController@destroyPdf']);
    });

    //Rotas de postagens
	Route::group(['prefix' => '/postagens', 'middleware'=> 'admin-comdica'],function(){
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

    //Rotas de Denuncia
    Route::group(['prefix' => '/denuncia'],function(){
        Route::get('/', ['as' => 'denuncias.index', 'uses' => 'DenunciaController@index']);
        Route::get('/{id}', ['as' => 'denuncias.show', 'uses' => 'DenunciaController@show']);
    });

    //Rotas de Auth
    Route::group(['prefix' => '/auth'],function(){
        Route::get('/edit', ['as' => 'admin.auth.edit', 'uses' => 'Admin\AdminController@edit']);
        Route::post('/update', ['as' => 'admin.auth.update', 'uses' => 'Admin\AdminController@update']);
        Route::get('/logout', ['as' => 'admin.auth.logout','uses' => 'Auth\LoginController@logout']);
    });

    //Rotas de Contato
    Route::group(['prefix' => '/contato', 'middleware'=> 'admin-comdica'],function(){
        Route::get('/', ['as' => 'admin.contato', 'uses' => 'Admin\AdminController@contato']);
        Route::get('/{id}', ['as' => 'admin.contato.id', 'uses' => 'Admin\AdminController@contato_single']);
    });

    //Rotas das doações de boleto
    Route::get('/doacoes', ['as' => 'admin.boleto', 'uses' => 'Admin\AdminController@doacoes_boleto'])->middleware('admin-comdica');
});



//Rotas de email
Route::get('/email/verify/{email}', ['as' => 'status', 'uses' => 'EmailsController@verificar']);

//Rotas de Denuncia
Route::put('/denuncia/store', ['as' => 'denuncia.store', 'uses' => 'DenunciaController@store']);
Route::get('/denuncia', ['as' => 'denuncia', 'uses' => 'DenunciaController@denuncia']);
Route::get('/offline', ['as' => 'offline', 'uses' => 'DenunciaController@offline']);
Route::get('/success', ['as' => 'success', 'uses' => 'DenunciaController@success']);
