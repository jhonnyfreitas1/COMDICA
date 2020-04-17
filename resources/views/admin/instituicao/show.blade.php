@extends('layouts.admin')

    @section('area-principal')
    <br>
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('admin.comdica')}}">Home</a>
            </li>
            <li class="breadcrumb-item" >
                <a href="{{route('instituicao.index')}}">Instituições</a></a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                    {{$instituicao[0]->name}}
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-1">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
                {{$instituicao[0]->name}}
            </h1>
        </div>
    </div>

		<ul>
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

		</ul>
		<!-- <a href="{{route('instituicao.index')}}">Voltar</a> -->
	@endsection
