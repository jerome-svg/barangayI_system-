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
	<title>Barangay Official Page</title>
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
					<label class="Button"  id="House_HoldPage">Hous Hold</label>
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
						<a href="../HTML_FOLDER/AdminProfile.php" style="text-decoration: none;"><p class="link_1">Admin Profile</p></a>
						<a href="../PHP_FOLDER/Logout.php" style="text-decoration: none;"><p class="link_1">Logout</p></a>
					</div>
				</div>
			</div>	
	</div>
	<div class="content_new_BRG_Official">
		<div class="content_box_Official"></div>
		<div class="content_box_Official">
			<div class="box_official-child">
				<button class="btn_Official_search"><img src="../images/searchIcon.png" class="icon_Official_search" onclick="Search_Official();"></button>
				<input type="text" name="Search_Official" 
				class="txt_Official_search" placeholder="Search Barangay Official first name"
				 id="search_official">
				&nbsp;&nbsp;
				<button class="Register_Official_btn"><a href="#open_registration" class="label_modal">Register Barangay Official</a></button>
			</div>
			<div class="box_official-child"></div>
		</div>
		<div class="registration_official" id="open_registration">
			<div class="registrationform_official">
				<div class="header_Official">
					<div class="header_child">
						<label class="LabelRegister_Offi" id="Data_remark">Regirster the Official</label>
					</div>
					<div class="header_child">
						<div class="cancel_btn"><a href="#" class="cancel_X"><label>&times;</label></div></a>
					</div>
				</div>
				<form class="content_Official">
					<div class="box_input_holder">
						<div class="child_box_Official">
							<div class="child_Profile_box_Off">
								<div class="child_image_officail_profile" id="image_pic"></div>
								<div class="child_image_officail_profile">
									<label class="text_label_btn">
										<a href="#imagepicker_Official_mod" 
										class="link_image_offi">Choose Profile picture</a>
									</label>
									<input type="hidden" name="Official_data" placeholder="Image" id="Image_transfer" required>
								</div>
							</div>
						</div>
						<div class="child_box_Official">
							<br>
							<br>
							<br>
							<input type="text" name="Official_data" placeholder="First name" 
							class='text_label_Officail' required><br><br>
							<input type="text" name="Official_data" placeholder="Middle name" 
							class='text_label_Officail' required><br><br>
							<input type="text" name="Official_data" placeholder="Last name" 
							class='text_label_Officail' required><br><br>
							<input type="number" name="Official_data" placeholder="Age" 
							class='text_label_Officail' required><br><br>

						</div>
					</div>
					<div class="box_input_holder">
						<label class="LabelRegister_Offi">Data of Birth: </label>&nbsp;&nbsp;
						<input type="date" name="Official_data" placeholder="Date of birth"
						class='text_label_Officail_new' required><br><br>
						<label class="LabelRegister_Offi">Official term: </label>&nbsp;&nbsp;
						<input type="text" name="Official_data" placeholder="Official term" 
						class='text_label_Officail_new' required><br><br>
						<input type="text" name="Official_data" placeholder="Position" 
						class='text_label_Officail'required><br><br>
						<input type="text" name="Official_data" placeholder="Official Civil Status"
						class='text_label_Officail' required>
						<br><br><br>
						<input type="submit" class="submit_btn_Official" id="Save_Official_record">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset" name="Sancel" value="Resset" class="cancel_btn_Official">	
					</div>
				</form>
			</div>
		</div>
		<div class="image_picker_Official" id="imagepicker_Official_mod">
			<div class="Allimage_box_official">
				<div class="child_box_image">
						<div class="header_style"><label class="image_headtext1" id="Message">Image Record</label></div>
						<div class="header_style"><a href="#open_registration" class="cancel_boxImage">&times;</a></div>
					</div>
					<div class="child_box_image">
						<div class="Image_scroll">
							<input type="submit" value="Search" class="Search_btn1" id="search_image1">
							<input type="text" id="btn_text"placeholder="The full name of the image owner" class="Search_image">
							 <div id="Image_Box_search"></div>
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
												<td><button id='.$row["image_id"].' name='.$row["image_id"].' onclick="getData_image(this.id);" class="btn_setP">Set Profile</button></td>
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
		<div class="content_official_allRecord">
			<div class="contaner_official">
				<div class="header_child_Official">
					<label class="recordOFF">BARANGAY OFFICIAL RECORD</label>
				</div>
				<div class="content_child_Official" id="responseRecord_text">
					<?php 

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
														DeleteOfficial='.$row["Official_Id"].'" class="Delete_btn">Delete</a>
													</td>
											</tr>				
									';
								}
								$output1 .= '</table>';

								echo $output1;

					 ?>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../JAVAS_FOLDER/OfficialLink.js"></script>
</body>
</html>
<style type="text/css">
	a{
		text-decoration: none;
	}
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
  			font-size: 1.42vw;
  			color: #555;

		}
		th{
			background: #A9ACB7;
			color: #fff;
		}

		.all_image{
			width: 100px;
			height: 100px;
			border: solid 2px #555;
			border-radius: 5px;
			position: relative;
			top: 4px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}
		.btn_setP{
			border: none;
			height: 32px;
			width: 50%;
			letter-spacing: 2px;
  			font-size: 1.12vw;
  			background: #A9ACB7;
  			color: #fff;
  			cursor: pointer;
  			border-radius: 5px;
			font-family: "Palatino Linotype";
			transition: 100ms linear;
			outline: none;
		}
		.header_table{
			font-size: 1.03vw;
		}
		.data_table{
			font-size: 1.03vw;
		}
		.btn_edit{
			border: none;
			width: 100%;
			background: #ffc300b8;
			color: #111;
			height: 5vh;
			font-family: "Palatino Linotype";
			font-size: 1.02vw;
			letter-spacing: 2px;
			outline: none;
			border-radius: 5px;
			cursor: pointer;
			box-shadow: 0 4px 8px 0 rgba(0, 50, 0, 0.2), 0 6px 20px 0 rgba(0, 50, 0, 0.19);
		}
		.Delete_btn{
			font-family: "Palatino Linotype";
			font-size: 1.02vw;
			letter-spacing: 2px;
			background: #f26161;
			padding: 13%;
			color: #fff;
			border-radius: 5px;
			box-shadow: 0 4px 8px 0 rgba(0, 50, 0, 0.2), 0 6px 20px 0 rgba(0, 50, 0, 0.19);
		}
		.recordOFF{
			font-family: "Palatino Linotype";
			font-size: 1.22vw;
			letter-spacing: 2px;
			margin: auto;
		}
</style>