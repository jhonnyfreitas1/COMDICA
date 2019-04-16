<?php 
	session_start();
	$id = $_SESSION['id_user']; //pega o id do usuario pela sessao
 	include 'bd-conection.php';

function is_exists($titulo, $conn){ //verifica se o poste já existe
 		$query1 = $conn ->prepare("SELECT id_post from posts WHERE nome_post=?"); 
 		$query1 -> bindValue(1,$titulo);
 		$query1 -> execute();
 		$resultado =  $query1 -> fetch();
 		if ($resultado == null){
 		 	return true;
 		 } else{
 		 	return false;
 		 }
 	}	

 	if(isset($_POST['titulo']) && isset($_POST['hidden']) && isset($_POST['descricao']) && isset($_FILES['imagem']) &&isset($_POST['categoria']) && is_exists($_POST['titulo'],$conn)) { //vê se todas as variaveis estão setadas e chama o is_exists para ver se existe o post ja criado
 		
		$nome = htmlspecialchars($_POST['titulo'], ENT_QUOTES);
		$hidden=filter_var($_POST['hidden']);
		$categoria =filter_var($_POST['categoria']);
		$descricao = htmlspecialchars($_POST['descricao'], ENT_QUOTES);
		$imagem = $_FILES['imagem']; //arquivo enviado
			


		if(isset($imagem)){
			mkdir(__DIR__.'/../upload/', 0777, true);//Cria a pasta upload e se já existir não faz nada.
			$extensao  =  strtolower(substr($imagem['name'], -4));//pega as 4 ultimas letras do nome
			$novo_nome =  "imagem_".md5(time()).$extensao;//nome do arquivo salvo
			$diretorio =  "../upload/";//onde ele será salvo
			move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome);//mover o arquivo para o diretorio
		}	

 		$sql = "INSERT INTO posts(user_id, nome_post, imagem, categoria, descricao_post) 
						VALUES(?, ?, ?, ?, ?)";
 		$query = $conn->prepare($sql);
		$query->bindParam(1, $id);
 		$query->bindParam(2, $nome);
		$query->bindParam(3, $novo_nome);
		$query->bindParam(4, $categoria);
		$query->bindParam(5, $descricao);
 		$stmt = $query->execute();
 		echo "<script>alert('inserção feita com sucesso')</script>";
		header("location:../dashboard-admin.php?sucess=sim");
	} else {
 		echo "<script>alert('erro na inserção')</script>";
 		header("location:../dashboard-admin.php?sucess=erro");
 	}
	
