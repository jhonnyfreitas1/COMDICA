<?php 
	include 'bd-conection.php';

	$username = htmlspecialchars($_POST['user_email']);
	$password = htmlspecialchars($_POST['password']);

	$consulta = $conn -> prepare('SELECT id_user,name,admin  FROM users where email=?  and password=?');
	$consulta -> bindValue(1,$username);
	$consulta ->bindValue(2,$password);
	$consulta ->execute();
	$response = $consulta->fetch();
				 	
		if ($response == null) {
			header("location:../login-admin.php?error=erro_dados");
		}else{
			session_start();
			$_SESSION['id_user'] = $response['id_user'];
			$_SESSION['name'] = $response['name'];
			$_SESSION['user-admin'] = $response['admin'];

			header('location:../dashboard-admin.php');
			}