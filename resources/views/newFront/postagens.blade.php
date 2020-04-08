@extends('layouts.newIndex')

@section('content')
<style>
    .pagination{
        margin-top: 800px;
        width: 100%;
        height: 100%;
    }
    .pagination li{
        text-align: center;
        width: 40px;
        height: 40px;
        padding-bottom: 1px;
        color: #75C587; 
        font-size: 30px;
        background-color: white;
        border: 5px solid ;
        display: inline-block;
    }
    "/upload_imagem/{{$postRecent->id}}/{{$postRecent->imagem_principal}}"
</style>
<section class="produtos container">
    <br><br><br><br><br><br>
    <h2 class="subtitulo">Postagens</h2>
    <div class="divImg grid-12">
         <img src=@if($postRecent->imagem_principal)
                    "/upload_imagem/postagens/{{$postRecent->id}}/{{$postRecent->imagem_principal}}"
                   @else
                    {{asset('img/fundo_criancas.jpg')}}
                   @endisset
        alt="">
        <h1>{{$postRecent->titulo}}</h1>
        <a href="/postagem/{{encrypt($postRecent->id)}}"><h3>Ver Mais</h3></a>
    </div>
    <ul class="produtos_lista">
        @foreach ($posts as $post)
            <li class="grid-4">
                <div class="produtos_icone">
                          <img src=@if($post->imagem_principal)
                                    "/upload_imagem/postagens/{{$post->id}}/{{$post->imagem_principal}}"
                                   @else
                                    {{asset('img/fundo_criancas.jpg')}}
                                   @endisset
                            alt="">
                </div>
                <h3>{{$post->titulo}}</h3>
                <p>{{$post->descricao}}</p>
                <a href="/postagem/{{encrypt($post->id)}}" class="btn-full">Ver Tópico</a>
            </li>
            @endforeach
        </ul>
        {!! $posts -> Links()!!} 
</section>
@endsection