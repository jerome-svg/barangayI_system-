<?php 


	include('DBconnection.php');

	$data = file_get_contents('php://input');

	$newData = json_decode($data);



	$ID = $newData->ID; 
	$FirstName = $newData->FirstName; 
    $MiddleName = $newData->MiddleName;
    $LastName = $newData->LastName;			
    $V_Type = $newData->V_Type;

    $sql = "UPDATE voters SET 
	V_Fname = '$FirstName', 
	V_Mname = '$MiddleName',
	V_Lname = '$LastName',
	V_Type = '$V_Type'
	WHERE V_id = '$ID'";

	 	$prepare1 = $pdo->prepare($sql);
		$prepare1->execute();

		if($prepare1){
				echo "The Voter is updated Successfully";
		}
		else{
				echo "The Voter is not Update";
		}




 ?>