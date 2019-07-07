@extends('layouts.app')
	@section('content')


  <head>
    <title>Travalers &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     @section('js')



    <link rel="stylesheet" href="/css/index-css.css">


    <link rel="stylesheet" href="/css/owl.carousel.min.css">

    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.min.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">


    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    <style type="text/css">
    	

    </style>
	 
	    <link rel="stylesheet" href="/css/aos.css">

	    <link rel="stylesheet" href="/css/style1.css">
  	@endsection

    <div class="slide-one-item home-slider owl-carousel "  style="margin-top: -2em;">
       @foreach($postagem as $consulta)
      <div class="site-blocks-cover overlay" style="background-image: url('/upload_imagem/{{$consulta->imagem_principal}}');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              

              <h1 class="text-white font-weight-light">{{$consulta->titulo}}</h1>
              <p class="mb-5">{{ str_limit($consulta->descricao, 30)}}</p>
              <p><a href="postagem/{{$consulta->id}}" class="btn btn-success py-3 px-5 text-white">Veja Agora</a></p>

            </div>
          </div>
        </div>
      </div> 
      @endforeach 
    </div>
    <center>
    <div class="row m-2" style="width: 105%;">
   <div class=" col-md-3 col-11 m-2 " id="card-fundo" style="">
        <div class="row ">
         <div class=" col-md-12 text-dark position-top">
           <div class=" card-header bg-success col-12  text-white "><h4>Calculadora </h4></div>
            <h5 class="card-body text-white description">
             Calcule seu imposto de renda, exporte seus dados da calculadora e veja quanto você pode doar em seu valor parcelado ou avista, faça o teste.
            </h5>
           <a href="calculadora" class="pulse">   <img style="width:98%; margin-top: -3em;"  class='pulse ml-3' src="/img/calculado-low.png">
          </div></a>
        </div>
      </div>
 
      <div class=" col-md-5 col-11 m-2 " id="card-fundo" style="">
        <div class="row">
          <div class=" col-md-12  text-dark position-top">
           <div class=" card-header bg-success  col-12  text-white"><h4>COMDICA ARAÇOIABA-PE</h4></div>
            <h5 class="card-body text-white description">
                O Conselho Municipal de Defesa e Promoção dos Direitos da Criança e do Adolescente -COMDICA  é um órgão regido no artigo 88 da lei n° 8.069/1990 – Estatuto da Criança e do Adolescente
            </h5>
            <img style="width:100%;" src="/img/mc2.png">
          </div>
        </div>
      </div>
      
      <div class=" m-2 col-md-3 col-11" id="card-fundo" style="float: right;">
        <div class="row">

          <div class=" col-md-12 text-dark position-top">
           <div class=" card-header bg-success  col-12  text-white"><h4>FUNDECA</h4></div>
            <h5 class="card-body text-white description">
             O Fundo Municipal dos Direitos da Criança e do Adolescente (FUMDECA) é um Fundo especial, criado por lei municipal, segundo determinação do Estatuto da Criança e do Adolescente em seu art. 260 com o objetivo de financiar programas e projetos que atuem na garantia da promoção, proteção e defesa dos direitos da criança e do adolescente. 
                
            <img style="width:100%;" src="/img/fundeca-mini.png">
            </h5>
          </div>
        </div>
      </div>  
   

		</div>
    </center>
 
    
    <div class="site-section block-13 ">
  


    <div class="site-section">
      
    <!-- <div class="site-section bg-light">
      
    </div> -->


    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(/img/fundeca.png); background-attachment: fixed; background-size: 70%;">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-7"  data-aos="fade-up" data-aos-delay="400">
            <a href="https://vimeo.com/346056073" class="popup-vimeo"><span class=" "><i class="fas fa-play fa-4x icon-play"></i></span>
            <h2 class="text-white font-weight-light mb-5 h1">Nos meses de março a abril a sua doação pode ser feita diretamente na sua declaração, dê uma olhada.</h2></a>
            
          </div>
        </div>
      </div>
    </div>  

    <center>
     <div class="col-md-7 text-center m-2">
            <h2 class="font-weight-light text-black">Últimas postagens</h2>
          </div>
    	 </center>
 	<div class="row ml-2 " style=" margin-top: 6em;">
          	 @foreach($posts as $post)
          <a href="/postagem/{{$post->id}}">
            <div class=" col-md-3 col-sm-6 col-6">
              <div class='report-module ' style=" border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.9)">
                <div class='thumbnail ' >
                  <a href="/postagem/{{$post->id}} " class="bg-light">
                    <center>
                    <img class="card-img-top" style="max-width:20em; max-height:15em; width: auto;
  height: auto; position: center;" src="/upload_imagem/{{$post->imagem_principal}}">
                   </center>
                    <h4>{{$post->titulo}}</h4>
                  </a>
                </div>
                <div class='post-content'>
                  <h3 class='title' style=""></h3>
                  <p class='description' style="">{{ str_limit($post->descricao, 30)}}</p>
                  <div class='post-meta float-right'>
                    <span class='comments'>
                      <a class="btn btn-success  btn-block" id="but" style="border:1px solid black;" href="/postagem/{{$post->id}}">Ver Postagem</a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </a>
         
          @endforeach

		
   </div>
   {!! $posts -> Links()!!} 
  </div>
    </div>
    <style type="text/css">
 
    </style>

     <script src="js/aos.js"></script>
 		<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
      <script src="js/owl.carousel.min.js"></script>
  
  				<script type="text/javascript">
  				

          $(document).ready(function(){
  						$(".owl-next").html("<h1><i class='fas fa-arrow-circle-right'></i></h1>");
  						$(".owl-prev").html("<h1><i class='fas fa-arrow-circle-left'></i></h1>");
  				
              });

  				</script>
 			<style type="text/css">
 				

 				}
 			</style>
       <script src="js/mediaelement-and-player.min.js"></script>
       <script src="js/bootstrap-datapicker.min.js"></script> 
       <script src="js/boostrap-blunde.min.js"></script> 
	  <script src="js/jquery-migrate-3.0.1.min.js"></script>
	  <script src="js/jquery-ui.js"></script>
	  <script src="js/popper.min.js"></script>
	  <script src="js/bootstrap.min.js"></script>

	  <script src="js/jquery.stellar.min.js"></script>
	  <script src="js/jquery.countdown.min.js"></script>
	  <script src="js/jquery.magnific-popup.min.js"></script>
	  <script src="js/bootstrap-datepicker.min.js"></script>   
	  
	

	@endsection