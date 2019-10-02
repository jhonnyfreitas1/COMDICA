<!DOCTYPE html>
<html>
<head>
	<title>Comprovante de doação</title>
</head>

<body>


	<div class="content bg-dark container row-2">

		<h2>Comprovamos que <b> {{$nome}} </b> portador do cpf <b> {{$cpf}} </b> fez pagamento no valor de<b>  R$:{{$valor}} </b> para o Fundo Municipal dos Direitos da Criança e do Adolescente de Araçoiaba - PE CNPJ: 26.615.546/0001-40 com o pagamento feito em <b> {{$data_pagamento}} </b> e data de vencimento em <b>{{$vencimento}}</b></h2>


		
		<hr>
		<img style="display: flex; width: 10%; height: 10%; position: auto; margin-left: 48%; margin-top: -45px;"  src="http://qnimate.com/wp-content/uploads/2014/03/images2.jpg">
		<span style="margin-left: 33%;">Assinatura do presidente do fundeca</span>
		<span style="margin-left: 33%;">FUNDECA - 26.615.546/0001-40</span>




		<div style="" class="div2">
			<label>Para verificar se esse documento é verdadeiro, Acesse:</label>	
			<a href="/?cod={{$codigo}}">Sou doador verificar código {{$codigo}}</a>

			<p>Ou entre na pagina da comdicaaracoiabape.com.br  vá em  > Sou doador > na parte verificar código digite:  <b>{{$codigo}}</b></p>
		</div>

	</div>

</body>
<style type="text/css">
	
	.content{
		align-content: center;
		margin: auto;
		padding: 1em;
		align-items: center;


	}
	hr {	
		margin-top: 35em;
		width: 60%;
	}

	body{

		background-color: #babaca;
		border: 1px solid black;
	}
	h2{
		font-family: inherit;
		letter-spacing: normal;
		color: #050505;
	}
	b{
		text-decoration: underline;
		color: green;
	}	
 .div2{
 	margin-top: 5%;
 }
</style>
</html>
