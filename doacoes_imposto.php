<?php 
include 'controller/bd-conection.php';

$query  = $conn -> prepare('SELECT doacoes_imposto.*,doacoes_carne.* FROM doacoes_imposto JOIN doacoes_carne');
$query ->execute();
$resultado =  $query ->fetchall(PDO::FETCH_ASSOC);

if ($resultado == null) {
	echo  'sem doacoes de imposto de renda';
}
foreach ($resultado as $key => $value) {
      	
      	var_dump($key);

      }      
