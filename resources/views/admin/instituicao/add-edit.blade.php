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
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                @isset($instituicoes)
                    <div  class="card-header bg-info text-light"> Editar Instituição </div >
                @else
                    <div  class="card-header bg-info text-light"> Cadastro de Instituição </div >
                @endisset
                    <div class="card-body">
                        @isset($instituicoes)
                            <form method="post" action="{{route('instituicao.update', $instituicoes->id)}}" enctype="multipart/form-data">
                                @method('put')
                        @else
                            <form method="post" action="{{route('instituicao.store')}}" enctype="multipart/form-data">
                        @endisset
                        @csrf
                            <!-- Nome -->
                            <div class="form-group">
                                <label for="name" class="text-dark col-form-label text-md-right">{{ __('Nome') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($instituicoes->name) ? $instituicoes->name : '' }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Descrição -->
                            <div class="form-group green-border-focus">
                                <label for="desc" class="text-dark col-form-label text-md-right">{{ __('Descrição') }}</label>
                                <textarea class="form-control" name="desc" id="desc" rows="3" required autocomplete="desc" autofocus>{{ isset($instituicoes->name) ? $instituicoes->name : '' }}
                                </textarea>
                                    @error('desc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-row">
                            <!-- E-mail -->
                                <div class="form-group col-md-6">
                                    <label for="email" class="text-dark col-form-label text-md-right">{{ __('E-mail') }}</label>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($instituicoes->email) ? $instituicoes->email : '' }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <!-- Site -->
                                <div class="form-group col-md-6">
                                    <label for="site" class="text-dark col-form-label text-md-right">{{ __('Site') }}</label>
                                    <input id="site" type="text" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ isset($instituicoes->site) ? $instituicoes->site : '' }}" required autocomplete="site" autofocus>
                                    @error('site')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                            <!-- Endereço -->
                                <div class="form-group col-md-6">
                                    <label for="endereco" class="text-dark col-form-label text-md-right">{{ __('Endereço') }}</label>
                                    <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ isset($instituicoes->endereco) ? $instituicoes->endereco : '' }}" required autocomplete="endereco" autofocus>
                                    @error('desc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <!-- Telefone -->
                                <div class="form-group col-md-6">
                                    <label for="telefone" class="text-dark col-form-label text-md-right">{{ __('Telefone') }}</label>
                                    <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ isset($instituicoes->telefone) ? $instituicoes->telefone : '' }}" required autocomplete="telefone" autofocus>
                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                            <!-- Imagem Principal -->
                                <div class="form-group col-md-4">
                                <label for="imagem_princ" class="text-dark col-form-label text-md-center">{{ __('Imagem principal*') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagem_princ" name="imagem_princ" value="{{ isset($instituicoes->imagem_princ) ? $instituicoes->imagem_princ : '' }}" lang="br" required>
                                        <label class="custom-file-label" for="imagem_princ">Ache o arquivo</label>
                                        @error('imagem_princ')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            <!-- Imagem Secundária -->
                                <div class="form-group col-md-4">
                                <label for="imagem_sec" class="text-dark col-form-label text-md-right">{{ __('Imagem secudária*') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagem_sec" lang="br" name="imagem_sec" value="{{ isset($instituicoes->imagem_sec) ? $instituicoes->imagem_sec : '' }}" required>
                                        <label class="custom-file-label" for="imagem_sec">Ache o arquivo</label>
                                        @error('imagem_sec')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            <!-- Imagem Terciária -->
                                <div class="form-group col-md-4">
                                <label for="imagem_ter" class="text-dark col-form-label text-md-right">{{ __('Imagem terciária*') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagem_ter" lang="br" name="imagem_ter" value="{{ isset($instituicoes->imagem_ter) ? $instituicoes->imagem_ter : '' }}" required>
                                        <label class="custom-file-label" for="imagem_ter">Ache o arquivo</label>
                                        @error('imagem_ter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

            @isset($instituicoes)
                <button type="submit" class="btn btn-primary col-md-12">Editar Instituição</button>
            @else
                <button type="submit" class="btn btn-primary col-md-12">Adicionar</button>
            @endisset
            </form>
    @endsection

