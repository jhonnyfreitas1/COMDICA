@extends('layouts.app')

@section('js')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/index-css.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="/css/style1.css">
@endsection

@section('content')
  <div class="slide-one-item home-slider owl-carousel "  style="margin-top: -2em;">
   @foreach($postagem as $consulta)
   <div class="site-blocks-cover overlay" style="background-image: url('/upload_imagem/{{$consulta->imagem_principal}}');" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">

          <h1 class="text-white font-weight-light">{{$consulta->titulo}}</h1>
          <p class="mb-5">{{ str_limit($consulta->descricao, 30)}}</p>
          <p><a href="postagem/{{encrypt($consulta->id)}}" class="btn btn-success py-3 px-5 text-white">Veja Agora</a></p>
        </div>
      </div>
    </div>
  </div> 
  @endforeach 
</div>
<div class="row m-2" style="width: auto;">
 <div class=" col-md-3 col-11 m-2 " id="card-fundo" style="">
  <div class="row ">
   <div class=" col-md-12 text-dark position-top">
     <div class=" card-header bg-info col-12  text-white "><h4>Calculadora </h4></div>
     <h5 class="card-body text-white description">
       Calcule seu imposto de renda, exporte seus dados da calculadora e veja quanto você pode doar em seu valor parcelado ou avista, faça o teste.
     </h5>
     <a href="calculadora" class="pulse">   <img style="width:98%; margin-top: -3em;"  class='pulse ' src="/img/calculado-low.png">
     </div></a>
   </div>
 </div>
 <div class=" col-md-5 col-11 m-2 " id="card-fundo" style="">
  <div class="row">
    <div class=" col-md-12  text-dark position-top">
     <div class=" card-header bg-info  col-12  text-white"><h4>COMDICA ARAÇOIABA-PE</h4></div>
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
     <div class=" card-header bg-info  col-12  text-white"><h4>FUNDECA</h4></div>
     <h5 class="card-body text-white description">
       O Fundo Municipal dos Direitos da Criança e do Adolescente (FUMDECA) é um Fundo especial, criado por lei municipal, segundo determinação do Estatuto da Criança e do Adolescente em seu art. 260 com o objetivo de financiar programas e projetos que atuem na garantia da promoção, proteção e defesa dos direitos da criança e do adolescente. 

       <img style="width:100%;" src="/img/fundeca-mini.png">
     </h5>
   </div>
 </div>
</div>  
</div>

</div>
<div class="site-section block-13 ">
  <div class="site-section">
    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(/img/fundeca.png); background-attachment: fixed; background-size: 70%;">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-7"  data-aos="fade-up" data-aos-delay="400">
            <a href="https://vimeo.com/346056073" class="popup-vimeo"><span class=" "><i class="fas fa-play fa-4x icon-play"></i></span>
            </div>
          </div>
        </div>
      </div>  
      <center>
        <h1 id="desc_categoria" style="background-image: url('/img/colorido.jpg'); " class="m-2 text-light title border border-dark">Postagens recentes</h1>
        <div class="dropdown show col-3" style=" float:left;">

          <a class="btn btn-secondary   bg-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Filtrar <i class="fas fa-sort"></i>
         </a>
         <div class="dropdown-menu bg-info " aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item border-bottom text-light" href="/">Postagens recentes</a>
          <a class="dropdown-item border-bottom text-light" href="/?cat={{encrypt(1)}}">Projetos financiados pelo Fundeca</a>
          <a class="dropdown-item border-bottom text-light"  href="/?cat={{encrypt(2)}}">Ordem do dia COMDICA: Reuniões, Atas, Resoluções</a>
          <a class="dropdown-item border-bottom text-light" href="/?cat={{encrypt(3)}}">Notícias</a>
          <a class="dropdown-item border-bottom text-light" href="/?cat={{encrypt(4)}}">Publicações, eventos, fórums, conferência</a>
          <a class="dropdown-item border-bottom text-light" href="/?cat={{encrypt(5)}}">2º PROCESSO DE ESCOLHA</a>
        </div>
        
      </div>
    </div>
    <div class=" row m-3 ">
     
      
      @foreach($posts as $post)
      <a href="/postagem/{{encrypt($post->id)}}">
        <div class="col-md-3 col-12 mt-1" style=''>
          <div class='report-module ' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(200, 200, 226, 0.9)">
            <div class='thumbnail' >
              <a href="/postagem/{{encrypt($post->id)}} " class="bg-light">
                <center>
                  <img class="card-img-top" style="height: 20vh;
                  width: 100%;
                  object-fit: cover; " src="/upload_imagem/{{$post->imagem_principal}}">
                </center>
                <h6 class="col-md-12 col-12 " style="">{{$post->titulo}}</h6>
              </a>
            </div>
            <div class='post-content'>
              <div class='post-meta float-right'>
                <div class="row">
                  <a class="btn btn-success col-12 btn-block " id="but" style="border:1px solid black;" href="/postagem/{{encrypt($post->id)}}">Ver Postagem</a >
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {!! $posts -> Links()!!} 


    </center>

    <script src="js/aos.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/owl.carousel.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $(".owl-next").html("<h1><i class='fas fa-arrow-circle-right'></i></h1>");
        $(".owl-prev").html("<h1><i class='fas fa-arrow-circle-left'></i></h1>");
        $('.dropdown-toggle').dropdown();
        var mensagem = "{{$mensagem}}";
        if (mensagem != "Postagens recentes") {
          if (mensagem == 1){
            $("#desc_categoria").html("Projetos financiados pelo Fundeca");  
          }else if(mensagem == 2 ){
            $("#desc_categoria").html("Ordem do dia COMDICA: Reuniões, Atas, Resoluções");
          }else if(mensagem == 3){
            $("#desc_categoria").html("Notícias");
          }else if(mensagem == 4){
            $("#desc_categoria").html("Publicações, eventos, fórums, conferência");
          }else if (mensagem == 5) {
            $("#desc_categoria").html("Segundo processo de escolha dos membros do conselho tutelar ARAÇOIABA-PE");
          }else {

          }
        }
        
        $("border-bottom").on("hover",function(e){

          e.css('background-color', '#babaca');

        });

      });
    </script>
    <script type="text/javascript">
        // Este evendo é acionado após o carregamento da página

        $(window).on('load',function() {

          $("#loader").delay(2000).fadeOut("slow");
        });
      </script>

      <script src="js/mediaelement-and-player.min.js"></script>
      <script src="js/jquery-migrate-3.0.1.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/jquery.stellar.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>

      @endsection