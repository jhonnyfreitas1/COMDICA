@extends('layouts.app')

	@section('content')
		@section('js')
			<script src="{{asset('/js/jquery.maskMoney.min.js')}}" defer></script>
			<script src="{{asset('/js/jquery.mask.js')}}" defer></script>
		<!-- <script type="text/javascript" src='https://raw.githubusercontent.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js'></script> -->
		<link rel="stylesheet" href="/css/style.css">
		<script type="text/javascript" src="/js/scripts.js"></script>
		@endsection
		<div class="modal fade" id="myModal" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title " id="myModalLabel">Um momento.</h4>
                </div>
                <div class="modal-body">
                    Estamos processando a requisição <img src="/img/ajax-loader.gif">.
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
         

    <div class="col-md-8 nav  row " style="margin-top: 2em;" role="tablist" >
        <nav class="col-md-12 bg-white" >
          <div class="nav nav-tabs bg-white  " id="nav-tab" role="tablist" style="">
                <a class="nav-item nav-link active shadow " id="tab-boleto" data-toggle="tab" href="#home"  role="tab" aria-controls="nav-home" aria-selected="true">Boleto único</a>
                <a class="nav-item nav-link " id="tab-carne" id="nav-home-tab"  style="" data-toggle="tab" href="#menu2" role="tablist" aria-controls="nav-profile" aria-selected="false">Carnê</a>
                <div class="btn-group dropright bg-white float-right mt-1">
                   <button type="button" class="btn bg-light text-success btn-secondary dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <i class="fas fa-info">nfo</i>
                    </button>
                      <div class="dropdown-menu ">
                         <div class="row"> 
                             <div class="card m-4 " style="height: 50%; width: 18rem;">
                                <div class="card-header">
                                     Dados da Calculadora
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Valor da doação<h5> <span class="badge badge-info"><span class="border-bottom border-danger"></span>{{'R$' . number_format($valor, 2, ',', '.')}} equivale a 6% de <br> {{$ir}} do imposto a pagar </span></h5></li>
                                    <li class="list-group-item">Data da doação<h5> <span class="badge badge-info">{{ date('d/M/Y') }}</span></h5> </li>
                                    <li class="list-group-item">Doação para<h5> <span class="badge badge-info border-bottom border-danger"> FUNDECA<br>CNPJ 26.615.546/0001-40</span></li>
                                </ul>
                            </div> 
                        </div>
                     </div>
        </nav>
        <div  class="tab-content bg-white shadow nav-tabs col-md-12  border ">
            <div  class=" tab-pane fade show active nav-tabs " id="home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div style='' class=" mx-auto col-lg-12 col-md-12 col-sm-12 col-12 nav-tabs ">
                    <div class="col-lg-12 well ">
                        <h3  class="bg-success  text-light  mb-4"><i class="fas fa-hand-holding-usd"></i> DOAÇÃO POR BOLETO ÚNICO <i class="fas fa-donate"></i></h3>               
                        <form method="POST"  id="form-boleto"  class="form-row m-2  ">
                          
                            <div class="col-lg-5">
                            <input type="hidden" id='token' name="_token" value="{{ csrf_token() }}">
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
                                    <input type="text" class="form-control" value="{{'R$' . number_format($valor, 2, ',', '.')}}" id="valor" disabled="disabled" placeholder="Valor do Produto">
                                    
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
                                         <button id="btn_emitir_boleto" type="submit" class="btn btn-success radius">Emitir boleto <img src="/img/ok-mark.png"></button>
                                            
                                    </div>            

                       
                  </div>
                </form>
             
           </div>
        </div>
        <div class="tab-pane fade" id="menu2" role="tabpanel" aria-labelledby="nav-profile-tab">         	<div  class="tab-content nav-tabs col-md-12">
            <div  class=" tab-pane fade show active nav-tabs " id="home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div style='' class=" mx-auto col-lg-12 col-md-12 col-sm-12 col-12 nav-tabs ">
                    <div class="col-lg-12 well ">
                    <h3 class="text-light bg-success"><i class="fas fa-hand-holding-usd"></i> DOAÇÃO POR BOLETO PARCELADO (CARNÊ)<i class="fas fa-donate"></i></h3>

                        <form method="POST" id="form-carne"  class="form-row m-2 ">      
                         <div class="col-lg-5">
                            <h4>Informações do doador</h4>
                            <input type="hidden" id='token1' name="_token" value="{{ csrf_token() }}">
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
                                    <input type="text" class="form-control" value="{{'R$' . number_format($valor, 2, ',', '.')}}" id="valor_carne" disabled="disabled" placeholder="Valor do Produto">
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
                                     @for ($i = 2; $i < 6; $i++)
                                        <option> {{$i}} </option>
                                    @endfor
                                </select>
                            </div>  
                        <div class="col-lg-12 m-2">
                            <button id="btn_emitir_carne" type="submit" class="btn btn-success">Emitir Carnê<img src="/img/ok-mark.png"></button>
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
 <center>
<div id="boleto" style="">
    <table id="resultados" class="fixed-center table-striped   table table-hover table table-sm  col-md-5 border border-dark">
        <thead class="thead-dark">
            <tr>
                <th class="border border-dark bg-success " style="width: 50%;" scope="">Retorno da emissão.</th>
                    <th class="border border-dark  bg-success col-md-1" scope="">Dados do Boleto <i class="fas fa-donate float-right"></i></th>
                </tr>
                <tbody> 
                    <tr>
                 <a href="" id="ancora1"></a>
                    <th class="border border-dark " scope="row">Numero da transação</th>
                    <td id="transacao"  class="  border border-dark "></td>  
                    </tr>
                    <tr>
                    <th class="border border-dark" id="resultado_cod" scope="row">Código de Barras</th>
                    <td  id="codbarra"  class="  border border-dark "> </td>  
                    </tr>
                    <tr>
                    <th class="border border-dark" scope="row">Link do Boleto </th>
                    <td id="boleto1" style="color:blue;" class="is-valid  text-primary"></td>  
                    </tr>

                    <tr>
                    <th class="border border-dark " id="resultado_vencimento" scope="row">Vencimento</th>
                    <td id="vencimento1" class="  border border-dark"> </td>   
                    </tr>
                    <tr>
                    <th  class="border border-dark " scope="row">Status</th>
                    <td id="status" class="  border border-dark "></td>  
                    </tr>
                    <tr>
                    <th class="border border-dark " id="resultado_total" scope="row">Total</th>
                    <td  id="total" class="  border border-dark "></td>  
                    </tr>
                    <tr>
                    <th class="border border-dark "   scope="row">Método de pagamento</th>
                    <td  id="metpagamento" class="  border border-dark "></td>  

                </tbody>
        </thead>
    </table> 


 </center> 
         <center>
                <table id="resultados_carne" class="fixed-center table-striped  table table-hover table table-sm  col-md-5 border border-dark">
                    <thead class="thead-dark">
                        <tr>
                                <th class="border border-dark bg-success "  style="width: 50%;" scope="">Retorno da emissão.</th>
                                <th class="border border-dark  bg-success col-md-1" scope="">Dados do Carnê<i class="fas fa-donate float-right"></i></th>
                        </tr>
                            <tbody> 
                                <tr>
                                    <a href="" id="ancora1"></a>
                                    <th class="border border-dark " scope="row">Numero do carnê</th>
                                    <td id="num_carne"  class=" border border-dark "></td>  
                                </tr>
                                <tr>
                                    <th class="border border-dark" id="resultado_cod" scope="row">Valor  da primeira parcela</th>
                                    <td  id="carne_parcelado"  class=" border border-dark "> </td>  
                                </tr>
                                <tr>
                                    <th class="border border-dark" scope="row">Link do carnê </th>
                                    <td id="link_carne" style="color:blue;" class="is-valid text-primary"></td>  
                                </tr>
                                <tr>
                                    <th class="border border-dark " id="resultado_vencimento" scope="row">Vencimento da primeira parcela</th>
                                    <td id="venc_carne" class=" border border-dark"> </td>   
                                </tr>
                                <tr>
                                    <th  class="border border-dark " scope="row">Status do carnê</th>
                                    <td id="status_carne" class=" border border-dark ">Gerado Agora</td>  
                                </tr>
                                <tr>
                                    <th class="border border-dark " id="resultado_total" scope="row">Total</th>
                                    <td  id="total_carne" class=" border border-dark"></td>  
                                </tr>
                                <tr>
                                    <th class="border border-dark "   scope="row">Forma de pagamento </th>
                                    <td  id="metodo_carne" class=" border border-dark">Boleto bancário parcelado</td>  
                                </tr>
                                <tr>
                                    <th class="border border-dark "   scope="row">Carnê Enviado para o e-mail</th>
                                    <td  id="enviado_email" class=" border border-dark"></td>  
                                </tr>
                            </tbody>
                    </thead>
                </table> 
             </center>  
 
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
            body{
                background-image: url('/img/p4.png');
                background-repeat: no-repeat;
                background-position: 100% 10%;
                
            }   
        </style>

    
    <script type="text/javascript">
        
        $(document).ready(function(){
     //Aplicando as mascaras nos inputs cpf, valor e vencimento.
   
            $(".nav-tabs a").click(function(){
                 $(this).tab('show')
            });
            
            $('#resultados_carne').hide();
            $('email_carne').tooltip();
            $('#cpf_carne').mask('000.000.000-00');
            $('#valor_carne').mask('000.000.000.000.000,00');
            $('#telefone_carne').mask('(00)0000-0000');
            $('email_carne').tooltip();
            $("#btn_emitir_carne").click(function (e){
                e.preventDefault();
                 $('#valor_carne').unmask();
                 $('#telefone_carne').unmask();
                 $('#cpf_carne').unmask();
                
                if($('#form-carne')[0].checkValidity()) {    
                     $("#myModal").modal('show');
                     $("#boleto").addClass("hide");
                     $('#valor_carne').mask('000.000.000.000.000,00');
                     $("#valor_carne").unmask();
                     var descricao = $("#descricao").val();                 
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


                    function formatReal( int )
                    {
                            var tmp = int+'';
                            tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
                            if( tmp.length > 6 )
                                    tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                                return tmp;
                    }

                    if(parseInt(nome_cliente)=="NaN" || parseInt(valor)=="NaN"){
                        $("#myModal").modal('hide');
                        alert("Dados inválidos.");
                        return false;
                    }   
                     var _token = $("#token").val();
                    $.ajax({
                      url: "/calculadora/gerar_carne",
                      data:{_token:_token,descricao:descricao,email:email,valor:valor,quantidade:quantidade,nome_cliente:nome_cliente,cpf:cpf,telefone:telefone,vencimento:vencimento,repeticoes:repeticoes},
                      type:'post',
                      dataType:'json',
                      success: function(resposta){
                            
                    $("#myModal").modal('hide');
                        console.log(resposta)
                    if(resposta.code == 200){
                        
                        $('#cpf_carne').mask('000.000.000-00');
                        $('#valor_carne').mask('000.000.000.000.000,00');
                        $('#telefone_carne').mask('(00)0000-0000');
                        var target_offset = $("#ancora1").offset();
                        var target_top = target_offset.top;
                        $('html, body').animate({ scrollTop: target_top }, 2000);
                        $("#resultados_carne").show("slow",'linear');


                         //$("#myModalResult").modal('show');
                        $('#enviado_email').html(email);
                        $("#carne").removeClass("hide");
                        $("#num_carne").html("<b>"+resposta.data.carnet_id+"</b>");
                        $("#carne_parcelado").html("<b>R$"+formatReal(resposta.data.charges[0].value)+"</b>");
                        $("#link_carne").html("<a style='color:blue;' id='link-boleto' target='_blank' href='"+resposta.data.link+"'>Abrir Carnê</a>");
                        $("#venc_carne").html("<b>"+resposta.data.charges[0].expire_at)+"</b>";
                        console.log(resposta.data)
                        $("#total_carne").html("<b>R$"+formatReal(valor)+"</b>");
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
                }else {
                        alert("Você deverá preencher todos dados do formulário.")
                    }
             })
        });
    </script>

	@endsection