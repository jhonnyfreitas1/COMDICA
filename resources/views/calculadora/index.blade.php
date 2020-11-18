@extends('layouts.app')

@section('content')

@section('js')

<script src="{{asset('js/jquery.maskMoney.min.js')}}" defer></script>
<script type="text/javascript" src='/js/jquery.maskMoney.min.js'></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script type="text/javascript" src="/js/jquery.mask.js"></script>
<script src="/js/jquery.inputmask.bundle.js"></script>
<script type="text/javascript " src="/js/cpf.js"> </script>
<script type="text/javascript " src="/js/cpf_carne.js"> </script>
@endsection

<script src="/js/calculo.js"></script>
<link rel="stylesheet" type="text/css" href="/css/calc.css">
<link rel="stylesheet" href="css/indexPwa.css">
<style>
</style>
<div class="container-flex">
<div style=" display:flex;" class="row m-2 float-left">
  <div  style="justify-content: left; display: flex; " class="m-4 card col-md-3 m-2 mt-0 float-left bg-info text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p>Os valores resultantes da calculadora podem ser diferentes do valor resultante na declaração portanto recomendamos então a maior fidelidade de dados na hora de inserir os valores na calculadora pois não será possível o ressarcimento da diferença.</p>
      <hr>
      O benefício fiscal só é válido para aqueles que optarem pela Declaração Completa do imposto de renda.
    </p>
    <footer class="blockquote-footer text-white">
      <small>
        <cite title="Source Title"></cite>
      </small>
    </footer>
  </blockquote>
</div>


<form style="align-items: center; text-align: center;margin: 0 auto" class="radius col-md-6 m-2 border shadow-lg z-index-1 " action="#">
  <div class="col-md-12">
    <h4 class="border col-md-12 text-light radius1 mb-1" style="margin-bottom: -1.2em; background-color:#01DF74;">Calculadora do imposto de renda pessoa física <i class="fas fa-calculator"></i></h4>
  </div>
  <div class="inputCalc " style=" padding-bottom:1em;">
    <div class="form-row" >
      <div class="form-group col-md-12">
        <label for="inputEmail4" class="d-flex justify-content-center">Renda anual bruta</label>
        <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius  "  data-toggle="tooltip" data-placement="top" title="Os 12(doze) salários recebidos no ano, sem gratificação, sem décimo terceiro, sem férias" id="renda-bruta" placeholder="R$ 0,00" required>
      </div>
      <div class="form-group col-md-6" >
        <label for="inputEmail4">IRRF (Imposto retido na fonte)</label>
        <input type="text"  data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius " id="nafonte" placeholder="R$ 0,00">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Número de dependentes</label>
        <input type="text" class="form-control radius " maxlength="3" size="4" id="dependentes" placeholder="1,2,3..etc" >
      </div>
    </div>

    <div class="form-row inputCalc">
      <div class="form-group col-md-6" >
        <label for="inputEmail4">Despesa anual com ensino</label>
        <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius " id="desp-ensino"  data-toggle="tooltip" data-placement="top" title="O limite de dedução é de R$3.561,50 por dependentes ano"   placeholder="R$ 0,00">
      </div>
      <div class="form-group col-md-6">
        <label class="" for="inputPassword4">Despesa anual com pensão alimentícia</label>
        <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius " id="desp-alim" placeholder="R$ 0,00">
      </div>
    </div>

    <div class="form-row inputCalc" style="margin-bottom: 1%">
      <div class="form-group col-md-6" >
        <label for="inputEmail4">Despesa anual médica</label>
        <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius " data-toggle="tooltip" data-placement="top" title="Valor de dedução ilimitada" id="desp-medic" placeholder="R$ 0,00">
      </div>
      <a name="ancora1" id="ancora1"></a>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Previdência social (INSS)</label>
        <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius " id="inss" placeholder="R$ 0,00">
      </div>
    </div>

    <button type="submit" class="btn text-light col-md-6 mb-2" id='calcular' style="background-color:#01DF74;">Calcular</button>
  </div>
</form>
</div>
<div style="height: 50%; margin: 0;" class="btn-group dropleft">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-info"></i>
  </button>
  <div class="dropdown-menu">
   <div class='' style="padding: 1em;">
     Faça uma doação com os dados da calculadora gerando um boleto e após o pagamento acesse área do <a href="/sou_doador">Sou doador</a>
     para confirmar o pagamento e gerar seu recibo de doação.
   </div>
 </div>
</div>
</div>
<div id="tabela" class="table-responsive">

  <button type="button" class="btn btn-primary fixed-bottom" disabled>
    Ano de Atuação <span class="badge badge-light"><?= date('Y'); ?></span>
  </button>

  <center>
   <table class="fixed-center mt-4 table table-hover col-md-10 border  border-light m-2" id='resultados'>
     <thead class="thead-dark col-10">

       <tr class="col-12">
         <th class="border border-dark" scope="">Dados</th>
         <th class="border border-dark" class="col-md-8" scope="col">Valores resultantes do calculo</th>
       </tr>
       <tbody class="col-9">
         <tr>

           <th class="border border-dark" scope="row">Renda Anual Bruta</th>
           <td id="suarendaanual">Calcule</td>
         </tr>
         <tr>
           <th class="border border-dark" scope="row">IRRF (Imposto de renda retido na fonte)</th>
           <td  id="irrf"></td>
         </tr>
         <tr>
           <th class="border border-dark" scope="row"> Rendimentos Debitaveis (-)</th>
           <td id="seusdebitos">Calcule</td>
         </tr>

         <tr>
           <th class="border border-dark" scope="row">Base para calculo</th>
           <td id="basedecalculo">Calcule</td>
         </tr>
         <tr>
           <th  class="border border-dark" scope="row">Alíquota Aplicada</th>
           <td id="eliquota">Calcule</td>
         </tr>
         <tr>
           <th class="border border-dark" scope="row">Imposto de renda</th>
           <td  id="impostoir">Calcule</td>
         </tr>
         <tr>
           <th class="border border-dark" scope="row">3% do imposto de renda</th>
           <td  id="impostoir3">Calcule</td>
         </tr>
         {{-- <tr>
           <th class="border border-dark" scope="row">Valor a deduzir (-)</th>
           <td  id="deducao">Calcule</td>
         </tr> --}}
       </tr>
       {{-- <tr>
        <th class="border border-dark" scope="row">Imposto devido</th>
        <td  id="impostodevido">Calcule</td>
      </tr> --}}
      <tr class="table-light">
       <th class="border border-dark table-active bg-success" scope="row">Doe 3% do seu imposto para o fundeca</th>
       <td  class='table-active border border-dark bg-success'><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick" />
        <input type="hidden" name="hosted_button_id" value="ZAPXC4CKT6F6Y" />
        <input type="image" src="https://lh3.googleusercontent.com/proxy/GgIuqVagQMMS7XZkDpTs5HG2SbyAtKW5_5Euqwag72rHunlGiwnNU9Y0nbun9pfIF91HN1qP1BLNx40T3cmXRM23NCbueMqePqcJ7iFRdNqw-w91iUgL5mFDGLe0R4U" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/en_BR/i/scr/pixel.gif" width="1" height="1" />
        </form></td>
     </tr>
   </thead>
 </tbody>

</table>
</thead>
</table>

</div>
</div>
</center>
</div>


<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content"  style="" >
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar doação por boleto único</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id="corpo_modal">
      <form>
      <div class="form-row inputCalc">

        <div class="form-group col-md-12" >
          <label class="text-light bg-success p-1 font-weight-bold"> Valor a ser doado:<span  class="text-danger">*</span></label>
          <input type="text " class="form-control radius "  name="" value="" id="valor_doar" placeholder="R$: 00.00" disabled>
        </div>
      </div>
      <div class="form-row ">
        <div class="form-group col-md-12" >
          <input type="hidden" id='token' name="_token" value="{{ csrf_token() }}">
          <label class="text-light bg-success p-1 font-weight-bold"> CPF do Doador:</label><span id="cpf" class="text-danger bg-light font-weight-bold p-1">*</span>
          <input type="text" class="form-control radius user_cpf" id="user_cpf" placeholder="000.000.000-00" required>
        </div>
      </div>
      <div class="form-row ">
        <div class="form-group col-md-12" >
          <label class="text-light bg-success p-1 font-weight-bold"> E-mail do doador:</label>
          <input type="email" class="form-control radius " id="e-mail" placeholder="EX: comdicadoador@comdica.como" required>
        </div>
      </div>
      <div class="form-row inputCalc">
        <div class="form-group col-md-12" >
         <label class="text-light bg-success font-weight-bold p-1"> Nome completo:<span class="text-danger">*</span></label>
         <input type="text" class="form-control radius " name="" value="" id="nome" placeholder="EX: jose da silva" required>
       </div>
     </div>
   </div>
   <div class="input-group mb-3 col-md-11 ">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <input id="check_termo" type="checkbox" aria-label="Checkbox for following text input">
      </div>
    </div>
    <input type="text" class="form-control" aria-label="Text input with checkbox" id="aceita_termo" value="Aceito e estou ciente de todas as regras" disabled="disabled">
  </div>
  <a href="/calculadora/termos_e_regras" style="margin-top: -1em; font-size: 80%;" target="_blank" class="font-weight-bold col-md-4">Termos e regras</a>
  <div class="modal-footer bg-light">
    <div class="row-2 rounded container  bg-info text-center " style="">
      <h6 class="text-light " style="text-align: center;">Ambiente seguro</h6>
      <img src="/img/ambiente-seguro.png"  class="col-md-5 ">
      <img src="/img/ssl.png"  class="col-md-6 ">
    </div>
      <img src="/img/ajax-loader.gif" class="col-md-3 col-5" id="loading1" style="display: none;">
    <button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-success"  id="mudar">Doar por boleto</button>
  </div>
</div>
</div>
</form>
</div>
<div class="modal fade" id="modalcarne" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content"  style="" >
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar doação por carne parcelado</h5> <!-- <i class="fas fa-user-shield text-success fa-2x"></i>
      -->        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id="corpo_modal">
      <div class="form-row inputCalc">
        <div class="form-group col-md-12" >
          <label class="text-light bg-primary p-1 font-weight-bold" data-toggle="tooltip" data-placement="top" title="Valor fixo resultante da calculadora"> Valor a ser doado:<span  class="text-danger">*</span></label>
          <input type="text " class="form-control radius "  name="" value="" id="valor_doar_carne" placeholder="R$: 00.00"  disabled>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2"  class="text-light bg-primary p-1 font-weight-bold">Selecione em quantas parcelas pretende pagar<span  class="text-danger">*</span></label>
          <select class="form-control" name="quantidade_parcelas" id="quantidade_parcelas" data-toggle="tooltip" data-placement="top" title="Se não selecionado irá gerar um boleto único" required>
            <option selected class="form-control radius ">Selecione</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        </div>
      </div>
      <div class="form-row inputCalc">
        <div class="form-group col-md-12" >
          <input type="hidden" id='token' name="_token" value="{{ csrf_token() }}">
          <label class="text-light bg-primary p-1 font-weight-bold"> CPF do Doador:</label><span  class="text-danger bg-light font-weight-bold" id="cpf_carne_msg">*</span>
          <input type="text" class="form-control radius" id="cpf_carne" placeholder="000.000.000-00" required>
        </div>
      </div>
       <div class="form-row ">
        <div class="form-group col-md-12" >
          <label class="text-light bg-primary p-1 font-weight-bold"> E-mail do doador:</label>
          <input type="email" class="form-control radius " id="email_carne" placeholder="EX: comdicadoador@comdica.como" required>
        </div>
      </div>
      <div class="form-row inputCalc">
        <div class="form-group col-md-12" >
         <label class="text-light bg-primary font-weight-bold p-1"> Nome completo:<span class="text-danger">*</span></label>
         <input type="text" class="form-control radius " name="" value="" id="nome_carne" placeholder="EX: jose da silva"  data-toggle="tooltip" data-placement="top" title="O nome completo do doador é essencial" required>
       </div>
     </div>
   </div>
   <div class="input-group mb-3 col-md-11 ">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <input type="checkbox" id="check_termo_carne"  aria-label="Checkbox for following text input">
      </div>
    </div>
    <input type="text" class="form-control" id="aceita_termo_carne"  value="Aceito e estou ciente de todas as regras" disabled="disabled">
  </div>
  <a href="/calculadora/termos_e_regras" style="margin-top: -1em; font-size: 80%;" target="_blank" class="font-weight-bold col-md-4">Termos e regras</a>
  <div class="modal-footer bg-light">
    <div class="row-2 rounded container  bg-info text-center " style="">
      <h6 class="text-light " style="text-align: center;">Ambiente seguro</h6>
      <img src="/img/ambiente-seguro.png"  class="col-md-5 ">
      <img src="/img/ssl.png"  class="col-md-6 ">
    </div>
        <img src="/img/ajax-loader.gif" class="col-md-3 col-5" id="loading" style="display: none;">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="mudar2">Doar por carne</button>

    </div>
  </div>
</div>
</div>
</div>

<a name="ancora2" id="ancora2"></a>
<div class="col-md-12container col-12" id="resultado_boleto">

</div>

<script>


  $(document).ready(function (){
   $('[data-toggle="tooltip"]').tooltip()

   $("#mudar").on('click',function(e){

    if ($("#nome").val() != ""  && $("#user_cpf").val() != "" && $("#valor_doar").maskMoney('unmasked')[0] != "" &&   $("#token").val() != "" && $("#e-mail").val() != "") {
     if($("#check_termo").prop("checked") == true){

      gerarBoleto();
       e.preventDefault();
    }
    else{
      alert("Aceite o termo para continuar.");
    }
  }
});
   $("#mudar2").on('click',function(){

    if ($("#nome_carne").val() != ""  && $("#cpf_carne").val() != "" && $("#valor_doar_carne").maskMoney('unmasked')[0] != "" &&   $("#token").val() != "" && $("#quantidade_parcelas").children("option:selected").val() != "Selecione" && $("#email_carne").val() != "") {
     if($("#check_termo_carne").prop("checked") == true){
      gerarCarne();
    }
    else{
      alert("Aceite o termo para continuar");
    }
  }else{
    alert('preencha todos os dados');
  }
});

   $(document).ready(function(){
    $('#check_termo').click(function(){
      if($(this).prop("checked") == true){
        $('#mudar').removeAttr("disabled");
        $('#aceita_termo').removeClass("border border-danger");
      }
      else if($(this).prop("checked") == false){
        $( "#mudar" ).prop( "disabled", true );
        $('#aceita_termo').addClass("border border-danger");

      }
    });
  });
   $(document).ready(function(){
    $('#check_termo_carne').click(function(){
      if($(this).prop("checked") == true){
        $('#mudar2').removeAttr("disabled");
        $('#aceita_termo_carne').removeClass("border border-danger");
      }
      else if($(this).prop("checked") == false){
        $( "#mudar2" ).prop( "disabled", true );
        $('#aceita_termo_carne').addClass("border border-danger");

      }
    });
  });
   function gerarBoleto(){
    var nome = $("#nome").val().toLowerCase();
    var cpf = $("#user_cpf").val().replace(/\.|\-/g,'');
    var valor = $("#valor_doar").maskMoney('unmasked')[0];;
    var token = $("#token").val();
    var email = $("#e-mail").val();

      if (valor >= 6) {
          $("#mudar").hide();
          $("#loading1").show();
          $.post('boleto/gerar', {nome:nome , cpf:cpf , valor:valor, _token:token,email:email},function(data){
            $("#resultado_boleto").html(data);
            $("#modalExemplo").modal('hide');
            $("#mudar").show();
            $("#loading1").hide();
            var target_offset = $("#ancora2").offset();
            var target_top = target_offset.top;
            $('html, body').animate({ scrollTop: target_top },50);
          });
      }else{
        alert("O Valor da doação deve ser maior ou igual R$6.00, para poder custiar os gastos terceiros no processo de doação");
      }
  }

  function gerarCarne(){
        var nome = $("#nome_carne").val().toLowerCase();
        var cpf = $("#cpf_carne").val().replace(/\.|\-/g,'');
        var email = $("#email_carne").val();
        var valor = $("#valor_doar_carne").maskMoney('unmasked')[0];;
        var token = $("#token").val();
        var quantidade_parcelas = $("#quantidade_parcelas").val();

        if (valor / quantidade_parcelas >= 6) {
        $("#mudar2").hide();
        $("#loading").show();
        $.post('carne/gerar', {nome:nome , cpf:cpf , valor:valor, _token:token, parcelas:quantidade_parcelas,email:email},function(data){
          console.log(data);
          $("#mudar2").show();

          $("#loading").hide();
          $("#resultado_boleto").html(data);
          $("#modalcarne").modal('hide');
          var target_offset = $("#ancora2").offset();
          var target_top = target_offset.top;
          $('html, body').animate({ scrollTop: target_top },50);
        });
      }else{
          alert("O Valor das parcelas deve ser maior ou igual que R$6.00, para poder custiar os gastos terceiros no processo de doação diminua o numero de parcelas ou faça uma doação com boleto único");
      }
    }
  });

</script>
  </div>

  <p id="isento"> </p>
  <style type="text/css">
    .centered {
      margin: 0 auto !important;
      float: none !important;

    }
    a{
      font-weight: bolder;
    }
    a:hover{
      color:#212529;
    }
    h5{
      color: black;
    }
    #pulse{
      animation: pulse 0.7s infinite;
      animation-direction: alternate;
      -webkit-animation-name: pulse;
      animation-name: pulse;
    }

    @-webkit-keyframes pulse {
      0% {
        -webkit-transform: scale(1);
        -webkit-filter: brightness(100%);
      }
      100% {
        -webkit-transform: scale(1.1);
        -webkit-filter: brightness(110%);
      }
    }

    @keyframes pulse {
      0% {
        transform: scale(1.1);
        filter: brightness(125%);
      }
      100% {
        transform: scale(1.0);
        filter: brightness(100%);
      }


    </style>

    <div>
      @endsection
