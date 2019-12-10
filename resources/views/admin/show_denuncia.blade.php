@extends('layouts.admin')

	@section('js')
	@endsection
	@section('area-principal')
  <style>
    ul{
      list-style-type: none;
    }
    li{
      margin-left: 1em;
      margin-top: 0,5em;
    }
    .content{
      width: 50em;
      margin: 0 auto;
    }
    .hash{
      text-align: center;
      font-family:courier;
      font-weight: bold;    
      margin: 1em;
    }
    .titulo{
      background-color: #BDEBCE;
      font-family:courier;
      width: 100%;
      text-align: center;
    }
    .lista{
      /*background-color: #BDEBCE;*/
      margin: 0 auto;
      width: 100%;
      font-family:helvetica;
      /*border: 1px solid black;*/
    }
  </style>
  <div class="content">
    <h2 class="hash">Hash da denúncia - {{$denuncia[0]->hashDenun}}</h2>
    <ul class="list-group">
      <div class="section">
        <div class="titulo">
          <h4>Dados Gerais</h4>
        </div>
        <div class="lista">
          <li class="list-group-item {{ ($denuncia[0]->name)? '' : 'list-group-item-danger' }}"><strong>Nome</strong> - {{ ($denuncia[0]->name)?: 'Não preencheu' }}</li>
          <li class="list-group-item {{ ($denuncia[0]->gender)? '' : 'list-group-item-danger' }}"><strong>Sexo</strong> - {{ ($denuncia[0]->gender)?: 'Não preencheu' }}</li>
          <li class="list-group-item {{ ($denuncia[0]->ethnicity)? '' : 'list-group-item-danger' }}"><strong>Etnia</strong> - {{ ($denuncia[0]->ethnicity)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->pregnant)? '' : 'list-group-item-danger' }}"><strong>Gestante?</strong> - {{ ($denuncia[0]->pregnant)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->responsible)? '' : 'list-group-item-danger' }}"><strong>Nome do Responsavel</strong> - {{ ($denuncia[0]->responsible)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->locality)? '' : 'list-group-item-danger' }}"><strong>Localidade</strong> - {{ ($denuncia[0]->locality)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->street)? '' : 'list-group-item-danger' }}"><strong>Logradouro</strong> - {{ ($denuncia[0]->street)?: 'Não preencheu' }}</li>
          <li class="list-group-item {{ ($denuncia[0]->complement)? '' : 'list-group-item-danger' }}"><strong>Complemento</strong> - {{ ($denuncia[0]->complement)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->residence)? '' : 'list-group-item-danger' }}"><strong>Número da residência</strong> - {{ ($denuncia[0]->residence)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->number)? '' : 'list-group-item-danger' }}"><strong>Telefone</strong> - {{ ($denuncia[0]->number)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->deficient)? '' : 'list-group-item-danger' }}"><strong>Deficiente?</strong> - {{($denuncia[0]->deficient)?: 'Não preencheu'}}</li>
        </div>
        <hr>
      </div>
      <div class="section">
        <div class="titulo">
          <h4>Dados Orrência</h4>
        </div>
        <div class="lista">
          <li class="list-group-item {{ ($denuncia[0]->occurrence)? '' : 'list-group-item-danger' }}"><strong>Local da ocorrência</strong> - {{($denuncia[0]->occurrence)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->otherOcurrence)? '' : 'list-group-item-danger' }}"><strong>Ocorreu outras vezes?</strong> - {{($denuncia[0]->otherOcurrence)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->autoProvocated)? '' : 'list-group-item-danger' }}"><strong>A lesão foi autoprovocada?</strong> - {{($denuncia[0]->autoProvocated)?: 'Não preencheu'}}</li>
        </div>
        <hr>
      </div>
      <div class="section">
        <div class="titulo">
          <h4>Tipologia da violência</h4>
        </div>
        <div class="lista">
          <li class="list-group-item {{ ($denuncia[0]->violence)? '' : 'list-group-item-danger' }}"><strong>Tipo de violência</strong> - {{($denuncia[0]->violence)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->agression)? '' : 'list-group-item-danger' }}"><strong>Meio de agressão</strong> - {{($denuncia[0]->agression)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->consOcurrence)? '' : 'list-group-item-danger' }}"><strong>Consequência da ocorrência</strong> - {{($denuncia[0]->consOcurrence)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->violenceType)? '' : 'list-group-item-danger' }}"><strong>Tipo de violencia sexual</strong> - {{($denuncia[0]->violenceType)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->penetration)? '' : 'list-group-item-danger' }}"><strong>Ocorreu penetração?</strong> - {{($denuncia[0]->penetration)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->penetrationType)? '' : 'list-group-item-danger' }}"><strong>Tipo de penetração</strong> - {{($denuncia[0]->penetrationType)?: 'Não preencheu'}}</li>
        </div>
        <hr>
      </div>
      <div class="section">
        <div class="titulo">
          <h4>Dados da Lesão</h4>
        </div>
        <div class="lista">
          <li class="list-group-item {{ ($denuncia[0]->nature)? '' : 'list-group-item-danger' }}"><strong>Natureza da lesão</strong> - {{($denuncia[0]->nature)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->bodyPart)? '' : 'list-group-item-danger' }}"><strong>Parte do corpo atingida</strong> - {{($denuncia[0]->bodyPart)?: 'Não preencheu'}}</li>
        </div>
        <hr>
      </div>
      <div class="section">
        <div class="titulo">
          <h4>Dados do Agressor</h4>
        </div>
        <div class="lista">
          <li class="list-group-item {{ ($denuncia[0]->agressorNumber)? '' : 'list-group-item-danger' }}"><strong>Número de envolvidos</strong> - {{($denuncia[0]->agressorNumber)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->agressorGender)? '' : 'list-group-item-danger' }}"><strong>Vínculo social</strong> - {{($denuncia[0]->agressorGender)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->parent)? '' : 'list-group-item-danger' }}"><strong>Sexo provavel do agressor</strong> - {{($denuncia[0]->parent)?: 'Não preencheu'}}</li>
          <li class="list-group-item {{ ($denuncia[0]->alcool)? '' : 'list-group-item-danger' }}"><strong>Provável uso de Álcool</strong> - {{($denuncia[0]->alcool)?: 'Não preencheu'}}</li>
        </div>
      </div>
      <hr>
    </ul>
  </div>
	@endsection