<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">      
    <!-- Pega a url -->
    @php($urlRequest = $_SERVER['REQUEST_URI'])
    <!-- Separa a url com o separador '/' -->
    @php($explodeUrl = explode('/', $urlRequest))
    <!-- Adiciona a url final -->
    @php($url = 'https://comdicaaracoiabape.com.br'.$urlRequest)
    <!-- Verifica se está na pagina de postagem -->
    @if($explodeUrl[1] == 'postagem')
        <!-- Altera as informações do link -->
        <meta property="og:url" content="{{$url}}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{$postagem->titulo}}" />
        <meta property="og:image" content="https://comdicaaracoiabape.com.br/public/upload_imagem/{{$postagem->imagem_principal}}" />
        <meta property="og:description" content="{{$postagem->descricao}}">
        <title>{{$postagem->titulo}}</title>
    @else
        <title>Comdica Araçoiaba</title>
    @endif
    <!-- Css  -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/jquery-2.2.4.min.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v5.0"></script>
     @yield('js')
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#01DF74;" >
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse"  id="navbarTogglerDemo01">
        <a class="navbar-brand" href="/">
          <img src="/img/comdica3.png" style="width: 150px; ">
        </a>
        <div class="" style="">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="btn btn-info my-2 my-sm-0 m-1 font-weight-bold " style="" href="/sou_doador">Sou doador<span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item active">
            <a class="btn btn-info my-2 my-sm-0 m-1 font-weight-bold " style="" href="/calculadora">Calculadora de IR</a>
            </li>
            <li class="nav-item active">  
              <a class="btn btn-info my-2 my-sm-0 m-1 font-weight-bold " style="" href="/contato">Contato</a>
            </li>
            <li class="nav-item active">  
              <a class="btn btn-info my-2 my-sm-0 m-1 font-weight-bold " style="" href="/porque_doar">Por que doar?</a>
            </li>
          </ul>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/minha/doacao">Sou doador</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/gerar/boleto/2">Gerar segunda via de boleto</a>
          </div>
        </div>
      </div>
    </nav> 
    <style type="text/css"> 
        a{
          color:#1766D5;
          font-weight: bolder;
           }
        a:hover{
          color:#212529;
        }
        .font-weight-bold{
        }
    </style>
  </header> 
  <main class="py-4">
      @yield('content')
  </main>

  <footer class="   page-footer font-small unique-color-dark  d-inline-block"  style="  width: 100%;">
    <div  style="background-color:#01DF74; " class="mt-1" style="">
      <div class="container" >
        <div class="row py-2 d-flex align-items-center">
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0 footer">
          </div>
          <div class="col-md-6 col-lg-7 text-center text-md-right" style='z-index: 999;'></div>
        </div>
      </div>
      <div  class="container text-center text-md-left mt-5"  >
        <div class="row mt-3" >
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" >
            <h6 class="text-uppercase font-weight-bold text " style="color:   #006400;">COMDICA - Conselho Municipal dos Direitos da Criança e do Adolescente</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto " style="width: 60px;">
            <p class="text">O Conselho Municipal dos Direitos da Criança e do Adolescente - COMDICA é um órgão controlador das ações relativas ao atendimento dos direitos da criança e do adolescente.</p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" >
            <h6 class="text-uppercase font-weight-bold text" style="color:  #006400;">Redes sociais</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
              <a href="https://www.facebook.com/cmdcaaracoiabape/" > 
              <i style="font-size: 25px;" class="fab fa-facebook-f col-md-2 mr-4"> </i>  </a>
            </p>
          </div>
          <div  class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold  text" style=" color:  #006400;">Links úteis</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
              <a  href="/admin/comdica" class="">Área restrita</a>
            </p>
            <p>
              <a href="/doacoes">Como doar</a>
            </p>
            <p>
              <a href="/calculadora">Cálculo do imposto de renda</a>
            </p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-10">
            <h6 class="text-uppercase font-weight-bold text" style=" color: #006400 ;">Contato</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; ">
            <p class="text">
              <i class="fas fa-home mr-2 text"></i> Araçoiaba, n 10012, PE
            </p>
            <p class="text">
              <i class="fas fa-envelope mr-2 text"></i >cmdcaaracoiabape@gmail.com
            </p>
            <p class="text">
              <i class="fas fa-phone mr-3 text"></i > + 01 234 567 88
            </p>
          </div>
        </div>
        <img src="/img/prefeitura.png" class="col-md-3 ">
      </div>
      <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <b> FUNDECA</b>
      </div>
    </div>
  </footer>
</html>