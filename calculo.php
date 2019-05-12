<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
<style type="text/css">
  a{
    color:#212529;
    font-weight: bolder;
  }
  a:hover{
    color:#212529;
  }
</style>
 <meta name="viewport" content="width=device-width, initial-scale=1">    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.maskMoney.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/calc.css">
 <script src="assets/js/calculo.js"></script>
  <title>Cálculo do imposto de renda</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<?php 
    include 'nav.php';
 ?>

<body>

<form class="col-md-12">
  <div class="inputCalc" style="margin-top: 2%;">
  <div class="form-row" >
    
    <div class="form-group col-md-12">
      <label for="inputEmail4"  class="d-flex justify-content-center">Renda anual bruta</label> 
      <input type="text" require data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius "  data-toggle="tooltip" data-placement="top" title="Salário, Férias, Ganhos Tributaveis no ano " id="renda-bruta" placeholder="R$ 0,00">
    </div>
     <div class="form-group col-md-6" >
      <label for="inputEmail4">13º Salário</label>
      <input type="text" require data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius" id="13salario" placeholder="R$ 0,00">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Número de dependentes</label>
      <input type="text" class="form-control radius" maxlength="3" size="4" id="dependentes" placeholder="1,2,3..etc" >
    </div>
  </div>
</div>

<div class="form-row inputCalc">
    <div class="form-group col-md-6" >
      <label for="inputEmail4">Despesa anual com ensino</label>
      <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius" id="desp-ensino" placeholder="R$ 0,00">
    </div>
    <div class="form-group col-md-6">
      <label class="row " for="inputPassword4">Despesa anual com pensão alimentícia</label>
      <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius" id="desp-alim" placeholder="R$ 0,00">
    </div>
  </div>

<div class="form-row inputCalc" style="margin-bottom: 1%">
    <div class="form-group col-md-6" >
      <label for="inputEmail4">Despesa anual médica</label>
      <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius" id="desp-medic" placeholder="R$ 0,00">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Previdência social (INSS)</label>
      <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius" id="inss" placeholder="R$ 0,00">
    </div>
  </div>

 <button type="submit" class="btn btn-success " id='calcular' style="width: 20%; display: block; margin: auto;">Calcular</button>

</form>

<!-- jQuery first, then Popperjs, then Bootstrap JS -->
<div class="row col-md-12 m-2" style=""  id='resultados' >
<div   class="alert alert-warning col-md-6" role="alert">

  <h4 class="alert-heading">Antes de doar</h4>
  <p id="seuinss">Inss: <b>201111</b></p>
  <p id="suarendaanual">Renda anual:<b> 240000</b></p>
  <p id="seusdebitos">Debitos da base:<b> 20000</b></p>
  <p id="basedecalculo">Base de calculo:<b> 200000</b></p>
   <p id="eliquota">Eliquota:<b> 7%</b></p>
   <p id="impostoir">IR:<b> 7%</b></p>
  <hr>
  <p class="mb-0">O nosso simulador não deve ser substituido pela calculadora oficial da Receita da Fazenda</p>
</div>

<div    class="alert alert-success col-md-6 " role="alert">
  <h4 class="alert-heading">Doando 6%</h4>
  <p id="seuinss2">Inss: <b>201111</b></p>
  <p id="suarendaanual2">Renda anual:<b> 240000</b></p>
  <p id="seusdebitos2">Debitos da base:<b> 20000</b></p>
  <p id="basedecalculo2">Base de calculo:<b> 200000</b></p>
   <p id="eliquota2">Eliquota:<b> 7%</b></p>
   <p id="impostoir2">IR:<b> 7%</b></p>
   <p id="valor7"></p>
   <button class="btn-success" id="doar"></button>
  <hr>
  <p class="mb-0">Alguma informação que seja de grande importancia.</p>

</div>
</div>
</div>

<p id="isento"> </p>
<style type="text/css">
  .centered {
    margin: 0 auto !important;
    float: none !important;

  }
  h5{
    color: black;
  } 

</style>
</body>
 
<?php 
    include 'footer.php';
?>

</html>