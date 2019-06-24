<div class="col-md-10 col-sm-12">
    <div class="row">
        <?php

include 'controller/bd-conection.php';
       $query = $conn -> query("SELECT id_post,user_id,nome_post,descricao_post,imagem,created_at FROM posts WHERE user_id =".$_SESSION['id_user']);
      $query ->execute();
    $resultado =  $query ->fetchall(PDO::FETCH_ASSOC);
      
        if ($resultado == []) {
          echo "<h2>Você não possuí postagens</h2>";
        }
        
    foreach ($resultado as $linha1){
        
          ?>

          <div class='report-module m-2' style="max-width:40%; border-style: ridge;border-radius:0.4em;padding: 1em; background-color: rgba(214, 224, 226, 0.3)"> 
            <div class='thumbnail'>
              <a href="view_visualizar_pontos.php?id=<?=$linha1['id_post']?>">
                <img style="height: 10em; max-width: 100%;" src="upload/<?=$linha1['imagem'];?>">
              </a>
            </div>
            <div class='post-content'>
              <h1 class='title'><?=$linha1['nome_post']?></h1>
              <div class="row">
                  <a class="btn btn-primary btn-block col-md-3 col-8 m-1" id="but" style="" href="view_visualizar_pontos.php?id=<?=$linha1['id_post']?>"><i class="fas fa-eye"></i></a>
                  <a class="btn btn-danger btn-block col-md-3 col-8  m-1" id="but" style="" href="#" data-toggle="modal" data-target="#myModal" id='delete'><i class="far fa-trash-alt"></i></a>
                  <a class="btn btn-warning btn-block col-md-3 col-8  m-1" id="but" style="" href="view_visualizar_pontos.php?id=<?=$linha1['id_post']?>"> <i class="fas fa-edit"></i></a>
               </div> 
             </div>
        </div>
  


<?php } ?>

      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Deseja apagar essa postagem?</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <a  href="controller/action_apagar_post.php?id=<?=$linha1['id_post']?>&user=<?=$linha1['user_id']?>" style="color: red;">Confirmar</a>
              <a href="#" data-dismiss="modal" style="margin-left: 2em;">Cancelar</a>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
  <style type="text/css">
  </style>
  <script type="text/javascript">
    
  </script>