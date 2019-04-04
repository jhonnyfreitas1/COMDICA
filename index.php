<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><img src="comdica3.png" style="width: 150px;"></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link btn btn-light" href="#">Doações <span class="sr-only">(Página atual)</span></a>
      </li>
                                        <!-- modelo de teste -->
      <li class="nav-item active">  
        <a class="nav-link btn btn-light" href="#">Contato</a>
      </li>
    <!--  <li class="nav-item active">
        <a class="nav-link btn btn-light" href="#"></a>
      </li> -->
      <li class="nav-item active">
        <a class="nav-link btn btn-light" href="#">Calculo do imposto de renda</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>  
<body>




  <div id="carouselExampleIndicators" class="centered carousel slide col-md-10" data-ride="carousel">
    <ol class="carousel-indicators ">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" style="">
      <div class="carousel-item active">
        <img src="comdica3.jpg" style='' class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 style=" ">primeira postagem</h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="comdica3.jpg" style='' class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Segunda postagem</h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="comdica3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>terceira</h5>
          <p></p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- Optional JavaScript --><center>
<div style="margin-top: 5em;">
 <div  class='row' style="float: right;">
  <div class="col-md-3 col-sm-6">
    <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
      <div class='thumbnail' >
        <a href="view_visualizar_pontos.php?id=<?=$linha['id']?>">
          <img class="card-img-top" style="max-height: 11em;" src="comdica3.png">
        </a>
      </div>
      <div class='post-content'>
        <div class='category'></div>  
        <h2 class='title' style="height: 2.5em;">Comdica Araçoiaba</h2>
        <p class='description' style="height: 2em;">Comdica Araçoiaba está com um novo site para...</p>
        <div class='post-meta'>
          <span class='comments'>
            <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha['id']?>">Saiba mas</a>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
      <div class='thumbnail' >
        <a href="view_visualizar_pontos.php?id=<?=$linha['id']?>">
          <img class="card-img-top" style="max-height: 11em;" src="comdica3.png">
        </a>
      </div>
      <div class='post-content'>
        <div class='category'></div>  
        <h2 class='title' style="height: 2.5em;">Comdica Araçoiaba abre novo chamado...</h2>
        <p class='description' style="height: 2em;">Comdica Araçoiaba está com um novo site para...</p>
        <div class='post-meta'>
          <span class='comments'>
            <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha['id']?>">Saiba mas</a>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
      <div class='thumbnail' >
        <a href="view_visualizar_pontos.php?id=<?=$linha['id']?>">
          <img class="card-img-top" style="max-height: 11em;" src="comdica3.png">
        </a>
      </div>
      <div class='post-content'>
        <div class='category'></div>  
        <h2 class='title' style="height: 2.5em;">Jovens criam projeto de doaçoes  </h2>
        <p class='description' style="height: 2em;">Comdica Araçoiaba está com um novo site para...</p>
        <div class='post-meta'>
          <span class='comments'>
            <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha['id']?>">Saiba mas</a>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6">
    <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
      <div class='thumbnail' >
        <a href="view_visualizar_pontos.php?id=<?=$linha['id']?>">
          <img class="card-img-top" style="max-height: 11em;" src="comdica3.png">
        </a>
      </div>
      <div class='post-content'>
        <div class='category'></div>  
        <h2 class='title' style="height: 2.5em;">Faça uma doação</h2>
        <p class='description' style="height: 2em;">Comdica Araçoiaba está com um novo site para...</p>
        <div class='post-meta'>
          <span class='comments'>
            <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha['id']?>">Saiba mas</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

</center>


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
<!-- Footer -->
<!-- Footer -->
<footer class="page-footer font-small unique-color-dark d-inline-block"  style="margin-top: 20em; width: 100%;">

  <div style="background-color:#DCDCDC;">

    <div class="container" >

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">

          <h6 class="mb-0"> 
            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook-f white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g white-text mr-4"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram white-text"> </i>
            </a></h6>
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
      <div class="container text-center text-md-left mt-5"  >

        <!-- Grid row -->
        <div class="row mt-3" >

          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" >

            <!-- Content -->
            <h6 class="text-uppercase font-weight-bold">COMDICA - Conselho Municipal dos Direitos da Criança e do Adolescente</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>O Conselho Municipal dos Direitos da Criança e do Adolescente - COMDICA é um órgão controlador das ações relativas ao atendimento dos direitos da criança e do adolescente.</p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" >

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold">Products</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
              <a href="#!">MDBootstrap</a>
            </p>
            <p>
              <a href="#!">MDWordPress</a>
            </p>
            <p>
              <a href="#!">BrandFlow</a>
            </p>
            <p>
              <a href="#!">Bootstrap Angular</a>
            </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold">Useful links</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
            <a href="#!">Administrador</a>
            </p>
            <p>
              <a href="#!">Become an Affiliate</a>
            </p>
            <p>
              <a href="#!">Shipping Rates</a>
            </p>
            <p>
              <a href="#!">Help</a>
            </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-10">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold">Contact</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; ">
            <p>
              <i class="fas fa-home mr-3"></i> Araçoiaba, n 10012, PE</p>
              <p>
                <i class="fas fa-envelope mr-3"></i>comdica@gmail.com</p>
                <p>
                  <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                  <p>
                    <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->

              </div>
              <!-- Footer Links -->

              <!-- Copyright -->
              <div class="footer-copyright text-center py-3">© 2018 Copyright:
                <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
              </div>
              <!-- Copyright -->

            </footer>
            <!-- Footer -->
            </html>