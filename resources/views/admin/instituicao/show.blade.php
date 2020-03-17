@extends('layouts.admin')

    @section('area-principal')
		<h1>Dados:</h1>
		<ul>
			@if($instituicao[0]->id)
				<li>
					<strong>ID: </strong>{{$instituicao[0]->id}}
				</li>
			@endif
			@if($instituicao[0]->name)
				<li>
					<strong>name: </strong>{{$instituicao[0]->name}}
				</li>
			@endif
			@if($instituicao[0]->desc)
				<li>
					<strong>desc: </strong>{{$instituicao[0]->desc}}
				</li>
			@endif
			@if($instituicao[0]->telefone)
				<li>
					<strong>telefone: </strong>{{$instituicao[0]->telefone}}
				</li>
			@endif
			@if($instituicao[0]->endereco)
				<li>
					<strong>endereco: </strong>{{$instituicao[0]->endereco}}
				</li>
			@endif
			@if($instituicao[0]->email)
				<li>
					<strong>email: </strong>{{$instituicao[0]->email}}
				</li>
			@endif
			@if($instituicao[0]->site)
				<li>
					<strong>site: </strong>{{$instituicao[0]->site}}
				</li>
			@endif
			@if($instituicao[0]->imagem_princ)
				<li>
					<strong>imagem_princ: </strong>{{$instituicao[0]->imagem_princ}}
				</li>
			@endif
			@if($instituicao[0]->imagem_sec)
				<li>
					<strong>imagem_sec: </strong>{{$instituicao[0]->imagem_sec}}
				</li>
			@endif
			@if($instituicao[0]->imagem_ter)
				<li>
					<strong>imagem_ter: </strong>{{$instituicao[0]->imagem_ter}}
				</li>
			@endif
		</ul>
		<a href="{{route('instituicao.index')}}">Voltar</a>
	@endsection