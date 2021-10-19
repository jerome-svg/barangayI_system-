<?php 

	include('DBconnection.php');

	
	if(isset($_POST['Image_name'])){

		$imagename = $_POST['Image_name'];

		$sql1 = "SELECT * FROM All_image WHERE image_onwerFullname  LIKE '%{$imagename}%'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		$newData3 = $prepare1->fetchAll();
		echo "<br>";
		echo "<br>";

		$output = '
				<table class="second_table">
					<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>';
				foreach ($newData3 as $row) {

						$output .= '
						<tr>
							<td><img src="Image_profile/'.$row['image_name'].'" class="all_image"></td>
							<td>'. $row['image_onwerFullname'].'</td>
							<td><button id='.$row["image_id"].' name='.$row["image_id"].' onclick="getData(this.id);" class="btn_setP">Set Profile</button></td>
						</tr>';
								}
								$output .= '</table>';

								echo $output;
	}
	else if(isset($_POST['Image_nameData'])){


		$imageName = $_POST['Image_nameData'];

		$sql = "SELECT * FROM all_image WHERE image_onwerFullname LIKE '%{$imageName}%'";



		$prepare = $pdo->prepare($sql);
		$prepare->execute();
						
		$newData1 = $prepare->fetchAll();

		$output = '
				<table>
					<tr>
						<th>IMAGE</th>
						<th>IMAGE OWNER</th>
						<th>SET PROFILE</th>
					</tr>
		';
		foreach ($newData1 as $row) {

			$image_add = $row['image_name'];

			$output .= '
					<tr>
						<td><img src="Image_profile/'.$row['image_name'].'" class="all_image"></td>
						<td>'. $row['image_onwerFullname'].'</td>
						<td>
							<a href="../PHP_FOLDER/Delete.php?
														DeleteImage='.$row["image_id"].'" class="Delete_btn">DELETE</a>
						</td>
					</tr>
			';
		}
		$output .= '</table>';

		echo $output;


	}


 ?>
