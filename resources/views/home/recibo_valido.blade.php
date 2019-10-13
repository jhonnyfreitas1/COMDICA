@extends('layouts.app')

@section('content')


<div class="card text-center col-md-8 shadow-lg container">
		  <div class="card-header bg-success">
			<h1 class="text-light">Recibo  valido <i class="fas fa-check-circle"></i></h1>
		  </div>

          <div class="card-body row col-md-12 container d-flex justify-content-center"  style="align-items:center; text-align:center;">
          <img src="/img/p3.png" style="width:20vh ; height:50vh;">
          <div class="row-2 ">
            <h5 class="card-title">Recibo gerado em {{$recibo->created_at}} </h5>
		          <i class="fas fa-hand-holding-usd fa-3x text-info"></i>
              <p class="card-text"><b>Nome do doador: {{$boleto->doador_nome}}</b></p>
                 <p class="card-text"><b>Código de barra do boleto(confimar com o código do recibo): <br>{{$boleto->cod_barra}}</b></p>
            <p class="card-text"><b>Status do boleto: {{$boleto->status}}</b></p>
            @if($boleto->metodo_pagamento == 'boleto')
            <p class="card-text"><b>Valor em questão: R${{$boleto->valor_total}}</b></p>
            @endif
            @if($boleto->metodo_pagamento == 'carne')
            <p class="card-text"><b>Valor em questão: R${{$boleto->valor_parcelado}}</b></p>
            @endif
              </div>
              <img src="/img/p4.png" style="width:20vh ; height:50vh;" >
          </div>
          @if($boleto->metodo_pagamento == 'carne')
            <p class="card-text"><b>Pagamento referente a carne(parcelado) há outras parcelas possiveis de compor um valor total de R$: {{$boleto->valor_total}}</b></p>
            @endif


		  <div class="card-footer bg-info text-light">
		   O Fundo da criança e do adolescente de Araçoiaba agradece a sua atenção.
		  </div>
		</div>
        <div class="row col-md-12 container d-flex justify-content-center m-4">
        <a href="/sou_doador" class="btn p-1 m-1 btn-info text-light">Verificar código novamente</a>
        <a href="/contato"  class="btn p-1 m-1 btn-info text-light"> Entre em Contato</a>
        <a class="btn btn-outline-info  p-1 m-1" href="/calculadora/termos_e_regras">Veja nossas regras e tire algumas dúvidas</a>
    </div>
@endsection
