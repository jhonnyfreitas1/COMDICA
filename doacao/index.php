<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
          <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../bootstrap/css/style.css">
        <script type="text/javascript" src="../bootstrap/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script type="text/javascript" src="../bootstrap/js/jquery.mask.js"></script>
        <script type="text/javascript" src="../bootstrap/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title></title>
        
    </head>

    <?php 
    include '../nav.php';
        $valor = htmlspecialchars($_GET['valor']);  
        $forma = htmlspecialchars($_GET['forma']);
        $avista = htmlspecialchars($_GET['avista']);
     ?>
    <body>

            <!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

        <div style='margin-top:2em; position: center;' class=" mx-auto col-lg-12 col-md-12 col-sm-12 col-12 ">
            <div class="col-lg-8 well ">
                <form method="POST" id="form-boleto"  class="form-row m-2">
                    <div class="col-lg-5">
                        <h4>Informações do produto/serviço</h4>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Descrição</label>
                            <input type="text" disabled='disabled' value="Doação" class="form-control" id="descricao" placeholder="Descrição do produto">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" >Valor do produto/serviço: </label>
                            <input type="text" class="form-control" value="<?php echo $valor ?>" id="valor" disabled="disabled" placeholder="Valor do Produto">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quantidade</label>
                            <select id="quantidade" class="form-control">
                                <?php for ($i = 1; $i < 20; $i++): ?>
                                    <option><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>



                    </div>
                    <div class="col-lg-5">
                        <h4>Informações do cliente</h4>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome do cliente*: </label>
                            <input type="text" class="form-control" id="nome_cliente" placeholder="Nome do cliente" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">CPF*: </label>
                            <input type="text" class="form-control" id="cpf" placeholder="CPF"  required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telefone*:</label>
                            <input type="text" class="form-control" id="telefone" placeholder="Telefone" required>
                        </div>


                    </div>
                    <div class="col-lg-5">
                        <h4>Vencimento</h4>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Data de vencimento:</label>
                            <input type="text" disabled="disabled"  class="form-control" value="<?php echo date('d-m-Y', strtotime('+1 month'));?>"  id="vencimento" placeholder="Data de vencimento">
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <button id="btn_emitir_boleto" type="submit" class="btn btn-success">Emitir boleto <img src="../assets/img/ok-mark.png"></button>
                    </div>
            </div>

        </form>
        </div>
      <!--   <div class="hide col-lg-8 col-12 col-md-10">
            <div class="panel panel-success">
                <div class="panel-body">
                <caption><h3>Retorno da emissão.</h3></caption> 
                      <table class="table fixed-center  table  col-md-10 border border-dark m-2"> 
                        <thead> 
                            <tr class="">
                                <th class="border border-dark"></th> 
                                <th class="border border-dark">Código de Barras</th> 
                                <th class="border border-dark">Link</th> 
                                <th class="border border-dark">Vencimento </th> 
                                <th class="border border-dark">Status </th> 
                                <th class="border border-dark">Total</th> 
                                <th class="border border-dark">Método de pagamento</th> 
                            </tr class='border border-dark'> 
                        </thead> 
                        <tbody> 
                            <tr id="result_table"> 
                            </tr> 
                        </tbody> 
                    </table>
                </div>            
            </div>            
        </div>            

    </div>
        </div> -->
        
<div id="boleto" >
<table class="fixed-center table-striped   table table-hover table table-sm  col-md-10 border border-dark m-2"  style="background-image: url(../assets/img/p1.png); background-repeat: no-repeat; background-position: center; background-size:40%;">
  <thead class="thead-dark">
  <tr>
      <th class="border border-dark bg-dark" scope="">Retorno da emissão.</th>
        <th class="border border-dark" scope="">Dados</th>
    </tr>
    <tbody> 
    <tr>
   
      <th class="border border-dark " scope="row">Numero da transação</th>
      <td id="transacao" class="text-light bg-dark border border-dark "></td>  
    </tr>
    <tr>
      <th class="border border-dark " scope="row">Código de Barras</th>
      <td  id="codbarra" class="text-light bg-dark border border-dark "></td>  
    </tr>
    <tr>
      <th class="border border-dark" scope="row">Link do Boleto </th>
      <td id="boleto1" style="color:blue;" class="is-valid bg-dark text-primary"></td>  
    </tr>

    <tr>
      <th class="border border-dark " scope="row">Vencimento</th>
       <td id="vencimento1" class="text-light bg-dark border border-dark"></td>   
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
    
  </thead>
 </tbody>

</table>

 </center>  
</div>   
        <style type="text/css">
            #form-boleto{
                font-family:italic;
                background-color: #f2f2f2;
                  display: flex;
                  align-items: center;
                  justify-content: center;
            }
            #btn_emitir_boleto{
               margin-left: 40%;
               margin-right: 10%;
            }
        </style>

    </body>
<?php 
    include '../footer.php';
?>

</html>
