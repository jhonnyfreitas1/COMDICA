@extends('layouts.app')

@section('content')

<h1 class="title bg-info text-white">Boletos gerados</h1>

<table class="table tabelaStatus ">
	<thead class="thead-dark " >
		<tr >
			<th >Nome</th>
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

	@foreach ($status_boleto as $boleto)
		<?php
		    $valortotal = $boleto->valor_total;
			$valortotal = preg_replace("/^([0-9]+)*?([0-9]{2})$/", "$2", $valortotal);
	    ?>
    	<tr>
			<td>{{$boleto->doador_nome}}</td>
			<td>R$ {{$valortotal}}</td>
			@if($boleto->status == 'CONFIRMED')

			<td>Pagamento confirmado</td>

			@elseif($boleto->status == 'FAILED')

			<td>Pagamento não realizado</td>

			@elseif($boleto->status == 'AUTHORIZED')

			<td>Aguardando pagamento</td>

			@elseif($boleto->status == 'DECLINED')

			<td>Pagamento rejeitado pela análise de risco.</td>

			@elseif($boleto->status == 'NOT_AUTHORIZED')

			<td>Pagamento não autorizado pela instituição responsável pelo cartão de crédito</td>

			@elseif($boleto->status == 'canceled')

			<td>Cobrança cancelada pelo vendedor ou pelo pagador</td>

			@elseif($boleto->status == 'settled')

			<td>Cobrança foi confirmada manualmente</td>

			@elseif($boleto->status == 'link')

			<td>Cobrança está associada a um link de pagamento</td>

			@elseif($boleto->status == 'expired')

			<td>Data de vencimento expirada</td>

			@elseif($boleto->status == 'AUTHORIZED')

			<td>Aguardando confirmação do pagamento</td>

			@else

			<td>Indisponível</td>

			@endif

			<td>{{$boleto->vencimento}}</td>

			@if($boleto->status == 'CONFIRMED')

			<td><a href="/pdf/pagador/{{encrypt($boleto->code)}}">Baixar</a></td>

			@else

			<td>Disponível quando o pagamento for confirmado</td>

			@endif
		</tr>
	@endforeach



</table>
	
	<h1 class="title bg-success text-white mt-5">Carnês gerados</h1>

<table class="table  tabelaStatus">
	<thead class=" bg-info thead-dark">
		<tr>
			<th>Nome do doador</th>
			<th>Valor total</th>
            <th>numero de parcelas</th>
			<th>Parcelas pagas</th>
			<th>Status</th>
			<th>Recibo do pagamento</th>

		</tr>
	</thead>

	@foreach ($status_carne as $boleto)
	
    	<tr>
			<td>{{$boleto->doador_nome}}</td>
			<td>R$ {{$boleto->valor_total}}</td>
           
            <td>{{$boleto->numero_parcelas}}</td>
            <td>{{$boleto->parcelas_pagas}} </td>

			@if($boleto->status == 'CONFIRMED')

			<td>Pagamento confirmado</td>

			@elseif($boleto->status == 'AUTHORIZED')

			<td>Aguardando confirmação do pagamento</td>

			@else

			<td>{{$boleto->status}}</td>

			@endif

			@if($boleto->status == 'CONFIRMED')

			<td><a href="/pdf/pagador/carne/{{encrypt($boleto->carne_id)}}">Baixar</a></td>

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
<style type="text/css" src="/css/app.css"></style>
<style type="text/css">
  body{
    background-image: url('/img/fundeca1.png');
    background-size: 55%;
    background-repeat: no-repeat;
    background-position: 46% 9%;
  }

</style>
@endsection
