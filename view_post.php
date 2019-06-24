<?php
$id =htmlspecialchars(base64_decode($_GET['id']),ENT_QUOTES);
include 'nav.php';
include 'controller/bd-conection.php';
$query = $conn ->query("SELECT * FROM posts WHERE id_post=".$id);
$query ->execute();
$resultado = $query -> fetch(PDO::FETCH_ASSOC);
?>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
</head>
<body>	
	<div id='texto-centro' class="col-12 mb-3 container col-md-10" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, .3); margin-top: 3.5em;">	
		<div class="row">
		<div class="col-12 col-md-12 ">
		<span class="card-text "><small class="text-muted"><?= date("d/m/Y", strtotime($resultado['created_at'])); ?></small></span>
		<center>
		<div style="max-height: 30em;" class=" col-12  col-md-6 card-img-top d-flex justify-content-center" >
				
				<img src="upload/<?=$resultado['imagem'];?>" class="card-img-top img-thumbnail" alt="Imagem responsiva">
				</div>
				</center>
				<p style="display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;" ><h3 class="card-title text-justify"><?=$resultado['nome_post'];?></h3></p>
				<div class="card-body row container">
				<p style="display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;"><?php echo $resultado['descricao_post'];?></p>
				<?php if (isset($resultado['pdf'])){?> 
				<a class='' href="upload/<?=$resultado['pdf']?>"><i class="fas fa-file-pdf fa-2">Pdf Anexo 1</i></a>
				<?php }
				?>
				<?php if (isset($resultado['pdf2'])){?> 
				<a  class='ml-3'  href="upload/<?=$resultado['pdf2']?>"><i class="fas fa-file-pdf fa-2">Pdf Anexo 2</i></a>
				<?php }
				?> 	
				</div>
				
				</div>

				<?php if(isset($resultado['link_yt'])){
					?>
					 <div class="col-md-12 embed-responsive embed-responsive-16by9">
	 				 <iframe class="embed-responsive-item" src="<?=$resultado['link_yt']?>" allowfullscreen></iframe>
					</div>
				<?php }?>

				<a class="m-4 mb-2 float-left" href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://www.example.com&p[images][0]=&p[title]=Title%20Goes%20Here&p[summary]=Description%20goes%20here!" target="_blank" onclick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false"><button style="width:100	%; margin-top:10px;" type="button" class="btn btn-facebook btn-lg"><i class="fa fa-facebook fa-2"></i> Compartilhar</button></a>

				
					
			</div>
		</div>
	</div>

</body>

<?php 
include 'footer.php';
?>
<style>

	h3{
        font-family:x-locale-heading-primary,zillaslab,Palatino,"Palatino Linotype",x-locale-heading-secondary,serif;
    font-weight: bold;
    font-size: 30px;
    font-family: arial, sans-serif;
    line-height: 1.2;
    margin:20px;
    }
    span{
    font-style: italic;
    font-family: arial, sans-serif;
    }
	i.fas {
    font-size: 1.2em;
	}
	body {
		padding-top: 54px;
		background-color: #ebeced;

	}

	#texto-centro{
		background-color: white;
		padding-top: 1em;
	}




	html, body {
		height: 100%;
		margin: 0;
		padding: 0;
	}

.btn-facebook {
	color: #fff;
	background-color: #4C67A1;
}
.btn-facebook:hover {
	color: #fff;
	background-color: #405D9B;
}
.btn-facebook:focus {
	color: #fff;
}
}

</style>