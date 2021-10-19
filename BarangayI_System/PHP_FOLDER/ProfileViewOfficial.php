<?php 

	include('DBconnection.php');

	if(isset($_POST['DataOfficial_ID'])){

		$ID_Official = $_POST['DataOfficial_ID'];

		$sql1 = "SELECT * FROM barangay_official WHERE Official_Id = '$ID_Official'";

		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		$IDData = $prepare1->fetchAll(PDO::FETCH_ASSOC);

		$ID = $IDData[0]['Official_Id'];
		$Firstname = $IDData[0]['Official_Fname'];
		$Middlename = $IDData[0]['Official_Mname'];
		$Lastname = $IDData[0]['Official_Lname'];
		$Age = $IDData[0]['Official_Age'];
		$DateBirth = $IDData[0]['Official_DateBirth'];
		$Term = $IDData[0]['Official_Term'];
		$Position = $IDData[0]['Official_Position'];
		$Status = $IDData[0]['Official_Status'];
		$Profile = $IDData[0]['Official_Profile'];




	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Barangay Official Page</title>
</head>
<body>
	<div class="main">
		<div class="Prfile_Official">
			<div class="content_official">
				<div class="official_box1">
					<div class="frofile_box">
						<div class="profle_box_official_image">
							<div class="Image_official_holder">
								<img src="../HTML_FOLDER/Image_profile/<?php echo $Profile;?>" class="Profile_imageH">
							</div>
							<div class="Image_official_holder">
								<a href="../PHP_FOLDER/ImageGallaryPicker.php?ID_Official_IMAGE_UP=<?php echo $ID;?>" class="Profile_Off">Change Profile</a>
							</div>
						</div>
					</div>
					<div class="frofile_box">
						<br><br>
						<input type="hidden" name="Data_official" value="<?php echo $ID; ?>">
						<label class="label_text_Off">FIRST NAME: </label>&nbsp;&nbsp;
						<input type="text" name="Data_official" value="<?php echo $Firstname; ?>" 
						class="input_off_data1"><br><br>
						<label class="label_text_Off">MIDDLE NAME:</label>&nbsp;&nbsp;
						<input type="text" name="Data_official" value="<?php echo $Middlename; ?>" 
						class="input_off_data"><br><br>
						<label class="label_text_Off">LAST NAME:</label>&nbsp;&nbsp;
						<input type="text" name="Data_official" value="<?php echo $Lastname; ?>" 
						class="input_off_data2"><br><br>
					</div>
				</div>
				<div class="official_box1">
					<br>
					<label class="label_text_Off">AGE: </label>&nbsp;&nbsp;
					<input type="text" name="Data_official" value="<?php echo $Age;?>" 
					class="next_class_input_D"><br><br>
					<label class="label_text_Off">DATE OF BIRTH: </label>&nbsp;&nbsp;
					<input type="text" name="Data_official" value="<?php echo $DateBirth;?>"  
					class="next_class_input"><br><br>
				</div>
			</div>
			<div class="content_official">
				<br><br>
				<label class="label_text_Off">OFFICIAL TERM: </label>&nbsp;&nbsp;
				<input type="text" name="Data_official"  value="<?php echo $Term;?>" 
				class="next_class_input_D1"><br><br>
				<label class="label_text_Off">POSITION: </label>&nbsp;&nbsp;
				<input type="text" name="Data_official"  value="<?php echo $Position;?>" 
				class="next_class_input_D2"><br><br>
				<label class="label_text_Off">CIVIL STATUS:</label>&nbsp;&nbsp;
				<input type="text" name="Data_official"  value="<?php echo $Status;?>" 
				class="next_class_input_D3"><br><br><br><br>
				<input type="submit" class="btn_submit" value="UPDATE"
				onclick="update_Official();" id="">&nbsp;&nbsp;&nbsp;
				<input type="submit" class="btn_select" value="BACK" onclick="select_Official();">
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="../JAVAS_FOLDER/OfficialLink.js"></script>
<style type="text/css">
	.main{
		background: #fff;
		width: 100%;
		display: grid;
		height: 100%;
	}
	.Prfile_Official{
		background: #71e9c814;
		width: 90%;
		height: 90%;
		border-radius: 5px;
		margin: auto;
		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
	}
	.content_official:nth-child(1){
		width: 50%;
		height: 100%;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		float: left;
	}
	.content_official:nth-child(2){
		background: #fff;
		width: 50%;
		height: 100%;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		float: left;
		text-align: center;
	}
	.official_box1:nth-child(1){
		background: #fff;
		width: 100%;
		border-top-left-radius: 5px;
		height: 60%;
		display: flex;
		justify-content: space-around;
	}
	.official_box1:nth-child(2){
		background: #fff;
		width: 100%;
		height: 40%;
		border-bottom-left-radius: 5px;
		text-align: center;
	}
	.frofile_box:nth-child(1){
		background: #fff;
		border-top-left-radius: 5px;
		width: 30%;
		height: 100%;
		display: flex;
	}
	.frofile_box:nth-child(2){
		width: 70%;
		height: 100%;
		text-align: center;
	}
	.profle_box_official_image{
		background: #fff;
		width: 80%;
		height: 95%;
		margin: auto;
		border-radius: 5px;
	}
	.Image_official_holder:nth-child(1){
		background: url('../Images/FrofileIcon.png');
		background-size: contain;
		background-repeat: no-repeat;
		width: 100%;
		height: 80%;
		border-top-right-radius: 5px;
		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
		border-top-left-radius: 5px;
	}
	.Image_official_holder:nth-child(2){
		background: #ffc300e0;
		color: #fff;
		width: 100%;
		height: 20%;
		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
		border-bottom-right-radius: 5px;
		border-bottom-left-radius: 5px;
		display: flex;
	}
	.Profile_Off{
		margin: auto;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.10vw;
		text-decoration: none;
		color: #111;
		outline: none;
	}
	.Profile_imageH{
		width: 100%;
		height: 100%;
	}
	.label_text_Off{
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.10vw;
		color: rgb(120, 120, 200);
		font-weight: bold;
	}
	.input_off_data{
		text-align: center;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.13vw;
		width: 55%;
		height: 13%;
		border: none;
		color: #555;
		outline: none;
		
		border-bottom: solid 3px rgb(120, 120, 200);
	}
	.input_off_data1{
		text-align: center;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.13vw;
		width: 55%;
		height: 13%;
		border: none;
		outline: none;
		border-bottom: solid 3px rgb(120, 120, 200);
		color: #555;
		position: relative;
		left: 2%;

	}
	.input_off_data2{
		text-align: center;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.10vw;
		width: 55%;
		height: 13%;
		border: none;
		position: relative;
		left: 3%;
		outline: none;
		border-bottom: solid 3px rgb(120, 120, 200);
		color: #555;
	}
	.next_class_input{

		text-align: center;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.10vw;
		width: 55%;
		height: 21%;
		border: none;
		outline: none;
		border-bottom: solid 3px rgb(120, 120, 200);
		color: #555;
	}
	.next_class_input_D{

		text-align: center;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.10vw;
		width: 55%;
		height: 21%;
		border: none;
		position: relative;
		left: 9%;
		outline: none;
		border-bottom: solid 3px rgb(120, 120, 200);
		color: #555;
	}
	.next_class_input_D1{

		text-align: center;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.10vw;
		width: 55%;
		height: 10%;
		border: none;
		border: none;
		outline: none;
		border-bottom: solid 3px rgb(120, 120, 200);
		color: #555;
	}
	.next_class_input_D2{

		text-align: center;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.10vw;
		width: 55%;
		height: 10%;
		border: none;
		position: relative;
		left: 4%;
		border: none;
		outline: none;
		border-bottom: solid 3px rgb(120, 120, 200);
		color: #555;
	}
	.next_class_input_D3{

		text-align: center;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.10vw;
		width: 55%;
		height: 10%;
		border: none;
		position: relative;
		left: 1%;
		border: none;
		outline: none;
		border-bottom: solid 3px rgb(120, 120, 200);
		color: #555;
	}
	.btn_submit{
		background: green;
		width: 16%;
		height: 10%;
		background: #f7c731;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.10vw;
		border: none; 
		outline: none;
		color: #111;
		border-radius: 5px;
		cursor: pointer;
		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
	}
	.btn_select{

		background: green;
		width: 16%;
		height: 10%;
		background: #d7344fbd;
		letter-spacing: 2px;
		font-family: "Palatino Linotype";
		font-size: 1.10vw;
		border: none; 
		outline: none;
		color: #fff;
		cursor: pointer;
		border-radius: 5px;
		box-shadow: 0 2px 4px 0 rgba(42, 43, 44, 0.2), 0 6px 12px 0 rgba(42, 43, 44, 0.19);
	}

</style>