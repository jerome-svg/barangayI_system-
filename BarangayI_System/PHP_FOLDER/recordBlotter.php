<?php



	include('DBconnection.php');

	$data = file_get_contents('php://input');

	$newData = json_decode($data);


 	 $Complanant = $newData->Complanant;
     $complained = $newData->complained;
     $Date_of_Filing = $newData->Date_of_Filing;			
     $PersonIncharge = $newData->PersonIncharge;		
     $Status = $newData->Status;		
     $Description = $newData->Description;


     $sql1 = "SELECT * FROM blotter
			 WHERE 	Complanant = '$Complanant' AND complained = '$complained'";


		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		$newData1 = $prepare1->rowCount();


		function getData($number){
			if($number > 0){
				throw new Exception(" Complanant and complained person is already in process");
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
		$sql2 = "SELECT * FROM blotter ORDER BY Case_blotter_no ASC";

		$prepare2 = $pdo->prepare($sql2);
		$prepare2->execute();

		$newData2 = $prepare2->rowCount();
		$newData3 = $prepare2->fetchAll();

		$x =  $newData2 - 1;
	
		for($y = 0; $y <= $x; $y++){

			$Costome = $newData3[$y]['Case_blotter_no'];

		}
		if(isset($Costome) == ""){
			$newID = "B-001";

			$DataBlotter = "INSERT INTO blotter(Case_blotter_no,Complanant,Complained,DateofFiling,PersonIncharge,Status,Description)
				VALUES(:Case_blotter_no,:Complanant,:Complained,:DateofFiling,:PersonIncharge,:Status,:Description)";

			$insert = $pdo->prepare($DataBlotter);
			$insert->execute(['Case_blotter_no'=>$newID,'Complanant'=>$Complanant,'Complained'=>$complained,'DateofFiling'=>$Date_of_Filing,'PersonIncharge'=>$PersonIncharge,'Status'=>$Status,'Description'=>$Description]);



			if($insert){
				echo "The Blotter is Saccessfully Save";
			}
			else{
				echo "You have an error! The Data is not Save";
			}

		}
		else{

			$newID = substr($Costome, 4);
			$newID = intval($newID);
			$newID = "B-00" . ($newID + 1);

			$DataBlotter = "INSERT INTO blotter(Case_blotter_no,Complanant,Complained,DateofFiling,PersonIncharge,Status,Description)
				VALUES(:Case_blotter_no,:Complanant,:Complained,:DateofFiling,:PersonIncharge,:Status,:Description)";

			$insert = $pdo->prepare($DataBlotter);
			$insert->execute(['Case_blotter_no'=>$newID,'Complanant'=>$Complanant,'Complained'=>$complained,'DateofFiling'=>$Date_of_Filing,'PersonIncharge'=>$PersonIncharge,'Status'=>$Status,'Description'=>$Description]);



			if($insert){
				echo "The Blotter is Saccessfully Save";
			}
			else{
				echo "You have an error! The Data is not Save";
			}


		
		}

 ?>