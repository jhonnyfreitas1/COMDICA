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


 	if($_POST['titulo'] != false && $_POST['hidden'] != false && $_POST['descricao']  != false && $_FILES['imagem'] != false)
 		{ 		//vê se todas as variaveis estão setadas e chama o is_exists para ver se existe o post ja criado
 		
		$nome = htmlspecialchars($_POST['titulo'], ENT_QUOTES);
		$hidden=filter_var($_POST['hidden']);
		$descricao = $_POST['descricao'];
		$imagem = $_FILES['imagem']; //arquivo enviado
		$pdf2 = $_FILES['pdf2'];
		$pdf = $_FILES['pdf'];
		if ($nome == "" || $descricao == "" || $imagem == "") {
 		
 			echo 'Descricao, titulo da postagem ou a imagem principal nao foram selecionadas';
		}
		
		$yt = $_POST['yt'];

		if ($yt != "") {
		$url = explode("watch?v=", $yt);
		$embed = $url[0]."embed/".$url[1];
		}

	if(isset($imagem)){
			$extensao  =  strtolower(substr($imagem['name'], -4));//pega as 4 ultimas letras do nome
			$extençoes = array(".png", ".jpg", "jpeg", ".bmp",'.pdf');
			$novo_nome =  "imagem_".md5(time()).$extensao;//nome do arquivo salvo
			$diretorio =  "../upload/";//onde ele será salvo
			move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome);//mover o arquivo para o diretorio

		}	

		if(isset($pdf)){
			$extensao1  =  strtolower(substr($pdf['name'], -4));
			$nome_pdf 	=  "pdf_".md5(time()).$extensao1;
			$diretorio1 =  "../upload/";
			move_uploaded_file($pdf['tmp_name'], $diretorio1.$nome_pdf);
		
		}

		if(isset($pdf2)){
			$extensao2  =  strtolower(substr($pdf2['name'], -4));
			$nome_pdf2 	=  "pdf_".md5($pdf2['name']).time().$extensao2;
			$diretorio2 =  "../upload/";
			move_uploaded_file($pdf2['tmp_name'], $diretorio2.$nome_pdf2);
		}
 		if (is_exists($nome , $conn )) {
 		$sql = "INSERT INTO posts(user_id, nome_post, imagem,descricao_post,link_yt,pdf,pdf2) VALUES(?,?,?,?,?,?,?)";
 		$query = $conn->prepare($sql);
		$query->bindParam(1, $id);
 		$query->bindParam(2, $nome);
		$query->bindParam(3, $novo_nome);
		$query->bindParam(4, $descricao);
		$query->bindParam(5, $embed);
		$query->bindParam(6, $nome_pdf);
		$query->bindParam(7, $nome_pdf2);
 		$stmt = $query->execute();
		echo "sucesso ao fazer a nova postagem";
 		}else{
 			echo 'Uma postagem com esse título já existe, tente novamente';
		}
	} else {
 		echo "Erro ao fazer a postagem, tente novamente";
 	}
	
	