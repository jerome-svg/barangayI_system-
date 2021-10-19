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
						<a href="../HTML_FOLDER/AdminProfile.php" style="text-decoration: none;"><p class="link_1">Admin Profile</p></a>
						<a href="../PHP_FOLDER/Logout.php" style="text-decoration: none;"><p class="link_1">Logout</p></a>
					</div>
				</div>
			</div>
			<!--This is the  Body  Box from main---------------------------------------------------------->
			<div class="body_contaner1">
				<div class="from_Box">
					<div class="content_contaner1">
						<div class="content_contaner1Child">
							<input type="text" class="Input_Search" placeholder="Search the first name of house hold want to see" id="Search_houseHold_text">
							<button class="Search_btn" id="Search_houseHold_btn"><img src="../Images/searchIcon.png" class="IconSearch"></button>
							
						</div>
					</div>
					<div class="content_contaner2">
						<label id="BG"
							 class="text_content">Click the Button below to Register a new House Hold to Barangay
						</label>
					</div>
					<div class="content_contaner3">
						<a href="#Modal_Open" class="add_HouseHold">
							<label class="text_housHold">Add New House Hold</label>
						</a>
					</div>
				</div>
			</div>
			<div  id="Modal_Open"class="modal_Bg">
				<div class="modal_box">
					<div class="header_modal">
						<div class="Mheader_child"></div>
						<div class="Mheader_child"><label class="text_content_H" id="Data_remark">House Hold Registration</label></div>
						<div class="Mheader_child">
							<div class="cancel_btn"><a href="#" class="link_X">&times;</a></div>
						</div>
					</div>
					<form class="content_modal" id="Myform">
						<div class="content_child">
							<div class="form_box">
								<br><br><label class="text_R">Register your Full Name</label><br><br>
									<input type="text" name="Data_form" placeholder="First Name"
										   class="inputName" required>&nbsp;&nbsp;
									<input type="text" name="Data_form" placeholder="Middle Name" 
										   class="inputName" required>&nbsp;&nbsp;
									<input type="text" name="Data_form" placeholder="Last Name"
										   class="inputName" ><br><br>

									<input type="number" name="Data_form" placeholder="Age" 
									       class="Text_ARDP" >&nbsp;&nbsp;
									<input type="text" name="Data_form" placeholder="Religion"
									       class="Text_ARDP"><br><br>
									<label class="text_gender">Date of Birth:</label>
									<input type="date" name="Data_form" placeholder="Date of Birth" title="Input Your date of Birth" 
									       class="Text_ARDP">&nbsp;&nbsp;<br><br>
									<input type="text" name="Data_form" placeholder="Place of Birth"
									       class="Text_ARDP"><br><br>
								<label class="text_gender">Register Your Gender</label>
								<br><br>
									<label  class="text_gender">MALE</label>
										<input type="radio" name="Data_form" value="Male">
									<label  class="text_gender">FEMALE</label>
										<input type="radio" name="Data_form" value="Female">
								<br><br>
								<label class="level_textC">Civil Status:</label>
								<select id="Civil_Status" onchange="get_dataSelect();">
									<option>Single</option>
									<option>Marriage</option>
									<option>Widow</option>
									<option>Seperated</option>
								</select>&nbsp;&nbsp;
								<input type="hidden" id="result" name="Data_form">
									<input type="text" name="Data_form" placeholder="Citizenship" 
									      class="Text_CT">
									<br><br><br>
									<input type="text" name="Data_form" placeholder="Profession Occupation" 
											class="Text_P">
									<br><br>
							</div>
						</div>
						<div class="content_child">
							<div class="childtochild">
								<div class="Profile_contaner"><br><br>
									<label class="text_R">Register the Resident Address of House Hold</label>
									<br><br>
									<input type="number" name="Data_form" placeholder="House Number" class="R_input"><br><br>
									<input type="text" name="Data_form" placeholder="Street Name" class="R_input"><br><br>
									<label class="text_gender">Enter your Purok:</label>
									<select id="Purok_Data" onchange="get_PurokData();" class="R_input">
										<?php 
										$sql2 = "SELECT * FROM purok ORDER BY Purok_number ASC";

											$prepare2 = $pdo->prepare($sql2);
											$prepare2->execute();
											$newData2 = $prepare2->rowCount();
											$newData3 = $prepare2->fetchAll();

											$x =  $newData2 - 1;

											for($y = 0; $y <= $x; $y++){
													echo "<option>" . $Costome = $newData3[$y]['Purok_number'] . "</option>";
											}
										 ?>
									</select>
									<input type="hidden" name="Data_form" placeholder="Purok Number" id="Purok_number">
								</div>
							</div>
							<div class="childtochild">
							<div class="Profile_contaner">
									<div class="contaner_Box">
										<div class="Image_box">
											<div class="ProfileImage" id='image_pic'></div>
											<input type="hidden" name="Data_form" id='Image_transfer'>
										</div>
										<div class="Image_box">
												<a href="#Image_finderID" id="Image_File_input">Select Image</a>
										</div>
									</div>
									<div class="contaner_Box">
										<div class="boxforImage1">
										</div>
										<div class="boxforImage2">
											<input type="submit" 
											        name="SaveData" 
												     value="Save Data"
												    class="Save_btn" id="SaveData_btn"
											>&nbsp;&nbsp;
											<input type="submit" name="Sancel" class="Cancel_btn" onclick="reload" value="Resset">
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="footer_modal"></div>
				</div>
			</div>
			<div class="buttom_selector">
				<a href="#Uploading_BG">
					<div class="contaner1">
						<label class="Text_UR">Upload Image</label>
						<div class="overlay1 animateOverlay1"></div>
					</div>
				</a>
				<a href="#HouseHold_Records">
				<div class="contaner2">
					<label class="Text_UR">House Hold Record</label>
					<div class="overlay1 animateOverlay2"></div>
				</div>
				</a>
			</div>
			<div class="uploading_Bg" id="Uploading_BG">
				<form class="form_upload" method="post" action="../PHP_FOLDER/imageUpload.php" enctype='multipart/form-data'>
					<div class="box_upload"></div>
					<div class="box_upload"><input type="file" name="File_image" class="input_upload" required></div>
					<div class="box_upload">
						<input type="text" name="Image_ownername" placeholder="Input owner of image full name"  class="input_upload" required>
					</div>
					<div class="box_upload">
						<input type="submit" name="Save_image" value="Save Image" class="input_upload1">
					</div>
				</form>
			</div>
			<div class="All_Records" id="HouseHold_Records">
				<div class="record_table" id="responseRecord_text">
					<?php 

						$house_Hold = "SELECT * FROM house_hold";

						$dataprepare = $pdo->prepare($house_Hold);
						$dataprepare->execute();

						$newData_image = $dataprepare->fetchAll(PDO::FETCH_ASSOC);





						$output1 = '
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

									$output1 .= '<tr>
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
								$output1 .= '</table>';

								echo $output1;

					 ?>
				</div>
			</div>
			<div id="Image_finderID" class="Image_finder">
				<div class="Allimage_box">
					<div class="child_box_image">
						<div class="header_style"><label class="image_headtext1" id="Message">Image Record</label></div>
						<div class="header_style"><a href="#Modal_Open" class="cancel_boxImage">&times;</a></div>
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
												<td><button id='.$row["image_id"].' name='.$row["image_id"].' onclick="getData(this.id);" class="btn_setP">Set Profile</button></td>
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
	</div>
	<script type="text/javascript" src="../JAVAS_FOLDER/ImageTransfer.js"></script>
	<script type="text/javascript" src="../JAVAS_FOLDER/HouseHold.js"></script>
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
  			font-size: 1.42vw;
  			color: #555;

		}
		.h_title{
			font-size: 1.12vw;
			color: #fff;
		}
		.d_title{
			padding: 8px;
  			text-align: left;
  			font-size: 1.12vw;
  			color: #555;
  			border-bottom: 1px solid #ddd;
  			text-align: center;
  			font-family: "Palatino Linotype";
  			letter-spacing: 2px;
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
		.btn_setP:hover{
			background: #C0E9EC;
			color: #555;
		}
		.second_table{
 		background: none;
 	}
 	.btn_edit{
 		background: #40A3D8;
 		color: #fff;
 		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
 		border: none;
 		width: 100%;
 		height: 5.12vh;
 		letter-spacing: 2px;
  		font-size: 1.12vw;
  		font-family: "Palatino Linotype";
  		border-radius: 3px;
  		cursor: pointer;
  		transition: 100ms linear;
  		outline: none;
 	}
 	.btn_edit:hover{
 		background: #76A1F2;
 	}
 	.Delete_btn{
 		background: #FF5733;
 		padding: 9%;
 		color: #fff;
 		text-decoration: none;
 		letter-spacing: 2px;
 		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
  		font-size: 1.12vw;
  		font-family: "Palatino Linotype";
  		border-radius: 3px;
  		transition: 100ms linear;
 	}
 	.Delete_btn:hover{
 		background: #F48E57;
 	}
	</style>
</body>
</html>