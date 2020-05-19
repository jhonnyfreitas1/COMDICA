@extends('layouts.newIndex');

@section('content')
<style>
    .margin{
        margin-bottom: 20px;
    }
    .t a{
        margin-left: -50px;
    }
    @media only screen and (max-width: 767px) {
        .t a{
            margin-left: 5px;
        }
        .t p{
            margin-left: 50px;
        }
    }
</style>
<section class="introducao-interna interna_sobre">
    <div class="container">
        <h1 data-anime="400" class="fadeInDown">( Nome )</h1>
        <p data-anime="800" class="fadeInDown">É a intenção, e não a doação, que faz o doador</p>
    </div>
</section>
<section class="missao_sobre container fadeInDown" data-anime="1200">
    <a href="">
        <div class="grid-6" style="width:60%">
            <img src="/img/about.jpeg" alt="">
        </div>
    </a>
    <div class="grid-6 margin">
        <h2 class="subtitulo-interno">Campanha : (Nome)</h2>
        <p>Descrição</p>
    </div>
</section>
<section class="missao_sobre container fadeInDown" data-anime="1200">
    <div class=" margin">
        <div style="text-align: center">
            <h2 class="subtitulo">Vídeo</h2>
        </div>
        <video width="100%" controls>
            <source src="{{asset('video/teste.mp4')}}" type="video/mp4">
        <video>
    </div>
    <section class="quebra">
        <blockquote class="quote-externo container">
            <div class="t">
                <p class="">“Gostou do que viu? então ajude-nos a manter nossos projetos ;)”</p>
                <a href="{{route('doacaoCards')}}" class="btn-full" style="">Doar</a>
            </div>
            </blockquote>
    </section>
</section>
@endsection