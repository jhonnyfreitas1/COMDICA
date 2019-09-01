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

		@if($status->status == 'paid')

		<td>Pagamento confirmado</td>

		@elseif($status->status == 'unpaid')

		<td>Não foi possível confirmar o pagamento</td>

		@elseif($status->status == 'new')

		<td>Aguardando definição da forma de pagamento</td>

		@elseif($status->status == 'refunded')

		<td>Pagamento devolvido</td>

		@elseif($status->status == 'contested')

		<td>Pagamento em processo de contestação</td>

		@elseif($status->status == 'canceled')

		<td>Cobrança cancelada pelo vendedor ou pelo pagador</td>

		@elseif($status->status == 'settled')

		<td>Cobrança foi confirmada manualmente</td>

		@elseif($status->status == 'link')

		<td>Cobrança está associada a um link de pagamento</td>

		@elseif($status->status == 'expired')

		<td>Data de vencimento expirada</td>

		@elseif($status->status == 'waiting')

		<td>Aguardando confirmação do pagamento</td>

		@else

		<td>Indisponível</td>

		@endif

		<td>{{$status->vencimento}}</td>

		@if($status->status == 'paid')

		<td><a href="{{$status->link_boleto}}">Baixar</a></td>

		@else

		<td>Disponível quando o pagamento for confirmado</td>

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