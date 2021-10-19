<?php 

	
	include('DBconnection.php');


	if(isset($_GET['ImageID'])){


		$HHID = $_GET['ImageID'];

 		$ImageID_HouseHoldID = explode(",", $HHID);

 		$ImageID = $ImageID_HouseHoldID[0];
 		$HouseHoldID = $ImageID_HouseHoldID[1];

 		$newID = substr($HouseHoldID, 4, 1);


 		if($newID == "0"){
 			
 				$sql1 = "SELECT * FROM All_image WHERE image_id = '$ImageID'";

				$prepare1 = $pdo->prepare($sql1);
				$prepare1->execute();
				$newData3 = $prepare1->fetchAll(PDO::FETCH_ASSOC);

				$Image = $newData3[0]['image_name'];

				$sql2 = "UPDATE house_hold 
				SET H_Profile_image = '$Image' WHERE H_id = '$HouseHoldID'";

				$prepare2 = $pdo->prepare($sql2);
				$prepare2->execute();

				if($prepare2){
					echo "<script>alert('The house hold profile is Successfully update')</script>";
				 	header("Refresh: 1; url=../HTML_FOLDER/HouseHold_page.php");
					}
				else{
						echo "Error";
				}
 		}
 		else if($newID == "F") {

 				$sql1 = "SELECT * FROM All_image WHERE image_id = '$ImageID'";

				$prepare1 = $pdo->prepare($sql1);
				$prepare1->execute();
				$newData3 = $prepare1->fetchAll(PDO::FETCH_ASSOC);

				$Image = $newData3[0]['image_name'];

				$sql2 = "UPDATE barangay_official 
				SET Official_Profile = '$Image' WHERE Official_Id = '$HouseHoldID'";

				$prepare2 = $pdo->prepare($sql2);
				$prepare2->execute();

				if($prepare2){
					echo "<script>alert('The house hold profile is Successfully update')</script>";
				 	header("Refresh: 1; url=../HTML_FOLDER/BarangayOfficial.php");
					}
				else{
						echo "Error";
				}
 		}
		
	}
	else{
		echo "error";
	}




 ?>