@extends('layouts.app')


@section('content')
	<h4><li class="text-dark title ">Aceito e estou ciente das seguintes normas</li></h4>
<ol>
	<li><b>Para o recebimento do recibo.</b>
		<ol>
			<li  class="list-group-item">Estou ciente de que devo pagar o boleto ou carnê gerado na calculadora no site da comdica araçoiaba PE.</li> 
			<li  class="list-group-item">Estou ciente de que devo acessar área do <b>Sou doador</b> no site da comdica araçoiaba PE para poder baixar o meu recibo após pagamento.</li>  
			<li  class="list-group-item">Estou ciente de que para comprovar minhas doações atravez de carnê terei que comprovar cada recibo de cada parcela do carnê, podendo comprovar só uma ou todas parcelas <b>pagas.</b></li>  
		</ol>  
	</li>
	<li><b>Dos meus documentos e dados.</b>
		<ol>
			<li  class="list-group-item">Aceito que meus dados como nome completo, e-mail e cpf sejam guardados afim de comprovar no recibo o pagamento do boleto ou carnê.</li>  	
		</ol>  
	</li>
	<li><b>Dos valores da calculadora do IR.</b>
		<ol>
			<li  class="list-group-item">Estou ciente de que os valores apresentados na calculadora podem ser aproximados.</li> 
			<li  class="list-group-item">Estou ciente de que não haverá ressarcimento da diferença quando os valores da calculadora não forem exatos com os da declaração do imposto de renda.</li>  
			<li  class="list-group-item">Estou ciente de que o não pagamento do boleto <b>não</b> acarretara na minha inadimplência, por se tratar de uma doação.</li> 
			 <li  class="list-group-item">Estou ciente de que devo preencher corretamente os campos de nome e cpf antes de gerar um boleto ou um carnê.</li>
		</ol>  	
	</li>
</ol>

<style type="text/css">
		.head{

			font-weight: bold;

		}
</style>
@endsection