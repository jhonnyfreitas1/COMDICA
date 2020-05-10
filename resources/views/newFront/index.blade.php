@extends('layouts.newIndex')
<style>
    /* imagem antes de carregar o site */
    .loading-back{
        width:100vw;
        height:100vh;
        margin:0 auto
    }
    .image-back{
        max-height: calc(100vh - 25px);
        position: relative;
        width: auto;
        height: auto;
        display: block;
        margin: 0 auto
    }
    @media only screen and (min-width: 767px) and (max-width: 1024px) {
        .image-back{
            margin-top:20%;
        }
    }
    @media only screen and (max-width: 767px) {
        .image-back{
            margin-top: 40%;
        }
    }
</style>
@section('content')
    <!-- Fundeca Pulsando -->
    <!-- <div id="loader"  style="">
          <img style=" position: fixed;  width: 100%;  background-color: white;  height: 100%; z-index: 1000;" src="/img/COR1.png">
          <img class="col-4 col-md-2  position-absolute sticky-top" style=" z-index: 1002;" src="/img/carregamento.gif">
     </div> -->

    <section class="introducao">
        <div class="container">
            <h1>COMDICA Araçoiaba - PE</h1>
            <blockquote class="quote-externo">
                <p>“A criança é alegria como raio de sol
                    e estímulo como a esperança.”</p>
                <div class="font">COELHO NETO</div>
            </blockquote>
        </div>
    </section>

    <section class="produtos container" >
        <h2 class="subtitulo">Ideias</h2>
        <ul class="produtos_lista">
            <a href="{{route('denuncia')}}">
                <li class="grid-1-3">
                    <div class="produtos_icone produtos_list">
                        <img src="{{asset('img/Denun.png')}} "alt="">
                    </div>
                    <h3>Denúncias</h3>
                    <p>O Comdica tem um sistema único de denúncias para adultos e crianças de todas as idades.</p>
                </li>
            </a>
            <a href="{{route('doacaoCards')}}">
                <li class="grid-1-3">
                    <div class="produtos_icone produtos_list">
                        <img src="{{asset('img/calculadora.png')}}" alt="">
                    </div>
                    <h3>Doar</h3>
                    <p>Você sabia que você pode doar até 6% do seu imposto de renda para o nosso fundo de projetos?. Nossa calculadora Facilita tudo isso para você :)</p>
                </li>
            </a>
            <a href="{{route('comdicaEC')}}">
                <li class="grid-1-3 ">
                    <div class="produtos_icone produtos_list">
                        <img src="{{asset('img/Port.png')}}" alt="">
                    </div>
                    <h3>Portifólio</h3>
                    <p>Portifólio Exclusivo para nossas Entidades, com o intuito de divulgar seu trabalho.</p>
                </li>
            </a>
        </ul>
        <div class="call font">
            <p>Nossa equipe trás o melhor para atender o público jovem. Conheça-nos :)</p>
            <br>
            <a href="{{route('sobre')}}" class="btn btn-preto">Sobre</a>
        </div>

    </section>
    <section class="produtos container">
        <h2 class="subtitulo">Postagens Recentes</h2>
        <section class="variable slider">
            @foreach($postagens as $postagem)
            <ul class="produtos_lista">
                <li class="grid-1-3">
                    <div class="produtos_icone">
                        <img src=@if($postagem->imagem_principal)
                                    "/upload_imagem/postagens/{{$postagem->id}}/{{$postagem->imagem_principal}}"
                                @else
                                    {{asset('img/fundo_criancas.jpg')}}
                                @endisset
                                    alt="">
                    </div>
                    <h3>{{$postagem->titulo}}</h3>
                    <p>{{$postagem->descricao}}</p>
                </li>
            </ul>
            @endforeach
        </section>
        <div class="call font">
            <p>Temos muito mais postagens em nossa seção especial ;)</p>
            <br>
            <a href="{{route('postagens')}}" class="btn btn-preto">Ver Postagens</a>
        </div>
    </section>
    <!-- Fecha Produtos -->
    <section class="quebra">
        <blockquote class="quote-externo container">
            <p class="">“É a intenção, e não a doação, que faz o doador.”</p>
            <div class="font">Gotthold Lessing</div>
            <br><br>
            <a href="{{route('doacaoCards')}}" class="btn-full">Doar</a>
        </blockquote>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).on('ready', function() {
                $("#conteudo").hide();
                $("#loading").show();

                setTimeout(() => {
                    $('#loading').delay(2000).fadeOut("slow");
                    $('#conteudo').show();
                }, 2000);

			});
		</script>
@endsection
