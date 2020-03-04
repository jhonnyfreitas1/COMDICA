@extends('layouts.newIndex')

@section('content')
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
					<img src="{{asset('img/Denun.png')}} "alt="">
				</div>
				<h3>Denúncias</h3>
				<p>O Comdica tem um sistema único de denúncias para adultos e crianças de todas as idades.</p>
			</li>

			<li class="grid-1-3">
				<div class="produtos_icone">
					<img src="{{asset('img/calculadora.png')}}" alt="">
				</div>
				<h3>Doar</h3>
				<p>Você sabia que você pode doar até 6% do seu imposto de renda para o nosso fundo de projetos?. Nossa calculadora Facilita tudo isso para você :)</p>
			</li>

			<li class="grid-1-3">
				<div class="produtos_icone">
					<img src="{{asset('img/Port.png')}}" alt="">
				</div>
				<h3>Portifólio</h3>
				<p>Portifólio Exclusivo para nossas Entidades, com o intuito de divulgar seu trabalho.</p>
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
@endsection