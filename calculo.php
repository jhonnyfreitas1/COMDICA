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
</head>

<?php 
    include 'nav.php';
 ?>

<body>

<form>
  <div class="inputCalc" style="margin-top: 2%;">
  <div class="form-row" >
    <div class="form-group col-md-6" >
      <label for="inputEmail4"  >Renda bruta</label>
      <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="form-control radius" id="renda-bruta" placeholder="R$ 0,00">
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
      <label for="inputPassword4">Despesa anual com pensão alimentícia</label>
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

 <button type="submit" class="btn btn-success" id='calcular' style="width: 10%; display: block; margin: auto;">Calcular</button>

</form>

<!-- jQuery first, then Popperjs, then Bootstrap JS -->


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