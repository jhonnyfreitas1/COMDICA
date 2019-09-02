<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

<title>Área restrita</title>
    @yield('admin-js')
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/simple-sidebar.css" rel="stylesheet">
</head>
<body>

  <div class="d-flex " id="wrapper">

    <!-- Sidebar -->
    <div class="bg-success border-right " id="sidebar-wrapper">
      <div class="sidebar-heading"><a href="/"><img src="/img/comdica3.png" style="width: 10em;"></a></div>
      <div class="list-group list-group-flush">
        <a href="nova-postagem.php" id='postagem' class="list-group-item list-group-item-action ">Nova postagem <i class="fas fa-plus-square"></i> </a>
        <a href="/admin/minhas_postagens" id='minhas_postagens'  class="list-group-item list-group-item-action ">Minhas postagens <i class="fas fa-user"></i></a>
        <a href="/admin/doacoes" id='doacao_imposto' class="list-group-item list-group-item-action ">Doações por boleto <i class="fas fa-file-invoice-dollar"></i></a>
        <a href="/register" id='adc_user' class="list-group-item list-group-item-action ">Adicionar Usuarios <i class="fas fa-users"></i></a>
         <a href="/admin/contato" class="list-group-item list-group-item-action">Mensagens de contato <i class="far fa-comments"></i>
          @isset($contato)
          <span class="bg-danger rounded p-1">{{$contato}}</span>
          @endisset
        </a>
       
      </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-success border-bottom">
        <button class="btn btn-primary fechar-abrir " id="menu-toggle">Fechar Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{auth()->user()->name}}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                
                <a class="dropdown-item" href="#">Edite sua conta</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/auth/logout">Sair do sistema</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid" id="area-principal" style="width: 100%;" >
      
          @yield('area-principal')

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

  <!-- Menu Toggle Script -->
  <script src="/js/dashboard.js"></script>

</body>
<style type="text/css">
.list-group-item{
     background: linear-gradient(135deg, rgb(34, 130, 227) 0%, rgb(9, 226, 51) 100%);
     color: white;
     background-repeat: no-repeat;
}
body{
  text-decoration-color: white;
    background: linear-gradient(135deg, rgb(34, 130, 227) 0%, rgb(9, 226, 51) 100%);

  }
  label{
    color:white;
  }


</style>
</html>