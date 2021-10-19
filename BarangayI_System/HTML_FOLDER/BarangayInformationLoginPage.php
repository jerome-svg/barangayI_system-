<?php 
	include('../PHP_FOLDER/DBconnection.php');

	session_start();

	if(isset($_SESSION['admin_id'])){

		header("location: ../HTML_FOLDER/index.php");

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
	<style type="text/css">
	.remark{
		width: 100%;
		height: 7vh;
		position: absolute;
		top: 0;
		left: 0;
		display: flex;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

	}
	.text_remark{
		font-family: "Palatino Linotype";
		font-size: 1.20vw;
		letter-spacing: 2px;
		color: #e63e4a;
		background: none;
		margin: auto;
	}
	.remark_serverV{
		width: 100%;
		height: 7vh;
		position: absolute;
		top: 0;
		left: 0;
		display: flex;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

	}
	.text_remark_serverV{
		font-family: "Palatino Linotype";
		font-size: 1.20vw;
		letter-spacing: 2px;
		color:  #e63e4a;
		background: none;
		margin: auto;
	}
</style>
</head>
<body>
	<div class="main">
		<div class="boxLogin">
			<div class="boxLogin_child">
				<form class="boxLogin_child_sun" method="post" action="BarangayInformationLoginPage.php">
					<br>
					<br>
					<br>
						<label class="login_headingText">LOGIN NOW</label><br><br><br>
						<label class="login_ContentText">EMAIL</label><br>
						<input type="email" name="Email" required class="input_text_Login"><br><br><br>
						<label class="login_ContentText">PASSWORD</label><br>
						<input type="Password" class="input_text_Login" required name="Password"><br><br>
						<a href="#">Forgot Password?</a><br><br><br><br>
						<input type="submit" name="Login" value="LOGIN" class="submit_btn_login">
				</form>
				<div class="boxLogin_child_sun">
					<br><br><br>
					<label class="TEXT_content1">
					Welcome to Barangay Information System
					</label><br><br><br>
					<label class="TEXT_content2">
					Click the button bellow to contact the Developer, if you like to create a new account in this website
					</label><br><br><br><br>
					<input type="submit" class="valueCON" value="CONTACT">
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php 



	if(isset($_POST['Login'])){

		$Email = $_POST['Email'];
		$password = $_POST['Password'];


		$sql1 = "SELECT * FROM administrator WHERE 	admin_Email = '$Email'";


		$prepare1 = $pdo->prepare($sql1);
		$prepare1->execute();

		$newData1 = $prepare1->rowCount();

		$newPass = $prepare1->fetchAll();

		function getData($number){
			if($number == 0){
				throw new Exception(" THE ACCOUNT IS NOT EXIST!");
			}
			return true;
		}
		try{
			getData($newData1);
		}
		catch(Exception $e){
			echo "<div class='remark_serverV'><label class='text_remark_serverV'>YUO HAVE AN ERROR" . $e->getMessage(). "</label></div>";
			die();
		}
		$data = $newPass[0]['admin_Password'];
		$password_hush = password_verify($password,  $data);

			if($password_hush == 1){

				$admin_id = $newPass[0]['admin_id'];
				$new_Email = $newPass[0]['admin_Email'];
				$newPass = $newPass[0]['admin_Password'];

				echo $_SESSION['admin_id'] = $admin_id;echo "<br>";
				echo $_SESSION['admin_Email'] = $new_Email;echo "<br>";
				echo $_SESSION['admin_Password'] = $newPass;echo "<br>";
 
				header('location: index.php');
			}
			else{
				echo $remark = "<div class='remark'>
				<label class='text_remark'>YOU HAVE AN ERROR THE PASSWORD IS INVALID!</label>
				</div>";
			}
	}


 ?>