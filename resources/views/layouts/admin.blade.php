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


  <div style='width:100%; height:100%; align-items:center; justify-content:center; display:flex; z-index:60;background-color:rgba(0,0,0,0.75);position:absolute;' id='floating-display' class='floating-div-carregamento'>
      <img style='position:absolute; z-index:50;' class='admin-carregamento' src='/img/carregamento2.gif'>
  </div>
  @if(isset($errors) && count($errors) > 0)
          <div class="alert alert-danger alert-dismissible fade show message"  role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('mensagem'))
        <div class="alert alert-success alert-dismissible fade show message"  role="alert">
            <p>{{session('mensagem')}}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="d-flex " id="wrapper">
      <div class="bg-info  border-right " id="sidebar-wrapper">
        <div class="sidebar-heading"><a href="/"><img src="/img/comdica3.png" style="width: 10em;"></a></div>
        <div class="list-group list-group-flush">
          @can('admin-comdica')
          <a href="{{route('postagens.create')}}" id='postagem' class="list-group-item bg-info border list-group-item-action" onClick="activate('postagem')">Nova postagem <i class="fas fa-plus-square"></i> </a>
          <a href="{{route('postagens.minhas_postagens')}}" id='minhas_postagens'  class="list-group-item bg-info border list-group-item-action ">Minhas postagens <i class="fas fa-file-image"></i></a>
          @endcan
          @can('admin-comdica')
            <a href="{{route('postagens.index')}}" id='todas_postagens'  class="list-group-item bg-info border list-group-item-action ">Todas as postagens <i class="fas fa-mail-bulk"></i></a>
            <a href="{{route('postagens.arquivadas')}}" id='postagens_arquivadas'  class="list-group-item bg-info border list-group-item-action ">Postagens Arquivadas <i class="fas fa-archive"></i></a>
          @endcan
          <a href="{{route('denuncias.index')}}" id='denuncias'  class="list-group-item bg-info border list-group-item-action ">Todas as denúncias <i class="fas fa-th-list"></i></a>
          @can('admin-comdica')
          <a href="{{route('instituicao.index')}}" id='instituicoes'  class="list-group-item bg-info border list-group-item-action ">Instituições <i class="fas fa-warehouse"></i></a>
          <a href="{{route('usuario.index')}}" id='users' class="list-group-item list-group-item-action bg-info border">Usuarios <i class="fas fa-users"></i></a>
          <a href="{{route('atas.index')}}" id='atas' class="list-group-item list-group-item-action bg-info border">Atas <i class="fas fa-file-pdf"></i></a>
          <a href="{{route('resolucao.index')}}" id='resolucoes' class="list-group-item list-group-item-action bg-info border">Resoluções <i class="fas fa-file"></i></a>
          <a href="{{route('galeria.index')}}" id='galeria' class="list-group-item list-group-item-action bg-info border">Galeria <i class="fas fa-images"></i></a>
          <a href="{{route('campanha.index')}}" id='campanhas' class="list-group-item list-group-item-action bg-info border">Campanhas <i class="fas fa-paste"></i></a>
          <a href="/admin/doacoes" id='doacao_imposto' class="list-group-item bg-info border list-group-item-action ">Doações por boleto <i class="fas fa-file-invoice-dollar"></i></a>
          <a href="/admin/contato" class="list-group-item list-group-item-action bg-info border">Mensagens de contato <i class="far fa-comments"></i>
            @isset($contato)
            <span class="bg-danger rounded p-1">{{$contato}}</span>
            @endisset
          @endcan
          </a>

        </div>
      </div>

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-info border-bottom">
          <button class="btn btn-primary fechar-abrir " id="menu-toggle">Fechar Menu</button>
          <a href="/admin/comdica" class="ml-3 text-dark"><i class="fas fa-home fa-3x"></i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name}}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="{{route('admin.auth.edit')}}">Edite sua conta <i class="far fa-edit"></i></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('admin.auth.logout')}}">Sair do sistema <i class="fas fa-sign-out-alt"></i> </a>
                </div>
              </li>
            </ul>
          </div>
        </nav>

        <div class="container-fluid" id="area-principal" style="width: 100%;" >

            @yield('area-principal')

      </div>
    </div>
    <style>
        h11{
            color:red;
        }
    </style>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/dashboard.js"></script>
</body>
<script>
// Chama o modal e confirma ao excluir
    function confirmExclusao(id, nome) {
        id = '#'+id;
        var message = "Tem certeza que deseja excluir "+nome+"?";
        if ( confirm(message) ) {
            url = $(id).attr('url');
            window.location.href = url;
        } else {
            return false;
        }
    }

  $(document).on('DOMContentLoaded', () => {
    setInterval(() => {
      const floating = document.getElementById('floating-display');
      floating.style.display = `none`;

    }, 1000);
  });
  document.addEventListener('load',() => {
});



    // Apaga a ensagem após 4 segundos
    $().ready(function() {
        setTimeout(function()    {
            $('.message').fadeOut(1000, function(){
                $('.message').hide();
            });
        },4000);

    })
</script>
<style type="text/css">
/*.list-group-item{
  color: white;
  background-repeat: no-repeat;
}*/
.message{
    display: block;
    position: fixed;
    top: 0;
    left: 20%;
    right: 20%;
    width: 60%;
    padding-top: 10px;
    z-index: 9999
}
.activated{
    background-color:#77a2b8!important;
    color: gray;
}
body{
  transition:all 2s;
  text-decoration-color: black;
}
}
label{
    color:black;
}
</style>
</html>
