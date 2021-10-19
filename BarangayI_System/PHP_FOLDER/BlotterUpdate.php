<?php 

	include('DBconnection.php');


	if(isset($_POST['blotter_data'])){


		$data = $_POST['blotter_data'];


		$sql = "UPDATE Blotter SET 	Status = 'CASE CLOSE' WHERE Case_blotter_no = '$data'";


		$prepare1 = $pdo->prepare($sql);
		$prepare1->execute();

		if($prepare1){
			echo "The status of blotter is Case Close";
		}
		else{
			echo "You have an Error";
		}


	}

 ?>