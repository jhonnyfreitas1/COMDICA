@extends('layouts.app')

@section('content')

<?php dd($status) ?>

<h1 class="title">Doações realizadas</h1>

<table class="table tabelaStatus">
	<thead class="thead-dark">
		<tr>
			<th>Nome</th>
			<th>Valor total</th>
			<th>Status</th>
			<th>Vencimento</th>
			<th>Confirmação</th>
		</tr>
	</thead>
	<tr>
		<td>{{$status->doador_nome}}</td>
		<td>{{$status->valor_total}}</td>

		@if($status->status == 'waiting')

		<td>Aguardando pagamento</td>

		@else

		<td>Outra coisa</td>

		@endif

		<td>{{$status->vencimento}}</td>

		@if($status->status == 'waiting')

		<td><a href="{{$status->link_boleto}}">Baixar</a></td>

		@else

		<td>Pagamento ainda não confirmado</td>

		@endif

	</tr>
</table>
<style type="text/css">
  body{
    background-image: url('/img/fundeca1.png');
    background-size: 55%;
    background-repeat: no-repeat; 
    background-position: 46% 9%;
  }

</style>
@endsection