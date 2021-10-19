<?php 
	
	include('DBconnection.php');

	
	$data = file_get_contents('php://input');

	$UpdateDataH = json_decode($data);

	$FirstName = $UpdateDataH->Fname;
	$MiddleName = $UpdateDataH->Mname;
	$LastName = $UpdateDataH->Lname;
	$Age = $UpdateDataH->Age;
	$Religion = $UpdateDataH->Religion;
	$DateBirth = $UpdateDataH->DateBirth;
	$PlaceBirth = $UpdateDataH->PlaceBirth;
	$Gender = $UpdateDataH->Gender;
	$SivilStatus = $UpdateDataH->SivilStatus;
	$STzenship = $UpdateDataH->STzenship;
	$Occupation = $UpdateDataH->P_Occupation;

	$HouseNumber = $UpdateDataH->House_number;
	$STname = $UpdateDataH->STname;
	$Purok = $UpdateDataH->Purok;
	$IDH = $UpdateDataH->ID;


	$sql = "UPDATE house_hold 
			SET H_Fname = '$FirstName', 
				H_Mname = '$MiddleName', 
				H_Lname = '$LastName',
				H_Age = '$Age',
				H_Religion = '$Religion',
				H_DBirth = '$DateBirth', 
				H_PBirth = '$PlaceBirth', 
				H_Gender = '$Gender', 
				H_CivilStatus = '$SivilStatus', 
				H_Cityzenship = '$STzenship', 
				H_Occupation = '$Occupation'

	 			WHERE H_id = '$IDH'";

	 	$prepare1 = $pdo->prepare($sql);
		$prepare1->execute();

		if($prepare1){
			$sql2 = "UPDATE resident_address 
			SET House_number = '$HouseNumber', 
			Street_name = '$STname',
			Purok_number = '$Purok'
			WHERE H_id = '$IDH'";

			$Update1 = $pdo->prepare($sql2);
			$Update1->execute();

			if($Update1){
				echo "The House Hold Profile is updated Successfully";
			}
			else{
				echo "The House Hold Profile is not Update";
			}


		}else{
			echo "The House Hold Profile is not Update";	
		}


	





 ?>
