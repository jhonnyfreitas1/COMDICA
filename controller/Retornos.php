<?php  session_start();
		include 'bd-conection.php';
		$quero = htmlspecialchars($_POST['quero']."();");
		return eval($quero);
					 
		
		 function postagem(){
		 	islogged();
			 return  include '../nova-postagem.php';		
			}	

			function islogged(){
				if (!$_SESSION['name'] && !$_SESSION['id_user']){
					echo  '<script>alert("não estás logado!"); window.location.assign("../index.php");</script>';
				}
			}