<?php 
	 include('DBconnection.php');

	$data = file_get_contents('php://input');
	$newData = json_decode($data);

    $FirstName = $newData->FirstName;
    $MiddleName = $newData->MiddleName;
    $LastName = $newData->LastName;
    $Age = $newData->Age;
    $DateofBirth = $newData->DateofBirth;
    $Official_term = $newData->Official_term;
    $Position = $newData->Position;
    $SivilStatus = $newData->SivilStatus;
    $ProfileImage = $newData->ProfileImage;

  

	$sql1 = "SELECT * FROM barangay_official
			 WHERE Official_Fname = '$FirstName' AND 
			 Official_Mname = '$MiddleName' AND Official_Lname = '$LastName'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		$newData1 = $prepare1->rowCount();

		function getData($number){
			if($number > 0){
				throw new Exception("The name is Use");
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
		$sql2 = "SELECT * FROM barangay_official ORDER BY Official_Id ASC";

		$prepare2 = $pdo->prepare($sql2);
		$prepare2->execute();

		$newData2 = $prepare2->rowCount();
		$newData3 = $prepare2->fetchAll();

	
		$x =  $newData2 - 1;
	
		for($y = 0; $y <= $x; $y++){

			$Costome = $newData3[$y]['Official_Id'];

		}
		if(isset($Costome) == ""){
			$newID = "BS-OF-001";
			$IMG = "SELECT * FROM barangay_official WHERE Official_Profile = '$ProfileImage'";

			$imageP = $pdo->prepare($IMG);
			$imageP->execute();


			$image_pick = $imageP->rowCount();

			function getData_IMAGE($number){
				if($number > 0){
					throw new Exception("Your Image is use");
				}
				return true;
			}
			try{
				getData_IMAGE($image_pick);
			}
			catch(Exception $e){
				echo "You have an Error " . $e->getMessage();
				die();
			}

			$insertData = "INSERT INTO barangay_official(
						Official_Id,Official_Fname,Official_Mname,
						Official_Lname,Official_Age,Official_DateBirth,
						Official_Term,Official_Position,
						Official_Status,Official_Profile)
				VALUES(:Official_Id,:Official_Fname,:Official_Mname,
						:Official_Lname,:Official_Age,:Official_DateBirth,
						:Official_Term,:Official_Position,
						:Official_Status,:Official_Profile)";

			$prepare = $pdo->prepare($insertData);
			$prepare->execute(
								 ['Official_Id'=>$newID,
								 'Official_Fname'=>$FirstName,
								 'Official_Mname'=>$MiddleName,
								 'Official_Lname'=>$LastName,
								 'Official_Age'=>$Age,
								 'Official_DateBirth'=>$DateofBirth,
								 'Official_Term'=>$Official_term,
						         'Official_Position'=>$Position,
						         'Official_Status'=>$SivilStatus,
						         'Official_Profile'=>$ProfileImage]
					);

			if($prepare){
				echo "Inserted Successfully";
			}
			else{
				echo "You have an Error";
			}
		}
		else{

			$newID = substr($Costome, 8);
			$newID = intval($newID);
			$newID = "BS-OF-00" . ($newID + 1);

			$IMG = "SELECT * FROM barangay_official WHERE Official_Profile = '$ProfileImage'";

			$imageP = $pdo->prepare($IMG);
			$imageP->execute();


			$image_pick = $imageP->rowCount();

			function getData_IMAGE($number){
				if($number > 0){
					throw new Exception("Your Image is use");
				}
				return true;
			}
			try{
				getData_IMAGE($image_pick);
			}
			catch(Exception $e){
				echo "You have an Error " . $e->getMessage();
				die();
			}

			$insertData = "INSERT INTO barangay_official(
						Official_Id,Official_Fname,Official_Mname,
						Official_Lname,Official_Age,Official_DateBirth,
						Official_Term,Official_Position,
						Official_Status,Official_Profile)
				VALUES(:Official_Id,:Official_Fname,:Official_Mname,
						:Official_Lname,:Official_Age,:Official_DateBirth,
						:Official_Term,:Official_Position,
						:Official_Status,:Official_Profile)";

			$prepare = $pdo->prepare($insertData);
			$prepare->execute(
								 ['Official_Id'=>$newID,
								 'Official_Fname'=>$FirstName,
								 'Official_Mname'=>$MiddleName,
								 'Official_Lname'=>$LastName,
								 'Official_Age'=>$Age,
								 'Official_DateBirth'=>$DateofBirth,
								 'Official_Term'=>$Official_term,
						         'Official_Position'=>$Position,
						         'Official_Status'=>$SivilStatus,
						         'Official_Profile'=>$ProfileImage]
					);

			if($prepare){
				echo "Inserted Successfully";
			}
			else{
				echo "You have an Error";
			}
		}

 ?>