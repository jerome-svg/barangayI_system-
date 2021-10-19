<?php 
	
	include('DBconnection.php');

	if(isset($_POST['Pukor_Number'])){

		$Purok_number = $_POST['Pukor_Number'];

		$sql1 = "SELECT * FROM purok WHERE Purok_number = '$Purok_number'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		$IDData = $prepare1->fetchAll(PDO::FETCH_ASSOC);


		$Purok_number = $IDData[0]['Purok_number'];
		$Purok_name = $IDData[0]['Purok_name'];
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Purok</title>
 </head>
 <body>
 	<div class="main">
 		<div class="box_contaner_P">
 			<br>
 			<label class="text_PR_label">PUROK NAME</label><br>
 			<input type="hidden" name="Data_P" value="<?php echo $Purok_number;?>"><br><br>
 			<input type="text" name="Data_P" value="<?php echo $Purok_name;?>" 
 			class="input_name_PR"><br><br><br>
 			<input type="submit" value="UPDATE" class="btn_save_P_S"  onclick="Update_Purok();">
 			&nbsp;&nbsp;
 			<input type="submit" value="BACK" class="btn_cancel_C" onclick="Back_Purok_Data();">
 		</div>
 	</div>
 </body>
 </html>

 <style type="text/css">
 	.main{
 		width: 100%;
 		height: 100%;
 		display: grid;
 	}
 	.box_contaner_P{
 		text-align: center;
 		background: #fff;
 		width: 50%;
 		height: 70%;
 		margin: auto;
 		border-radius: 5px;
 		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
 	}
 	.btn_save_P_S{
		width: 20%;
		height: 15%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		border: none;
		background: #4788C0;
		text-align: center;
		color: #fff;
		cursor: pointer;
		transition: 100ms linear;
		border-radius: 3px;
		transition: 100ms linear;

	}
	.btn_save_P_S:hover{
		background: #66c37e;
	}
	.btn_cancel_C{
		width: 20%;
		height: 15%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		border: none;
		background: #d4717a;
		text-align: center;
		color: #fff;
		cursor: pointer;
		transition: 100ms linear;
		border-radius: 3px;
		transition: 100ms linear;
	}
	.btn_cancel:hover{
		background: #66c37e;
	}
	.input_name_PR{
		border: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		text-align: center;
		border-bottom: solid 3px #4c5aa0;
		height: 15%;
		outline: none;
		width: 50%;
		color: #4c5aa0;
	}
	.text_PR_label{
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		color: #222;
	}
 </style>
 <script type="text/javascript" src="../JAVAS_FOLDER/Purok.js"></script>