<?php 
	
	include('DBconnection.php');

	$data = file_get_contents('php://input');

	$newData = json_decode($data);

	$Pnumber = $newData->Purok_number; 
    $PName = $newData->Purok_Name;

	$sql1 = "SELECT * FROM purok WHERE Purok_number = '$Pnumber' OR Purok_name = '$PName'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		$newData1 = $prepare1->rowCount();

		function getData($number){
			if($number > 0){
				throw new Exception("your Purok number or your Purok name is use");
			}
			return true;
		}
		try{
			getData($newData1);
		}
		catch(Exception $e){
			echo "You have an Error " . $e->getMessage();
		die();
		}
		$registerP = 
			$insertData = "INSERT INTO Purok(Purok_number, Purok_name)
				VALUES(:Purok_number,:Purok_name)";

				$prepare = $pdo->prepare($insertData);
				$prepare->execute(['Purok_number'=>$Pnumber, 'Purok_name'=>$PName]);

				if($prepare){
					echo "The Purol successfully register";
				}
				else{
					echo "The Purol is not Regiter";
				}




 ?>