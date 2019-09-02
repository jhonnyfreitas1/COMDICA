@extends('layouts.admin')


		@section('area-principal')

		<div class="container mt-5">
			<table class="table table-dark">
			  <thead>
			    <tr>
			      <th scope="col">Contato Nº {{$model->id}}</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">Nome</th>
			      <td class="bg-light text-dark">{{$model->usuario_nome}}</td>
			    </tr>
			    <tr>
			    	<th scope="row">E-mail</th>
			 		 <td class="bg-light text-dark">@if($model->usuario_telefone) {{$model->usuario_email}} @else não colocou @endif</td>
			    </tr>
			    <tr>
			      <th scope="row">Telefone</th>
			      <td class="bg-light text-dark">@if($model->usuario_telefone != ''){{$model->usuario_telefone}} @else não colocou @endif</td>
			    </tr>
			    <tr>
			    	<th>Mensagem</th>
			    		<td class="bg-light text-dark">{{$model->usuario_mensagem}}</td>
			    </tr>

			  </tbody>
			</table>	
				<a href="/admin/contato" class="bg-primary text-light p-2 rounded float-right">Voltar a pagina anterior</a>
		</div>
		@endsection