@extends('layouts.newIndex');

@section('content')
<section class="introducao-interna interna_sobre">
    <div class="container">
        <h1 data-anime="400" class="fadeInDown">Sobre</h1>
        <p data-anime="800" class="fadeInDown">conheça mais sobre o COMDICA</p>
    </div>
</section>

<section class="missao_sobre container fadeInDown" data-anime="1200">
    <div class="grid-10">
        <h2 class="subtitulo-interno"> História, Missão e Visão</h2>
        <p>O Conselho Municipal de Defesa e Promoção dos Direitos da Criança e do Adolescente -COMDICA é um órgão regido no artigo 88 da lei n° 8.069/1990 – Estatuto da Criança e do Adolescente</p>
    </div>
    <div class="grid-6">
        <h2 class="subtitulo-interno">Valores</h2>
        <ul>
            <li>- Valorização das crianças através de</li>
            <li>- Projetos educacionais com intuito de</li>
            <li>- Apoiar, Ouvir e Acolhe-los com todo</li>
            <li>- Respeito possível.</li>
        </ul>
    </div>

    <div class="grid-16 foto-equipe">
        <img src="{{asset('img/comdica4.jpg')}}" alt="Equipe Bikcraft">
    </div>

</section>
@endsection