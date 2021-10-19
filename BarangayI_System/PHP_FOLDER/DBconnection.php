<?php 

	$username = "root";
	$password = "";

	try {

		$dbhost = "mysql:host=localhost;dbname=BarangayI_System";

		$pdo = new PDO($dbhost, $username, $password);

				
	} catch (PDOException $e) {
		echo "You are not Connected: " . $e->getMessage();
	}


 ?>

