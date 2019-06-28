<?php
include 'bd-conection.php';
session_start();
	
	function is_exists($email, $conn){ //verifica se o poste já existe
 		$query1 = $conn ->prepare("SELECT id_user from users WHERE email=?"); 
 		$query1 -> bindValue(1,$email);
 		$query1 -> execute();
 		$resultado =  $query1 -> fetch();
 		if ($resultado == null){
 		 	return true;
 		 } else{
 		 	return false;
 		 }
 	}

if ($_SESSION['name'] && $_SESSION['id_user']){
	

	
	if (isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['password']) && isset($_POST['password2'])) {
	
		
			$username = htmlspecialchars($_POST['user_name'], ENT_QUOTES); 
			$email = htmlspecialchars($_POST['user_email'], ENT_QUOTES);
			$password = htmlspecialchars($_POST['password'], ENT_QUOTES);
			$password2 = htmlspecialchars($_POST['password2'], ENT_QUOTES);

		if ($password2 == $password) {
				if (is_exists($email, $conn)) {
					
				$insert = $conn -> prepare('INSERT INTO users(name,email,password,admin) VALUES (?,?,?,?)');
				$insert -> bindValue(1,$username);
				$insert -> bindValue(2,$email);
				$insert -> bindValue(3,password_hash($password, PASSWORD_DEFAULT));
				$insert -> bindValue(4,1);
				$retorno = $insert -> execute();
				}else{
					echo 'Esse E-mail já foi cadastrado no sistema. ';
				}
				if ($retorno) {
					echo 'sucesso ao adicionar o administrador';
				
				}else{
					echo 'falha ao adicionar o novo administrador, tente novamente';
				}
			}else {
				echo 'As senhas não condizem';
			}
		
	}else{
		echo 'Falta parametros para completar a inserção';
	}
}else{
	echo 'nao logado';
}