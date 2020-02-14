@extends('layouts.admin')

    @section('area-principal')
		<h1>Dados:</h1>
		<ul>
			@if($usuario->id)
				<li>
					<strong>ID: </strong>{{$usuario->id}}
				</li>
			@endif
			@if($usuario->name)
				<li>
					<strong>name: </strong>{{$usuario->name}}
				</li>
			@endif
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