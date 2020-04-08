@extends('layouts.newIndex');

@section('content')
<br><br><br><br><br><br><br><br><br>
<h2 class="subtitulo">{{$postagem->titulo}}</h2>
<section class="missao_sobre container fadeInDown" data-anime="1200">
    <div class="grid-10">
        <h2 class="subtitulo-interno"> Tópico : </h2>
        <p>{{$postagem->descricao}}</p>
    </div>
    <div class="grid-6">
        <h2 class="subtitulo-interno">Links Úteis</h2>
        <ul>
            @foreach($anexosPost  as $anexo)
                <li>- <a href="/upload_pdf/postagens/{{$postagem->id}}/{{$anexo->src_pdf}}">{{$anexo->nome_pdf}}.pdf</a></li>
            @endforeach  
        </ul>
    </div>
    <div class="divImg grid-4" style="width:60%;">
        <img src="/upload_imagem/postagens/{{$postagem->id}}/{{$postagem->imagem_principal}}" alt="">
    </div>
</section>
@endsection