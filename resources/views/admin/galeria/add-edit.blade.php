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
                <a href="{{route('galeria.index')}}">Galeria</a></a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                @isset($album)
                    Editando Álbum: {{$album->titulo}}
                @else
                    Cadastro de nova Álbum
                @endif
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
            @isset($album)
               Editando Álbum: {{$album->titulo}}
            @else
               Cadastro de nova Álbum
            @endif
            </h1>
        </div>
    </div>

    @isset($album)
        <form method="post" action="{{route('galeria.update', $album->id)}}" enctype="multipart/form-data">
            @method('put')
            @csrf
    @else
        <form method="post" action="{{route('galeria.store')}}" enctype="multipart/form-data">
            @csrf
    @endisset
    @csrf
    <div class="card">
        <div class="card-header">
            Informações da Álbum
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="form-group col">
                        <!-- nome -->
                        <label for="titulo">{{ __('Titulo do Álbum') }}</label>
                        <input  id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') ||  isset($album->titulo) ? $album->titulo : '' }}" required autocomplete="titulo" name="titulo" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <!-- descricao -->
                        <label for="desc" >{{ __('Descrição') }}</label>
                        <textarea id="desc"class="form-control" name="desc" autocomplete="desc" rows="3" required autofocus>{{ isset($album->descricao) ? $album->descricao : '' }}
                        </textarea>
                        @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <!-- Imagem -->
                        <label for="imagem" class="text-dark col-form-label text-md-right">{{ __('Imagem*') }}</label>
                        <div class="custom-file">
                            <input type="file" multiple class="custom-file-input" id="images" lang="br" name="images[]" @empty($album) required @endisset>
                            <label class="custom-file-label" for="imagem">Ache o arquivo</label>
                            @error('imagem')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col">
                        <!-- Botão -->
                        @isset($album)
                            <button type="submit" class="btn btn-primary col-md-12">Editar Álbum</button>
                        @else
                            <button type="submit" class="btn btn-primary col-md-12">Adicionar</button>
                        @endisset
                    </div>
                </div>
                <div class="col scroll-me" id="cards" style="heigth:500px">
                    @isset($imagens)
                        @php($c = 0)
                        @php($r = 0)
                        @foreach($imagens as $count => $imagem)
                            <!-- {{$count}} -->
                            @if($c == 0)
                                <div id="r{{$r}}" class="row mt-3">
                                    <a id="{{$imagem->id}}" href="#" url="{{route('galeria.destroyImagem',$imagem->id)}}" onClick="confirmExclusao({{$imagem->id}}, 'essa imagem')">
                                        <img id="visu{{$count}}" class="rounded float-left excluir verifImg" src="/upload_imagem/albuns/{{$album->id}}/{{$imagem->nome}}"style="width: 150px; height: 100px; margin-left: 5px; border: none; display: block;">
                                    </a>
                                @php($c++)
                            @else
                                <a id="{{$imagem->id}}" href="#" url="{{route('galeria.destroyImagem',$imagem->id)}}" onClick="confirmExclusao({{$imagem->id}}, 'essa imagem')">
                                    <img id="visu{{$count}}" class="rounded float-left excluir verifImg mt-1" src="/upload_imagem/albuns/{{$album->id}}/{{$imagem->nome}}" style="width: 150px; height: 100px; margin-left: 5px; border: none; display: block;">
                                </a>
                                @php($c++)
                                @if($c == 4)
                                </div>
                                    @php($c=0)
                                    @php($r++)
                                @endif
                            @endif
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</form>
<style>
    .g1{
        background-color:green;
        width: 250px;
        height:200px;
        margin:10px;
    }
    .v1{
        background-color:red;
        width: 250px;
        height:170px;
        margin:10px;
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

    $(document).ready(function(){

        // Corrigindo um erro que deu no HTML
        if( $("#desc").val() == "                        "){
            $("#desc").val('');
        };

        $('#images').change(function(){
            const verifImg = $('.verifImg').length;
            console.log('verif: '+verifImg);
            const quantFile = $(this)[0].files.length;
            let j = verifImg;
            let r=0;
            for(let i=0 ; i < quantFile; i++){
                let t = i+verifImg;
                console.log('t: t'+t);
                const file = $(this)[0].files[i];
                const fileReader = new FileReader();

                // Modificando o html
                if(j == 0){
                    $("#visu"+t).removeClass();
                    $('#cards').append("<div id='r"+r+"' class='row mt-3'></div>");
                    $('#r'+r).append("<img id='visu"+t+"' class='rounded float-left'></img>");
                    $('#visu'+t).css({"width":"150px","height":"100px","margin-left":"5px","border": "1px solid red","display":"none"});
                    $('#visu'+t).addClass('verifImg mt-1');
                    j++;
                }else{
                    $("#visu"+t).removeClass();
                    $('#r'+r).append("<img id='visu"+t+"' class='rounded float-left'></img>");
                    console.log('visu'+t);
                    $('#visu'+t).css({"width":"150px","height":"100px","margin-left":"5px","border": "1px solid red","display":"none"});
                    $('#visu'+t).addClass('verifImg mt-1');
                    j++;
                    if(j == 4){
                        j=0;
                        r++;
                    }
                }

                fileReader.onloadend = function(){
                    let visu = '#visu'+t;
                    let img = '#img'+t;
                    $(visu).attr('src',fileReader.result).css('display','block');
                    $(img).val(fileReader.result);
                }
                fileReader.readAsDataURL(file);
            }
        });
    });
</script>
<!-- Imports do Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @endsection

