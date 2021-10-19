<?php 

	include('DBconnection.php');

	
	$data = file_get_contents('php://input');

	$UpdateDataH = json_decode($data);


	$ID = $UpdateDataH->ID;
	$FirstName = $UpdateDataH->Fname;
	$MiddleName = $UpdateDataH->Mname;
	$LastName = $UpdateDataH->Lname;
	$Age = $UpdateDataH->Age;
	$DateofBirth = $UpdateDataH->DateofBirth;
	$Official_term = $UpdateDataH->Official_term;
	$Position = $UpdateDataH->Position;
	$CivilStatus = $UpdateDataH->CivilStatus;

	$sql = "UPDATE barangay_official SET 
	Official_Fname = '$FirstName', 
	Official_Mname = '$MiddleName',
	Official_Lname = '$LastName',
	Official_Age = '$Age',
	Official_DateBirth = '$DateofBirth',
	Official_Term = '$Official_term', 
	Official_Position = '$Position',
	Official_Status = '$CivilStatus'
	WHERE 	Official_Id = '$ID'";

	 	$prepare1 = $pdo->prepare($sql);
		$prepare1->execute();

		if($prepare1){
				echo "The Barangay Official Profile is updated Successfully";
		}
		else{
				echo "The Barangay Official Profile is not Update";
		}

 ?>