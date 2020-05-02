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
                @isset($atas)
                    Editando Ata: {{$atas->name}}
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
            @isset($atas)
               Editando Ata: {{$atas->name}}
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
            <div class="form-row">
                <!-- nome -->
                <div class="form-group col-md-4">
                    <label for="name">{{ __('Nome do Arquivo') }}</label>
                    <input  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ||  isset($ata->name) ? $ata->name : '' }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            <!-- Ata -->
                <div class="form-group col-md-3">
                <label for="pdf" class="text-dark col-form-label text-md-center">{{ __('PDF*') }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="pdf" name="pdf" value="{{ isset($ata->pdf) ? $ata->pdf : '' }}" lang="br">
                        <label class="custom-file-label" for="pdf">Ache o arquivo</label>
                        @error('pdf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>


    @isset($ata)
        <button type="submit" class="btn btn-primary col-md-12">Editar Ata</button>
    @else
        <button type="submit" class="btn btn-primary col-md-12">Adicionar</button>
    @endisset
        </div>
    </div>
</form>

<!-- Imports do Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    @endsection

