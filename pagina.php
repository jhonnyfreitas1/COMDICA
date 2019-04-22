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
						<a class="page-link"  value='<?php echo $anterior?>' href='?pagina=<?php echo $anterior?>' tabindex="-1">Previous</a>
					</li>
					<?php 
				}?> 
				<?php 
				for($i=1; $i<=$tp+1; $i++){

					if($pc == $i){
						echo "<li class='page-item  active'><a class='page-link' href='?pagina=".$i."'>".$i."<span class='sr-only'>(current)</span></a></li>";
					}else{
						echo "<li class='page-item'><a class='page-link'  href='?pagina=".$i."'>".$i."</a></li>";
					}
				}
				?>

				<?php 
				if ($pc<$tp) {
					?>
					<li class="page-item">
						<a class="page-link"  onclick="" value='<?php echo $proximo?>' href=''>Proximo</a>
					</li>
					<?php
				}
				?>
			</ul>
		</nav>
		