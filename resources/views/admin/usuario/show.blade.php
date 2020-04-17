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
                    {{$usuario->name}}
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
                {{$usuario->name}}
            </h1>
        </div>
    </div>

		<ul>
			@if($usuario->email)
				<li>
					<strong>email: </strong>{{$usuario->email}}
				</li>
			@endif
			@if($usuario->tipo_user)
				<li>
					@foreach($tipos as $tipo)
						@if($tipo->id == $usuario->tipo_user)
							<strong>tipo de usuário: </strong>{{$tipo->name}}
						@endif
					@endforeach
				</li>
			@endif
	@endsection
