@extends('layouts.admin')

	@section('area-principal')
	<div class="container col-md-12 row m-4">
		@foreach($mensagens  as $mensagem)
			
				<div class="card border-success col-md-3 col-sm-6 col-12 mb-3 m-1" style="">
					  <a href="/admin/contato/{{$mensagem->id}}">
					  <div class="card-header text-dark @if($mensagem->visto==false) bg-danger @else bg-secondary @endif">{{str_limit($mensagem->usuario_nome, 20)}} <span class="float-right text-warning">{{$mensagem->created_at}}</span></div>
					  <div class="card-body text-dark ">
					    <h6 class="card-title @if($mensagem->visto==false) font-weight-bold @endif ">Categoria: {{$mensagem->contato_assunto}}</h6>
					    <p class="card-text  @if($mensagem->visto==false) font-weight-bold @endif">{{str_limit($mensagem->usuario_mensagem , 20)}}</p>
					  </div>
					</a>
				</div>	
		@endforeach
		</div>
		{{$mensagens->links()}}
	@endsection

