<?php 

	include('DBconnection.php');

	if(isset($_POST['NewIDHousehold_search'])){

		$HHID = $_POST['NewIDHousehold_search'];
		$texsearch =  $_POST['TexSearch'];

		if(empty($texsearch)){

					$sql1 = "SELECT * FROM All_image";

					$prepare1 = $pdo->prepare($sql1);
					$prepare1->execute();
					$newData3 = $prepare1->fetchAll();

					foreach ($newData3 as $row) {
						// print_r($row['image_name']);
						// print_r($row['image_onwerFullname']);

						echo "<div class='box_imageP'>
								<div class='image_box_holder'>
								<img src='../HTML_FOLDER/Image_profile/".$row['image_name']."' class='img_picture'>
								</div>
								<div class='image_box_holder'>
									<div class='OnwrName'><label class='text_label'>".$row['image_onwerFullname']."</label></div>
									<div class='OnwrName'>
										<a href='Search_IMAGE_newUPDATE.php?ImageID=".$row['image_id'].",".$HHID."' class='btn_setProfile'>SET PROFILE</a>
									</div>
								</div>
							  </div>";

					}
		}
		else if($texsearch){

			$sql1 = "SELECT * FROM All_image WHERE image_onwerFullname LIKE '%{$texsearch}%'";

					$prepare1 = $pdo->prepare($sql1);
					$prepare1->execute();
					$newData3 = $prepare1->fetchAll(PDO::FETCH_ASSOC);

					foreach ($newData3 as $row) {
						// print_r($row['image_name']);
						// print_r($row['image_onwerFullname']);

						echo "<div class='box_imageP'>
								<div class='image_box_holder'>
								<img src='../HTML_FOLDER/Image_profile/".$row['image_name']."' class='img_picture'>
								</div>
								<div class='image_box_holder'>
									<div class='OnwrName'><label class='text_label'>".$row['image_onwerFullname']."</label></div>
									<div class='OnwrName'>
										<a href='Search_IMAGE_newUPDATE.php?ImageID=".$row['image_id'].",".$HHID."' class='btn_setProfile'>SET PROFILE</a>
									</div>
								</div>
							  </div>";

					}
		}


	}
	else{
		echo "Error";
	}



 ?>
