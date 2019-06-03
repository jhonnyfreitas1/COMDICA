<?php 
	include 'bd-conection.php';

	$username = htmlspecialchars($_POST['user_email']);
	$password = htmlspecialchars($_POST['password']);


	$consulta = $conn -> prepare('SELECT id_user,name,admin,password  FROM users where email=?');
	$consulta -> bindValue(1,$username);
	$consulta ->execute();
	$response = $consulta->fetch();
				 	
		if ($response == null) {
			header("location:../login-admin.php?error=erro_dados");
		}else{

			if (password_verify($password, $response['password'])) {
		   		session_start();
				$_SESSION['id_user'] = $response['id_user'];
				$_SESSION['name'] = $response['name'];
				$_SESSION['user-admin'] = $response['admin'];
				header('location:../dashboard-admin.php');
		} else {
		   header("location:../login-admin.php?error=erro_dados");
		}
			}