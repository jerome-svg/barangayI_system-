<?php 
	include('../PHP_FOLDER/DBconnection.php');

	session_start();

	if(isset($_SESSION['admin_id'])){
		// This is the code to adentify the user
	}
	else{
		header("location: ../HTML_FOLDER/BarangayInformationLoginPage.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Barangay Information System/House</title>
	<meta charset="utf-8">
	<meta name="description" content="The Barangay Information System">
	<meta name="keywords" content="Barangay Information System">
	<meta name="author" content="Jerome L. Valdez">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../Images/BRGlogo.png" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="../CSS_FOLDER/Style2.css">
</head>
<body>
	<div class="main">
		<!--This is the heading Boxe from main---------------------------------------------------------->
		<div class="header">
			<div class="logo">
				<img src="../Images/BRGlogo.png">
				<labe class="logo_text">BARANGAY INFORMATION SYSTEM</label>
			</div>
			<div class="LabelLogo1"></div>
			<div class="LabelLogo2">
				<div class="child_labelLogo">
					<label class="Button" id="House_HoldPage">Hous Hold</label>
					<div class="content">
					</div>
				</div>
				<div class="child_labelLogo">
					<label class="Button" id="BarangayOfficialPage">Barangay Official</label>
					<div class="content1">
						<p class="link_1" id="Filepage">Files</p>
						<p class="link_1" id="PorokPage">Pukor</p>
						<p class="link_1" id="BlotterPage">Blotter</p>
						<p class="link_1" id="VotersPage">Voters</p>
					</div>
				</div>
				<div class="child_labelLogo">
					<label class="Button_home" id="HomePage">Home</label>
					<div class="content1">
					</div>
				</div>
			</div>
			<div class="FileBarangay_content">
				<div class="FileBarangay_content_child">
					<div class="FileBarangay_content_sun">
						<div class="child_File">
							<label class="content_File">
								<br>
								Click the button bellow to Generate Barangay Clearace
							</label><br><br>
							<a href="#Open_Clearans_file_Generator" class="Generate_btn">BUTTON</a>
						</div>
					</div>
					<div class="FileBarangay_content_sun">
						<div class="child_File">
							<label class="content_File">
								 <br>
								Click the button Bellow to Generate Barangay Indigency
							</label><br><br>
							<a href="#Indigency_file_box_modal_ID" class="Generate_btn">BUTTON</a>
						</div>
					</div>
				</div>
				<div class="FileBarangay_content_child">
					<div class="Image_Deleter_box">
						<div class="Image_Deleter_box_child">
							<br>
							<input type="submit" value="SEARCH" class="Search_FILE_IMAGEDEL" onclick="Get_Data_SearchIMage();">
							<input type="text" placeholder="Search the Full name of Image Owner" class="SearchInput_FILE_IMAGEDEL" id="Data_search_iMage">
						</div>
						<div class="Image_Deleter_box_child" id="Image_responce">
							<?php 

								$sql = "SELECT * FROM all_image";



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

							 ?>
						</div>
					</div>
				</div>
			</div>
			<div class="Box_modal_FileClearans" id="Open_Clearans_file_Generator">
				<div class="box_Generate_FILE_CLEARANCE">
					<div class="box_Generate_FILE_CLEARANCE_child">
						<a href="#" class="X_btn_File">&times;</a>
					</div>
					<form class="box_Generate_FILE_CLEARANCE_child" method="post" action="../PHP_FOLDER/GeneratorFilePDF.php">
						<br>
						<input type="text" name="Data_Fullname" placeholder="Full Name" required class="Data_file"><br><br>
						<input type="text" name="Data_Address" placeholder="Address"  required class="Data_file"><br><br>
						<input type="text" name="Data_Dbirth" placeholder="Data of Birth" required class="Data_file"><br><br>
						<input type="text" name="Data_Height" placeholder="Height" required class="Data_file1">&nbsp;&nbsp;&nbsp;
						<input type="text" name="Data_Weight" placeholder="Weight" required class="Data_file1"><br><br>
						<input type="text" name="Data_Purpose" placeholder="Purpose" required class="Data_file"><br><br>
						<input type="text" name="Data_PlaceOfbirth" placeholder="Place of Birth" required class="Data_file"><br><br>
						<input type="text" name="Data_CivilStatus" placeholder="Civil Status" required class="Data_file"><br><br>
						<input type="text" name="Data_Data_issued" placeholder="Date issued" required class="Data_file"><br><br>
						<input type="submit" name="Generate" value="SUBMIT" class="btn_File_GEn">&nbsp;&nbsp;&nbsp;
						<input type="reset" name="resset" value="RESET"  class="btn_File_Cancel">
					</form>
				</div>
			</div>
			<div class="Indigency_file_box_modal" id="Indigency_file_box_modal_ID">
				<form class="box_Indigency_record" method="post" action="../PHP_FOLDER/IndigencyFile.php">
					<div class="box_Generate_FILE_Indigency_child">
						<a href="#" class="X_btn_File">&times;</a>
					</div>
					<div class="box_Generate_FILE_Indigency_child">
						<br>
						<br>
						<input type="text" name="Data_Fullname" placeholder="Full Name" required class="Data_Indigency"><br><br>
						<input type="text" name="Data_Data_issued" placeholder="Date issued" required class="Data_Indigency"><br><br>
						<input type="text" name="Data_Data_Purok" placeholder="Purok" required class="Data_Indigency"><br><br><br>
						<input type="submit" name="Generate" value="SUBMIT" class="btn_File_GEn_IC">&nbsp;&nbsp;&nbsp;
						<input type="reset" name="resset" value="RESET"  class="btn_File_Cancel_IC">
					</div>
				</form>
			</div>
	</div>
</body>
</html>
<script type="text/javascript" src="../JAVAS_FOLDER/FileBRGSystem.js"></script>

<style type="text/css">
	table {
  			border-collapse: collapse;
  			width: 100%;

		}

		th, td {
  			padding: 8px;
  			text-align: left;
  			border-bottom: 1px solid #ddd;
  			text-align: center;
  			font-family: "Palatino Linotype";
  			letter-spacing: 2px;
  			font-size: 1.12vw;
  			color: #555;

		}
		.all_image{
			width:  90px;
			height: 90px;
			border: solid 2px #555;
			border-radius: 5px;
			position: relative;
			top: 4px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}
		.Delete_btn{
			padding: 5%;
			background: #d75858;
		 	text-decoration: none;
		 	font-family: "Palatino Linotype";
  			letter-spacing: 2px;
  			color: #fff;
  			font-size: 1.12vw;
  			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  			border-radius: 5px;
		}
</style>