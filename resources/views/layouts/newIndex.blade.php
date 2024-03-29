<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Comdica - Araçoiaba PE</title>
		<meta name="viewport" content="width=device-width", initial-scale="1.0">
		<link rel="stylesheet" href="{{asset('css/normalize.css')}}">
		<link rel="stylesheet" href="{{asset('css/reset.css')}}">
		<link rel="stylesheet" href="{{asset('css/grid.css')}}">
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/produtos.css')}}">
		<link rel="stylesheet" href="{{asset('css/sobre.css')}}">
		<link rel="stylesheet" href="{{asset('css/responsivo.css')}}">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
		<style type="text/css">
			.slider {
				width: 100%;
				margin: 100px auto;
			}

			.slick-slide {
			  margin: 0px 20px;
			}

			.slick-slide img {
			  width: 100%;
			}
			.slick-prev:before,
			.slick-next:before {
			  color: green;
			}


			.slick-slide {
			  transition: all ease-in-out .3s;
			  opacity: .2;
			}

			.slick-active {
			  opacity: .5;
			}

			.slick-current {
			  opacity: 1;
			}
			.tag{
				color: white;
			}
			.tag:hover{
				color:darkgreen;
			}

		  </style>
	</head>
	<body>
        <div id="conteudo">
            <header class="header">
                <div class="container">
                    <!-- newIndex tem os imports do Css -->
                    <a href="{{route('home')}}" class="grid-4">
                        <img src="{{asset('img/mc21.png')}}" alt="Comdica">
                    </a>
                    <nav class="grid-12 header_menu">
                        <ul>
                            <li><a href="{{route('denuncia')}}">Denunciar</a></li>
                            <li><a href="{{route('comdicaEC')}}">Portfólio</a></li>
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
                            <a href="{{route('admin')}}" class="tag"><b>Painel Admin<b></a>
                        </div>

                        <div class="grid-4 footer_contato">
                            <h3>Contato</h3>
                            <ul>
                                <li>- (81) 3543-8079</li>
                                <li>- cmdcaaracoiabape@gmail.com</li>
                                <li>- Araçoiaba, n 10012 - PE</li>
                            </ul>
                        </div>

                        <div class="grid-4 footer_redes">
                            <h3>Redes Sociais</h3>
                            <ul>
                                <li><a href="https://www.facebook.com/cmdcaaracoiabape" target="_blank"><img src="{{asset('img/redes-sociais/Facebook.png')}}"></a></li>
                                <li><a target="_blank"><img src="{{asset('img/redes-sociais/Instagram.png')}}"></a></li>
                                <li><a href="https://twitter.com/comdicaracoiaba" target="_blank"><img src="{{asset('img/redes-sociais/Twiiter.png')}}"></a></li>
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
        </div>
        <!-- Div da imagem de back ao entrar na index -->
        <div id="loading" style="display:none">
            <img style=" position: fixed;  width: 100%;  background-color: white;  height: 100%; z-index: -1;" src="/img/COR1.png">
            <img class="col-4 col-md-2  position-absolute sticky-top" style=" z-index: 1;" src="/img/carregamento.gif">
		</div>
        <!-- links de Js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(document).on('ready', function() {
                $(".variable").slick({
                    dots: true,
                    infinite: true,
                    variableWidth: true
                });
			});
		</script>
	</body>
</html>
