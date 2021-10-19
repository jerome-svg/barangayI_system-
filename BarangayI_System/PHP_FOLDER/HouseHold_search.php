<?php 


	include('DBconnection.php');

	if(isset($_POST['HouseHold'])){
		
		$userHouse_hold = $_POST['HouseHold'];

		$house_Hold = "SELECT * FROM house_hold WHERE H_Fname LIKE '%{$userHouse_hold}%'";

						$dataprepare = $pdo->prepare($house_Hold);
						$dataprepare->execute();

						$newData_image = $dataprepare->fetchAll(PDO::FETCH_ASSOC);

						$output = '
										<table>
											<tr>
												<th class="h_title">HouseHold Id</th>
												<th class="h_title">First Name</th>
												<th class="h_title">Middle Name</th>
												<th class="h_title">Last Name</th>
												<th class="h_title">Age</th>
												<th class="h_title">Date of Birth</th>
												<th class="h_title">Gender</th>
												<th class="h_title">Civil Status</th>
												<th class="h_title">View and edit</th>
												<th class="h_title">Delete</th>
											</tr>
								';
								foreach ($newData_image as $row) {

									$output .= '<tr>
													<td class="d_title">'.$row["H_id"].'</td>
													<td class="d_title">'.$row["H_Fname"].'</td>
													<td class="d_title">'.$row["H_Mname"].'</td>
													<td class="d_title">'.$row["H_Lname"].'</td>
													<td class="d_title">'.$row["H_Age"].'</td>
													<td class="d_title">'.$row["H_DBirth"].'</td>
													<td class="d_title">'.$row["H_Gender"].'</td>
													<td class="d_title">'.$row["H_CivilStatus"].'</td>
													<td class="d_title">
														<button id='.$row["H_id"].' name='.$row["H_id"].' onclick="get_dataHouseHold(this.id);" class="btn_edit">View and Edit</button>
													</td>
													<td class="d_title">
														<a href="../PHP_FOLDER/Delete.php?
														Delete='.$row["H_id"].'" class="Delete_btn">Delete</a>
													</td>
												</tr>								
									';
								}
								$output .= '</table>';

								echo $output;

	}else{

		$house_Hold = "SELECT * FROM house_hold";

						$dataprepare = $pdo->prepare($house_Hold);
						$dataprepare->execute();

						$newData_image = $dataprepare->fetchAll(PDO::FETCH_ASSOC);

						$output = '
										<table>
											<tr>
												<th class="h_title">HouseHold Id</th>
												<th class="h_title">First Name</th>
												<th class="h_title">Middle Name</th>
												<th class="h_title">Last Name</th>
												<th class="h_title">Age</th>
												<th class="h_title">Date of Birth</th>
												<th class="h_title">Gender</th>
												<th class="h_title">Civil Status</th>
												<th class="h_title">View and edit</th>
												<th class="h_title">Delete</th>
											</tr>
								';
								foreach ($newData_image as $row) {

									$output .= '<tr>
													<td class="d_title">'.$row["H_id"].'</td>
													<td class="d_title">'.$row["H_Fname"].'</td>
													<td class="d_title">'.$row["H_Mname"].'</td>
													<td class="d_title">'.$row["H_Lname"].'</td>
													<td class="d_title">'.$row["H_Age"].'</td>
													<td class="d_title">'.$row["H_DBirth"].'</td>
													<td class="d_title">'.$row["H_Gender"].'</td>
													<td class="d_title">'.$row["H_CivilStatus"].'</td>
													<td class="d_title">
														<button id='.$row["H_id"].' name='.$row["H_id"].' onclick="get_dataHouseHold(this.id);" class="btn_edit">View and Edit</button>
													</td>
													<td class="d_title">
														<a href="../PHP_FOLDER/Delete.php?
														Delete='.$row["H_id"].'" class="Delete_btn">Delete</a>
													</td>
												</tr>								
									';
								}
								$output .= '</table>';

								echo $output;
	}


 ?>