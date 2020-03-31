<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}" defer></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v5.0"></script>
     @yield('js')

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
        .container{
            margin-top: 6em
        }
    </style>
  </head>
  <header>
  </header>
  <main class="py-4">
      @yield('content')
  </main>

</html>
