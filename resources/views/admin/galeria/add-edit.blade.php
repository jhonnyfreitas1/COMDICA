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
                <a href="{{route('galeria.index')}}">Albuns</a></a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                @isset($albuns)
                    Editando Album: {{$albuns->name}}
                @else
                    Cadastro de nova Album
                @endif
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
            @isset($albuns)
               Editando Album: {{$albuns->name}}
            @else
               Cadastro de nova Album
            @endif
            </h1>
        </div>
    </div>

    @isset($albuns)
        <form method="post" action="{{route('galeria.update', $albuns->id)}}" enctype="multipart/form-data">
            @method('put')
    @else
        <form method="post" action="{{route('galeria.store')}}" enctype="multipart/form-data">
    @endisset
    @csrf
    <div class="card">
        <div class="card-header">
            Informações da Album
        </div>
        <div class="card-body">
            <div class="form-row">
                <!-- nome -->
                <div class="form-group col-md-4">
                    <label for="name">{{ __('Nome') }}</label>
                    <input  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ||  isset($albuns->name) ? $albuns->name : '' }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                  <!-- email-->
                <div class="form-group col-md-4">
                    <label for="name">{{ __('E-mail') }}</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($albuns->email) ? $albuns->email : '' }}" autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                  <!-- site -->
                <div class="form-group col-md-4">
                    <label for="site">{{ __('Site') }}</label>
                    <input id="site" type="text" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ isset($albuns->site) ? $albuns->site : '' }}" autocomplete="site" autofocus>
                    @error('site')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>


            <div class="form-row">
            <!-- endereco -->
                <div class="form-group col-md-4">
                    <label for="endereco">{{ __('Endereço') }}</label>
                    <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ isset($albuns->endereco) ? $albuns->endereco : '' }}" autocomplete="endereco" autofocus>
                    @error('desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            <!-- telefone -->
                <div class="form-group col-md-2">
                    <label for="telefone">{{ __('Telefone') }}</label>
                    <input id="telefone" type="text"  class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ isset($albuns->telefone) ? $albuns->telefone : '' }}" autocomplete="telefone" autofocus maxlength="14" placeholder="(__) ____-____"
                        onkeyup="maskTel()"
                        />
                    @error('telefone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            <!-- Imagem Principal -->
                <div class="form-group col-md-3">
                <label for="imagem_princ" class="text-dark col-form-label text-md-center">{{ __('Imagem principal*') }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagem_princ" name="imagem_princ" value="{{ isset($albuns->imagem_princ) ? $albuns->imagem_princ : '' }}" lang="br">
                        <label class="custom-file-label" for="imagem_princ">Ache o arquivo</label>
                        @error('imagem_princ')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            <!-- Imagem Secundária -->
                <div class="form-group col-md-3">
                <label for="imagem_sec" class="text-dark col-form-label text-md-right">{{ __('Imagem secudária*') }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagem_sec" lang="br" name="imagem_sec" value="{{ isset($albuns->imagem_sec) ? $albuns->imagem_sec : '' }}">
                        <label class="custom-file-label" for="imagem_sec">Ache o arquivo</label>
                        @error('imagem_sec')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-row">
                <!-- descricao -->
                <div class="form-group col-md-12">
                        <label for="desc" >{{ __('Descrição') }}</label>
                        <textarea id="desc"class="form-control" name="desc" id="desc" rows="3" required autocomplete="desc" autofocus>{{ isset($albuns->name) ? $albuns->name : '' }}
                        </textarea>
                        @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
    @isset($albuns)
        <button type="submit" class="btn btn-primary col-md-12">Editar Album</button>
    @else
        <button type="submit" class="btn btn-primary col-md-12">Adicionar</button>
    @endisset
        </div>
    </div>
</form>

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
    $(document).ready(function(){

        // Corrigindo um erro que deu no HTML
        if( $("#desc").val() == "                        "){
            $("#desc").val('');
        };

    })
</script>
    @endsection

