@extends('layouts.app')

@section('content')


@if($status_boleto)
<div class="shadow-lg hover hover col-md-8 container bg-light">
	<h1 class="bg-info text-white col-6 text-justify">Boletos gerados</h1>
	
	@foreach ($status_boleto as $boleto)
	<?php
	$valortotal = $boleto->valor_total;
	$valortotal = preg_replace("/^([0-9]+)*?([0-9]{2})$/", "$2", $valortotal);
	?>

	<ul class="list-group" >
		<li class="list-group-item list-group-item-primary border-bottom"> 
			<i class="fas fa-barcode fa-2x"></i>
			<p class="text-muted fixed-right">Código de barras: {{$boleto->cod_barra}} </p> 
			<b class="text-dark ">Nome do doador:</b>{{$boleto->doador_nome}}
			<p><b class="text-dark">Valor total R$: </b><b>{{$valortotal}}</b></p>
			<p><b class="bg-secundary text-dark">Link para o  boleto: </b><b><a target="_blank" href="{{$boleto->link}}">Acesse o boleto</a></p>

			@if($boleto->status == 'CONFIRMED')
			<p>
				<b class="bg-secundary text-dark col-md-12 col-12">Status / </b>Pagamento confirmado
				@elseif($boleto->status == 'FAILED')

				<b class="bg-secundary text-dark">Status / </b>Pagamento não realizado

				@elseif($boleto->status == 'AUTHORIZED')

				<b class="bg-secundary text-dark">Status / </b>Aguardando pagamento

				@elseif($boleto->status == 'DECLINED')

				<b class="bg-secundary text-dark">Status / </b>Pagamento rejeitado pela análise de risco.

				@elseif($boleto->status == 'NOT_AUTHORIZED')

				<b class="bg-secundary text-dark">Status / </b>Pagamento não autorizado pela instituição responsável pelo cartão de crédito

				@elseif($boleto->status == 'canceled')

				<b class="bg-secundary text-dark">Status / </b>Cobrança cancelada pelo vendedor ou pelo pagador

				@elseif($boleto->status == 'settled')	

				<b class="bg-secundary text-dark">Status / </b>Pagamento confirmado como pago manualmente

				@elseif($boleto->status == 'link')

				<b class="bg-secundary text-dark">Status / </b>Cobrança está associada a um link de pagamento

				@elseif($boleto->status == 'expired')

				<b class="bg-secundary text-dark">Status / </b>Data de vencimento expirada
				
				@else
				<td>Indisponível</td>
				@endif
			</p>

			<p><b class="bg-secundary text-dark">Data de vencimento / </b>{{$boleto->vencimento}}
			</p>

			<b>		
				<span class="text-dark">Recibo:</span>
				@if($boleto->status == 'CONFIRMED')
				<a href="/pdf/pagador/{{encrypt($boleto->code)}}">Baixar</a>
				@else
				Disponível quando o pagamento for confirmado
				@endif
			</b>
		</li>		 
		<hr>
	@endforeach
	 {!! $status_boleto-> Links()!!} 
	@endif
</ul>
</div>
@if($status_carne)
<div class="shadow-lg hover hover col-md-8 container bg-white mt-3 ">
	<h1 class=" text-white col-6 text-justify bg-success">Carnês gerados</h1>

	@foreach ($status_carne as $boleto)
	<?php
	$valortotal = $boleto->valor_total;
	$valortotal = preg_replace("/^([0-9]+)*?([0-9]{2})$/", "$2", $valortotal);
	?>	

	<ul class="list-group" >
		<li class="list-group-item list-group-item-success">
			<p class="text-muted fixed-right">Número do Carnê (Não é o código de barra): {{$boleto->carne_id}}</p> 
			<b class="text-dark ">Nome do doador: </b>{{$boleto->doador_nome}}
			<p><b class="text-dark">Valor total R$: </b><b>{{$valortotal}}</b></p>
			<p><b class="text-dark">Numero de parcelas: </b><b>{{$boleto->numero_parcelas}}</b></p>
			<p><b class="bg-secundary text-dark">Link para o carnê: </b><b><a target="_blank" h href="{{$boleto->link_carne}}">Acesse o carnê</a></p>

			<p><b class="bg-secundary text-dark">Parcelas pagas: </b><b>{{$boleto->parcelas_pagas}}</p>

				@if($boleto->status == 'CONFIRMED')
				<p>
					<b class="bg-secundary text-dark ">Status / </b>Pagamento de todas as parcelas confirmado
					@else
					<b class="bg-secundary text-dark ">Status / </b>Aguardando o pagamento de todas as parcelas
					@endif

				</p>
				<span class="text-dark">Recibo:</span>
				@if($boleto->status == 'CONFIRMED')
				<a href="/pdf/pagador/carne/{{encrypt($boleto->carne_id)}}">Baixar</a>
				@else
				Disponível quando o pagamento for confirmado
				@endif
				
			</b>
		</li>		 
			<hr>

		@endforeach

		<p>{!! $status_carne -> Links()!!} </p>
	</div>
	@endif
	<center>
		<div class="m-5">
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
			margin:0;
		}
	</style>
	@endsection
