@extends('layouts.admin')

    @section('area-principal')
    <br>
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('usuario.index')}}">Home</a>
            </li>
            <li class="breadcrumb-item" >
                <a href="{{route('usuario.index')}}">Usuários</a></a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                @isset($usuario)
                        Editando Usuário: {{$usuario->name}}
                @else
                    Cadastro de nova Usuário
                @endif
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
            @isset($usuario)
               Editando Usuário: {{$usuario->name}}
            @else
               Cadastro de novo Usuário
            @endif
            </h1>
        </div>
    </div>

@isset($usuario)
    <form method="post" action="{{route('usuario.update', $usuario->id)}}">
    @method('put')
@else
    <form method="POST" action="{{ route('usuario.store') }}">
@endisset
@csrf
<div class="card">
    <div class="card-header">
        Informações do Usuário
    </div>
    <div class="card-body">
        <div class="form-row">
            <!-- nome -->
            <div class="form-group col-md-4">
                <label for="name" >{{ __('Nome') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($usuario->name) ? $usuario->name : '' }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- e-mail -->
            <div class="form-group col-md-4">
                <label for="email" >{{ __('Endereço de e-mail') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($usuario->email) ? $usuario->email : '' }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Tipo Usuário -->
            @can('admin-comdica')
                <div class="form-group col-md-4">
                    <label for="tipo_user" class="my-1 mr-2">{{ __('Tipo de Usuario ') }}</label>
                    <select name="tipo_user" class="custom-select my-1 mr-sm-2" id="tipo_user">
                        @foreach ($tipos as $tipo)
                            @if(Auth::user()->tipo_user == 1)
                                <option value="{{$tipo->id}}"
                                    @isset($usuario)
                                        @if($usuario->tipo_user == $tipo->id)
                                            {{'selected'}}
                                        @endif
                                    @endisset
                                >{{$tipo->name}}</option>
                            @else
                                @if($tipo->id != 1)
                                    <option value="{{$tipo->id}}"
                                        @isset($usuario)
                                            @if($usuario->tipo_user == $tipo->id)
                                            {{'selected'}}
                                            @endif
                                        @endisset
                                    >{{$tipo->name}}</option>

                                @endif
                            @endif
                        @endforeach
                    </select>

                    @error('tipo_user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endcan
        </div>

        <div class="form-row">
        <!-- Senha -->
            <div class="form-group col-md-4">
                <label for="password" >{{ __('Senha') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        <!-- Confirmação de Senha -->
            <div class="form-group col-md-4">
                <label for="password-confirm" >{{ __('Confirme a senha') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password2" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-row">
        <!-- Botão -->
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary col-md-12">
                    @isset($usuario)
                        Editar
                    @else
                        Adicionar
                    @endisset
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
