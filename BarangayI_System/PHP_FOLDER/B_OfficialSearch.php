<?php 

	include('DBconnection.php');

	if(isset($_POST['B_Official_name'])){

		$nameOff = $_POST['B_Official_name'];


		$house_Hold = "SELECT * FROM barangay_official WHERE Official_Fname LIKE '%{$nameOff}%'";

		$dataprepare = $pdo->prepare($house_Hold);
		$dataprepare->execute();

		$newData_image = $dataprepare->fetchAll(PDO::FETCH_ASSOC);


		$output1 = '
				<table>
					<tr>
							<th class="header_table">ID</th>
							<th class="header_table">First name</th>
							<th class="header_table">Middle name</th>
							<th class="header_table">Last name</th>
							<th class="header_table">Age</th>
							<th class="header_table">Date of birth</th>
							<th class="header_table">Official Term</th>
							<th class="header_table">Position</th>
							<th class="header_table">Sivil Status</th>
							<th class="header_table">View and Edit</th>
							<th class="header_table">Delete</th>
					</tr>
		';
		foreach ($newData_image as $row) {

				$output1 .= '
						<tr>
							<td class="data_table">'. $row["Official_Id"] .'</td>
							<td class="data_table">'. $row["Official_Fname"] .'</td>
							<td class="data_table">'. $row["Official_Mname"] .'</td>
							<td class="data_table">'. $row["Official_Lname"] .'</td>
							<td class="data_table">'. $row["Official_Age"] .'</td>
							<td class="data_table">'. $row["Official_DateBirth"] .'</td>
							<td class="data_table">'. $row["Official_Term"] .'</td>
							<td class="data_table">'. $row["Official_Position"] .'</td>
							<td class="data_table">'. $row["Official_Status"] .'</td>
							<td class="d_title">
								<button id='.$row["Official_Id"].' name='.$row["Official_Id"].' onclick="get_dataOffi(this.id);" class="btn_edit">View and Edit</button>
							</td>
							<td class="d_title">
								<a href="../PHP_FOLDER/Delete.php?
									Delete='.$row["Official_Id"].'" class="Delete_btn">Delete</a>
							</td>
						</tr>				
			';
		}
		$output1 .= '</table>';

		echo $output1;



	}
	else{

		$house_Hold = "SELECT * FROM barangay_official";

		$dataprepare = $pdo->prepare($house_Hold);
		$dataprepare->execute();

		$newData_image = $dataprepare->fetchAll(PDO::FETCH_ASSOC);


		$output1 = '
				<table>
					<tr>
							<th class="header_table">ID</th>
							<th class="header_table">First name</th>
							<th class="header_table">Middle name</th>
							<th class="header_table">Last name</th>
							<th class="header_table">Age</th>
							<th class="header_table">Date of birth</th>
							<th class="header_table">Official Term</th>
							<th class="header_table">Position</th>
							<th class="header_table">Sivil Status</th>
							<th class="header_table">View and Edit</th>
							<th class="header_table">Delete</th>
					</tr>
		';
		foreach ($newData_image as $row) {

				$output1 .= '
						<tr>
							<td class="data_table">'. $row["Official_Id"] .'</td>
							<td class="data_table">'. $row["Official_Fname"] .'</td>
							<td class="data_table">'. $row["Official_Mname"] .'</td>
							<td class="data_table">'. $row["Official_Lname"] .'</td>
							<td class="data_table">'. $row["Official_Age"] .'</td>
							<td class="data_table">'. $row["Official_DateBirth"] .'</td>
							<td class="data_table">'. $row["Official_Term"] .'</td>
							<td class="data_table">'. $row["Official_Position"] .'</td>
							<td class="data_table">'. $row["Official_Status"] .'</td>
							<td class="d_title">
								<button id='.$row["Official_Id"].' name='.$row["Official_Id"].' onclick="get_dataOffi(this.id);" class="btn_edit">View and Edit</button>
							</td>
							<td class="d_title">
								<a href="../PHP_FOLDER/Delete.php?
									Delete='.$row["Official_Id"].'" class="Delete_btn">Delete</a>
							</td>
						</tr>				
			';
		}
		$output1 .= '</table>';

		echo $output1;
	}
	
 ?>