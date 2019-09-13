@extends('layouts.app')

@section('content')		
<h5 class="m-2 col-11 rounded col-md-3 bg-success text-light">Aqui você pode obter os dados referentes aos boletos gerados para o pagamento, por exemplo o status do boleto.</h5>
<form class="mt-4 mb-4 col-10" action="/status" method="POST">
<div class="col-12 col-md-5 bg-info rounded" style=" margin-left: 10%; margin-right: 10%;margin-top: 10%;margin-bottom: 20%;">
  <div class="form-row p-4">
    <div class="form-group col-md-12">
      <label for="" class="text-light">Digite seu cpf</label>
      <input type="hidden" id='token' name="_token" value="{{ csrf_token() }}">
      <input type="text" class="form-control col-12" name="cpf" maxlength="11">
    </div>
    <input type="submit" value="Verificar" class="btn btn-success btn-sou">
</form>

<style type="text/css">
  body{
    background-image: url('/img/fundeca1.png');
    background-size: 55%;
    background-repeat: no-repeat; 
    background-position: 46% 9%;
  }

</style>
@endsection