<?php

	include('DBconnection.php');

	$data = file_get_contents('php://input');

	$newData = json_decode($data);


 	if(isset($newData->FirstName) && isset($newData->MiddleName) && isset($newData->LastName) && isset($newData->Age) && isset($newData->Religion) && isset($newData->DateBirth) && isset($newData->PlaceBirth) && isset($newData->Gender) && isset($newData->Civil_Status) && isset($newData->Cityzenship) && isset($newData->Occupation) && isset($newData->House_number) && isset($newData->StreetName) && isset($newData->Purok_number)){

 		$FirstName = $newData->FirstName; 
    	$MiddleName = $newData->MiddleName;
    	$LastName = $newData->LastName;			
    	$Age = $newData->Age;		
    	$Religion = $newData->Religion;		
    	$DateBirth = $newData->DateBirth;		
    	$PlaceBirth = $newData->PlaceBirth;		
   		$Gender = $newData->Gender;		
    	$Civil_Status = $newData->Civil_Status;		
    	$Cityzenship = $newData->Cityzenship;		
    	$Occupation = $newData->Occupation;		
    	$House_number = $newData->House_number;		
    	$StreetName = $newData->StreetName;		
    	$Purok_number = $newData->Purok_number;
    	$Image = $newData->Image;



      	$sql1 = "SELECT * FROM house_hold
			 WHERE H_Fname = '$FirstName' AND H_Mname = '$MiddleName' AND H_Lname = '$LastName'";

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
		$sql2 = "SELECT * FROM house_hold ORDER BY H_Id ASC";

		$prepare2 = $pdo->prepare($sql2);
		$prepare2->execute();

		$newData2 = $prepare2->rowCount();
		$newData3 = $prepare2->fetchAll();

	
		$x =  $newData2 - 1;
	
		for($y = 0; $y <= $x; $y++){

			$Costome = $newData3[$y]['H_id'];

		}
		if(isset($Costome) == ""){
			$newID = "BS-001";
			$IMG = "SELECT * FROM house_hold WHERE H_Profile_image = '$Image'";

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

			$insertData = "INSERT INTO house_hold
			(H_id,H_Fname,H_Mname,H_Lname,H_Age,H_Religion,
			H_DBirth,H_PBirth,H_Gender,H_CivilStatus,
			H_Cityzenship,H_Occupation,H_Profile_image)

				VALUES(:H_id,:H_Fname,:H_Mname,:H_Lname,:H_Age,:H_Religion,:H_DBirth,:H_PBirth,:H_Gender,:H_CivilStatus,:H_Cityzenship,:H_Occupation,:H_Profile_image)";


				$prepare = $pdo->prepare($insertData);
				$prepare->execute(
								 ['H_id'=>$newID,'H_Fname'=>$FirstName,'H_Mname'=>$MiddleName,'H_Lname'=>$LastName,'H_Age'=>$Age,'H_Religion'=>$Religion,'H_DBirth'=>$DateBirth,'H_PBirth'=>$PlaceBirth,'H_Gender'=>$Gender,'H_CivilStatus'=> $Civil_Status,'H_Cityzenship'=>$Cityzenship,'H_Occupation'=>$Occupation,'H_Profile_image'=>$Image]
							);
		

				if($prepare){


					$residenAdd = "INSERT INTO resident_address(House_number,Street_name,Purok_number,H_id)
					VALUES(:House_number,:Street_name,:Purok_number,:H_id)";


					$insert = $pdo->prepare($residenAdd);
					$insert->execute(['House_number'=>$House_number,'Street_name'=> $StreetName,'Purok_number'=>$Purok_number, 'H_id'=>$newID]);

					if($insert){
						echo "The House Hold Person is Successfully Register";
					}
					else{
						echo "Not Register";
					}

				}
				else{
					echo "Not Register";
				}




		}

		/*=======================================================*/
		else{
			$newID = substr($Costome, 5);
			$newID = intval($newID);
			$newID = "BS-00" . ($newID + 1);

			$IMG = "SELECT * FROM house_hold WHERE H_Profile_image = '$Image'";

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

			$insertData = "INSERT INTO house_hold
			(H_id,H_Fname,H_Mname,H_Lname,H_Age,H_Religion,
			H_DBirth,H_PBirth,H_Gender,H_CivilStatus,
			H_Cityzenship,H_Occupation,H_Profile_image)

				VALUES(:H_id,:H_Fname,:H_Mname,:H_Lname,:H_Age,:H_Religion,:H_DBirth,:H_PBirth,:H_Gender,:H_CivilStatus,:H_Cityzenship,:H_Occupation,:H_Profile_image)";


				$prepare = $pdo->prepare($insertData);
				$prepare->execute(
								 ['H_id'=>$newID,'H_Fname'=>$FirstName,'H_Mname'=>$MiddleName,'H_Lname'=>$LastName,'H_Age'=>$Age,'H_Religion'=>$Religion,'H_DBirth'=>$DateBirth,'H_PBirth'=>$PlaceBirth,'H_Gender'=>$Gender,'H_CivilStatus'=> $Civil_Status,'H_Cityzenship'=>$Cityzenship,'H_Occupation'=>$Occupation,'H_Profile_image'=>$Image]
							);
		

				if($prepare){

				
					$residenAdd = "INSERT INTO resident_address(House_number,Street_name,Purok_number,H_id)
					VALUES(:House_number,:Street_name,:Purok_number,:H_id)";

					$insert = $pdo->prepare($residenAdd);
					$insert->execute(['House_number'=>$House_number,'Street_name'=> $StreetName,'Purok_number'=>$Purok_number,'H_id'=>$newID]);

					if($insert){
						echo "The House Hold Person is Successfully Register";
					}
					else{
						echo "Not Register";
					}

				}
				else{
					echo "Not Register";
				}



 		}


 	}
 	else{
 		$image = $_POST['Image_id'];

 		$sql = "SELECT * FROM all_image WHERE image_id = '$image'";

 		$prepare2 = $pdo->prepare($sql);
		$prepare2->execute();

		$newData3 = $prepare2->fetchAll();

		foreach ($newData3 as $row) {

			echo $row['image_name'];

		}


 	}
  	

 ?>

 

