<?php 
	include('../PHP_FOLDER/DBconnection.php');

	session_start();


	if(isset($_SESSION['admin_id'])){
		// This is the code to adentify the user

		$adminId = $_SESSION['admin_id'];

 		$sql = "SELECT * FROM administrator WHERE admin_id = '$adminId'";

 		$prepare2 = $pdo->prepare($sql);
		$prepare2->execute();

		$newData3 = $prepare2->fetchAll(PDO::FETCH_ASSOC);

		

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
		<link rel="stylesheet" type="text/css" href="../CSS_FOLDER/Style3.css">
</head>
<body>
	<div class="main">
		<div class="main_admin">
			<div class="box_prpfileAdmin">
				<div class="box_prpfileAdmin_child">
					<div class="box_prpfileAdmin_child_sun">
						<div class="profileCon"></div>
						<br>
						<br>
						<br>
						<label class="text_profileAdminid">ID:&nbsp;<?php echo $newData3[0]['admin_id']; ?></label><br>
						<label class="text_profileAdminid">
							NAME:&nbsp;<?php 
											echo $newData3[0]['admin_Fname'] . " ";
											echo $newData3[0]['admin_Mname'] . ".";
											echo $newData3[0]['admin_Lname'];
							 			?>
						</label>
					</div>
					<div class="box_prpfileAdmin_child_sun">
						<br>
						<br>
						<br>
						<br>
						<label class="text_profileAdminid">&nbsp;&nbsp;&nbsp;GENDER:&nbsp;<?php echo $newData3[0]['admin_Gender']; ?></label><br>
						<label class="text_profileAdminid">&nbsp;&nbsp;&nbsp;CONTACT:&nbsp;<?php echo $newData3[0]['admin_Contactnumber']; ?></label><br>
					</div>
				</div>
				<div class="box_prpfileAdmin_child">
					<br>
					<br>
					<br>
					<br>
					<br>
					<label class="text_profileAdminid_TEXT">
						&nbsp;&nbsp;&nbsp;EMAIL:&nbsp;<?php echo $newData3[0]['admin_Email']; ?>	
					</label>
					<br><br><br>
					<label class="text_profileAdminid_TEXT">
						&nbsp;&nbsp;&nbsp;ADDRESS:&nbsp;<?php echo $newData3[0]['admin_addresss']; ?>	
					</label>
					<br><br><br>
					<label class="text_profileAdminid_TEXT">
						&nbsp;&nbsp;&nbsp;BARANGAY NAME:&nbsp;<?php echo $newData3[0]['admin_Barangayname']; ?>	
					</label>
					<br><br><br>
					<br><br><br><br><br><br>
					<a href="../HTML_FOLDER/index.php" class="backtoHome">BACK TO HOME</a>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>
