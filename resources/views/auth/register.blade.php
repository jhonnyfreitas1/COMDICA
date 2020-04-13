@extends('layouts.admin')

    @section('area-principal')
   @if(!empty($mensagem))

   <div class="alert alert-success float-right col-md-3">
            <p class="">{{$mensagem}}</p>
   </div>

   @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
            @isset($usuario)
                <div class="card-header bg-info text-light">{{ __('Edite esse usuário') }}</div>
            @else
                <div class="card-header bg-info text-light">{{ __('Cadastre um novo usuário') }}</div>
            @endisset

                <div class="card-body">
                @isset($usuario)
                    <form method="post" action="{{route('usuario.update', $usuario->id)}}">
                    @method('put')
                @else
                    <form method="POST" action="{{ route('usuario.store') }}">
                @endisset
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="text-dark col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($usuario->name) ? $usuario->name : '' }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="text-dark col-md-4 col-form-label text-md-right">{{ __('Endereço de e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($usuario->email) ? $usuario->email : '' }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_user" class="text-dark col-md-4 col-form-label text-md-right">{{ __('Tipo de Usuario ') }}</label>
                            <div class="col-md-6">
                               <select name="tipo_user" id="tipo_user">
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
                        </div>

                        <div class="form-group row">
                            <label for="password" class="text-dark col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="text-dark col-md-4 col-form-label text-md-right">{{ __('Confirme a senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password2" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                @isset($usuario)
                                    {{ __('Editar') }}
                                @else
                                    {{ __('Cadastrar') }}
                                @endisset

                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="/admin/comdica" class="btn btn-info mt-4 float-right mr-5 mb-4 ">Voltar para área do adminstrador</a>
</div>
@endsection
