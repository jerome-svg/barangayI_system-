<?php 
	include('../PHP_FOLDER/DBconnection.php');

	$sql2 = "SELECT * FROM purok";

	$prepare2 = $pdo->prepare($sql2);
	$prepare2->execute();

	$newData3 = $prepare2->fetchAll(PDO::FETCH_ASSOC);

	$output = '<table class="table_purok">
					<tr>
						<th>PUROK NUMBER</th>
						<th>PUROK NAME</th>
						<th>VIEW POPULATION</th>
						<th>VIEW EDIT</th>
						<th>DELETE</th>
					</tr>
		';
		foreach ($newData3 as $row){
			$output .= '
						<tr>
							<td>'.$row["Purok_number"].'</td>
							<td>'.$row["Purok_name"].'</td>
							<td>
								<a href="?ID='.$row["Purok_number"].'#population_box_PUROK_Mode" class="data_puputationP">PUROK POPULATION</a>
							</td>
							<td>
								<button class="ViewEdit_Purok" id='.$row["Purok_number"].' name='.$row["Purok_number"].' onclick="get_dataPurok(this.id);">View and Edit</button>
							</td>
							<td>
								<a href="?ID='.$row["Purok_number"].'#Open_Purok_DELETE_message" class="Delete_Purok">Delete</a>
							</td>
						</tr>
				';
		}
		$output .= '</table>';

		echo $output;



?>