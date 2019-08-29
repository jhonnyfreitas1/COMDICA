@extends('layouts.app')

@section('content')

<h1 class="title">Boletos gerados</h1>

<table class="table tabelaStatus">
	<thead class="thead-dark">
		<tr>
			<th>Nome</th>
			<th>Valor total</th>
			<th>Status</th>
			<th>Vencimento</th>
			<th>Recibo do pagamento</th>
		</tr>
	</thead>
	<tr>
		<td>{{$status->doador_nome}}</td>
		<td>{{$status->valor_total}}</td>

		@if($status->status != 'waiting')

		<td>Aguardando pagamento</td>

		@else

		<td>Pagamento recebido</td>

		@endif

		<td>{{$status->vencimento}}</td>

		@if($status->status == 'waiting')

		<td><a href="{{$status->link_boleto}}">Baixar</a></td>

		@else

		<td>Pagamento ainda não confirmado</td>

		@endif

	</tr>
</table>
<center>
<div>
	<a href="/" class="btn btn-success btn-doador">Voltar ao início</a>
	<a href="/sou_doador" class="btn btn-success btn-doador">Verificar outro CPF</a>
	<a href="/calculadora" class="btn btn-success btn-doador">Realizar uma doação</a>
</div>
</center>
<style type="text/css">
  body{
    background-image: url('/img/fundeca1.png');
    background-size: 55%;
    background-repeat: no-repeat; 
    background-position: 46% 9%;
  }

</style>
@endsection