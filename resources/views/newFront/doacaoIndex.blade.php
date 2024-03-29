@extends('layouts.newIndex');

@section('content')
<style>
    .margin{
        margin-bottom: 20px;
    }
    .t{
        margin-top: 40px;
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
        .t{
        margin-top: 0px;
        }
    }
</style>
<section class="introducao-interna interna_sobre">
    <div class="container">
        <h1 data-anime="400" class="fadeInDown">
        @if(isset($campanha->titulo) && $campanha->titulo != '')
                {{$campanha->titulo}}
        @endisset
        </h1>
        <p data-anime="800" class="fadeInDown">É a intenção, e não a doação, que faz o doador</p>
    </div>
</section>
<section class="missao_sobre container fadeInDown" data-anime="1200">
@if(isset($campanha->imagem) && $campanha->imagem != '')
    <a href="upload_pdf/campanhas/{{$campanha->id}}/{{$campanha->pdf}}">
        <div class="grid-6" style="width:60%">
            <img src="upload_imagem/campanhas/{{$campanha->id}}/{{$campanha->imagem}}" alt="">
        </div>
    </a>
        @endisset
    <div class="grid-6 margin">
    @if(isset($campanha->titulo) && $campanha->titulo != '')
            <h2 class="subtitulo-interno">Campanha : {{$campanha->titulo}}</h2>
        @endisset
        @if(isset($campanha->desc) && $campanha->desc != '')
            <p>{{$campanha->desc}}</p>
        @endisset
    </div>
</section>
        @if(isset($campanha->video) && $campanha->video != '')
<section class="missao_sobre container fadeInDown" data-anime="1200">
    <div class=" margin">
        <div style="text-align: center">
            <h2 class="subtitulo">Vídeo</h2>
        </div>
        <video width="100%" controls>
            <source src="upload_video/campanhas/{{$campanha->id}}/{{$campanha->video}}" type="video/mp4">
        <video>
    </div>
    <section class="quebra">
        <blockquote class="quote-externo container">
            <div class="t">
                <p class="">Viu como é simples? então ajude-nos a manter nossos projetos ;)</p>
            </div>
            </blockquote>
    </section>
</section>
        @endisset
@endsection
