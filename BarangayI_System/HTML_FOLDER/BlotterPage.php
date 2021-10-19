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
		<!--This is the heading Box from main---------------------------------------------------------->
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
						<p class="link_1">Admin Profile</p>
						<a href="../PHP_FOLDER/Logout.php" style="text-decoration: none;"><p class="link_1">Logout</p></a>
					</div>
				</div>
			</div>
			<!--This is the body Box from main---------------------------------------------------------->
			<div class="blotterBox_C">
				<div class="blotter_Box">
					<div class="blotter_Box_child">
						<div class="box_B_contanerR">
							<div class="blotter_Box_child_content">
								<div class="content_child_B">
									<input type="submit" value="SEARCH" class="btn_BlOTTER" onclick="get_Blotter_search();">
									<input type="text" name="Search_B" placeholder="Search the name of Complanant person" 
									class="Input_Blotter_search" id="Data_search_B">
								</div>
								<div class="content_child_B">
									<label class="blotter_Record">BLOTTER RECORD</label>
								</div>
							</div>
							<div class="blotter_Box_child_content" id="responseRecord_text">
								<br>
								<?php 

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

					 ?>
							</div>
						</div>
					</div>
				</div>
				<div class="blotter_Box">
					<div class="boxForRegisterNEWB">
						<div class="box_Blotter">
							<label class="text_blotter">Click the button to Register new Blotter</label><br><br>
							<a href="#Modal_blotterBox_open" class="btn_Blotter">BUTTON</a>
						</div>
					</div>
				</div>
			</div>
			<div class="Modal_blotterBox" id="Modal_blotterBox_open">
				<div class="box_Modal_Blotter_R_contaner">
					<div class="header_p_blotter_c">
						<div class="header_box_B">
							<label class="text_label_Botter_content" id="Data_remark">Register new Blotter</label>
						</div>
						<div class="header_box_B">
							<div class="btn_cancel">
								<a href="#" class="X_btn">&times;</a>
							</div>
						</div>
					</div>
					<form class="header_p_blotter_c">
						<br><br>
						<input type="text" name="DataBlotter" placeholder="Nane of Complanant" class="text_inputBlotter">
						&nbsp;&nbsp;&nbsp;
						<input type="text" name="DataBlotter" placeholder="Name of Complained" class="text_inputBlotter">
						<br><br><label class="Text_AreaTExt">DATE OF FILING:</label>
						<input type="date" name="DataBlotter" placeholder="Date of Filing" class="text_inputBlotter"><br><br><br>
						<label class="Text_AreaTExt">PERSON IN CHARGE:</label><br><br>
						<select onchange="get_OFFICIAL_Data();" id="Name_OFFICIAL" class="text_inputBlotter">
							<?php 
								$sql2 = "SELECT * FROM barangay_official";

								$prepare2 = $pdo->prepare($sql2);
								$prepare2->execute();
								$newData2 = $prepare2->rowCount();
								$newData3 = $prepare2->fetchAll();

								$x =  $newData2 - 1;

								for($y = 0; $y <= $x; $y++){

									 $OF_F = $newData3[$y]['Official_Fname'];
									 $OF_M = $newData3[$y]['Official_Mname'];
									 $OF_L= $newData3[$y]['Official_Lname'];


									echo "<option>" . $OF_F . " " . $OF_M . "." . " " .  $OF_L . "</option>";

								}
							?>
						</select>
						<input type="hidden" name="DataBlotter" placeholder="Person In charge" id="Name_OFFICIAL_PICK"><br><br>
						<input type="text" name="DataBlotter" placeholder="Type status 'ACTIVE'" class="text_inputBlotter_Status"><br><br><br>
						<label class="Text_AreaTExt">DESCRIPTION:</label><br>
						<textarea rows="3" cols="50" name="DataBlotter">
						</textarea><br><br>
						<input type="submit" class="btn_BlOTTER_Register" id="Register_New_Blotter">
						&nbsp;&nbsp;&nbsp;
						<input type="reset" class="btn_BlOTTER_Register_Cancel">
					</form>
				</div>
			</div>
			<div class="box_botterDescription" id="boxID_botterDescription">
				<div class="Description_contaner_B">
					<div class="header_Blotter_Des"><a href="#" class="cancel_X_new">&times;</a></div>
					<div class="header_Blotter_Des">
						<br>
						<?php 

								$CASE_N = $_GET['ID'];



								$sql1 = "SELECT * FROM blotter WHERE Case_blotter_no = '$CASE_N'";

								$prepare_new = $pdo->prepare($sql1);
								$prepare_new->execute();
						
								$newData3 = $prepare_new->fetchAll(PDO::FETCH_ASSOC);


								echo "<label class='Des_label_text'>DESCRIPTION OF ISSUE COMPLAINED PERSON:</label>";
								echo "<br>";
								echo "<label class='Des_label_text'>". $newData3[0]['Description'] ."</label>";
								echo "<br>";
								echo "<br>";
							 ?>
							 <div class="case_Box_holder">
							 	<br><br>
							 	<label class='Des_label_text1'>Click the bottom to 'CASE CLOSE' the Status</label>
							 	<br>
							 	<br>
							 	<?php 
							 		echo '<button id='.$CASE_N.' name='.$CASE_N.' onclick="get_BlotterUpdate(this.id);" class="btn_edit">Button</button>';

							 	 ?>
							 </div>

					</div>
				</div>
			</div>
	</div>
</body>
</html>
<script type="text/javascript" src="../JAVAS_FOLDER/BlotterPage.js"></script>
<style type="text/css">
	textarea{
	resize: none;
	border: none;
	font-family: "Palatino Linotype";
	font-size: 1vw;
	border: solid 3px #323b73;
	outline: none;
	letter-spacing: 2px;
}

		table {
  			border-collapse: collapse;
  			width: 100%;

		}

		th, td {
			padding: 5px;
  			text-align: left;
  			border-bottom: 1px solid #ddd;
  			text-align: center;
  			font-family: "Palatino Linotype";
  			letter-spacing: 2px;
  			font-size: 0.90vw;
  			color: #907940;

		}
		.h_title{
			color: #fff;
		}
		.d_title{
  			text-align: left;
  			color:  #b78129;
  			border-bottom: 1px solid #ddd;
  			text-align: center;
  			font-family: "Palatino Linotype";
  			letter-spacing: 2px;
		}
		th{
			background: #3f8b90;
			color: #fff;
			box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
		}

		.View_blotter{
			background: #967739;
 			padding: 5%;
 			color: #fff;
 			text-decoration: none;
 			letter-spacing: 2px;
 			box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
  			font-size: 1vw;
  			font-family: "Palatino Linotype";
  			border-radius: 3px;
  			transition: 100ms linear;
		}
 	
 	.View_blotter:hover{
 		background:  orange;
 	}
 	.Delete_btn{
 		background: #FF5733;
 		padding: 4%;
 		color: #fff;
 		text-decoration: none;
 		letter-spacing: 2px;
 		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
  		font-size: 1vw;
  		font-family: "Palatino Linotype";
  		border-radius: 3px;
  		transition: 100ms linear;
 	}
 	.Delete_btn:hover{
 		background: #F48E57;
 	}
 	.Des_label_text1{
 		font-size: 1.23vw;
  		font-family: "Palatino Linotype";
  		letter-spacing: 2px;
  		color: #373888;
 	}
 	.Des_label_text{
 		font-size: 1.23vw;
  		font-family: "Palatino Linotype";
  		letter-spacing: 2px;
  		color: #bd5555;
 	}
 	.btn_edit{
 		border: none;
 		font-size: 1.15vw;
  		font-family: "Palatino Linotype";
  		letter-spacing: 2px;
  		width: 20%;
  		height: 20%;
  		border-radius: 5px;
  		outline: none;
  		color: #fff;
  		cursor: pointer;
  		transition: 0.20s linear;
  		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
  		background: #2b3882;
 	}
 	.btn_edit:hover{
 		color: #555;
 		background: rgba(200, 200, 199);
 	}
 </style>