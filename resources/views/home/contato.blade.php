@extends('layouts.app')

@section('content')		
<form>
<div style="margin-left: 10%; margin-right: 10%;margin-top: 5%;margin-bottom: 1%;">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" id="inputNome">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" class="form-control" id="inputEmail" >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Telefone</label>
      <input type="tel" class="form-control" id="inputTelefone">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Assunto</label>
      <select id="inputState" class="form-control">
        <option selected>Escolha</option>
        <option>Dúvidas</option>
        <option>Sugestões</option>
        <option>Reclamações</option>
      </select>
    </div>

    <div class="form-group" style="width: 100%;">
    <label for="exampleFormControlTextarea1">Mensagem</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>

  </div>
</div>
 <button type="submit" class="btn btn-success" style="width: 10%; display: block; margin: auto;">Enviar mensagem</button>

</form>
@endsection