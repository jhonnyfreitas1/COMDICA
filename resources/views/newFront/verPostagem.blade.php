@extends('layouts.newIndex');

@section('content')
<br><br><br><br><br><br><br><br><br>
<h2 class="subtitulo">Titulo da Postagem</h2>
<section class="missao_sobre container fadeInDown" data-anime="1200">
    <div class="grid-10">
        <h2 class="subtitulo-interno"> Tópico : </h2>
        <p>Escrevendo algo aqui ...</p>
    </div>
    <div class="grid-6">
        <h2 class="subtitulo-interno">Links Úteis</h2>
        <ul>
            <li>- <a href="pdf.a">teste.pdf</a></li>
            <li>- <a href="">www.sitedanoticia.com</a></li>
        </ul>
    </div>
    <div class="divImg grid-4" style="width:60%;">
        <img src="{{asset('img/children.jpeg')}}" alt="">
    </div>
</section>
@endsection