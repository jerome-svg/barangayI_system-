<?php 

	include('DBconnection.php');


	if(isset($_POST['blotter_data_Search'])){

		echo "<br>";

		$BlotterName = $_POST['blotter_data_Search'];
		
		$house_Hold = "SELECT * FROM blotter WHERE 	Complanant LIKE '%{$BlotterName}%'";

						$dataprepare = $pdo->prepare($house_Hold);
						$dataprepare->execute();

						$newData_image = $dataprepare->fetchAll(PDO::FETCH_ASSOC);





						$output1 = '
										<table>
											<tr>
												<th class="h_title">Case Number</th>
												<th class="h_title">Complanant</th>
												<th class="h_title">Complained</th>
												<th class="h_title">Date of Filing</th>
												<th class="h_title">Person Incharge</th>
												<th class="h_title">Status</th>
												<th class="h_title">View</th>
												<th class="h_title">Delete</th>
											</tr>
								';
								foreach ($newData_image as $row) {

									$output1 .= '<tr>
													<td class="d_title">'.$row["Case_blotter_no"].'</td>
													<td class="d_title">'.$row["Complanant"].'</td>
													<td class="d_title">'.$row["Complained"].'</td>
													<td class="d_title">'.$row["DateofFiling"].'</td>
													<td class="d_title">'.$row["PersonIncharge"].'</td>
													<td class="d_title">'.$row["Status"].'</td>
													<td class="d_title">
														<a href="?ID='.$row["Case_blotter_no"].'#boxID_botterDescription" class="View_blotter">View</a>
													</td>
													<td class="d_title">
														<a href="../PHP_FOLDER/Delete.php?
														DeleteBlotter='.$row["Case_blotter_no"].'" class="Delete_btn">Delete</a>
													</td>
												</tr>								
									';
								}
								$output1 .= '</table>';

								echo $output1;

	}
	else{

		$house_Hold = "SELECT * FROM blotter";

		$dataprepare = $pdo->prepare($house_Hold);
		$dataprepare->execute();

		$newData_image = $dataprepare->fetchAll(PDO::FETCH_ASSOC);





		$output1 = '
		<table>
				<tr>
					<th class="h_title">Case Number</th>
					<th class="h_title">Complanant</th>
					<th class="h_title">Complained</th>
					<th class="h_title">Date of Filing</th>
					<th class="h_title">Person Incharge</th>
					<th class="h_title">Status</th>
					<th class="h_title">View</th>
					<th class="h_title">Delete</th>
				</tr>
	';
		foreach ($newData_image as $row) {

			$output1 .= '<tr>
							<td class="d_title">'.$row["Case_blotter_no"].'</td>
							<td class="d_title">'.$row["Complanant"].'</td>
							<td class="d_title">'.$row["Complained"].'</td>
							<td class="d_title">'.$row["DateofFiling"].'</td>
							<td class="d_title">'.$row["PersonIncharge"].'</td>
							<td class="d_title">'.$row["Status"].'</td>
							<td class="d_title">
								<a href="?ID='.$row["Case_blotter_no"].'#boxID_botterDescription" class="View_blotter">View</a>
							</td>
							<td class="d_title">
								<a href="../PHP_FOLDER/Delete.php?
														DeleteBlotter='.$row["Case_blotter_no"].'" class="Delete_btn">Delete</a>
							</td>
						</tr>								
			';
		}
		$output1 .= '</table>';

		echo $output1;

	}



 ?>