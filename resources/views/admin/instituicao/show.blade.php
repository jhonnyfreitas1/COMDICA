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
	@if($instituicao[0]->visao)
		<li>
			<strong>visao: </strong>{{$instituicao[0]->visao}}
		</li>
	@endif
	@if($instituicao[0]->valor)
		<li>
			<strong>valor: </strong>{{$instituicao[0]->valor}}
		</li>
	@endif
	@if($instituicao[0]->missao)
		<li>
			<strong>missao: </strong>{{$instituicao[0]->missao}}
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
	@if($instituicao[0]->imagem_qua)
		<li>
			<strong>imagem_qua: </strong>{{$instituicao[0]->imagem_qua}}
		</li>
	@endif
</ul>
<a href="{{route('instituicao.index')}}">Voltar</a>