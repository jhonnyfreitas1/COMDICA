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
                <a href="{{route('instituicao.index')}}">Instituições</a></a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                @isset($instituicoes)
                    Editando Instituição: {{$instituicoes->name}}
                @else
                    Cadastro de nova Instituição
                @endif
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
            @isset($instituicoes)
               Editando Instituição: {{$instituicoes->name}}
            @else
               Cadastro de nova Instituição
            @endif
            </h1>
        </div>
    </div>

    @isset($instituicoes)
        <form method="post" action="{{route('instituicao.update', $instituicoes->id)}}" enctype="multipart/form-data">
            @method('put')
    @else
        <form method="post" action="{{route('instituicao.store')}}" enctype="multipart/form-data">
    @endisset
    @csrf
    <div class="card">
        <div class="card-header">
            Informações da Instituição
        </div>

        <div class="card-body">
            <div class="row">
        <!-- Primeira Coluna     -->
                <div class="col-6">
                    <div class="form-row">

                        <!-- nome -->
                        <div class="form-group col-md-6">
                            <label for="name">{{ __('Nome') }}<h11>*</h11></label>
                            <input  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ||  isset($instituicoes->name) ? $instituicoes->name : '' }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- email-->
                        <div class="form-group col-md-6">
                            <label for="email">{{ __('E-mail') }}<h11>*</h11></label>
                            <input required id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($instituicoes->email) ? $instituicoes->email : '' }}" autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-row">

                    <!-- telefone -->
                    <div class="form-group col-md-4">
                            <label for="telefone">{{ __('Telefone') }}<h11>*</h11></label>
                            <input required id="telefone" type="text"  class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ isset($instituicoes->telefone) ? $instituicoes->telefone : '' }}" autocomplete="telefone" autofocus maxlength="14" placeholder="(__) ____-____"
                                onkeyup="maskTel()"
                                />
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- site -->
                        <div class="form-group col-md-8">
                            <label for="site">{{ __('Site') }}</label>
                            <input id="site" type="text" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ isset($instituicoes->site) ? $instituicoes->site : '' }}" autocomplete="site" autofocus>
                            @error('site')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- endereco -->
                        <div class="form-group col-md-12">
                            <label for="endereco">{{ __('Endereço') }}</label>
                            <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ isset($instituicoes->endereco) ? $instituicoes->endereco : '' }}" autocomplete="endereco" autofocus>
                            @error('endereco')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">

                        <!-- Img1 -->
                        <div class="form-group col-md-6">
                        <label for="img1" class="text-dark col-form-label text-md-center">{{ __('Imagem Principal') }}<h11>*</h11></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input  @error('img1') is-invalid @enderror" accept="image/*" id="img1" name="img1" value="{{ isset($instituicoes->img1) ? $instituicoes->img1 : '' }}" lang="br" @empty($instituicoes) required @endisset>
                                <label class="custom-file-label" for="img1">Ache o arquivo</label>
                                @error('img1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Img2 -->
                        <div class="form-group col-md-6">
                        <label for="img2" class="text-dark col-form-label text-md-right">{{ __('Imagem Secundária') }}<h11>*</h11></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('img2') is-invalid @enderror" accept="image/*" id="img2" lang="br" name="img2" value="{{ isset($instituicoes->img2) ? $instituicoes->img2 : '' }}" @empty($instituicoes) required @endisset>
                                <label class="custom-file-label" for="img2">Ache o arquivo</label>
                                @error('img2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-1">

                        <!-- Imagens -->
                        <div class="form-group col-md-6">
                        <label for="img1" class="text-dark col-form-label text-md-center">{{ __('Imagens') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('imagens') is-invalid @enderror" accept="image/*" multiple id="imagens" name="imagens[]" value="{{ isset($instituicoes->imagens) ? $instituicoes->imagens : '' }}" lang="br" @empty($instituicoes) onClick="addImage()" @endisset>
                                <label class="custom-file-label" for="imagens">Ache o arquivo</label>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Limite máximo de 6 imagens
                                </small>
                                @error('imagens')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Vídeo -->
                        <div class="form-group col-md-6">
                        <label for="video" class="text-dark col-form-label text-md-right">{{ __('Vídeo') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('video') is-invalid @enderror" accept="video/*" id="video" lang="br" name="video" value="{{ isset($instituicoes->video) ? $instituicoes->video : '' }}">
                                <label class="custom-file-label" for="video">Ache o arquivo</label>
                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div><br>

                    <div class="form-row">
                        <!-- descricao -->
                        <div class="form-group col-md-12">
                                <label for="desc" >{{ __('Descrição') }}</label>
                                <textarea id="desc"class="form-control  @error('desc') is-invalid @enderror" name="desc" id="desc" rows="3" autocomplete="desc" autofocus>{{ isset($instituicoes->name) ? $instituicoes->name : '' }}
                                </textarea>
                                @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Botão -->
                        @isset($instituicoes)
                            <button type="submit" class="btn btn-primary col-md-12">Editar Instituição</button>
                        @else
                            <button type="submit" class="btn btn-primary col-md-12">Adicionar</button>
                        @endisset
                    </div>
                </div>

                <!-- Segunda Coluna     -->
                <div class="col-6">
                    <div class=" d-block" id="cards" style="heigth:500px;">
                    @isset($imagens)
                        @foreach($imagens as $count => $imagem)
                            <a href="#" id="img{{$imagem->img_id}}" url="{{route('instituicao.destroyImagem',$imagem->img_id)}}" onClick="confirmExclusao('img{{$imagem->img_id}}', 'essa imagem')">
                                <img class="mt-2 rounded d-inline-block excluir verifImg" src="/upload_imagem/instituicoes/{{$galeria->gal_id}}/{{$imagem->nome}}"style="width: 150px; height: 100px; margin-left: 5px; border: none; display: block;">
                            </a>
                        @endforeach
                    @endisset
                    </div>
                    <!-- Video -->
                    <div class="d-block mt-2" id="movie" style="height:226px">
                    @if(isset($video) and $video->nome != '' )
                            <div class="d-block" style="height:186px;">
                                <video width="500" height="186"autoplay="autoplay" loop="loop" controls="controls" tabindex="0" id="viddeo" >
                                    <source src="/upload_video/instituicoes/{{$galeria->gal_id}}/{{$video->nome}}" type="video/mp4">
                                </video>
                            </div>
                            <div class="d-block" style="height:40px">
                                <button type="button" class="btn btn-labeled btn-danger mt-1" id="delVideo" href="#" url="{{route('instituicao.destroyVideo',$video->video_id)}}" onClick="confirmExclusao('delVideo', 'esse vídeo')" style="height:30px;font-size:12px">
                                <span class="btn-label"><i class="fas fa-trash"></i></span> Apagar vídeo</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</form>
<style>
    .excluir:hover{
        filter: grayscale(1);
    }
    </style>

<!-- Imports do Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
    // Função que coloca a mascara
    function maskTel(){

        const tel = $("#telefone");
        const val = tel.val().replace(/\D/g, '');
        const len = tel.val().replace(/\D/g, '').length;
        const c = 0;

        if( !isNaN(tel.val()) ){
            addMask(tel, val, len, c)
        }else{
            tel.val().replace(/[^0-9]/g,'');
            addMask(tel, val, len, c)
        }

    }
    function addMask(tel, val, len, c) {
        if(c == 0){
            c++;
            if( len == 1){
                ini = val.replace(/\D/g, '');
                tel.val('('+ini);
                addMask(tel, val, len, c)
            }else if(len == 2){
                ini = val.replace(/\D/g, '');
                tel.val('('+ini);
                addMask(tel, val, len, c)
            }else if(len > 2 && len < 7){
                ini =  tel.val().replace(/\D/g, '').substring(0,2) ;
                med =  tel.val().replace(/\D/g, '').substring(2,7) ;
                tel.val('('+ini+')'+med);
                addMask(tel, val, len, c);
            }else if(len > 6  && len < 11){
                ini =  tel.val().replace(/\D/g, '').substring(0,2) ;
                med =  tel.val().replace(/\D/g, '').substring(2,6) ;
                fim =  tel.val().replace(/\D/g, '').substring(6,10) ;
                tel.val('('+ini+')'+med+'-'+fim);
                addMask(tel, val, len, c)
            }else if(len == 11){
                ini =  tel.val().replace(/\D/g, '').substring(0,2) ;
                med =  tel.val().replace(/\D/g, '').substring(2,7) ;
                fim =  tel.val().replace(/\D/g, '').substring(7,11) ;
                tel.val('('+ini+')'+med+'-'+fim);
                addMask(tel, val, len, c)
            }
        }
    }
    function addImage(){
        //Mostrando as imagens
        $('#imagens').change(function(){

            $(".ts").remove();
            const verifImg = $('.verifImg').length;
            let quantFile = $(this)[0].files.length;
            // console.log($(this)[0].files.length)
            let quantLinhas = verifImg/4;
            let j = (verifImg%4);
            let r=Math.trunc(quantLinhas);
            let todasImgs = [];
            let imgg = [];

            if(quantFile > 6){
                alert('Só iremos selecionar os seis primeiros arquivos!')
                quantFile=6;
            }

            for(let i=0 ; i < quantFile; i++){
                let t = i+verifImg;
                const file = $(this)[0].files[i];
                // imgg.push(file)
                const fileReader = new FileReader();

                // Modificando o html
                if(j ==0){
                    $("#visu"+t).removeClass();
                    $('#cards').append("<div id='r"+r+"' class='row '></div>");
                    $('#r'+r).append("<img id='visu"+t+"' class='rounded float-left ts'></img>");
                    $('#visu'+t).css({"width":"240px","height":"100px","margin-left":"5px","border": "1px solid red","display":"none"});
                    $('#visu'+t).addClass('verifImg mt-1');
                    j++;
                }else{
                    $("#visu"+t).removeClass();
                    $('#r0').append("<img id='visu"+t+"' class='rounded float-left ts'></img>");
                    $('#visu'+t).css({"width":"240px","height":"100px","margin-left":"5px","border": "1px solid red","display":"none"});
                    $('#visu'+t).addClass('verifImg mt-1');
                }

                fileReader.onloadend = function(){
                    let visu = '#visu'+t;
                    // let img = '#img'+t;
                    $(visu).attr('src',fileReader.result).css('display','block');
                // $('#imagens').val(todasImgs);
                    todasImgs.push(fileReader.result);
                }
                fileReader.readAsDataURL(file);
            }

            for (let index = 0; index < imgg.length; index++) {
                allImgs.unshift(imgg[index]);

            }
        });
    };

    $(document).ready(function(){

        // Corrigindo um erro que deu no HTML
        // console.log($("#desc").val().length)
        if( $("#desc").val() === '                                ' ){
            $("#desc").val('');
        };

    });
</script>
    @endsection

