@extends('layouts.newIndex')

@section('content')
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
        <div class="grid-5 produto_icone"><img src="/upload_imagem/instituicoes/{{$instVer->name.$instVer->id}}/img_2.jpeg"></div>
        <div class="grid-8"><img src="/upload_imagem/instituicoes/{{$instVer->name.$instVer->id}}/img_3.jpeg" alt="Bikcraft Esporte"></div>
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
@endsection