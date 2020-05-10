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
        border-radius: 10px;
        position: relative;
        margin-left: 100px;
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
        text-align: center;
        color: #fff;
        padding: 20px;
    }

    /* .cardLink:before{
        position: absolute;
        top:0;
        left:0;
        width: 100%;
        height: 100%;
        content: '';
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
    } */
    .btn-full{
        position: relative;
    }
    .img1{
        background: url("/img/p4.png") no-repeat center;
        background-size: cover;
        background-color: #5BA479;
    }
    .img2{
        background: url("/img/p7.png") no-repeat center;
        background-size: cover;
        background-color: #EF92BE;
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
                    <h1>COMDICA</h1>
                    <blockquote class="quote-externo">
                        <p>Nosso Ambiente próprio para o conselho, aqui temos nossa galeria e as nossas atas e demonstrações de todo nosso trabalho para com as crianças.</p>                    
                    </blockquote>
                    <a href="{{route('comdicaGaleria')}}" class="btn-full">Ver mais</a>                    
                </div>
                <div class="grid-4 cardLink img2">
                    <h1>ENTIDADES</h1>                    
                    <blockquote class="quote-externo">
                        <p>Ambiente para nossas entidades, aqui você terá acesso a todas as organizações que ajudam o COMDICA a ajudar crianças.</p>                    
                    </blockquote>
                    <a href="{{route('portifolio')}}" class="btn-full">Ver mais</a>                    
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