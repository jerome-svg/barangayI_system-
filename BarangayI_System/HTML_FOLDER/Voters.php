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
			<!--This is the  Body  Box from main---------------------------------------------------------->
			<div class="box_body_Voters">
				<div class="box_body_Voters_child">
					<div class="box_body_Voters_child_R">
						<br>
						<label class="Button_V">Click the button Bellow to register new Voters</label><br><br>
						<a href="#open_Voters_modal" class="BTN_VOTERS">ADD VOTERS</a>
					</div>
				</div>
				<div class="box_body_Voters_child">
					<div class="Record_Voters_List">
						<div class="Record_Voters_List_child">
							<div class="Record_Voters_List_child_header">
								<input type="submit" class="Search_V_btn" onclick="Search_Voters_SELECT();">
								<input type="text" id="Search_Voters" placeholder="Search first name of voters" class="Search_V_input">
							</div>
							<div class="Record_Voters_List_child_header">
								<label class="Button_V_newText">VOTERS RECORD</label><br><br>
							</div>
						</div>
						<div class="Record_Voters_List_child" id="responseRecord_text">
						<?php 

							$sql2 = "SELECT * FROM voters";

							$prepare2 = $pdo->prepare($sql2);
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



						 ?>
						</div>
					</div>
				</div>
			</div>
			<div class="Voters_modal" id="open_Voters_modal">
				<div class="Voters_Child">
					<div class="Voters_Child_box_Sun">
						<a href="#" class="cancel_V">&times;</a>
					</div>
					<form class="Voters_Child_box_Sun">
						<br>
						<input type="text" name="Data_voters_R" placeholder="First Name" class="data_V_Input"><br><br>
						<input type="text" name="Data_voters_R" placeholder="Middle Name" class="data_V_Input"><br><br>
						<input type="text" name="Data_voters_R" placeholder="Last Name" class="data_V_Input"><br><br>
						<label class="Button_V" id="BarangayOfficialPage">VOTER TYPE:</label><br><br>

						<label class="Button_V" id="BarangayOfficialPage">Regular Voters:</label>
						<input type="radio" name="Data_voters_R" placeholder="Last Name" 
						class="data_V_Input1" value="Regular Voter">

						&nbsp;&nbsp;&nbsp;

						<label class="Button_V" >SK Voters:</label>
						<input type="radio" name="Data_voters_R" placeholder="Last Name" 
						class="data_V_Input1" value="SK Voter"><br><br><br>

						<input type="submit" class="BTN_voters_R" value="SAVE" id="submit_form_Voters">
					</form>
				</div>
			</div>
		</div>
	<script type="text/javascript" src="../JAVAS_FOLDER/Voters.js"></script>
</body>
</html>
<style type="text/css">
	th, td {
  			padding: 2.20px;
  			text-align: left;
  			border-bottom: 1px solid #ddd;
  			text-align: center;
  			font-family: "Palatino Linotype";
  			letter-spacing: 2px;
  			font-size: 1vw;
  			color: #555;

		}
		th{
			background: #9ef1a6;
			color: #555;
			box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
		}
		.ViewEdit_V{
			border: none;
			font-family: "Palatino Linotype";
  			letter-spacing: 2px;
  			font-size: 1vw;
  			width: 100%;
  			height: 100%;
  			border-radius: 3px;
  			background: #4ebe68;
  			color: #fff;
  			cursor: pointer;
		}
		.Delete_V{
			border: none;
			font-family: "Palatino Linotype";
  			letter-spacing: 2px;
  			font-size: 1vw;
  			text-decoration: none;
  			background: rgb(250, 100, 100);
  			color: #fff;
  			padding: 1%;
  			border-radius: 3px;
  			
		}
</style>