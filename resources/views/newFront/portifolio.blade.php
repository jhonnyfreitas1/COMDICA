@extends('layouts.newIndex')

@section('content')
    <br><br>
    <section class="introducao-interna interna_produtos">
        <div class="container">
            <h1 data-anime="400" class="fadeInDown">Entidades</h1>
            <p data-anime="800" class="fadeInDown">Conheça o Trabalho das nossas entidades</p>
        </div>
    </section>
    <section class="produtos container">
        <br><br><br><br><br><br>
        <ul class="produtos_lista">
            @foreach ($inst as $instData)
                <li class="grid-4">
                    <div class="produtos_icone">
                        <img src="/upload_imagem/"alt="">
                    </div>
                    <h3>{{$instData->name}}</h3>
                    <p>{{$instData->desc}}</p>
                    <a href="/portifolio/{{$instData->id}}" class="btn-full">Ver Mais</a>
                </li>
            @endforeach
        </ul>
    </section>
    {{-- <section class="container produto_item">
        <div class="grid-11">
            <img src="{{asset('img/wallpaper.jpg')}}" alt="Bikcraft Esporte" class="black">
            <h2>FUNDECA</h2>
        </div>
        <div class="grid-5 produto_icone"><img src="{{asset('img/COR1.png')}}"></div>
        <div class="grid-8"><img src="{{asset('img/fundeca.png')}}" alt="Bikcraft Esporte"></div>
        <div class="grid-8 produto_info">
            <p style="color:black">Fundeca tem o objetivo de reunir fundos para financiar os projetos..</p>
            <ul>
                <li>(81) 9999-999</li>
                <li>Araçoiaba, n 0000 - PE</li>
                <li>Entidade@entidade.com</li>
                <li>site.com.br</li>
            </ul>
        </div>
    </section> --}}
@endsection