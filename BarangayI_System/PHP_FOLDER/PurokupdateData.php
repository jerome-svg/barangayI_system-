<?php 

	include('DBconnection.php');

	$data = file_get_contents('php://input');

	$newData = json_decode($data);



	$purok_number = $newData->Purok_number;
	$purok_name = $newData->Purok_name;

	$sql = "UPDATE purok SET Purok_name = '$purok_name' 
	WHERE 	Purok_number = '$purok_number'";


	 	$prepare1 = $pdo->prepare($sql);
		$prepare1->execute();

		if($prepare1){
				echo "The Purok name is updated Successfully";
		}
		else{
				echo "The Purok name is not Update";
		}



 ?>