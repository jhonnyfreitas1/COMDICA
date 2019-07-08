@extends('layouts.app')
    
@section('content')
    @section('js')
     <link rel="stylesheet" type="text/css" href="/css/index-css.css">
    @endsection
    <body class="fadeIn">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicadores do Carousel -->
        <ol class="carousel-indicators">

           <?php   $ativo = 0;
          while ($ativo < 3):
            if ($ativo == 0) { ?>
              <li data-target="#myCarousel" data-slide-to="<?=$ativo?>" class="active"></li>
              <?php $ativo++;
            }else{
              if($ativo <= 2):?>
                <li data-target="#myCarousel" data-slide-to="<?=$ativo;?>"></li>
                <?php $ativo++; ?>  
              <?php endif;    
            }
          endwhile ?> 
        </ol>
      <div class="container">
       <div class="carousel-inner" role="listbox">

        <?php   $ativoCarr = 0;?>
        
        @foreach($postagem as $consulta)
          @if ($ativoCarr == 0)
            <div class="carousel-item active">
              <a href="postagem/{{$consulta->id}}">
                <img style="width: 100%;height: 31em;" src="/upload_imagem/{{$consulta->imagem_principal}}">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light bg-dark">{{$consulta->titulo}}</h5>
                  </div>
              </a>
            </div>
             <?php   $ativoCarr++; ?>
              @elseif ($ativoCarr <= 2)           
              <div class="carousel-item">
                <a href="postagem/{{$consulta->id}}">
                  <img style="width: 100%;height: 31em;" src="/upload_imagem/{{$consulta->imagem_principal}}">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light bg-dark">{{$consulta->titulo}}</h5>
                  </div>
                </a>
              </div>
               <?php   $ativoCarr++;?>
              @endif
    
    
               
          @endforeach   
 
        <!-- Controles de Direita e Esquerda -->
      
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Próximo</span>
        </a>
         <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <h2><i class="fas fa-arrow-circle-left"></i></h2>
        </a>
        <a class="carousel-control-next " style="" href="#myCarousel" role="button" data-slide="next">
          
          <h2><i class=" col-md-6 fas fa-arrow-circle-right"></i></h2>
        </a>
      </div>    
    </div>
    </div>
    
  <center>
    <div class="row m-4" style="margin: auto;"> 
    <!--  <div id="logo-icon" class="col-md-5 col-6 ml-12 p-10" style=" ">
      <div class="card border mb-3 text-white col-md-6 col-12"   style="  background-image: linear-gradient(to bottom right,#00BFFF, palegreen);">
          <div class=" bg-success border-success text-white col-12 text-justify w-auto"><h4 >Calculadora</h4></div>
              <h5 style="   " class="card-title text-white text-justify w-auto ">Calcule seu imposto de renda aqui no nosso site, veja quanto pode doar, e muito mais</h5>
            <img src="assets/img/calculado-low.png" style=" margin-top: -3em;  max-height: 20em;" class='pulse col-12 col-md-12 rounded '> 
         </div>
      </div> -->

 
      <div class=" col-md-3 col-12 m-2 center" id="card-fundo" style="">
        <div class="row">
         <div class=" col-md-12 text-dark position-top">
           <div class=" card-header bg-success  col-12  text-white"><h4>Calculadora </h4></div>
            <h5 class="card-body text-white description">
             Calcule seu imposto de renda, exporte seus dados da calculadora e veja quanto você pode doar em seu valor parcelado ou avista, faça o teste
            </h5>
           <a href="calculadora">   <img style="width:100%; margin-top: -3em;"  class='pulse ml-3' src="/img/calculado-low.png">
          </div></a>
        </div>
      </div>
 
      <div class=" col-md-5 col-12 m-2" id="card-fundo" style="">
        <div class="row">
          <div class=" col-md-12 text-dark position-top">
           <div class=" card-header bg-success  col-12  text-white"><h4>COMDICA ARAÇOIABA-PE</h4></div>
            <h5 class="card-body text-white description">
                O Conselho Municipal de Defesa e Promoção dos Direitos da Criança e do Adolescente -COMDICA  é um órgão regido no artigo 88 da lei n° 8.069/1990 – Estatuto da Criança e do Adolescente
            </h5>
            <img style="width:90%;" src="/img/mc2.png">
          </div>
        </div>
      </div>
      
      <div class=" m-2 col-md-3 col-12 float-right " id="card-fundo" style="">
        <div class="row">
          <div class=" col-md-12 text-dark position-top">
           <div class=" card-header bg-success  col-12  text-white"><h4>FUNDECA</h4></div>
            <h5 class="card-body text-white description">
             O Fundo Municipal dos Direitos da Criança e do Adolescente (FUMDECA) é um Fundo especial, criado por lei municipal, segundo determinação do Estatuto da Criança e do Adolescente em seu art. 260 com o objetivo de financiar programas e projetos que atuem na garantia da promoção, proteção e defesa dos direitos da criança e do adolescente. 
                
            <img style="width:110%;" src="/img/fundeca-mini.png">
            </h5>
          </div>
        </div>
      </div>  
       </div>
    </div>
   </center> 
    <div id="loader">
    </div>

      <!-- ///PARTE DE LISTAGEM DE POSTS -->
    <div class="container" id="listagem_posts" > 
 
            
    <div class="page-header">
          <h2>Postagens recentes</h2>
        </div>
        <div class="row" style="">
          
    // vamos criar a visualização
  <!--  while ($1= $limite)
 -->
          <a href="view_post.php?id=">
            <div class="col-md-6 col-sm-6">
              <div class='report-module ' style=" border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.9)">
                <div class='thumbnail' >
                  <a href="view_post.php?">
                    <img class="card-img-top " style="max-height: 11em;" src="">
                  </a>
                </div>
                <div class='post-content'>
                  <h3 class='title' style=""></h3>
                  <p class='description' style=""></p>
                  <div class='post-meta float-right'>
                    <span class='comments'>
                      <a class="btn btn-success  btn-block" id="but" style="border:1px solid black;" href="view_post.php?id=">Ver Postagem</a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </a>

    <nav aria-label="...">
      <ul class="pagination">

          <li class="page-item" >
            <a class="page-link" onclick='pagination(this);' id='click' value='' href='' tabindex="-1">Previous</a>
             
        <!--   </li>
  
        }?> 
        <?php 
     
          
        
        ?> -->
<!-- 
        <?php 
  
          ?> -->
          <li class="page-item"  >
            <a class="page-link"  onclick='pagination(this); this.preventDefault();'  value='' href='' >Proximo</a>
          </li>     
 <!-- 
          <?php
     
        ?> -->
      </ul>
    </nav>
  </div>
    </div>
<script type="text/javascript">

          function pagination(e){
                  e.preventDefault();
                  alert(e.val());
                  
                }
        // Este evendo é acionado após o carregamento da página
        $(window).on('load', function() {
            //Após a leitura da pagina o evento fadeOut do loader é acionado, esta com delay para ser perceptivo em ambiente fora do servidor.
           
        }); 


</script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script type="text/javascript" src="/js/index_js.js"></script>
@endsection
