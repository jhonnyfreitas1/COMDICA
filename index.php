<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/index-css.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/jquery.min.js"></script>


  <title>COMDICA - Conselho municipal dos direitos da criança e do adolescente.</title>

  <!-- Barra superior -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <meta http-equiv="x-ua-compatible" content="ie=edge">
</head>

<?php 
include 'nav.php';
?>  

  <body class="fadeIn">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicadores do Carousel -->
        <ol class="carousel-indicators">

          <?php   $ativo = 0;
          while ($ativo < 3):
            if ($ativo == 0) { ?>
              <li data-target="#myCarousel" data-slide-to="<?=$ativo?>" class="active"></li>
              <?php $ativo++;
            }else{
              if($ativo <= 2):?>
                <li data-target="#myCarousel" data-slide-to="<?=$ativo;?>"></li>
                <?php $ativo++; ?>  
              <?php endif;    
            }
          endwhile ?>
        </ol>
      <div class="container">
       <div class="carousel-inner" role="listbox">

        <?php   $ativoCarr = 0;
        
        $consulta = $conn -> query("SELECT id_post, imagem,nome_post from posts ORDER BY id_post DESC LIMIT 3 "); 
        while($linha = $consulta -> fetch(PDO::FETCH_ASSOC)):
          if ($ativoCarr == 0) {?>
            <div class="carousel-item active">
              <a href="view_post.php?id=<?=base64_encode($linha['id_post']);?>">
                <img style="width: 100%;height: 31em;" src="upload/<?=$linha['imagem'];?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light bg-dark"><?php echo  $linha['nome_post'];?></h5>
                  </div>
              </a>
            </div>
            <?php   $ativoCarr++;
          }else{
            if ($ativoCarr <= 2): ?>  
              <div class="carousel-item">
                <a href="view_post.php?id=<?=base64_encode($linha['id_post']);?>">
                  <img style="width: 100%;height: 31em;" src="upload/<?=$linha['imagem'];?>">
                  <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-light bg-dark"><?php echo  $linha['nome_post'];?></h5>
                  </div>
                </a>
              </div>
              <?php   $ativoCarr++;
            endif;
          };
        endwhile; ?>

        <!-- Controles de Direita e Esquerda -->
      
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Próximo</span>
        </a>
        </a>
         <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>    
    </div>
    </div>

  <!-- IMAGEM DA CALCULADORA--> 
  <div style="margin-top:2em;"></div>
  <div class="section">
    <div class="row ml-12"> 
     <div id="logo-icon" class="col-md-6 col-12 ml-12 p-10" style="padding:0px;margin: 0px;flex: 0 0 30%;">
      <div class="card border- mb-3 text-white" style=" margin:auto; max-width: 80%; background-image: linear-gradient(to bottom right,#00BFFF, palegreen);">
        <div class="card-header bg-success border-success text-white"><h4>Calculadora de imposto de renda</h4></div>
          <div class="card-body text-success">
            <h5 class="card-title text-white">Calcule seu imposto de renda aqui no nosso site, e veja quanto você pode doar, esse valor pode ser revertido ao seu favor.</h5>
            <img src="assets/img/calculado-low.png" class='pulse'>
          </div>
          <div class="card-footer bg-transparent border-success"><a href="calculo.php" style="text-decoration: none"><button type="button" class="btn btn-primary btn-lg btn-block">Veja Agora</button></a>
          </div>
        </div>
      </div>
      <div class="container col-md-6 col-12 p-10" id="card-fundo" style="margin-right: 10%;max-width: 65rem;padding-right: 0px;padding-left: 0px;">
        <div class="row">
          <div class=" col-md-12 text-dark position-top">
           <div class=" card-header bg-success  col-12  text-white"><h4>FUNDECA</h4></div>
            <h5 class="card-body text-white description">
              O Fundo Municipal dos Direitos da Criança e do Adolescente (FUNDECA) é um Fundo especial, criado por lei municipal, segundo determinação do Estatuto da Criança e do Adolescente em seu art. 260 com o objetivo de financiar programas e projetos que atuem na garantia da promoção, proteção e defesa dos direitos da criança e do adolescente. 
            </h5>
            <a href="nucleo-icons.html" class="btn btn-info" target="_blank" style="margin-left: 30px">Saiba mais</a>

          </div>
        </div>
        

      </div>
  <div id="loader"></div>

      <!-- ///PARTE DE LISTAGEM DE POSTS -->
<div class="container" id="listagem_posts" > 
</div>

<script type="text/javascript">

        // Este evendo é acionado após o carregamento da página
        $(window).on('load', function() {
            //Após a leitura da pagina o evento fadeOut do loader é acionado, esta com delay para ser perceptivo em ambiente fora do servidor.
            $("#loader").delay(2000).fadeOut("slow");
        });

  $(document).ready(function() {
    $.ajax({
        type:'get',
        url:'../pagina.php',
        datatype:'json',
        data:{pagina:'1'},     //metodo ajax que busca arquivo de formulario do post e coloca em uma div '#area-principal'
        success: function(response){
            $('#listagem_posts').html(response);
        }
    })

});
  function pagina(e){
    alert('Ainda vou modificar essa parte de paginação');
}
</script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script type="text/javascript" src="assets/js/index_js.js"></script>
 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

<?php 
include 'footer.php';
?>

</html>