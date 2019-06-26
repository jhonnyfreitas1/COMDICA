<!DOCTYPE html>
<html>
    <?php 
    include 'nav.php';
        $valor = htmlspecialchars($_GET['valor']);  
     ?> 

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <script type="text/javascript" src="assets/js/scripts.js"></script>
        <title>Emita seu boleto de Doação</title>
        
    </head>
    <body>

            <!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
    <div class="modal fade" id="myModal" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title " id="myModalLabel">Um momento.</h4>
                </div>
                <div class="modal-body">
                    Estamos processando a requisição <img src="../assets/img/ajax-loader.gif">.
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>
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
    <center>
         

    <div class="col-md-8  nav nav-tabs row" style="margin-top: 2em;" role="tablist" >
        <nav class="col-md-12 " >
          <div class="nav nav-tabs" id="nav-tab" role="tablist" style="">
                <a class="nav-item nav-link active" id="tab-boleto" data-toggle="tab" href="#home"  role="tab" aria-controls="nav-home" aria-selected="true">Boleto único</a>
                <a class="nav-item nav-link" id="tab-carne" id="nav-home-tab"  style="" data-toggle="tab" href="#menu2" role="tablist" aria-controls="nav-profile" aria-selected="false">Carnê</a>
                <div class="btn-group dropright float-right mt-1">
                   <button type="button" class="btn bg-light text-success btn-secondary dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <i class="fas fa-info">nfo</i>
                    </button>
                      <div class="dropdown-menu">
                         <div class="row"> 
                             <div class="card m-4 " style="height: 50%; width: 18rem;">
                                <div class="card-header">
                                     Dados da Calculadora
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Valor da doação<h5> <span class="badge badge-info"><span class="border-bottom border-danger"> <?= $valor ?></span> <?= ' equivale a 6% de<br>'. $_GET['ir'] ?> do imposto a pagar </span></h5></li>
                                    <li class="list-group-item">Data da doação<h5> <span class="badge badge-info"><?= date('d/M/Y') ?></span></h5> </li>
                                    <li class="list-group-item">Doação para<h5> <span class="badge badge-info border-bottom border-danger"> FUNDECA<br>CNPJ 26.615.546/0001-40</span></li>
                                </ul>
                            </div> 
                        </div>
                     </div>
        </nav>
        <div  class="tab-content nav-tabs col-md-12  border">
            <div  class=" tab-pane fade show active nav-tabs " id="home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div style='' class=" mx-auto col-lg-12 col-md-12 col-sm-12 col-12 nav-tabs ">
                    <div class="col-lg-12 well ">
                        <h3 class="text-light bg-success mb-4"><i class="fas fa-hand-holding-usd"></i> DOAÇÃO POR BOLETO ÚNICO <i class="fas fa-donate"></i></h3>               
                        <form method="POST" id="form-boleto"  class="form-row m-2  ">
                          
                            <div class="col-lg-5">

                                <h4>Informações do doador</h4>
                                <div class="form-group radius" >
                                    <label for="exampleInputEmail1">Nome completo<span style="color: red;">*</span>: </label>
                                    <input type="text" class="form-control " id="nome_cliente" placeholder="Nome do cliente" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">CPF<span style="color: red;">*</span>: </label>
                                    <input type="text" class="form-control" id="cpf" placeholder="000.000.000-00"  required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Telefone<span style="color: red;">*</span>:</label>
                                    <input type="text" class="form-control" id="telefone" placeholder="00000000000" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-mail<span style="color: red;">*</span>:</label>
                                    <input type="email" name='email' class="form-control" data-toggle="tooltip" data-placement="top" title="Nesse e-mail após o pagamento você receberá o comprovante de doação"  id="email" placeholder="exemplo@exemplo.com" required>
                                </div>                    
                            </div>

                            <div class="p-2 col-lg-5" >
                                <h4 class="">Informações da doação</h4>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição</label>
                                    <input type="text" disabled='disabled' value="Doação por boleto bancário" class="form-control" id="descricao" placeholder="Descrição do produto">
                                </div>
                                <div class="form-group">
                                    <label>Valor da doação</label>
                                    <input type="text" class="form-control" value="<?php echo $valor ?>" id="valor" disabled="disabled" placeholder="Valor do Produto">
                                    
                                </div>
                                <div class="form-group">

                                    <label for="exampleInputEmail1 mt-1">Quantidade</label>
                                    <input type="text" class="form-control" disabled='disabled' name="quantidade" value="1">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Data de vencimento:</label>
                                    <input type="text" disabled="disabled"  class="form-control" value="<?php echo date('d/m/Y', strtotime('+1 month'));?>"  id="vencimento" placeholder="Data de vencimento">
                                </div>

                                 
                            </div>
                                     <div class="col-lg-12 m-2">     
                                         <button id="btn_emitir_boleto" type="submit" class="btn btn-success radius">Emitir boleto <img src="../assets/img/ok-mark.png"></button>
                                            
                                    </div>            

                       
                  </div>
                </form>
             
           </div>
        </div>
        <div class="tab-pane fade" id="menu2" role="tabpanel" aria-labelledby="nav-profile-tab">                          <div  class="tab-content nav-tabs col-md-12  ">
            <div  class=" tab-pane fade show active nav-tabs " id="home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div style='' class=" mx-auto col-lg-12 col-md-12 col-sm-12 col-12 nav-tabs ">
                    <div class="col-lg-12 well ">
                    <h3 class="text-light bg-success"><i class="fas fa-hand-holding-usd"></i> DOAÇÃO POR BOLETO PARCELADO (CARNÊ)<i class="fas fa-donate"></i></h3>

                        <form method="POST" id="form-carne"  class="form-row m-2 ">      
                         <div class="col-lg-5">
                            <h4>Informações do doador</h4>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome completo<span style="color: red;">*</span>: </label>
                                <input type="text" class="form-control" id="nome_cliente_carne" placeholder="Nome do cliente" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">CPF<span style="color: red;">*</span>: </label>
                                <input type="text" class="form-control" id="cpf_carne" placeholder="000.000.000-00"  required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telefone<span style="color: red;">*</span>:</label>
                                <input type="text" class="form-control" id="telefone_carne" placeholder="00000000000" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail<span style="color: red;">*</span>:</label>
                                <input type="email" class="form-control" data-toggle="tooltip" data-placement="top" title="Nesse e-mail após o pagamento você receberá o comprovante de doação"  id="email_carne" placeholder="exemplo@exemplo.com" required>
                            </div>
                                            
                        </div>
                          <div class="col-lg-5">
                                
                                <h4>Informações da doação</h4>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descrição</label>
                                    <input type="text" disabled='disabled' value="Doação" class="form-control" id="descricao" placeholder="Descrição do produto">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" >Valor da doação </label>
                                    <input type="text" class="form-control" value="<?php echo $valor ?>" id="valor_carne" disabled="disabled" placeholder="Valor do Produto">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Quantidade</label>
                                    <select id="quantidade_carne" class="form-control" disabled="disabled">
                                        <?php for ($i = 1; $i < 20; $i++): ?>
                                            <option><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Data de vencimento da primeira parcela:</label>
                                    <input type="text" disabled="disabled"  class="form-control" value="<?php echo date('d/m/y', strtotime('+1 month'));?>"  id="vencimento_carne" placeholder="Data de vencimento">
                                    <input type="hidden" value='carne' disabled="disabled"  class="form-control">
                                </div>

                            </div>
                              <div class="form-group col-lg-8">
                                <label for="exampleInputPassword1">Número de parcelas<span style="color: red;">*</span>:</label></label>
                                <select required id="repeticoes" class="form-control">
                                    <?php for ($i = 1; $i < 6; $i++): ?>
                                        <option><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>  
                        <div class="col-lg-12 m-2">
                            <button id="btn_emitir_carne" type="submit" class="btn btn-success">Emitir Carnê<img src="../assets/img/ok-mark.png"></button>
                        </div>
                  </div>
                </form>
               </div>
            </div>          
          </div>
         </div>
        </div>
    </div>  
 </center>
 </div>
<a href="../calculo.php" class="btn btn-dark"><i class="fas fa-calculator">Voltar</i></a>
<div id="boleto" >
    <table class="fixed-center table-striped   table table-hover table table-sm  col-md-5 border border-dark">
        <thead class="thead-dark">
            <tr>
                <th class="border border-dark bg-success " scope="">Retorno da emissão.</th>
                    <th class="border border-dark  bg-success col-md-1" scope="">Dados</th>
                </tr>
                <tbody> 
                    <tr>
                
                    <th class="border border-dark " scope="row">Numero da transação</th>
                    <td id="transacao" class="text-light bg-dark border border-dark "></td>  
                    </tr>
                    <tr>
                    <th class="border border-dark " scope="row">Código de Barras</th>
                    <td  id="codbarra" class="text-light bg-dark border border-dark "> </td>  
                    </tr>
                    <tr>
                    <th class="border border-dark" scope="row">Link do Boleto </th>
                    <td id="boleto1" style="color:blue;" class="is-valid bg-dark text-primary"></td>  
                    </tr>

                    <tr>
                    <th class="border border-dark " scope="row">Vencimento</th>
                    <td id="vencimento1" class="text-light bg-dark border border-dark"> </td>   
                    </tr>
                    <tr>
                    <th  class="border border-dark " scope="row">Status</th>
                    <td id="status" class="text-light bg-dark border border-dark "></td>  
                    </tr>
                    <tr>
                    <th class="border border-dark " scope="row">Total</th>
                    <td  id="total" class="text-light bg-dark border border-dark "></td>  
                    </tr>
                    <tr>
                    <th class="border border-dark "  scope="row">Método de pagamento</th>
                    <td  id="metpagamento" class="text-light bg-dark border border-dark "></td>  
                </tbody>
        </thead>
    </table> 


 </center>  
</div>   
        <style type="text/css">
            #form-boleto{
                font-family:italic;
                padding: 1em;
                  display: flex;
                  align-items: center;
                  justify-content: center;
            }
             #form-carne{
                font-family:italic;
                padding: 1em;
                  display: flex;
                  align-items: center;
                  justify-content: center;
            }
            #btn_emitir_boleto{
           
            }   
        </style>

    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
                $('e-mail').tooltip();
        });
    
        $(document).ready(function(){
     //Aplicando as mascaras nos inputs cpf, valor e vencimento.
    $("#btn_emitir_carne").click(function (e){
        e.preventDefault();
         if($('#form-carne')[0].checkValidity()) {    
         $("#myModal").modal('show');
         $("#boleto").addClass("hide");
         var descricao = $("#descricao").val();
         
        $('#valor_carne').mask('000.000.000.000.000,00');
         $("#valor_carne").unmask();
         var valor = escapeHtml($("#valor_carne").val() );
         var repeticoes = $("#repeticoes").val(); 
         var quantidade = 1;
         var nome_cliente = escapeHtml($("#nome_cliente_carne").val());
          var cpf = $("#cpf_carne").val();
         var telefone = $("#telefone_carne").val();
         var email = escapeHtml($('#email_carne').val());
         var vencimento = $("#vencimento_carne").val();
        

    
            function escapeHtml(text) {
             return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
            }
            if(parseInt(nome_cliente)=="NaN" || parseInt(valor)=="NaN"){
                $("#myModal").modal('hide');
                alert("Dados inválidos.");
                return false;
            }   
           
       
            $.ajax({
          url: "controller/emitir_carne.php",
          data:{descricao:descricao,email:email,valor:valor,quantidade:quantidade,nome_cliente:nome_cliente,cpf:cpf,telefone:telefone,vencimento:vencimento,repeticoes:repeticoes},
          type:'post',
          dataType:'json',
          success: function(resposta){
                    
                    $("#myModal").modal('hide');
                      console.log(resposta)
            if(resposta.code == 200){
              
                             $("#myModalResult").modal('show'); 
                             $("#boleto").removeClass("hide");
                            $("#transacao").html("<b>"+resposta.data.charge_id+"</b>");
                            $("#codbarra").html("<b>"+resposta.data.barcode+"</b>");
                            $("#boleto1").html("<a style='color:blue;' id='link-boleto' target='_blank' href='"+resposta.data.link+"'>Abrir Boleto</a>");
                            $("#vencimento1").html("<b>"+resposta.data.expire_at)+"</b>";
                          if (resposta.data.status == 'waiting') {
                              $("#status").html("<b>Aguardando</b>");
                           }else{
                               $("#status").html("<b>"+resposta.data.status+"</b>");
                             }
                               $("#total").html("<b>"+resposta.data.total+"</b>");
                            if (resposta.data.payment == 'banking_billet' ) {
                                $("#metpagamento").html("<b>Boleto bancário</b>");
                             }else{
                                $("#metpagamento").html("<b>"+resposta.data.payment+"</b>");
                              }
                                 window.open(resposta.data.link, "_blank");                                        
                                                                    
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
<?php 
    include 'footer.php';
?>

</html>
