@extends('layouts.newIndex')

@section('content')
    <style>
        .produtos_list:hover{
            border: 2px dotted #0a5429;
            cursor: pointer;
        }
    </style>
    <br><br>
    <section class="introducao-interna interna_produtos">
        <div class="container">
            <h1 data-anime="400" class="fadeInDown">{{$instVer->name}}</h1>
            <p data-anime="800" class="fadeInDown">Conheça o Trabalho da {{$instVer->name}}</p>
        </div>
    </section>
    <section class="container produto_item">
        <div class="grid-11">
            <img src="{{asset('img/wallpaper.jpg')}}" alt="Bikcraft Esporte" class="black">
            <h2>{{$instVer->name}}</h2>
        </div>
        <div class="grid-5 produto_icone">
            <img src="/upload_imagem/instituicoes/{{$instVer->name.$instVer->id}}/{{$instVer->imagem_princ}}">
        </div>
        <div class="grid-8">
            <img src="/upload_imagem/instituicoes/{{$instVer->name.$instVer->id}}/{{$instVer->imagem_sec}}">
        </div>
        <div class="grid-8 produto_info">
            <p style="color:black">{{$instVer->desc}}</p>
            <ul>
                <li>{{$instVer->telefone}}</li>
                <li>{{$instVer->endereco}}</li>
                <li>{{$instVer->email}}</li>
                <li>{{$instVer->site}}</li>
            </ul>
        </div>
    </section>
    @if($instVer->id === 1)
    <section class="introducao-interna" style="color:#5BA479; background-color: #f7fffa">
        <div class="container">
            <h1 data-anime="400" class="fadeInDown">Nosso Portifólio</h1>
            <p data-anime="800" class="fadeInDown">Veja aqui nossas atas e resoluções.</p>
        </div>
    </section>
    <section class="container produto_item">
        <ul class="produtos_lista">
            <a href="{{route('comdica')}}" >
                <li class="grid-5 produtos_list">
                    <div class="produtos_icone">
                        <img src="/img/about.jpeg"alt="">
                    </div>
                </li>
            </a>
            <a href="" >
                <li class="grid-5 produtos_list">
                    <div class="produtos_icone">
                        <img src="/img/about.jpeg"alt="">
                    </div>
                </li>
            </a>
            <a href="" >
                <li class="grid-5 produtos_list">
                    <div class="produtos_icone">
                        <img src="/img/about.jpeg"alt="">
                    </div>
                </li>
            </a>
        </ul>
    </section>
    @endif
@endsection