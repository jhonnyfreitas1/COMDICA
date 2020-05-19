@extends('layouts.admin')
    <style>
.custom-file-input ~ .custom-file-label::after {
    content: "Procurar";
}
.custom-file-input ~ .custom-file-label::nbefore {
    content: "Alterar";
}
    </style>

    @section('area-principal')
    <br>
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('admin.comdica')}}">Home</a>
            </li>
            <li class="breadcrumb-item" >
                <a href="{{route('campanha.index')}}">Campanha</a></a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                @isset($campanha)
                    Editando Campanha: {{$campanha->titulo}}
                @else
                    Cadastro de nova Campanha
                @endif
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
            @isset($campanha)
               Editando Campanha: {{$campanha->titulo}}
            @else
               Cadastro de nova Campanha
            @endif
            </h1>
        </div>
    </div>

    @isset($campanha)
        <form method="post" action="{{route('campanha.update', $campanha->id)}}" enctype="multipart/form-data">
            @method('put')
    @else
        <form method="post" action="{{route('campanha.store')}}" enctype="multipart/form-data">
    @endisset
    @csrf
    <div class="card">
        <div class="card-header">
            Informações da Campanha
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group col">
                        <!-- nome -->
                        <label for="titulo">{{ __('Titulo do Campanha') }}</label>
                        <input  id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') ||  isset($campanha->titulo) ? $campanha->titulo : '' }}" required autocomplete="titulo" name="titulo" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <!-- descricao -->
                        <label for="desc" >{{ __('Descrição') }}</label>
                        <textarea id="desc"class="form-control" name="desc" autocomplete="desc" rows="3" required autofocus>{{ isset($campanha->desc) ? $campanha->desc : '' }}
                        </textarea>
                        @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-row col">
                        <div class="col-6">
                            <!-- Imagem -->
                            <label for="imagem" class="text-dark col-form-label text-md-right">{{ __('Imagem*') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" multiple id="imagem" accept="image/*" lang="br" name="imagem[]" @empty($campanha) required onClick="addImage()" @endisset>
                                <label class="custom-file-label" for="imagem">Ache o arquivo</label>
                                @error('imagem')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">

                            <!-- Vídeo -->
                            <label for="imagem" class="text-dark col-form-label text-md-right">{{ __('Vídeo*') }}</label>
                            <div class="custom-file">
                                <input type="file" onClick="addVideo()" class="custom-file-input" id="video" accept="video/*" lang="br" name="video" @empty($campanha) required  @endisset>
                                <label class="custom-file-label" for="video">Ache o arquivo</label>
                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group col">
                    <br>
                        <!-- Botão -->
                        @isset($campanha)
                            <button type="submit" class="btn btn-primary col-md-12">Editar Campanha</button>
                        @else
                            <button type="submit" class="btn btn-primary col-md-12">Adicionar</button>
                        @endisset
                    </div>
                </div>
                <!-- <div class="col scroll-me" id="imgs" style="heigth:500px"> -->



                    <div class="col-6" >
                        <div class="d-inline-block" id="imgs" style="width:200px; height:330px;">
                    @isset($imagens)
                        @foreach($imagens as $count => $imagem)
                            <!-- Img{{$count}} -->
                            <div class="d-block" id="i{{$count}}" style="">
                                <a id="{{$imagem->id}}" href="#" url="{{route('campanha.destroyImagem',$imagem->id)}}" onClick="confirmExclusao({{$imagem->id}}, 'essa imagem')">
                                    <img id="visu{{$count}}" class="rounded float-left excluir verifImg img" src="/upload_imagem/campanhas/{{$campanha->id}}/{{$imagem->nome_img}}"style="@if($count ==1) margin-top:15px;@endif border: none; display: block;">
                                </a>
                            </div>
                        @endforeach
                    @endisset
                        </div>
                        <!-- Video -->
                        <div class="d-inline-block" id="movie" style="margin-left:10px;margin-top:-50px; width:280px; height:300px; ">
                            @isset($video)
                                <div class="d-block">
                                        <!-- <video width="280" height="300" controls="controls" autoplay="autoplay"> -->
                                        <video width="280" height="300" controls="controls" id="viddeo" >
                                            <source src="/upload_imagem/campanhas/{{$campanha->id}}/{{$video->nome_video}}" type="video/mp4">
                                        </video>
                                </div>
                                <div class="d-block mt-1" >
                                    <button type="button" class="btn btn-labeled btn-danger" id="{{$video->id}}" href="#" url="{{route('campanha.destroyVideo',$video->id)}}" onClick="confirmExclusao({{$video->id}}, 'esse vídeo')">
                                    <span class="btn-label"><i class="fas fa-trash"></i></span> Apagar vídeo</button>
                                </div>
                            @endisset
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</form>
<style>
    .img{
        width:200px;
        height:150px;
    }

    .scroll-me{
        height: 350px;
        width: 200px;
        overflow-y: auto;
        overflow-x: hidden;
        font-size: 18px;
    }
    .excluir:hover{
        filter: grayscale(1);
    }
    .novas{
        border: 1px solid red;
    }
    .novas:hover{
        filter: grayscale(11);
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function fileReader(file,t){
        const fileReader = new FileReader();
        fileReader.onloadend = function(){
            let visu = '#visu'+t;
            let img = '#img'+t;
            $(visu).attr('src',fileReader.result).css('display','block');
            $(img).val(fileReader.result);
        }
        fileReader.readAsDataURL(file);

    }
    function addImage(){
        //Mostrando as imagens
        $('#imagem').change(function(){
            const verifImg = $('.verifImg').length;
            let quantFile = $(this)[0].files.length;
            if(quantFile>2){
                alert('Só iremos selecionar os dois primeiros arquivos!')
            }
            if(quantFile>1){
                quantFile=2;
            }
            let j = verifImg;
            let r=0;
            for(let i=0 ; i < quantFile; i++){
                let t = i+verifImg;
                const file = $(this)[0].files[i];

                if($('#i0').length > 0 && $('#i1').length > 0){
                    // OS DOIS ESTÃO PREENCHIDOS
                    // Modificando o html
                    $("#visu"+t).removeClass();
                    // alert()
                    $('#i'+r).remove();
                    $('#imgs').append("<div id='i"+r+"' class='d-block'></div>");
                    $('#i'+r).append("<img id='visu"+r+"' class='rounded float-left'></img>");
                    if(r == 1 ){
                        $('#i1').css({"margin-top":"15px"});
                    }
                    $('#visu'+r).addClass('rounded float-left verifImg img');
                    fileReader(file,r);
                    r++;
                }else {
                    if($('#i0').length == 0){
                        // Modificando o html
                        $("#visu"+t).removeClass();
                        $('#imgs').append("<div id='i0' class='d-block'></div>");
                        $('#i0').append("<img id='visu"+t+"' class='rounded float-left'></img>");
                        $('#visu'+t).addClass('rounded float-left verifImg img');
                        fileReader(file,t);
                    }else{
                        // Modificando o html
                        $("#visu"+t).removeClass();
                        $('#imgs').append("<div id='i1' class='d-block'></div>");
                        $('#i1').append("<img id='visu"+t+"' class='rounded float-left'></img>");
                        $('#visu'+t).addClass('rounded float-left verifImg img');
                        $('#visu'+t).css({"margin-top":"15px"});
                        fileReader(file,t);
                    }
                }
            }
        });
    }
    $(document).ready(function(){

        // Corrigindo um erro que deu no HTML
        if( $("#desc").val() == "                        "){
            $("#desc").val('');
        };


    });
</script>
<!-- Imports do Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @endsection
