@extends('layouts.app')

@section('content')


<div class="card text-center container shadow-lg">
		  <div class="card-header bg-warning col-md-12">
			<h1 class="text-light"> Esse  código de recibo não consta no sistema podendo ser dado como Inválido</h1>
		  </div>
		  <div class="card-body">
            <img src="/img/cmd-preto.png" style="height:25%; width:30%;">
		  <div class="card-footer bg-warning text-light">
		   O Fundo da criança e do adolescente de Araçoiaba agradece a sua atenção
		  </div>
		</div>
    </div>
    <div class="row col-md-12 container d-flex justify-content-center m-4">
        <a href="/sou_doador" class="btn p-1 m-1 btn-info text-light">Verificar código novamente</a>
        <a href="/contato"  class="btn p-1 m-1 btn-info text-light"> Entre em Contato</a>
    </div>
@endsection
