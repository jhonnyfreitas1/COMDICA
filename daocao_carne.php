<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <script type="text/javascript" src='assets/js/jquery.min.js'></script> 
        <script type="text/javascript" src="assets/js/jquery.mask.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script type="text/javascript" src="assets/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.mask.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Exemplo de Integração >> Emissão de Carnê | Gerencianet</title>
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  <a class="navbar-brand" href="../">
                        <img src="https://gerencianet.com.br/wp-content/themes/Gerencianet/images/marca-gerencianet.svg" onerror="this.onerror=null; this.src='images/marca-gerencianet.png'" alt="Gerencianet - Conceito em Pagamentos" width="218" height="31">
                    </a>
                </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li class=""><a href="https://dev.gerencianet.com.br/docs" target="_blank" title="Documentação Oficial da API Gerencianet">Documentação Oficial da API Gerencianet</a></li>

                    </ul>

                    <ul class="nav navbar-nav pull-right">
                        <li><a target="blank" href="https://gerencianet.com.br/#login">Entrar</a>
                        </li><li><a target="blank" href="https://gerencianet.com.br/#abrirconta">Abra sua conta</a>
                        </li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

		<div class="col-lg-12 col-md-12 col-sm-12"><h4>Exemplo de Integração >> Emissão de Carnê</h4></div>
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="col-lg-8 well">
                <form id="form" method="POST" action="emitir_boleto.php" class="">
                    <div class="col-lg-3">
                        <h5>Informações do produto/serviço</h5>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Descrição do produto/serviço: (<em class="atributo">name</em>)<br><strong class="ex">Ex: Monitor LCD</strong></label>

                            <input required type="text" class="form-control" id="descricao" placeholder="Descrição do produto">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Valor do produto/serviço: (<em class="atributo">value</em>)<br><strong class="ex">Ex: informar sem pontos ou vírgulas (5000 equivale a R$ 50,00) (int)</strong></label>
                            <input required type="text" class="form-control" id="valor" placeholder="Valor do Produto">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantidade de itens: (<em class="atributo">amount</em>) <br><strong class="ex">Ex: 1 (int)</strong></label>
                            <select required id="quantidade" class="form-control">
                                <?php for ($i = 1; $i < 20; $i++): ?>
                                    <option><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <h5>Informações do cliente</h5>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome do cliente: (<em class="atributo">name</em>) <br><strong class="ex">Ex: Gorbadoc Oldbuck</strong></label>
                            <input required type="text" class="form-control" id="nome_cliente" placeholder="Nome do cliente">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">CPF: (<em class="atributo">cpf</em>) <br><strong class="ex">Ex: 94271564656 (sem formatação)</strong> </label>
                            <input required type="text" class="form-control" id="cpf" placeholder="CPF">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telefone: (<em class="atributo">phone_number</em>)<br><strong class="ex">Ex: 5144916523 (sem formatação)</strong></label>
                            <input required type="text" class="form-control" id="telefone" placeholder="Telefone">
                        </div>

						<div class="form-group">
                            <label for="exampleInputPassword1">Email: (<em class="atributo">email</em>)<br><strong class="ex">Ex: email_cliente@servidor.com.br (string)</strong></label>
                            <input required type="email" class="form-control" id="email" placeholder="Email">
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <h5>Vencimento</h5>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Data de vencimento: (<em class="atributo">expire_at</em>) <br><strong class="ex">Ex: 2018-08-31 (yyyy-mm-dd)</strong></label>
                            <input required type="text" class="form-control" id="vencimento" placeholder="Data de vencimento">
                        </div>

						<div class="form-group">
                            <label for="exampleInputPassword1">Número de parcelas: (<em class="atributo">repeats</em>) <br><strong class="ex">Ex: 5 (int)</strong></label>
                            <select required id="repeticoes" class="form-control">
                                <?php for ($i = 1; $i < 20; $i++): ?>
                                    <option><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
					 </div>
					  <div class="col-lg-3">
						<h5>Instruções (opcional)</h5>
						<div class="form-group">
                            <label for="exampleInputEmail1">1<sup>a</sup> linha de instrução: (<em class="atributo">instructions</em>) <br><strong class="ex">Ex: String</strong></label>
                            <input required type="text" class="form-control" id="instrucao1" placeholder="Instrução 1">
                        </div>

						<div class="form-group">
                            <label for="exampleInputEmail1">2<sup>a</sup> linha de instrução: (<em class="atributo">instructions</em>) <br><strong class="ex">Ex: String</strong></label>
                            <input required type="text" class="form-control" id="instrucao2" placeholder="Instrução 2">
                        </div>

						<div class="form-group">
                            <label for="exampleInputEmail1">3<sup>a</sup> linha de instrução: (<em class="atributo">instructions</em>) <br><strong class="ex">Ex: String</strong></label>
                            <input required type="text" class="form-control" id="instrucao3" placeholder="Instrução 3">
                        </div>

						<div class="form-group">
                            <label for="exampleInputEmail1">4<sup>a</sup> linha de instrução: (<em class="atributo">instructions</em>) <br><strong class="ex">Ex: String</strong></label>
                            <input required type="text" class="form-control" id="instrucao4" placeholder="Instrução 4">
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <button id="btn_emitir_boleto" type="button" class="btn btn-success">Emitir carnê <img src="../img/ok-mark.png"></button>
                    </div>

            </div>
        </form>
        <div class="col-lg-4">

			<div class="col-lg-12">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
				<a href="../download/exemplo-carne.zip" class="btn btn-block btn-default">Baixar este exemplo <br> <img src="../img/cloud-computing.png"></a>
				</div>
				<div class="col-lg-2"></div>

			</div>

			 <div style="margin-top: 20px;" class="col-lg-12">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">

                    <div class="alert alert-warning" role="alert">

                        <strong>ATENÇÃO:</strong><br />
                        <p>Para funcionamento deste exemplo, você deverá informar seu Client_Id (<a href="http://content.screencast.com/users/tiagogerencianet/folders/Jing/media/78747741-cb11-44e3-9342-54cd7e5a2fd0/2016-08-02_1359.png" target="_blank">?</a>) e Client_Secret (<a href="http://content.screencast.com/users/tiagogerencianet/folders/Jing/media/78747741-cb11-44e3-9342-54cd7e5a2fd0/2016-08-02_1359.png" target="_blank">?</a>) nas linhas 8 e 9 do arquivo "emitir_carne.php", além de alterar o parâmetro "sandbox" na linha 14 do arquivo "emitir_carne.php", de acordo com o ambiente utilizado ("sandbox => true" para desenvolvimento e "sandbox => false" para produção).</p>

                    </div>

                </div>
                <div class="col-lg-2"></div>
            </div>

			<div style="margin-top: 20px;" class="col-lg-12">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dicas</div>
                        <div class="panel-body">
                            <ul>
                                <li>Utilização de máscaras (<a target="blank" href="https://github.com/igorescobar/jQuery-Mask-Plugin" title="Utilização de máscaras">jQuery Mask Plugin</a>)</li>
                                <li>Utilização PHP classe "DateTime" (<a target="blank" href="http://php.net/manual/pt_BR/class.datetime.php" title="Utilização em PHP da classe DateTime">documentação</a>)</li>
                                <li>Como utilizar Ajax (<a target="blank" href="http://api.jquery.com/jquery.ajax/" title="Como utilizar Ajax">exemplo</a>)</li>
                                <li>Documentação Oficial da API Gerencianet (<a href="https://dev.gerencianet.com.br/" target="_blank" title="Documentação Oficial da API Gerencianet">link</a>)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>

    </div>

    <!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Um momento.</h4>
                </div>
                <div class="modal-body">
                    Estamos processando a requisição <img src="../img/ajax-loader.gif">.
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>

	 <!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
    <div class="modal fade" id="myModalResult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Retorno da emissão do Carnê.</h4>
                </div>
                <div class="modal-body">

        <!--div responsável por exibir o resultado da emissão do boleto-->
        <div id="boleto" class="hide">
            <div class="panel panel-success">
                <div class="panel-body">
					<div class="table-responsive">
                     <strong>Dados do Carnê</strong>
		<table class="table table-bordered">
				<thead>

				<tr>
					<th>Código da carnê</th>
					<th>Status</th>
					<th>Link</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<th id="table_id_ass"></th>
					<th id="table_status"></th>
					<td id="table_link"></td>
				</tr>
				</tbody>
		</table>

		<strong>Valores</strong>

		<table class="table table-bordered">
				<thead>

				<tr>
					<th>#</th>
					<th>N° Parc.</th>
					<th>Valor</th>
					<th>Data. Exp.</th>
					<th>Link</th>
				</tr>
				</thead>
				<tbody id="charges_tb">

				</tbody>
		</table>

					 </div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>

    <div id="rodape" class="footer well">

        <div class="container-fluid text-center">

            <img src="https://gerencianet.com.br/wp-content/themes/Gerencianet/images/marca-gerencianet.svg" onerror="this.onerror=null; this.src='images/marca-gerencianet.png'" alt="Gerencianet - Conceito em Pagamentos" width="218" height="27">
            <div class="content-footer">
                © 2007-2016 Gerencianet. Todos os direitos reservados.<br/>
                Gerencianet Pagamentos do Brasil Ltda. • CNPJ: 09.089.356/0001-18<br/>
                Avenida Juscelino Kubitschek, 909 - Ouro Preto, Minas Gerais<br/>
            </div>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</div>
    <script type="text/javascript">
        $(document).ready(function(){
     //Aplicando as mascaras nos inputs cpf, valor e vencimento.
    $("#btn_emitir_boleto").click(function (){
         if($('#form')[0].checkValidity()) {
             
         $("#myModal").modal('show');
         $("#boleto").addClass("hide");
         var descricao = $("#descricao").val();
         
         
         var valor = $("#valor").val();
         var quantidade = $("#quantidade").val();
         var nome_cliente = $("#nome_cliente").val();
          var cpf = $("#cpf").val();
         var telefone = $("#telefone").val();
         var vencimento = $("#vencimento").val();
         console.log(parseInt(nome_cliente))
         console.log(parseInt(valor))
            if(parseInt(nome_cliente)=="NaN" || parseInt(valor)=="NaN"){
                $("#myModal").modal('hide');
            
                alert("Dados inválidos.");
                
                return false;
            }   
           
       
            $.ajax({
          url: "controller/emitir_boleto.php",
          data:{descricao:descricao,valor:valor,quantidade:quantidade,nome_cliente:nome_cliente,cpf:cpf,telefone:telefone,vencimento:vencimento},
          type:'post',
          dataType:'json',
          success: function(resposta){
                      $("#myModal").modal('hide');
                      console.log(resposta)
            if(resposta.code == 200){
                             $("#myModalResult").modal('show'); 
                             $("#boleto").removeClass("hide");
                             //"code":200,"data":{"barcode":"03399.32766 55400.000000 60348.101027 6 69020000009000","link":"https:\/\/visualizacaosandbox.gerencianet.com.br\/emissao\/59808_79_FORAA2\/A4XB-59808-60348-HIMA4","expire_at":"2016-08-30","charge_id":76777,"status":"waiting","total":9000,"payment":"banking_billet"-->
                             var html = "<th>"+resposta.data.charge_id+"</th>"
                                   html+= "<th>"+resposta.data.barcode+"</th>"
                                   html+= "<th><a target='blank' href='"+resposta.data.link+"'> clique aqui para acessar o boleto </a></a></th>"
                                   html+= "<th>"+resposta.data.expire_at+"</th>"
                                   html+= "<th>"+resposta.data.status+"</th>"
                                   html+= "<th>"+resposta.data.total+"</th>"
                                   html+= "<th>"+resposta.data.payment+"</th>";
                                        $("#result_table").html(html);
                                        
                              
                    }else{
                                    $("#myModal").modal('hide');
                                    alert("Code: "+ resposta.code)
                    }
                  },
                          error:function (resposta){
                              $("#myModal").modal('hide');
                              alert("Ocorreu um erro - Mensagem: "+resposta.responseText)
                          }
                });
                } //endif
                else {
                        alert("Você deverá preencher todos dados do formulário.")
                    }
             })
             
             
        });
    </script>
</body>
</html>