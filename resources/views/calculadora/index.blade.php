@extends('layouts.app')

	@section('content')	

	@section('js')
	<script  src="/js/jquery-2.2.4.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="{{asset('js/jquery.maskMoney.min.js')}}" defer></script>
	<script type="text/javascript" src='https://raw.githubusercontent.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js'></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@endsection
	<script src="/js/calculo.js"></script>
  	<link rel="stylesheet" type="text/css" href="/css/calc.css">
<center>
<div>
<form class="radius col-md-6 border shadow-lg z-index-1 " action="#">
  <div class="col-md-12">
<h4 class="border col-md-12 text-light radius1 mb-1" style="margin-bottom: -1.2em; background-color:#01DF74;">Calculadora do imposto de renda pessoa física <i class="fas fa-calculator"></i></h4>
</div>

  <div class="inputCalc " style=" padding-bottom:1em;">
  <div class="form-row" >
    <div class="form-group col-md-12">
      <label for="inputEmail4" class="d-flex justify-content-center">Renda anual bruta</label> 
      <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius  "  data-toggle="tooltip" data-placement="top" title="Salário, Férias, Ganhos Tributaveis no ano..." id="renda-bruta" placeholder="R$ 0,00" required='required'>
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
    <div class="form-group col-md-6">
      <label for="inputPassword4">Previdência social (INSS)</label>
      <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius " id="inss" placeholder="R$ 0,00">
    </div>
  </div>

 <button type="submit" class="btn text-light col-md-6 mb-2" id='calcular' style="background-color:#01DF74;">Calcular</button>
</div>
</form>
</div>
</center>
<button type="button" class="btn btn-primary fixed-bottom" disabled>
    Ano de Atuação <span class="badge badge-light"><?= date('Y'); ?></span>
</button>
<div id="tabela">
		  <div class="btn-group dropleft float-right">
		    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <i class="fas fa-info"></i>
		    </button>
			 <div class="dropdown-menu">
			      <div class='' style="padding: 1em;">
			      Faça uma doação com os dados da calculadora e receba após a confirmação da doação o documento comprovatorio de doação no seu e-mail
			      </div>
			</div>
		</div>
	<center>

	<table class="fixed-center mt-4 table table-hover col-md-10 border border-dark m-2" id='resultados'>
	  <thead class="thead-dark">

	    <tr>	
	      <th class="border border-dark" scope="">Dados</th>
	      <th class="border border-dark" class="col-md-8" scope="col">Valores resultantes do calculo</th>
	    </tr>
	    <tbody> 
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
	      <th class="border border-dark" scope="row">Valor a deduzir (-)</th>
	      <td  id="deducao">Calcule</td>  
	    </tr>
	      <tr>
	      <th class="border border-dark table-active" scope="row">Imposto de renda a restituir</th>
	      <td  class=' table-active border border-dark' id="impostorest">Calcule </td>  
	      <a name="ancora1" id="ancora1"></a>
	    </tr>
	    <tr>
	      <th class="border border-dark table-active" scope="row">Imposto de renda a pagar</th>
	      <td  class=' table-active border border-dark ' id="impostopagar">Calcule </td>  
	  
	    </tr>
	    <tr class="table-light">
	      <th class="border border-dark table-active bg-success" scope="row">Doe 6% do seu imposto para a fundeca</th>
	      <td  class='table-active border border-dark bg-success' id="valor7"></td>  
	    </tr>
	    
	  </thead>
	 </tbody>

	</table>

 </center>  
</div>
<button class='button' id="gerarpdf" onclick="CriaPDF()" style="color: red; size: 120%; float: right; margin-right: 9em;">Gerar pdf</br>
 <i class="fa  fa-file-pdf-o" aria-hidden="true"
 value="Criar PDF" id="btnImprimir" "></i></button>
 </div>
 <div style="height: 10em;"></div>

<script>
    function CriaPDF() {
        var minhaTabela = document.getElementById('tabela').innerHTML;

         var style = "<style>";
        style = style + "table {width: 100%;font: 20px Calibri;}";
        style = style + "table, th, td {border: solid 10px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
         style = style + "</style>";
        // CRIA UM OBJETO WINDOW
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write("<title>Resultados da calculadora COMDICA </title>");   // <title> CABEÇALHO DO PDF.
        win.document.write(style);                       // INCLUI UM ESTILO NA TAB HEAD
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(minhaTabela);                   // O CONTEUDO DA TABELA DENTRO DA TAG BODY
        win.document.write('</body></html>');
        win.document.close();                               // FECHA A JANELA
        win.print();                                        // IMPRIME O CONTEUDO
    }

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

