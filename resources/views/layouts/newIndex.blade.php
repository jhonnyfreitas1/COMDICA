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

        /* imagem antes de carregar o site */
            .loading-back{
                width:100vw;
                heigth:100vh;
                 margin:0 auto
            }
            .image-back{
                max-height: calc(100vh - 25px);
                position: relative;
                width: auto;
                height: auto;
                display: block;
                margin: 0 auto
            }
            @media only screen and (min-width: 767px) and (max-width: 1024px) {
                .image-back{
                    margin-top:20%;
                }
            }
            @media only screen and (max-width: 767px) {
                .image-back{
                    margin-top: 40%;
                }
            }
		  </style>
	</head>
	<body>
        <div id="conteudo">
            <header class="header">
                <div class="container">
                    <!-- newIndex tem os imports do Css -->
                    <a href="{{route('home')}}" class="grid-4">
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
                            <a href="{{route('admin')}}" class="tag"><b>Painel Admin<b></a>
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
                                <li><a href="http://facebook.com" target="_blank"><img src="img/redes-sociais/Facebook.png"></a></li>
                                <li><a href="http://instagram.com" target="_blank"><img src="img/redes-sociais/Instagram.png"></a></li>
                                <li><a href="http://twitter.com" target="_blank"><img src="img/redes-sociais/Twiiter.png"></a></li>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(document).on('ready', function() {
                $("#conteudo").hide();
                $("#loading").show();

                $(".variable").slick({
                    dots: true,
                    infinite: true,
                    variableWidth: true
                });

                setTimeout(() => {
                    $('#loading').fadeOut("fast")
                    $('#conteudo').show();
                }, 2000);

			});
		</script>
		<div id="loading" class="loading-back">
			<img src="/img/fundeca1.png" class="image-back">
		</div>
	</body>
</html>
