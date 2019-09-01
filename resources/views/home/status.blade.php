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
	<?php
		function data($data){
			return date("d/m/Y", strtotime($data));
		}
	?>
	
	@foreach ($status as $boleto)
		<?php 
		    $valortotal = $boleto->valor_total;
			$valortotal = preg_replace("/^([0-9]+)*?([0-9]{2})$/", "$1,$2", $valortotal);
	    ?>
    	<tr>
			<td>{{$boleto->doador_nome}}</td>
			<td>R$ {{$valortotal}}</td>

			@if($boleto->status == 'paid')

			<td>Pagamento confirmado</td>

			@elseif($boleto->status == 'unpaid')

			<td>Não foi possível confirmar o pagamento</td>

			@elseif($boleto->status == 'new')

			<td>Aguardando definição da forma de pagamento</td>

			@elseif($boleto->status == 'refunded')

			<td>Pagamento devolvido</td>

			@elseif($boleto->status == 'contested')

			<td>Pagamento em processo de contestação</td>

			@elseif($boleto->status == 'canceled')

			<td>Cobrança cancelada pelo vendedor ou pelo pagador</td>

			@elseif($boleto->status == 'settled')

			<td>Cobrança foi confirmada manualmente</td>

			@elseif($boleto->status == 'link')

			<td>Cobrança está associada a um link de pagamento</td>

			@elseif($boleto->status == 'expired')

			<td>Data de vencimento expirada</td>

			@elseif($boleto->status == 'waiting')

			<td>Aguardando confirmação do pagamento</td>

			@else

			<td>Indisponível</td>

			@endif

			<td><?php echo(data($boleto->vencimento)); ?></td>

			@if($boleto->status == 'paid')

			<td><a href="{{$boleto->link_boleto}}">Baixar</a></td>

			@else

			<td>Disponível quando o pagamento for confirmado</td>

			@endif
		</tr>
	@endforeach

	

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