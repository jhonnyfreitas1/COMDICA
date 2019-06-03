<?php 
session_start();
include "bd-conection.php";
if(!isset($_SESSION['id_user'])) {
	header("location:../index.php");	
}
if(isset($_SESSION['id_user']) && isset($_GET['id']) && isset($_GET['user'])){
$id_user = $_GET['user'];
$id_post = $_GET['id'];
	echo $id_user;
	echo $id_post;
if (intval($id_user) == $_SESSION['id_user']){
	
	$delete = $conn->prepare("DELETE FROM posts WHERE id_post= ? and user_id=?");
	$delete->bindParam(1,$id_post);
	$delete->bindParam(2,$_SESSION['id_user']);
	$delete->execute();
header('location:../dashboard-admin.php?successo=deletado_com_sucesso');

}else{
	header('location:../dashboard-admin.php?error=nao_pode_deletar');	
}



}else {
header('location:../dashboard-admin.php?error=nao_logado_ou_sem_id_do_ponto');	
}
?>