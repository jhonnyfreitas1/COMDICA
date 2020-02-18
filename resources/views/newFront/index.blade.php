<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Comdica - Araçoiaba PE</title>
		<link rel="stylesheet" href="{{asset('css/normalize.css')}}">
		<link rel="stylesheet" href="{{asset('css/reset.css')}}">
		<link rel="stylesheet" href="{{asset('css/grid.css')}}">
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/responsivo.css')}}">
	</head>
	<body>

		<header class="header">
			<div class="container">
				<a href="index.html" class="grid-4">
					<img src="{{asset('img/comdica3.jpg')}}" alt="Comdica">
				</a>
				<nav class="grid-12 header_menu">
					<ul>
						<li><a href="">Sobre</a></li>
						<li><a href="">Denunciar</a></li>
						<li><a href="">Portfólio</a></li>
						<li><a href="">Contato</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<section class="introducao">
			<div class="container">
				<h1>COMDICA Araçoiaba - PE</h1>
				<blockquote class="quote-externo">
					<p>“A criança é alegria como raio de sol
                        e estímulo como a esperança.”</p>
					<div class="font">COELHO NETO</div>
				</blockquote>
			</div>
		</section>
		
		<section class="produtos container">
			<h2 class="subtitulo">Ideias</h2>
			<ul class="produtos_lista">

				<li class="grid-1-3">
					<div class="produtos_icone">
						<img src="{{asset('img/database.png')}} "alt="">
					</div>
					<h3>Denúncias</h3>
					<p>O Comdica tem um sistema único de denúncias para todas as idades. :).</p>
				</li>

				<li class="grid-1-3">
					<div class="produtos_icone">
						<img src="{{asset('img/database.png')}}" alt="">
					</div>
					<h3>Doar</h3>
					<p>Ainda assim, existem dúvidas a respeito de como a necessidade de renovação.</p>
				</li>

				<li class="grid-1-3">
					<div class="produtos_icone">
						<img src="{{asset('img/database.png')}}" alt="">
					</div>
					<h3>Portifólio</h3>
					<p>Ainda assim, existem dúvidas a respeito de como a necessidade de renovação.</p>
				</li>

			</ul>
			<div class="call font">
				<p>Nossa equipe trás o melhor para atender o público jovem. Conheça-nos :)</p>
				<br>
				<a href="" class="btn btn-preto">Sobre</a>
			</div>

		</section>
		<!-- Fecha Produtos -->
		<section class="quebra">
			<blockquote class="quote-externo container">
				<p class="">“É a intenção, e não a doação, que faz o doador.”</p>
				<div class="font">Gotthold Lessing</div>
				<br><br>
				<a href="" class="btn-full">Doar</a>
			</blockquote>
		</section>

		<footer>
			<div class="footer">
				<div class="container">

					<div class="grid-8 footer_historia">
						<h3>Um Pouco de Nós</h3>
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
