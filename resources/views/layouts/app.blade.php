<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Comdica Araçoiaba</title>
        <script src="{{asset('js/app.js')}}" defer></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="/js/jquery-2.2.4.min.js"></script>
         @yield('js')
    </head>

<body >
   <nav class="navbar navbar-expand-lg navbar-light bg-success" style="" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse"  id="navbarTogglerDemo01">
    <a class="navbar-brand" href="/"><img src="/img/comdica1.png" style="width: 150px; filter: contrast(130%);"></a>
    <div class="" style="">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="btn btn-success my-2 my-sm-0 m-1" style="background-color:#006400;" href="/doacoes">Doações <span class="sr-only">(Página atual)</span></a>
      </li>

      <li class="nav-item active">
      <a class="btn btn-success my-2 my-sm-0 m-1" style="background-color:#006400;;" href="/calculadora">Calculadora de IR</a>
      </li>

      <li class="nav-item active">  
        <a class="btn btn-success my-2 my-sm-0 m-1 " style="background-color:#006400;" href="/contato">Contato</a>
      </li>

      <li class="nav-item active">  
        <a class="btn btn-success my-2 my-sm-0 m-1 " style="background-color:#006400;" href="/porque_doar">Porque doar?</a>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
 

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
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <meta http-equiv="x-ua-compatible" content="ie=edge">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<!-- Footer -->
<!-- Footer -->
<footer class="page-footer font-small unique-color-dark  d-inline-block"  style="  width: 100%; ">

<div  style="background-color:#01DF74; background-image:url('/img/prefeitura.png'); background-repeat:no-repeat; background-position: bottom 30px right 20px;" class="" style="
 ">
  <img >
    <div class="container" >

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">

          <h6 class="mb-0 footer"> 
            <!-- Facebook -->  
          </div >
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right" style='z-index: 999;'>



            <!-- Grid column -->

          </div>
          <!-- Grid row-->

        </div>
      </div>

      <!-- Footer Links -->
      <div  class="container text-center text-md-left mt-5"  >

        <!-- Grid row -->
        <div class="row mt-3" >

          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" >

            <!-- Content -->
            <h6 class="text-uppercase font-weight-bold text " style="color:   #006400;">COMDICA - Conselho Municipal dos Direitos da Criança e do Adolescente</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto " style="width: 60px;">
            <p class="text">O Conselho Municipal dos Direitos da Criança e do Adolescente - COMDICA é um órgão controlador das ações relativas ao atendimento dos direitos da criança e do adolescente.</p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" >

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold text" style="color:  #006400;">Redes sociais</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

            <p >
              <a   href="https://www.facebook.com/cmdcaaracoiabape/" > 
              <i style="font-size: 25px;" class="fab fa-facebook-f col-md-2 mr-4"> </i>  </a>
            
            </p>
         

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div  class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold  text" style=" color:  #006400;">Links úteis</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
            <a  href="/admin/comdica" class="">Administrador</a>
            </p>
            <p>
              <a href="/doacoes">Como doar</a>
            </p>
            <p>
              <a href="/calculadora">Cálculo do imposto de renda</a>
            </p>
            <!-- <img src="" class='float-right' style="filter: contrast(130%);">
           -->
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-10">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold text" style=" color: #006400 ;">Contato</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; ">
            <p class="text">
            <i class="fas fa-home mr-2 text"></i> Araçoiaba, n 10012, PE</p>
              <p class="text">
                <i class="fas fa-envelope mr-2 text"></i >cmdcaaracoiabape@gmail.com</p>
           
                <p class="text">
                  <i class="fas fa-phone mr-3 text"></i > + 01 234 567 88</p>
                 

                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->

              </div>
              <!-- Footer Links -->

              <!-- Copyright -->
              <div class="footer-copyright text-center py-3">© 2019 Copyright:
                <b> FUNDECA</b>
              </div>
            <!-- Copyright -->
            </footer>
              <!-- Footer -->
</html>
