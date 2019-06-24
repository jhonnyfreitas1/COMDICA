<?php
	try {
		$username="root";
		$password="jhonny522";
		$conn = new PDO('mysql:host=localhost;porta=3306;dbname=comdica',$username,$password);		
	}
	catch (PDOException $e) {
         echo 'ERROR: ' . $e->getMessage();
    }
?>
