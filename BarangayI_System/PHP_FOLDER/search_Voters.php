<?php 

	include('DBconnection.php');


	if(isset($_POST['DataVoters_DATA'])){

		$TEXTDATA = $_POST['DataVoters_DATA'];

		$sql = "SELECT * FROM voters WHERE V_Fname LIKE '%{$TEXTDATA}%'";

		$prepare2 = $pdo->prepare($sql);
		$prepare2->execute();

		$newData3 = $prepare2->fetchAll(PDO::FETCH_ASSOC);

		$output = '<table class="table_purok">
						<tr>
							<th>ID</th>
							<th>FIRST NAME</th>
							<th>MIDDLE NAME</th>
							<th>LAST NAME</th>
							<th>VOTERS TYPE</th>
							<th>EDIT</th>
							<th>DELETE</th>
						</tr>
			';
		foreach ($newData3 as $row){
			$output .= '
						<tr>
							<td>'.$row["V_id"].'</td>
							<td>'.$row["V_Fname"].'</td>
							<td>'.$row["V_Mname"].'</td>
							<td>'.$row["V_Lname"].'</td>
							<td>'.$row["V_Type"].'</td>
							<td>
								<button class="ViewEdit_V" id='.$row["V_id"].' name='.$row["V_id"].' onclick="get_dataVoters(this.id);">EDIT</button>
							</td>
							<td>
								<a href="../PHP_FOLDER/Delete.php?
														DeleteVoters='.$row["V_id"].'"  class="Delete_V">DELETE</a>
							</td>
						</tr>
				';
		}
		$output .= '</table>';

		echo $output;		

	}
	else{

	}
 ?>
 <script type="text/javascript" src="../JAVAS_FOLDER/Voters.js"></script>