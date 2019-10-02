@extends('layouts.app')

@section('content')		
<h5 class="m-2 col-11 rounded col-md-3 bg-success text-light">Aqui você pode obter os dados referentes aos boletos gerados para o pagamento, por exemplo o status do boleto.</h5>

<div class=" row-2 ">
<form class="mt-4 mb-4 col-10" action="/status" method="POST">
<div class="col-12 col-md-5 bg-info rounded" style=" margin-left: 10%; margin-right: 10%;margin-top: 10%;margin-bottom: 20%;">
  <h4 class="text-light font-weight-bold p-1" style=" margin-left: 5%;">Verificar boletos gerados através do cpf do doador.</h4>
  <div class="form-row p-4">
    <div class="form-group col-md-12">
      <label for="" class="text-light">Digite seu cpf</label>
      <input type="hidden" id='token' name="_token" value="{{ csrf_token() }}">
      <input type="text" class="form-control col-12" placeholder="000.000.000-00" name="cpf" maxlength="11" oninput="bloq()">
    </div>
    <input type="submit" value="Verificar" class="btn btn-success btn-sou" id="submit">
</form>
  </div>
  <hr style="border: 1px solid black;">
   <form class="col-12 col-md-12 " action="sou_doador/verificar/pagamento/" method="get">
    <div class="col-12 col-md-12 bg-info rounded" style="margin-right: 10%;margin-top: 10%;margin-bottom: 20%;">
     <h4 class="text-light font-weight-bold">Verificar se determinado recibo é valido.</h4>
      <div class="form-row ">
        <div class="form-group col-md-12">
          <label for="" class="text-light">Digite o código de verificação do recibo</label>
          <input type="text" class="form-control col-12" placeholder="000000" name="cod" title="Código pode ser encontrado na parte inferior do recibo" >
        </div>
        <input type="submit" value="Verificar" class="btn btn-success btn-sou mb-2" id="submit">
     </div> 

   </form>

</div>
</div>

</div>
<style type="text/css">



  body{
    background-image: url('/img/fundeca1.png');
    background-size: 55%;
    background-repeat: no-repeat; 
    background-position: 46% 9%;
  }

</style>
@endsection
<script>
  
</script>