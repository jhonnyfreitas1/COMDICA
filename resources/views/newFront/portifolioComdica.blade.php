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
</style>
<br>
<section class="introducao-interna" style="color:#5BA479; background-color: #f7fffa">
    <div class="container">
        <h1 data-anime="400" class="fadeInDown">Fotos</h1>
        <p data-anime="800" class="fadeInDown">Veja todas as fotos do projeto abaixo</p>
    </div>
</section>
<section class="missao_sobre container fadeInDown" data-anime="1200">
    <section class="container produto_item">
        <ul class="produtos_lista">
            <li class="grid-8 produtos_list">
                <div class="produtos_icone">
                    <img src="/img/about.jpeg"alt="">
                </div>
            </li>
            <li class="grid-8 produtos_list">
                <div class="produtos_icone">
                    <img src="/img/about.jpeg"alt="">
                </div>
            </li>
            <li class="grid-8 produtos_list">
                <div class="produtos_icone">
                    <img src="/img/about.jpeg"alt="">
                </div>
            </li>
            <li class="grid-8 produtos_list">
                <div class="produtos_icone">
                    <img src="/img/about.jpeg"alt="">
                </div>
            </li>
        </ul>
    </section>
</section>
@endsection