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

		
<div id='texto-centro' class="card mb-3 container" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, .3); margin-top: 3.5em;">
	<img src="upload/<?=$resultado['imagem'];?>" alt="...">
	<div class="card-body">
		<h5 class="card-title"><?php echo $resultado['nome_post'];?></h5>
		<p class="card-text"><?php echo $resultado['descricao_post'];?></p>
		<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	</div>
<a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://www.example.com&p[images][0]=&p[title]=Title%20Goes%20Here&p[summary]=Description%20goes%20here!" target="_blank" onclick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false"><button style="width:100%; margin-top:10px;" type="button" class="btn btn-facebook btn-lg"><i class="fa fa-facebook fa-2"></i> Share on Facebook</button></a>
	</div>

<?php
include 'footer.php';
?>
<style>

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