@extends('layouts.app')

@section('content')	



<div class="container border col-md-11 shadow-lg p-3 mb-5 bg-white rounded">	
   @isset($mensagem)
     <div class="alert-success col-md-5 border border-success"> <h4>Mensagem enviada com sucesso</h4></div>
  @endisset
  @isset($erro)
     <div class="alert-danger col-md-5 border border-warning"> <h4>Falha no envio da mensagem</h4></div>
  @endisset
  <dir class="container col-md-4 " >
      <h1  >Contate-nos abaixo</h1>
  </dir>
  <form method="post" action="/contato/save">
    {{ csrf_field() }}
  <div style="margin-left: 10%; margin-right: 10%;margin-top: 5%;margin-bottom: 1%; ">
    <div class="form-row" >
      <div class="form-group col-md-6">
        <label for="inputEmail4">Nome <span>*</span></label>
        <input type="text" name="usuario_nome" class="form-control" id="inputNome" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Email</label>
        <input type="email" name="usuario_email" class="form-control" id="inputEmail" >
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Telefone</label>
        <input type="tel" name="usuario_telefone" class="form-control" id="inputTelefone">
      </div>
      <div class="form-group col-md-6">
        <label for="inputState">Assunto</label>
        <select id="inputState" name="contato_assunto" class="form-control" required>
           <option></option>
          <option value="duvida">Dúvidas</option>
          <option value="sugestao">Sugestões</option>
          <option value="reclamacao">Reclamações</option>
        </select>
      </div>

      <div class="form-group" style="width: 100%;">
      <label for="exampleFormControlTextarea1">Mensagem <span>*</span></label>
      <textarea class="form-control" name='usuario_mensagem' id="exampleFormControlTextarea1" rows="5" required></textarea>
    </div>

    </div>
  </div>
   <button type="submit" class="btn btn-success mb-5" style=" display: block; margin: auto;">Enviar mensagem </button>

  </form>
</div>
<style type="text/css">
  span{
    color: red;
  }

</style>
@endsection