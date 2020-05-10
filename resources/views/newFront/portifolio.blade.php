@extends('layouts.newIndex')

@section('content')
<style>
    .pagination{
        margin-top: 400px;
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
    @media only screen and (max-width: 787px) {
        .pagination{
            margin-top: 200px;
        }
    }
</style>
<br><br>
    <section class="introducao-interna interna_produtos">
        <div class="container">
            <h1 data-anime="400" class="fadeInDown">Entidades</h1>
            <p data-anime="800" class="fadeInDown">Conheça o Trabalho das nossas entidades</p>
        </div>
    </section>
    <section class="produtos container">
        <ul class="produtos_lista">
            @foreach ($inst as $instData)
                <li class="grid-4">
                    <div class="produtos_icone">
                        <img src="/upload_imagem/instituicoes/{{$instData->name.$instData->id}}/{{$instData->imagem_princ}}"alt="">
                    </div>
                        <h3>{{$instData->name}}</h3>
                    <br><br>
                    {{-- <p>{{$instData->desc}}</p> --}}
                    <a href="/portifolio/{{$instData->id}}" class="btn-full">Ver Mais</a>
                </li>
            @endforeach
        </ul>
        {!! $inst->Links()!!} 
    </section>
@endsection