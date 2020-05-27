@extends('layouts.newIndex');

@section('content')
<style>
    .produtos_list:hover{
        border: none;
            cursor:auto;
        }
        .produtos_lista{
            margin-top: -100px;
        }

        .text{
        text-align: center;
        width: 800px;
        margin: auto;
        height: auto;
        padding: 20px;
    }
</style>
<br>
<section class="introducao-interna" style="color:#5BA479;">
    <div class="container">
        <h1 data-anime="400" class="fadeInDown">Fotos</h1>
        <div class="text">
            <p data-anime="800" class="fadeInDown">{{$albumWithImgs[0]->descricao}}</p>
        </div>
    </div>
</section>
<section class="missao_sobre container fadeInDown" data-anime="1200">
    <section class="container produto_item">
    @php($c=0)
    @foreach($albumWithImgs as $imagem)
        @if($c == 0)
            <ul class="produtos_lista">
                <li class="grid-8 produtos_list">
                    <div class="produtos_icone">
                        <img src="/upload_imagem/albuns/{{$imagem->album_id}}/{{$imagem->nome}}"alt="">
                    </div>
                </li>
                @php($c++)
        @elseif($c == 3)
                <li class="grid-8 produtos_list">
                    <div class="produtos_icone">
                        <img src="/upload_imagem/albuns/{{$imagem->album_id}}/{{$imagem->nome}}"alt="">
                    </div>
                </li>
            </ul>
            @php($c=0)

        @else
            <li class="grid-8 produtos_list">
                <div class="produtos_icone">
                    <img src="/upload_imagem/albuns/{{$imagem->album_id}}/{{$imagem->nome}}"alt="">
                </div>
            </li>
                @php($c++)
        @endif
    @endforeach
    </section>
</section>
@endsection
