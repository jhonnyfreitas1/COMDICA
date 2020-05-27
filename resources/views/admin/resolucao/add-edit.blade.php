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
                <a href="{{route('resolucao.index')}}">Resoluções</a></a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                @isset($resolucao)
                    Editando Resolução: {{$resolucao->name}}
                @else
                    Cadastro de nova Resolução
                @endif
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
            @isset($resolucao)
               Editando Resolução: {{$resolucao->name}}
            @else
               Cadastro de nova Resolução
            @endif
            </h1>
        </div>
    </div>

    @isset($resolucao)
        <form method="post" action="{{route('resolucao.update', $resolucao->id)}}" enctype="multipart/form-data">
            @method('put')
    @else
        <form method="post" action="{{route('resolucao.store')}}" enctype="multipart/form-data">
    @endisset
    @csrf
    <div class="card">
        <div class="card-header">
            Informações da Resolução
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <!-- nome -->
                    <div class="form-group col">
                        <label for="nome">{{ __('Numero da Resolução') }}<h11>*</h11></label>
                        <input  id="nome" type="number" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') ||  isset($resolucao->nome) ? $resolucao->nome : '' }}" required autocomplete="nome" autofocus>
                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- pdf -->
                    <div class="form-group col ">
                        <label for="pdf" class="text-dark col-form-label text-md-center mt-n1">{{ __('PDF') }}<h11>*</h11></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('pdf') is-invalid @enderror"  accept="application/pdf" id="pdf" name="pdf" value="{{ isset($resolucao->pdf) ? $resolucao->pdf : '' }}" lang="br" @empty($resolucao) required @endisset>
                            <label class="custom-file-label" for="pdf">Ache o arquivo</label>
                            @error('pdf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- data -->
                    <div class="form-group col">
                        <label for="data" class="mt-3">{{ __('Mês/Ano da Resolução') }}<h11>*</h11></label>
                        <!-- Corrigindo a data para o input -->
                        @isset($resolucao->data)
                            @php( $data =  explode('-',$resolucao->data) )
                            @php( $resolucao->data = $data[1].'-'.$data[0] )
                        @endisset
                        <input  id="data" type="month" class="form-control @error('data') is-invalid @enderror" name="data" value="{{ old('data') ||  isset($resolucao->data) ? $resolucao->data : '' }}" required autocomplete="data" autofocus>
                        @error('data')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- botão -->
                    <div class="form-group col">
                        @isset($resolucao)
                            <button type="submit" class="btn btn-primary col-md-12">Editar Resolucao</button>
                        @else
                            <button type="submit" class="btn btn-primary col-md-12">Adicionar</button>
                        @endisset
                    </div>
                </div>
                <div class="col" style="height:300px" >
                    @isset($resolucao)
                        <iframe id="img"  src="\upload_pdf\resolucoes\{{$resolucao->ano}}\{{$resolucao->nome_pdf}}" style="width:100%;height:100%;border: none"></iframe>
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

