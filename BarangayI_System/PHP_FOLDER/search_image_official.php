<?php 

	include('DBconnection.php');

	
	if(isset($_POST['Image_name'])){

		$imagename = $_POST['Image_name'];

		$sql1 = "SELECT * FROM All_image WHERE image_onwerFullname = '$imagename'";

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
							<td>
								<button id='.$row["image_id"].' name='.$row["image_id"].' onclick="getData_image(this.id);" class="btn_setP">Set Profile</button>
							</td>
						</tr>';
								}
								$output .= '</table>';

								echo $output;
	}


 ?>
