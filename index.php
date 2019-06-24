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
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
  <center>
    <div class="row m-4" style="margin: auto; "> 
    <!--  <div id="logo-icon" class="col-md-5 col-6 ml-12 p-10" style=" ">
      <div class="card border mb-3 text-white col-md-6 col-12"   style="  background-image: linear-gradient(to bottom right,#00BFFF, palegreen);">
          <div class=" bg-success border-success text-white col-12 text-justify w-auto"><h4 >Calculadora</h4></div>

              <h5 style="   " class="card-title text-white text-justify w-auto ">Calcule seu imposto de renda aqui no nosso site, veja quanto pode doar, e muito mais</h5>
             
       
            <img src="assets/img/calculado-low.png" style=" margin-top: -3em;  max-height: 20em;" class='pulse col-12 col-md-12 rounded '> 
         </div>
      </div> -->

 
      <div class=" col-md-3 col-12 m-2 center" id="card-fundo" style="">
        <div class="row">
         <div class=" col-md-12 text-dark position-top">
           <div class=" card-header bg-success  col-12  text-white"><h4>Calculadora </h4></div>
            <h5 class="card-body text-white description">
             Calcule seu imposto de renda aqui no nosso site, exporte seus dados da calculadora e veja quanto você pode doar e muito mais
            </h5>
           <a href="calculo.php">   <img style="width:100%; margin-top: -3em;"  class='pulse ml-3' src="assets/img/calculado-low.png">
          </div></a>
        </div>
      </div>
 
      <div class=" col-md-5 col-12 m-2" id="card-fundo" style="">
        <div class="row">
          <div class=" col-md-12 text-dark position-top">
           <div class=" card-header bg-success  col-12  text-white"><h4>COMDICA ARAÇOIABA-PE</h4></div>
            <h5 class="card-body text-white description">
                O Conselho Municipal de Defesa e Promoção dos Direitos da Criança e do Adolescente -COMDICA  é um órgão regido no artigo 88 da lei n° 8.069/1990 – Estatuto da Criança e do Adolescente
            </h5>
            <img style="width:90%;" src="assets/img/mc2.png">
          </div>
        </div>
      </div>
      
      <div class=" m-2 col-md-3 col-12 float-right " id="card-fundo" style="">
        <div class="row">
          <div class=" col-md-12 text-dark position-top">
           <div class=" card-header bg-success  col-12  text-white"><h4>FUNDECA</h4></div>
            <h5 class="card-body text-white description">
             O Fundo Municipal dos Direitos da Criança e do Adolescente, é captador e
                aplicador de recursos a serem utilizados, segundo as deliberações do Conselho dos
                Direitos, ao qual é órgão vinculado.
                Os critérios para liberação de recursos do Fundo Municipal dos Direitos da
                Criança e do Adolescente, e por meio desse site visa captar recursos para serem
                aplicados na COMDICA 
                
            <img style="width:110%;" src="assets/img/fundeca-mini.png">
            </h5>
          </div>
        </div>
      </div>  
       </div>
    </div>
   </center> 
    <div id="loader">
    </div>

      <!-- ///PARTE DE LISTAGEM DE POSTS -->
    <div class="container" id="listagem_posts" > 
  <?php 
      include 'controller/bd-conection.php';
      $busca = "SELECT * FROM posts  ORDER BY id_post DESC";
      $total_reg = "4";
      $pagina=$_GET['pagina'];
      if (!$pagina) {
        $pc = "1";
      }else {
        $pc = $pagina;
      }
      $inicio = $pc - 1;
      $inicio = $inicio * $total_reg;


      $limite = $conn -> query("$busca LIMIT $inicio,$total_reg");
      $todos = $conn -> query("$busca");
      $todos -> execute();
      $tr =  $todos-> rowCount(); // verifica o número total de registros
      $tp = $tr / $total_reg; // verifica o número total de páginas
  ?>
            
               <div class="page-header">

          <h2>Postagens recentes</h2>
        </div>
        <div class="row" style="">
          <?php
    // vamos criar a visualização
    while ($linha1= $limite->fetch(PDO::FETCH_ASSOC)) {
      ?>
          <a href="view_post.php?id=<?=base64_encode($linha1['id_post']);?>">
            <div class="col-md-6 col-sm-6">
              <div class='report-module ' style=" border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.9)">
                <div class='thumbnail' >
                  <a href="view_posts.php?id=<?=base64_encode($linha1['id_post']);?>">
                    <img class="card-img-top " style="max-height: 11em;" src="upload/<?=$linha1['imagem'];?>">
                  </a>
                </div>
                <div class='post-content'>
                  <h3 class='title' style=""><?=$linha1['nome_post']?></h3>
                  <p class='description' style=""><?= substr($linha1['descricao_post']."...",0 ,80); ?></p>
                  <div class='post-meta float-right'>
                    <span class='comments'>
                      <a class="btn btn-success  btn-block" id="but" style="border:1px solid black;" href="view_post.php?id=<?=base64_encode($linha1['id_post']);?>">Ver Postagem</a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </a>

      <?php 
    }
    ?>
    <nav aria-label="...">
      <ul class="pagination">


        <?php

    // agora vamos criar os botões "Anterior e próximo"
        $anterior = $pc -1;
        $proximo = $pc +1;
        if ($pc>1) {
          ?>
          <li class="page-item" >
            <a class="page-link" onclick='pagination(this);' id='click' value='<?php echo $anterior?>' href='?pagina=<?php echo $anterior?>' tabindex="-1">Previous</a>
             
          </li>
          <?php 
        }?> 
        <?php 
        for($i=1; $i<=$tp+1; $i++){

          if($pc == $i){
            echo "<li class='page-item   active'><a  onclick='pagination(this);' id='click' value='".$i."' class='page-link' href='?pagina=".$i."'>".$i."<span class='sr-only'>(current)</span></a></li>";
          }else{
            echo "<li class='page-item'><a onclick='pagination(this);' class='page-link' value='".$i."' id='click' href='?pagina=".$i."'>".$i."</a></li>";
            
          }
        }
        ?>

        <?php 
        if ($pc<$tp) {
          ?>
          <li class="page-item"  >
            <a class="page-link"  onclick='pagination(this); this.preventDefault();'  value='<?php echo $proximo?>' href='?pagina=<?php echo $proximo?>' >Proximo</a>
          </li>     
 
          <?php
        }
        ?>
      </ul>
    </nav>
  </div>
    </div>
<script type="text/javascript">

          function pagination(e){
                  e.preventDefault();
                  alert(e.val());
                  
                }
        // Este evendo é acionado após o carregamento da página
        $(window).on('load', function() {
            //Após a leitura da pagina o evento fadeOut do loader é acionado, esta com delay para ser perceptivo em ambiente fora do servidor.
           
        }); 


</script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script type="text/javascript" src="assets/js/index_js.js"></script>

</body>

<?php 
include 'footer.php';
?>

</html>