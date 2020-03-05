<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Comdica - Araçoiaba PE</title>
		<link rel="stylesheet" href="{{asset('css/normalize.css')}}">
		<link rel="stylesheet" href="{{asset('css/reset.css')}}">
		<link rel="stylesheet" href="{{asset('css/grid.css')}}">
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/produtos.css')}}">
		<link rel="stylesheet" href="{{asset('css/sobre.css')}}">
		<link rel="stylesheet" href="{{asset('css/responsivo.css')}}">
	</head>
	<body>
		<header class="header">
			<div class="container">
				<a href="{{route('newIndex')}}" class="grid-4">
					<img src="{{asset('img/comdica3.jpg')}}" alt="Comdica">
				</a>
				<nav class="grid-12 header_menu">
					<ul>
						<li><a href="{{route('denuncia')}}">Denunciar</a></li>
						<li><a href="{{route('portifolio')}}">Portfólio</a></li>
						<li><a href="{{route('postagens')}}">Postagens</a></li>
						<li><a href="{{route('sobre')}}">Sobre</a></li>
					</ul>
				</nav>
			</div>
		</header>
			@yield('content')
		<br><br>
		<footer>
			<div class="footer">
				<div class="container">

					<div class="grid-8 footer_historia">
						<h3>Área Restrita</h3>
						<p>Comdica...</p>
					</div>

					<div class="grid-4 footer_contato">
						<h3>Contato</h3>
						<ul>
							<li>- (81) 9999-999</li>
							<li>- cmdcaaracoiabape@gmail.com</li>
							<li>- Araçoiaba, n 10012 - PE</li>
						</ul>
					</div>

					<div class="grid-4 footer_redes">
						<h3>Redes Sociais</h3>
						<ul>
							<li><a href="http://facebook.com" target="_blank"><img src="img/redes-sociais/facebook.sv"></a></li>
							<li><a href="http://instagram.com" target="_blank"><img src="img/redes-sociais/instagram.sv"></a></li>
							<li><a href="http://twitter.com" target="_blank"><img src="img/redes-sociais/twitter.sv"></a></li>
						</ul>
					</div>

				</div>
			</div>

			<div class="copy">
				<div class="container">
					<p class="grid-16">Comdica 2020 - Todos os Direitos Reservados.</p>
				</div>
			</div>
		</footer>

	</body>
</html>
