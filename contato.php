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

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Cálculo do imposto de renda</title>
</head>

<?php 
  include 'nav.php';
 ?>

<body>

<form>
<div style="margin-left: 10%; margin-right: 10%;margin-top: 5%;margin-bottom: 1%;">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" id="inputNome">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" class="form-control" id="inputEmail" >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Telefone</label>
      <input type="tel" class="form-control" id="inputTelefone">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Assunto</label>
      <select id="inputState" class="form-control">
        <option selected>Escolha</option>
        <option>Dúvidas</option>
        <option>Sugestões</option>
        <option>Reclamações</option>
      </select>
    </div>

    <div class="form-group" style="width: 100%;">
    <label for="exampleFormControlTextarea1">Mensagem</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>

  </div>
</div>
 <button type="submit" class="btn btn-success" style="width: 10%; display: block; margin: auto;">Enviar mensagem</button>

</form>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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