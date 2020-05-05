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
                <a href="{{route('atas.index')}}">Atas</a></a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                @isset($ata)
                    Editando Ata: {{substr($ata->nome,0,-4)}}
                @else
                    Cadastro de nova Ata
                @endif
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
            @isset($ata)
               Editando Ata: {{substr($ata->nome,0,-4)}}
            @else
               Cadastro de nova Ata
            @endif
            </h1>
        </div>
    </div>

    @isset($ata)
        <form method="post" action="{{route('atas.update', $ata->id)}}" enctype="multipart/form-data">
            @method('put')
    @else
        <form method="post" action="{{route('atas.store')}}" enctype="multipart/form-data">
    @endisset
    @csrf
    <div class="card">
        <div class="card-header">
            Informações da Ata
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-row">
                        <!-- nome -->
                        <div class="form-group col">
                            <label for="nome">{{ __('Numero da Ata*') }}</label>
                            <input  id="nome" type="number" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') ||  isset($ata->nome) ? $ata->nome : '' }}" required autocomplete="nome" autofocus>
                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- data -->
                        <div class="form-group col">
                            <label for="data">{{ __('Mês/Ano da Ata*') }}</label>
                            <!-- Corrigindo a data para o input -->
                            @isset($ata->data)
                                @php( $data =  explode('-',$ata->data) )
                                @php( $ata->data = $data[1].'-'.$data[0] )
                            @endisset
                            <input  id="data" type="month" class="form-control @error('data') is-invalid @enderror" name="data" value="{{ old('data') ||  isset($ata->data) ? $ata->data : '' }}" required autocomplete="data" autofocus>
                            @error('data')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row">

                        <!-- pdf -->
                        <div class="form-group col ">
                            <label for="pdf" class="text-dark col-form-label text-md-center mt-n1">{{ __('PDF*') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  accept="application/pdf" id="pdf" name="pdf" value="{{ isset($ata->pdf) ? $ata->pdf : '' }}" lang="br" @empty($ata) required @endisset>
                                <label class="custom-file-label" for="pdf">Ache o arquivo</label>
                                @error('pdf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <!-- tipo -->
                        <div class="form-group col">
                            <label for="tipo" class="">{{ __('Tipo de Ata*') }}</label>
                            <select name="tipo" class="custom-select" id="tipo">
                                <option value="ordinaria"
                                    @isset($ata)
                                        @if($ata->tipo == 'ordinaria')
                                            Selected
                                        @endif
                                    @endisset
                                    >Ordinaria</option>
                                <option value="extraordinaria"
                                    @isset($ata)
                                        @if($ata->tipo == 'extraordinaria')
                                            Selected
                                        @endif
                                    @endisset
                                    >Extraordinaria</option>
                            </select>

                            @error('tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <!-- Botão -->
                        @isset($ata)
                            <button type="submit" class="btn btn-primary col-md-12">Editar Ata</button>
                        @else
                            <button type="submit" class="btn btn-primary col-md-12">Adicionar</button>
                        @endisset
                    </div>
                </div>
                <div class="col" style="height:300px" >
                    @isset($ata)
                        <iframe id="img"  src="\upload_pdf\atas\{{$ata->ano}}\{{$ata->nome_pdf}}" style="width:100%;height:100%;border:none"></iframe>
                    @else
                        <iframe id="img"  style="width:100%;height:100%;border: none; display:none"></iframe>
                    @endisset
                </div>
            </div>
        </div>
    </div>
    </form>

<!-- Imports do Jquery -->
<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#pdf').change(function(){
            const file = $(this)[0].files[0];
            const fileReader = new FileReader();
            fileReader.onloadend = function(){
                $('#img').attr('src',fileReader.result).css('display','block');
            }
            fileReader.readAsDataURL(file);
        });
    });
</script>
    @endsection

