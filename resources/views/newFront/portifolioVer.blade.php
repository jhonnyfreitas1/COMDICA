@extends('layouts.newIndex')

@section('content')
    <style>
        .produtos_list:hover{
            border: none;
            cursor: pointer;
        }
        .album{
            font-family: Comdica;
            font-size: 18px;
            text-align: center;
            color: #5BA479;

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
            <img src="/upload_imagem/instituicoes/{{$instVer->id}}/{{$instVer->img1}}">
        </div>
        <div class="grid-8">
            <img src="/upload_imagem/instituicoes/{{$instVer->id}}/{{$instVer->img2}}">
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

    @if($instVer->id == 1 or ($video != null or sizeof($imgs) >=  1) )
        <section class="introducao-interna" style="color:#5BA479; background-color: #f7fffa">
            <div class="container">
                <h1 data-anime="400" class="fadeInDown">Nossos Albuns</h1>
                <p data-anime="800" class="fadeInDown">Veja aqui nossos albuns de fotos.</p>
            </div>
        </section>
    @endif
    @if($instVer->id === 1)
        <section class="container produto_item">
            <ul>
                @foreach ($galerias as $galeria)
                @php($c = 0)
                        <a href="{{route('comdicaGaleriaShow', ['id' => $galeria->id])}}" >
                            <li class="grid-5 produtos_list">
                                <div class="produtos_icone">
                                    <p class="album">{{$galeria->titulo}}</p>
                                    @foreach($imagens as $imagem)
                                        @if($c == 0)
                                            @if($imagem->album_id == $galeria->id)
                                                <img src="/upload_imagem/albuns/{{$galeria->id}}/{{$imagem->nome}}"alt="">
                                                @php($c++)
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        </a>
                @endforeach
            </ul>
        </section>
    @else

        @isset($video)
            <section class="missao_sobre container fadeInDown" data-anime="1200">
                <div class=" margin">
                    <video width="100%" controls>
                        <source src="/upload_video/instituicoes/{{$instVer->gal_id}}/{{$video->nome}}" type="video/mp4">
                    </video>
                </div>
            </section>
        @endisset
        @isset($imgs)
        <section class="container produto_item">
            <ul class="produtos_lista">
            @foreach($imgs as $img)
                <li class="grid-8">
                    <div class="produtos_icone">
                        <img src="/upload_imagem/instituicoes/{{$instVer->id}}/{{$img->nome}}"alt="">
                    </div>
                </li>
            @endforeach
            </ul>
        </section>
        @endisset
    @endif
@endsection

