<?php 


	include('DBconnection.php');

	$data = file_get_contents('php://input');

	$newData = json_decode($data);

	$FirstName = $newData->FirstName; 
   	$MiddleName = $newData->MiddleName;
    $LastName = $newData->LastName;	
    $Voters_type = $newData->Voters_type;		

    $sql1 = "SELECT * FROM voters
			 WHERE V_Fname = '$FirstName' AND V_Mname = '$MiddleName' AND V_Lname = '$LastName' AND V_Type = '$Voters_type'";

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
		$sql2 = "SELECT * FROM voters ORDER BY V_id ASC";

		$prepare2 = $pdo->prepare($sql2);
		$prepare2->execute();

		$newData2 = $prepare2->rowCount();
		$newData3 = $prepare2->fetchAll();

	
		$x =  $newData2 - 1;
	
		for($y = 0; $y <= $x; $y++){

			$Costome = $newData3[$y]['V_id'];

		}
		if(isset($Costome) == ""){
			$newID = "VT-001";

			$insertData = "INSERT INTO voters(V_id,V_Fname,V_Mname,V_Lname,V_Type)
				VALUES(:V_id,:V_Fname,:V_Mname,:V_Lname,:V_Type)";

				$prepare = $pdo->prepare($insertData);
				$prepare->execute(['V_id'=>$newID,'V_Fname'=>$FirstName,'V_Mname'=>$MiddleName,'V_Lname'=> $LastName,'V_Type'=>$Voters_type]);

				if($insertData){
					echo "The Voters Person is Successfully Register";
				}
				else{
					echo "Not Register";
				}
		


		}
		else{

			$newID = substr($Costome, 5);
			$newID = intval($newID);
			$newID = "VT-00" . ($newID + 1);

			$insertData = "INSERT INTO voters(V_id,V_Fname,V_Mname,V_Lname,V_Type)
				VALUES(:V_id,:V_Fname,:V_Mname,:V_Lname,:V_Type)";

				$prepare = $pdo->prepare($insertData);
				$prepare->execute(['V_id'=>$newID,'V_Fname'=>$FirstName,'V_Mname'=>$MiddleName,'V_Lname'=> $LastName,'V_Type'=>$Voters_type]);

				if($insertData){
					echo "The Voters Person is Successfully Register";
				}
				else{
					echo "Not Register";
				}
		


		}



 ?>