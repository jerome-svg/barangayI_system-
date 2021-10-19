<?php 

	include('DBconnection.php');

	
	if(isset($_POST['DataVoters_ID'])){

		$votersID = $_POST['DataVoters_ID'];

		$sql1 = "SELECT * FROM voters WHERE V_id = '$votersID'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		$IDData = $prepare1->fetchAll(PDO::FETCH_ASSOC);

		$FirstName = $IDData[0]['V_Fname'];
		$MiddleName = $IDData[0]['V_Mname'];
		$LastName = $IDData[0]['V_Lname'];
		$Voters_Type = $IDData[0]['V_Type'];


	}


	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Voters Profile</title>
 </head>
 <body>
 	<div class="main_NEw_V">
 		<div class="box_contaner_Voters">
 			<input type="hidden" name="DATA_UPDATE_V" value="<?php echo $votersID;?>" class="DATA_INPUT_V"><br><br>
 			<input type="text" name="DATA_UPDATE_V" value="<?php echo $FirstName;?>" class="DATA_INPUT_V"><br><br>
 			<input type="text" name="DATA_UPDATE_V" value="<?php echo $MiddleName;?>" class="DATA_INPUT_V"><br><br>
 			<input type="text" name="DATA_UPDATE_V" value="<?php echo $LastName;?>" class="DATA_INPUT_V"><br><br>
 			<input type="text" name="DATA_UPDATE_V"value="<?php echo $Voters_Type;?>" class="DATA_INPUT_V"><br><br>
 			<input type="submit" value="UPDATE" class="BTN_V1" onclick="getVoters_UPDATE_DATA();">&nbsp;&nbsp;
 			<input type="submit" value="BACK"  class="BTN_V2" onclick="getVoters_UPDATE_BACK();">
 		</div>
 	</div>
 </body>
 </html>
 <style type="text/css">
 	.main_NEw_V{
 		width: 100%;
 		height: 100%;
 		display: flex;
 	}
 	.box_contaner_Voters{
 		background: #fff;
 		width: 99%;
 		margin: auto;
 		height: 99%;
 		text-align: center;
 	}
 	.DATA_INPUT_V{
 		border: none;
 		border-bottom: solid 3px #4bb676;
 		width: 50%;
 		height: 10%;
 		text-align: center;
 		font-family: "Palatino Linotype";
		font-size: 1.12vw;
		letter-spacing: 2px;
		color: #3d4e83;
		outline: none;
 	}
 	.BTN_V1{
 		border: none;
 		font-family: "Palatino Linotype";
		font-size: 1.12vw;
		letter-spacing: 2px;
		background: #6cd196;
		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
		color: #fff;
		width: 15%;
		border-radius: 5px;
		height: 13%;
		transition: 100ms linear;
 	}
 	.BTN_V2{
 		border: none;
 		font-family: "Palatino Linotype";
		font-size: 1.12vw;
		letter-spacing: 2px;
		background: #fc6c3c;
		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
		color: #fff;
		width: 15%;
		cursor: pointer;
		border-radius: 5px;
		height: 13%;
		transition: 100ms linear;
 	}
 	.BTN_V1:hover{
 		background: #4bb676;
 	}
 	 .BTN_V2:hover{
 		background: #4bb676;
 	}
 </style>
 <script type="text/javascript" src="../JAVAS_FOLDER/Voters.js"></script>