<h1>Instituições</h1>
<a href="{{route('instituicao.create')}}">Adicionar</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($instituicoes as $instituicao)
    <tr>
      <th scope="row">{{$instituicao->id}}</th>
      <td>
      	<a href="{{route('instituicao.show', $instituicao->id)}}">{{$instituicao->name}}</a>
      </td>
      <td>
      	<a href="{{route('instituicao.edit', $instituicao->id)}}">Editar</a> 
      	<a href="{{route('instituicao.destroy', $instituicao->id)}}">Excluir</a> 
      </td>
    </tr>
    @endforeach
  </tbody>
</table>