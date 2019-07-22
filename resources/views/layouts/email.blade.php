<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
	<body>
		<div class="card text-center">
		  <div class="card-header"> 
		  <img src="https://comdica.site/img/comdica3.png" style="width:10em;">
			<h1> Ola doador bla bla </h1>
		  </div>
		  <div class="card-body">
		  @yield('conteudo')
		    <h5 class="card-title">Como voce finalizou o pagamento das parcelas segue o seu comprovante de doacao</h5>
		    <p class="card-text"> Baixe e mantenha-o com voce, verifique o codigo de comprovacao de que esse comprovante eh valido em <a href="https://comdica.site/sou_doador/"> Veja aqui</a></p>
		    <a href="#" class="btn btn-primary">PDF AKI</a>
		  </div>
		  <div class="card-footer text-muted">
		   A comdica aracoiaba pe agradece a sua atencao</br>
		   se desconhece esse comprovante contate-nos.
		  </div>
		</div>
	</body>
</html>