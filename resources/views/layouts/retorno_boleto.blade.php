
	<div class="card text-center">
		  <div class="card-header bg-info">
			<h1> Olá {{$nome}} !</h1>
		  </div>
		  <div class="card-body">
		    <h5 class="card-title">Como voce gerou um boleto/carnê para doação só lhe resta pagar o mesmo com os seguintes dados.</h5>
		    <i class="fas fa-hand-holding-usd fa-3x text-info"></i>
		    <p class="card-text"><b>Código de barras: (1̣º boleto/parcela)</b> {{$cod}} <a href="https://comdica.site/sou_doador/">Veja aqui as intruções</a></p>

		    <a href="{{$link_boleto}}#body" target="_blank" class="btn btn-primary">Veja seu boleto ou carnê  aqui </a>
		    <h5 class="card-title">Foi enviado um e-mail com o mesmo boleto/carnê para o endereço de E-mail: <label class="text-muted">{{$email}}</label></h5>
		  </div>
		  <div class="card-footer bg-info text-muted">
		   O Fundo da criança e do adolescente de Araçoiaba agradece a sua atenção</br>
		   se desconhece esses dados contate-nos.
		  </div>
		</div>
