<?php 
session_start();
if ($_SESSION['name'] && $_SESSION['id_user']){
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
</head>
<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="assets/img/comdica3.png" style="width: 10em;"> </div>
      <div class="list-group list-group-flush">
        <a href="nova-postagem.php" id='postagem' class="list-group-item list-group-item-action bg-light">Nova postagem</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Lista de postagens</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Doações Livres</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Doações do imposto de renda</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Adicionar Usuarios</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Configurações da Calculadora</a>
      </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
            </li>
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['name']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               
                <a class="dropdown-item" href="#">Edite sua conta</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="controller/sair-admin.php">Sair do sistema</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid" id="area-principal">
        <h1 class="mt-4">Área do administrador COMDICA</h1>
    
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $("#postagem").click(function(e) {
      e.preventDefault();
        $.ajax({
                type:'get',
                url:'/controller/Retornos.php',
                datatype:'json',
                data:{postagem:'postagem'},
            success: function(response){
                  $('#area-principal').html(response);
            }
           }) 
      
    });
  </script>

</body>

</html>
<?php }else{
  header('location:login-admin.php');
}?>
