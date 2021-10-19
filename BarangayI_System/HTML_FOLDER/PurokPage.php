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
		<div class="porok_contaner">
			<div class="contaner_child_Purok">
				<div class="purokList">
					<div class="purok_list_child">
						<label class="purok_list_label">PUROK RECORD</label>
					</div>
					<div class="purok_list_child" id="responseRecord_text">
						<?php 

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
													<a href="?ID='.$row["Purok_number"].'#population_box_PUROK_Mode" class="data_puputationP">VIEW POPULATION</a>
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
					</div>
				</div>
			</div>
			<div class="contaner_child_Purok">
				<div class="Population_total"><br><br>
					<label class="content_purok">CLICK THE BUTTON TO REGISTER NEW PUROK</label><br>
					<a href="#Purok_modal"><button class="btn_addPurok">Button</button></a><br>
				
				</div>
				<div class="Population_total">
					<div class="population_box">
						<div class="pupulation_child_box">
							<?php 

								$sql1 = "SELECT * FROM house_hold";

								$prepare1 = $pdo->prepare($sql1);
								$prepare1->execute();

								$newData1 = $prepare1->rowCount();
								echo "<br>";
								echo "<br>";
								echo "<label class='data_puputation'>".$newData1."</label>";
							 ?>
							 <br>
							 <label class='data_puputation'>TOTAL POPULATION</label>

						</div>
						<div class="pupulation_child_box"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="box_register_purok" id="Purok_modal">
			<div class="Purok_modal_register">
				<div class="purok_c">
				<a href="#" class="cancel_M_purok">
					<label class="cancel_M_purok">&times;</label>
				</a>
			</div>
				<form class="purok_c">
					<br><br>
					<input type="text" name="pukorData" placeholder="PUROK NUMBER" 
					class="PukoInput_D" required><br><br>
					<input type="text" name="pukorData" placeholder="PUROK NAME"
					class="PukoInput_D" required><br><br><br>
					<input type="submit" class="button_purok" value="REGISTER" id="Register_purok">
				</form>
			</div>
		</div>
		<div class="PurokDelete_box" id="Open_Purok_DELETE_message">
			<div class="DeleteMessage">
				<div class="DELETE_P"><a  href="#" class="text_cancel_P">&times;</a></div>
				<form class="DELETE_P" method="post" action="../PHP_FOLDER/Delete.php">
					<br>
					<?php 
						if(isset($_GET['ID'])){
							$NumberPurok = $_GET['ID'];

						}
					 ?>
				
					 <input type="hidden" name="purok_num" value="<?php echo $NumberPurok; ?>"><br>
					 <label class="Text-label_purok_remark">
					 	Are you sure you want to Delete this Purok?<br>Make sure all House Hold Record in this Purok number is Deleted, to prevent unknown data House Hold.
					 </label><br><br><br>
					 <input type="submit" name="DELETE_DATA" value="DELETE" class="DELETE_P_DATA">
				</form>
			</div>
		</div>
		<div class="population_box_PUROK" id="population_box_PUROK_Mode">
			<div class="BOX_P_MODAL">
				<div class="DELETE_P"><a  href="#" class="text_cancel_P">&times;</a></div>
				<div class="DELETE_P1">
					<div class="purok_PBox">
						<div class="purok_PBox_child">
							<?php 

								if(isset($_GET['ID'])){

									$Purok_numberR = $_GET['ID'];
									$sql1 = "SELECT * FROM resident_address WHERE Purok_number = '$Purok_numberR' ";

									$prepare1 = $pdo->prepare($sql1);
									$prepare1->execute();

									$newData1 = $prepare1->rowCount();
									echo "<br>";
									echo "<br>";
									echo "<label class='data_puputation'>".$newData1."</label>";
									echo "<br>";
									echo "<br>";
									echo "<label class='data_puputation1'>PUROK POPULATION</label>";

								}

								

							 ?>
						</div>
						<div class="purok_PBox_child"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../JAVAS_FOLDER/Purok.js"></script>
	</body>
	</html>
	<style type="text/css">
		.table_purok{
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
		th{
			background: #f9eec9;
			color: #555;
			box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
		}
		.ViewEdit_Purok{
			border: none;
			width: 100%;
			height: 5vh;
			font-family: "Palatino Linotype";
  			letter-spacing: 2px;
  			font-size: 1.12vw;
  			border-radius: 5px;
  			outline: none;
  			background: #7bafef;
  			color: #fff;
  			transition: 100ms linear;
  			box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
		}
		.ViewEdit_Purok:hover{
			background: #85ee83;
		}
		.Delete_Purok{
			text-decoration: none;
			padding: 9%;
			background: rgb(200, 120, 120);
			border-radius: 5px;
			color: #fff;
			box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
			transition: 100ms linear;
		}
		.Delete_Purok:hover{
			background: #85ee83;
		}
		.PurokDelete_box{
			background: rgba(5, 5, 5, .2);
			position: fixed;
			position: absolute;
			width: 100%;
			height: 100vh;
			top: 0;
			left: 0;
			z-index: 1;
			display: none;
		}
		.PurokDelete_box:target{
			display: block;
			display: flex;
		}
		.DeleteMessage{
			background: #fff;
			width: 30%;
			height: 50%;
			margin: auto;
			border-radius: 5px;
			-webkit-animation: Modal_box 1s;
		}
		.DELETE_P:nth-child(1){
			width: 100%;
			height: 10%;
			display: flex;
			align-items: center;
			justify-content: flex-end;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
		}
		.DELETE_P:nth-child(2){
			width: 100%;
			height: 90%;
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
			text-align: center;
		}
		.text_cancel_P{
			text-decoration: none;
			font-family: "Palatino Linotype";
  			letter-spacing: 2px;
  			font-size: 2.12vw;
  			cursor: pointer;
  			color: #555;
  			position: relative;
  			right: 3%;
  			font-weight: bold;

		}

@keyframes Modal_box{
	from{
		transform: translate(0, -6%);
	}
	to{
		transform: translate(0, 0);
	}
}
.data_puputation1{
		font-weight: bold;
		font-family: "Palatino Linotype";
		font-size: 1.12vw;
		letter-spacing: 2px;
		color: #999cf5;
}

	.Text-label_purok_remark{
		font-family: "Palatino Linotype";
  		letter-spacing: 2px;
  		font-size: 1.25vw;
  		color: #555;

	}
	.DELETE_P_DATA{
		border:none;
		width: 30%;
		height: 13%;
		font-family: "Palatino Linotype";
  		letter-spacing: 2px;
  		font-size: 1.12vw;
		background: #c9a256;
		outline: none;
		color: #fff;
		border-radius: 5px;
		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);

	}
	.population_box_PUROK{
			background: rgba(5, 5, 5, .2);
			position: fixed;
			position: absolute;
			width: 100%;
			height: 100vh;
			top: 0;
			left: 0;
			z-index: 1;
			display: none;
	}
	.population_box_PUROK:target{
		display: block;
		display: flex;
	}
	.BOX_P_MODAL{
		background: #fff;
		width: 30%;
		height: 50%;
		margin: auto;
		border-radius: 5px;
		-webkit-animation: Modal_box 1s;
	}
	.purok_PBox{
		background: #fff;
		width: 70%;
		height: 50%;
		border-radius: 5px;
		margin: auto;
		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
	}
	.purok_PBox_child:nth-child(1){
		background: #f7f0f0;
		width: 100%;
		height: 90%;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
	}

	.purok_PBox_child:nth-child(2){
		background: #efd6a7;
		width: 100%;
		height: 20%;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
	}

	.DELETE_P1:nth-child(2){
			width: 100%;
			height: 90%;
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
			text-align: center;
			display: flex;
		}
		.data_puputationP{
			text-decoration: none;
			font-family: "Palatino Linotype";
  			letter-spacing: 2px;
  			font-size: 1.15vw;
  			background: #b89653;
  			padding: 2.50%;
  			border-radius: 5px;
  			color: #fff;
  			box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
  			transition: 100ms linear;

		}
		.data_puputationP:hover{
			background:  #85ee83;

		}
	</style>
