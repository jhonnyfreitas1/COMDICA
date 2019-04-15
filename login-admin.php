<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>COMDICA - Conselho municipal dos direitos da criança e do adolescente.</title>
  </head>		
	<title>Login</title>
</head>
<?php include 'nav.php'; ?>
<body style="">
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
          	<?php if ($_GET['error'] == 'erro_dados') {
          		?>	
          		<div class="alert alert-danger" role="alert">
  				Dados incorretos!
				</div><?php }?>
            <h4>Faça login na área do administrador</h4>
            <form class="form-signin" method="post" action="/controller/auth-login.php">
              E-Mail
              <div class="form-label-group">
              	 <label for="inputPassword"></label>
                <input name="user_email" type="email" id="inputEmail" class="form-control" placeholder="Ex: Leonardo@leo.com" required autofocus>		<!-- comdica@admin-->
            
              </div>
		 <label for="inputPassword"></label><!-- adminadmin-->
              <div class="form-label-group">
              	Senha
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    
              </div>

              <div class="custom-control custom-checkbox mb-3">
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
              <hr class="my-4">
              <div align="center">
                <a href="#">Esqueci minha Senha </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</body>
<?php include 'footer.php' ?>
</html>