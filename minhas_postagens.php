<div class="col-md-10 col-sm-12">
    <div class="row">
        <?php

include 'controller/bd-conection.php';
       $query = $conn -> query("SELECT id_post,user_id,nome_post,descricao_post,imagem,categoria FROM posts WHERE user_id =".$_SESSION['id_user']);
      $query ->execute();
    $resultado =  $query ->fetchall(PDO::FETCH_ASSOC);


    foreach ($resultado as $linha1){
        ?>

                <div class='report-module' style="border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)">
                  <div class='thumbnail'>
                    <a href="view_visualizar_pontos.php?id=<?=$linha1['id_post']?>">
                      <img style="height: 10em;" src="upload/<?=$linha1['imagem'];?>">
                    </a>
                  </div>
                  <div class='post-content'>
                    <h1 class='title'><?=$linha1['nome_post']?></h1>

                      <span class='comments'>
                        <a class="btn btn-primary  btn-block" id="but" style="border:1px solid black;" href="view_visualizar_pontos.php?id=<?=$linha1['id_post']?>">Ver Postagem</a>
                      </span>
</div>
</div>



<?php } ?>
</a>
</div>
</div>