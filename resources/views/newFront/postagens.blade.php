@extends('layouts.newIndex')

@section('content')
<section class="produtos container">
    <br><br><br><br><br><br>
    <h2 class="subtitulo">Postagens</h2>
    <div class="divImg grid-12">
        <img src="{{asset('img/children.jpeg')}}" alt="">
        <h1>POSTAGEM MAIS RECENTE</h1>
        <a href=""><h3>Ver Mais</h3></a>
    </div>
    <ul class="produtos_lista">
        <li class="grid-4">
            <div class="produtos_icone">
                <img src="{{asset('img/children.jpeg')}} "alt="">
            </div>
            <h3>Postagens</h3>
            <p>O Comdica tem um sistema único de Postagens para adultos e crianças de todas as idades.</p>
            <a href="{{route('postagemVer')}}" class="btn-full">Ver Tópico</a>
        </li>
        <li class="grid-4">
            <div class="produtos_icone">
                <img src="{{asset('img/children.jpeg')}} "alt="">
            </div>
            <h3>Postagens</h3>
            <p>O Comdica tem um sistema único de Postagens para adultos e crianças de todas as idades.</p>
            <a href="" class="btn-full">Ver Tópico</a>
        </li>
        <li class="grid-4">
            <div class="produtos_icone">
                <img src="{{asset('img/children.jpeg')}} "alt="">
            </div>
            <h3>Postagens</h3>
            <p>O Comdica tem um sistema único de Postagens para adultos e crianças de todas as idades.</p>
            <a href="" class="btn-full">Ver Tópico</a>
        </li>
        <li class="grid-4">
            <div class="produtos_icone">
                <img src="{{asset('img/children.jpeg')}} "alt="">
            </div>
            <h3>Postagens</h3>
            <p>O Comdica tem um sistema único de Postagens para adultos e crianças de todas as idades.</p>
            <a href="" class="btn-full">Ver Tópico</a>
        </li>
    </ul>
</section>
@endsection