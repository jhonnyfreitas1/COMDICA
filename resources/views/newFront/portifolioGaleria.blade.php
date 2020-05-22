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

    .cardLink {
        width: 300px;
        height: 400px;
        text-align: center;
        padding-top: 40px;
        color: white;
        position: relative;
        margin-left: 100px;
        padding: 40px;
        border-radius: 10px;
    }
    .cardLink img{}
    .cardLink h1, p{
        padding-top:20px;
        position: relative;
        color: #fff;
        
    }
    .cardLink h1{
        font-size: 32px;
    }
    .cardLink p{
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-size: 20px;
        font-style: italic;
        text-align: center;
        color: #fff;
        padding: 10px;
        margin-top: 25px;
        margin-bottom: 25px;
    }

    /* .cardLink:before{
        position: absolute;
        top:0;
        left:0;
        width: 100%;
        height: 100%;
        content: '';
        background-color: rgba(0, 0, 0, 0.5);
    } */
    .btn-full{
        position: relative;
    }
    .img1{
        background: url("/img/p8.png") no-repeat center;
        background-size: cover;
        background-color: #017DB9;
        background-position-x: -10px;
    }
    .img2{
        background: url("/img/p5.png") no-repeat center;
        background-size: cover;
        background-color: rgba(220, 170, 119, 10);
    }
    @media only screen and (max-width: 787px) {
        .pagination{
            margin-top: 200px;
        }
        .cardLink{
            margin-left: 0px;
        }
    }
</style>
    {{-- <section class="introducao-interna interna_produtos">
        <div class="container">
            <h1 data-anime="400" class="fadeInDown">Entidades</h1>
            <p data-anime="800" class="fadeInDown">Conheça o Trabalho das nossas entidades</p>
        </div>
    </section> --}}
    <section class="produtos container">
        <br><br><br><br><br><br>
        <ul class="produtos_lista">
                <div class="grid-4 cardLink img1">
                    <h1>GALERIA</h1>
                    <blockquote class="quote-externo">
                        <p>Nós fazemos questão de armazenar todos os momentos incríveis que participamos em prol do bem-estar infatil em araçoiaba.</p>                    
                        <a href="/portifolio/1" class="btn-full">Ver mais</a>                    
                    </blockquote>
                </div>
                <div class="grid-4 cardLink img2">
                    <h1>ATAS</h1>                    
                    <blockquote class="quote-externo">
                        <p>Veja aqui nossas atas de reuniões e nossas últimas resoluções.</p>
                    </blockquote>
                    <a href="{{route('atas')}}" class="btn-full">Ver mais</a>                    
                </div>
            {{-- @foreach ($inst as $instData)
                <li class="grid-4">
                    <div class="produtos_icone">
                        <img src="/upload_imagem/instituicoes/{{$instData->name.$instData->id}}/{{$instData->imagem_princ}}"alt="">
                    </div>
                    <h3>{{$instData->name}}</h3>
                    <p>{{$instData->desc}}</p>
                    <a href="/portifolio/{{$instData->id}}" class="btn-full">Ver Mais</a>
                </li>
            @endforeach
        </ul>
        {!! $inst->Links()!!}  --}}
    </section>
@endsection