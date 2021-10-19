<?php 

	include('DBconnection.php');

	if(isset($_POST['HouseHold_data_id'])){

		$ID_HouseHold = $_POST['HouseHold_data_id'];

		$sql1 = "SELECT * FROM house_hold, resident_address WHERE house_hold.H_id = '$ID_HouseHold' AND resident_address.H_id = '$ID_HouseHold'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		$IDData = $prepare1->fetchAll(PDO::FETCH_ASSOC);


	}
	
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body>
	<div class="profileContaner">
		<div class="header_profile">
			<div class="header_p"><label class="text_household">HOUSE HOLD PROFILE</label></div>
			<div class="header_p"></div>
		</div>
		<div class="contaner_profile">
			<div class="contaner_child">
				<div class="profile_imageAnd_name">
					<div class="profile">
						<div class="profile_child"><div class="profile_image">
							<img src="../HTML_FOLDER/Image_profile/<?php echo $IDData[0]['H_Profile_image'];?>" class="Profile_imageH">
						</div>
					</div>
						<div class="profile_child">
							<button class="changeProfile" onclick="ProfileGallary();">Change Profile</button>
							<input type="hidden" id="Image_IDH" value="<?php echo $IDData[0]['H_id'];?>">
						</div>
					</div>
					<div class="profile">
						<br>
						<label class="Pname">FIRST NAME:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text" name="dataH" class="nameP" value="<?php echo $IDData[0]['H_Fname'];?>"><br><br>
						<label class="Pname">MIDDLE NAME:</label>&nbsp;
						<input type="text" name="dataH" class="nameP" value="<?php echo $IDData[0]['H_Mname'];?>"><br><br>
						<label class="Pname">LAST NAME:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text" name="dataH" class="nameP" value="<?php echo $IDData[0]['H_Lname'];?>"><br><br>
					</div>
				</div>
				<div class="profile_imageAnd_name">
					<br><br>
					<label class="content_P">AGE:</label>&nbsp;
					<input type="number" name="dataH" class="inputTxt1"
					 value="<?php echo $IDData[0]['H_Age'];?>"><br><br>
					<label class="content_P">RELIGION:</label>&nbsp;
					<input type="text" name="dataH" class="inputTxt2" 
					value="<?php echo $IDData[0]['H_Religion'];?>"><br><br>
					<label class="content_P">DATE OF BIRTH:</label>&nbsp;
					<input type="text" name="dataH" class="inputTxtOK" 
					value="<?php echo $IDData[0]['H_DBirth'];?>"><br><br>
					<label class="content_P">PLACE OF BIRTH:</label>&nbsp;
					<input type="text" name="dataH" class="inputTxt3" 
					value="<?php echo $IDData[0]['H_PBirth'];?>"><br><br>
					<label class="content_P">GENDER:</label>&nbsp;
					<input type="text" name="dataH" class="inputTxt4" 
					value="<?php echo $IDData[0]['H_Gender'];?>"><br><br>
					<label class="content_P">CIVIL STATUS:</label>&nbsp;
					<input type="text" name="dataH" class="inputTxt5" 
					value="<?php echo $IDData[0]['H_CivilStatus'];?>"><br><br>
				</div>
			</div>
			<div class="contaner_child">
				<br>
				<br>
				<br>
				<label class="content_P">CITIZENSHIP:</label>&nbsp;
				<input type="text" name="dataH" class="inputTxt6" 
				value="<?php echo $IDData[0]['H_Cityzenship'];?>"><br><br>
				<label class="content_P">PROFESSION / OCCUPATION:</label>&nbsp;
				<input type="text" name="dataH" class="inputTxt7"
				 value="<?php echo $IDData[0]['H_Occupation'];?>">
				<br><br>
				<label class="content_address">Resident Address</label><br><br>
				<label class="content_P">HOUSE NUMBER:</label>&nbsp;
				<input type="text" name="dataH" class="inputTxt8"  
				value="<?php echo $IDData[0]['House_number'];?>"><br><br>
				<label class="content_P">STREET NAME:</label>&nbsp;
				<input type="text" name="dataH" class="inputTxt9" 
				value="<?php echo $IDData[0]['Street_name'];?>"><br><br>
				<label class="content_P">PUROK:</label>&nbsp;
				<input type="text" name="dataH" class="inputTxt10" 
				value="<?php echo $IDData[0]['Purok_number'];?>"><br><br><br>
				<input type="hidden" name="dataH" class="inputTxt10" 
				value="<?php echo $IDData[0]['H_id'];?>"><br><br><br>
				<input type="submit" value="UPDATE" class="btn_save_H" 
				onclick="update_HouseHold();">&nbsp;&nbsp;&nbsp;
				<input type="reset" class="btn_save_R" value="BACK" onclick="select_HouseHold();">
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="../JAVAS_FOLDER/HouseHold.js"></script>
<style type="text/css">
	
	.profileContaner{
		width: 100%;
		height: 100%;
	}
	.header_profile{
		background: #EEF2F2;
		width: 100%;
		height: 7%;
		display: flex;
		justify-content: space-around;
	}
	.header_p:nth-child(1){
		background: #EEF2F2;
		width: 50%;
		height: 100%;
		display: flex;
	}
	.header_p:nth-child(2){
		background: #EEF2F2;
		width: 50%;
		height: 100%;
		display: flex;
	}
	.text_household{	
		margin: auto;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.50vw;
		color: #444;

	}
	.contaner_profile{
		width: 100%;
		height: 93%;
		display: flex;
		justify-content: space-around;
	}
	.contaner_child:nth-child(1){
		background: orange;
		width: 50%;
		height: 100%;
	}
	.contaner_child:nth-child(2){
		background: #fff;
		width: 50%;
		height: 100%;
		text-align: center;
	}
	.profile_imageAnd_name:nth-child(1){
		background: red;
		width: 100%;
		height: 30%;
		display: flex;
		justify-content: space-around;
	}
	.profile_child:nth-child(1){
		background: #fff;
		width: 100%;
		height: 75%;
		display: flex;
	}
	.profile_child:nth-child(2){
		background: #fff;
		width: 100%;
		height: 25%;
		display: flex;
	}
	.profile_imageAnd_name:nth-child(2){
		background: #fff;
		width: 100%;
		height: 70%;
		text-align: center;
	}
	.profile:nth-child(1){
		background: orange;
		width: 30%;
		height: 100%;
	}
	.profile:nth-child(2){
		background: #fff;
		width: 70%;
		height: 100%;
	
	}
	.nameP{
		position: relative;
		height: 15%;
		width: 58%;
		top: 8%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		text-align: center;
	}
	.Pname{
		position: relative;
		color: #555;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		top: 8%;
	}
	.profile_image{
		background: #555;
		width:70%;
		position: relative;
		top: 20%;
		height: 100%;
		margin: auto;
		border-radius: 5px;
	}
	.changeProfile{
		background: rgb(23, 117, 126);
		margin: auto;
		color: #fff;
		height: 80%;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		border: none;
		border-radius: 3px;
		position: relative;
		outline: none;
		top: 67%;
		cursor: pointer;
		transition: 100ms linear;
	}
	.changeProfile:hover{
		background: rgb(39, 151, 225);
	}
	.content_P{
		color: #555;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
	}
	.inputTxt1{
		height: 7%;
		width: 58%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		text-align: center;
		letter-spacing: 2px;
		position: relative;
		left: 9%;
	}
	.inputTxt2{
		height: 7%;
		width: 58%;
		text-align: center;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		position: relative;
		left: 5%;
	}
	.inputTxt3{
		height: 7%;
		width: 58%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		text-align: center;
		position: relative;
		left: 1%;

	}
	.inputTxtOK{
		height: 7%;
		width: 58%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		text-align: center;
		position: relative;
		left: 2%;

	}
	.inputTxt4{
		height: 7%;
		width: 58%;
		outline: none;
		text-align: center;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		position: relative;
		left: 7%;
	}
	.inputTxt5{
		height: 7%;
		width: 58%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		position: relative;
		text-align: center;
		left: 4%;
	}
	.inputTxt6{
		height: 5%;
		width: 50%;
		outline: none;
		text-align: center;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		position: relative;
		left: 9%;
	}
	.inputTxt7{
		height: 5%;
		width: 50%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		text-align: center;
		position: relative;
		left: 1%;
	}
	.inputTxt8{
		height: 5%;
		width: 50%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		text-align: center;
		letter-spacing: 2px;
		position: relative;
		left: 7%;
	}
	.inputTxt9{
		height: 5%;
		width: 50%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		text-align: center;
		position: relative;
		left: 7.90%;
	}
	.inputTxt10{
		height: 5%;
		width: 50%;
		outline: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		position: relative;
		text-align: center;
		left: 13%;
	}
	.btn_save_H{
		width: 20%;
		height: 7%;
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

	}
	.btn_save_R{
		background: #F26D54;
		color: #fff;
		width: 20%;
		height: 7%;
		outline: none;
		border-radius: 3px;
		border: none;
		font-family: "Palatino Linotype";
		font-size: 1.15vw;
		letter-spacing: 2px;
		transition: 100ms linear;
		cursor: pointer;

	}
	.btn_save_H:hover{
		background: #87B8FA;
	}
	.btn_save_R:hover{
		background: #FB9A81;
	}
	.content_address{
		font-family: "Palatino Linotype";
		font-size: 2vw;
		letter-spacing: 2px;
	}
	.Profile_imageH{
		width: 100%;
		height: 100%;
		border: solid 2px #555;
		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
	}
</style>