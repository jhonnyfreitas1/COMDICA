<nav class="navbar navbar-expand-lg navbar-light bg-success" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="index.php"><img src="assets/img/comdica3.png" style="width: 150px;"></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

      <li class="nav-item active">
        <a class="btn btn-outline-warning my-2 my-sm-0 m-1" href="doacoes.php">Doações <span class="sr-only">(Página atual)</span></a>
      </li>

      <li class="nav-item active">
      <a class="btn btn-outline-warning my-2 my-sm-0 m-1" href="calculo.php">Calculo do imposto de renda</a>
      </li>

      <li class="nav-item active">  
        <a class="btn btn-outline-warning my-2 my-sm-0 m-1" href="contato.php">Contato</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>  
<?php include 'controller/bd-conection.php';?>