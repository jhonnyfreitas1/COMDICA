<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Comdica Araçoiaba</title>
    <script src="{{asset('js/app.js')}}" defer></script>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/jquery-2.2.4.min.js"></script>
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
   <meta property="og:url" content="https://comdicaaracoiabape.com.br/postagem/eyJpdiI6ImRXd0sxSTNldmdXd0wzZHJOQ1pIVUE9PSIsInZhbHVlIjoieElEM1VtNmg3T3d4V0NxZmxYZWwxdz09IiwibWFjIjoiODI3YmIyMGM5MTEwZDA1YWEzMjVkMTE0YWJiYmMyNjBlOTgyZDU0OTBlNGViM2YwN2YxNzVmNTVlNjYyYmE1YiJ9" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$postagem->titulo}}" />
    <meta property="og:description"content="{{$postagem->descricao}}" />
    <meta property="og:image" content="{{$postagem->imagem_principal}}" />
  <main class="py-4">
      @yield('content')
  </main>
</head> 
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
