<?php 

	include('DBconnection.php');

	if(isset($_GET['Delete'])){
		
		$IDHouseH = $_GET['Delete'];

		$sql1 = "DELETE FROM resident_address WHERE H_id = '$IDHouseH'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		if($prepare1){

			$sql2 = "DELETE FROM house_hold WHERE H_id = '$IDHouseH'";

			$prepare2 = $pdo->prepare($sql2);
			$prepare2->execute();
			if($prepare2){
				header("location: ../HTML_FOLDER/HouseHold_page.php?Delete Successfully");
			}
			else{
				echo "Not Deleted";
			}


		}
		else{
			echo "Not Deleted";
		}

	}
	else if(isset($_GET['DeleteOfficial'])){

		$IDOfficial = $_GET['DeleteOfficial'];

		$sql1 = "DELETE FROM barangay_official WHERE 	Official_Id = '$IDOfficial'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		if($prepare1){
			header("location: ../HTML_FOLDER/BarangayOfficial.php?Delete Successfully");
		}
		else{
			echo "Error";
		}
	

	}
	else if(isset($_POST['DELETE_DATA'])){

		echo $purok_num = $_POST['purok_num'];

		$sql1 = "DELETE FROM purok WHERE Purok_number = '$purok_num'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		if($prepare1){
			header("location: ../HTML_FOLDER/PurokPage.php?Delete Successfully");
		}
		else{
			echo "Error";
		}
	}
	else if(isset($_GET['DeleteBlotter'])){

		$blotter_R = $_GET['DeleteBlotter'];

		$sql1 = "DELETE FROM blotter WHERE Case_blotter_no = '$blotter_R'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		if($prepare1){
			header("location: ../HTML_FOLDER/BlotterPage.php?Delete Successfully");
		}
		else{
			echo "Error";
		}
	}
	else if(isset($_GET['DeleteVoters'])){

		$IDvoters = $_GET['DeleteVoters'];


		$sql1 = "DELETE FROM voters WHERE V_id = '$IDvoters'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		if($prepare1){
			header("location: ../HTML_FOLDER/Voters.php?Delete Successfully");
		}
		else{
			echo "Error";
		}

	}
	else if(isset($_GET['DeleteImage'])){

		$IDImage = $_GET['DeleteImage'];


		$sql1 = "DELETE FROM all_image WHERE image_id = '$IDImage'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		if($prepare1){
			header("location: ../HTML_FOLDER/FileLInk.php?Delete Successfully");
		}
		else{
			echo "Error";
		}



	}
	else{
		echo "Error";
	}

 ?>