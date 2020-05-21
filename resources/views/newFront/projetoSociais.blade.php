@extends('layouts.newIndex');

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
    .cardLink{
        height: 330px;
    }
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

    .img1{
        background: url("/img/child6.jpeg") no-repeat center;
        background-size: cover;
        background-color: #3E4095;
    }
    .img1:before{
        margin-top: 168px;
        position: absolute;
        top:0;
        left:0;
        width: 100%;
        height: 330px;
        content: '';
        background-color: rgba(0, 0, 0, 0.5);
    }
    .btn-full{
        position: relative;
    }
</style>
<section class="produtos container">
    <br><br><br><br><br><br>
        <div class="cardLink img1">
            <h1 style="text-align: center">Doação através de projetos sociais.</h1>
            <blockquote class="quote-externo">
                <p>Com a escolha de projetos Sociais, você irá efetuar a doação através da nossa calculadora interna.</p>                    
            </blockquote>
            <div style="text-align: center;">
                <a href="/calculadora" class="btn-full">Doar</a>                    
            </div>
        </div>
</section>
@endsection
