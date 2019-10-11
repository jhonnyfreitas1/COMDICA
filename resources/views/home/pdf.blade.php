<!DOCTYPE html>
<html>
<head>
	<title>Comprovante de doação</title>
</head>

<body>
<img style=" width: 45%; margin-left: 30%;"  src="https://comdicaaracoiabape.com.br/img/fundeca-mini.png">
    <h1 style="margin-top:-1em;">RECIBO </h1>
	<div class="content bg-dark container row-2">
        <h2> Declaro para os devidos fins de comprovação que o Fundo Municipal dos Direitos da Criança e do Adolescente – FUNDECA. Fundo Público instituído pela Lei Municipal nº 0305/2014. Com sede na cidade de Araçoiaba-PE.
         Inscrito no CNPJ/MF sob o nº 26.615.546/0001 – 40. Recebeu do(a) Sr(a) {{$nome}}, inscrito no Cadastro Pessoa Física sob o número:{{$cpf}}. A importância de R$ {{$valor}}
         referente ao ano calendário de {{date('Y')}} Esta é uma modalidade de doação onde à sociedade decide se deixa para a Receita Federal ou destina para investimento em seu Município. PORTANTO EM NOME DO MUNICÍPIO DE ARAÇOIABA – PE, AGRADECEMOS A SUA ATITUDE!
            Os recursos do FUNDECA são utilizados para a implementação da política de promoção, defesa e proteção dos direitos da criança e adolescente em conformidade com as diretrizes formalmente deliberadas pelo Conselho Municipal de Defesa de Direitos da Criança e do Adolescente - COMDICA
         </h2>
		<img style="display: flex; width: 10%; height: 10%;  margin-left: 48%; margin-top:-1px;"  src="http://qnimate.com/wp-content/uploads/2014/03/images2.jpg">
		<span style="margin-left: 33%;">Assinatura do presidente do fundeca</span>
		<span style="margin-left: 33%;">FUNDECA - 26.615.546/0001-40</span>


		<div style="margin-top:1em;" class="div2">
			<label>Para verificar se esse documento é verdadeiro, Acesse:</label>
			<a href="https://comdicaaracoiabape.com.br/public/sou_doador/verificar/pagamento?cod={{$codigo}}">Sou doador verificar código {{$codigo}}</a>
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

		width: 60%;
	}

	body{

		background-color: white;
		border: 1px solid black;
	}
	h2{
		font-family: inherit;
		color: #050505;
        text-align:center;
        margin-top:-1em;
	}
	b{
		text-decoration: underline;
		color: green;
	}
    h1{
        text-align:center;
    }
 .div2{

 }
</style>
</html>
