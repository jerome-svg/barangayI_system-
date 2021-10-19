<?php 

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
	<title>Barangay Information System</title>
	<meta charset="utf-8">
	<meta name="description" content="The Barangay Information System">
	<meta name="keywords" content="Barangay Information System">
	<meta name="author" content="Jerome L. Valdez">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../CSS_FOLDER/Style1.css">
	<link rel="shortcut icon" href="../Images/BRGlogo.png" type="image/x-icon"/>
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
				<a href="../PHP_FOLDER/Logout.php" class="logout_btn_link">
					<label class="logout_btn">LOUG OUT</label>
				</a>
			</div>
		</div>
		<!----------------------------------------------------------------------------------------------->
		<!--This is the 1rst Body Boxe from main--------------------------------------------------------->
		<div class="content_body_contaner1">
			<div class="child_body_contaner1"></div>
			<div class="child_body_contaner1">
				<div class="content_design-text"></div>
				<div class="content_design-text">
					<div class="content_child_disign_text">
						<div class="text_box"><label class="textLabeL1">WELCOME TO THE ADMIN HOME PAGE</label></div>
						<div class="text_box"><label class="textLabeL2">Just click the button to see the admin Profile</label></div>
						<div class="text_box"><a href="../HTML_FOLDER/AdminProfile.php" class="textLabeL3">GO TO ADMIN</a></div>
					</div>
					<div class="content_child_disign_text"></div>
				</div>
				<div class="content_design-text"></div>
			</div>
		</div>
		<!--This is the 2nd Boxe from main--------------------------------------------------------------->
		<div class="content_body_contaner2">
			<div class="child_body_contaner2">
				<div class="link_contact_contaner">
					<div class="link_contact1">
						<div class="overlay1 animateOverlay1">
							<div class="overlay_childe1"></div>
							<div class="overlay_childe1"><a href="https://www.facebook.com"><img src="../Images/facebook.JPG" class="facebookLogo"></a></div>
						</div>
					</div>
					<div class="link_contact2">
						<div class="overlay2 animateOverlay2">
							<div class="overlay_childe2"></div>
							<div class="overlay_childe2"><a href="https://mail.google.com"><img src="../Images/GmailLogo.JPG" class="GmailLogo"></a></div>
						</div>
					</div>
					<div class="link_contact3">
						<div class="overlay3 animateOverlay3">
							<div class="overlay_childe3"></div>
							<div class="overlay_childe3"><a href="https://twitter.com"><img src="../Images/twitterLogo.jpg" class="WitterLogo"></a></div>
						</div>
					</div>
				</div>
				<div class="link_contact_contaner"></div>
			</div>
			<div class="child_body_contaner2">
					<div class="card_mother_contaner1">
						<div class="card_contaner1">
							<div class="card_header1"><img src="../Images/HousHoldIcon.jpg" class="Hous_hold"></div>
							<div class="card_content1">
								<label class="Nav_link" id="Hous_hold_link">House Hold</label>
							</div>
						</div>
						<div class="card_contaner1">
							<div class="card_header2"><img src="../Images/OfficialIcon.jpg" class="Official"></div>
							<div class="card_content2">
								<label class="Nav_link" id="Brg_official_link">Barangay Official</label>
							</div>
						</div>
						<div class="card_contaner1">
							<div class="card_header3"><img src="../Images/CertificationIcon.jpg" class="FileIcon"></div>
							<div class="card_content3">
								<label class="Nav_link" id="Filepage">Files</label>
							</div>
						</div>
					</div>
				</div>
			<div class="child_body_contaner2"></div>
		</div>
		<!--This is the 3rd Boxe from main------------------------------------------------------------->
		<div class="content_body_contaner3">
			<div class="child_body_contaner3"></div>
			<div class="child_body_contaner3">
				<div class="card_mother-contaner2">
					<div class="card_contaner2">
						<div class="card_header4"><img src="../Images/purokLogo.jpg" class="Purok_Icon"></div>
						<div class="card_content4"><label class="Nav_link" id="PorokPage">Purok</label></div>
					</div>
					<div class="card_contaner2">
						<div class="card_header5"><img src="../Images/VottersIcon.jpg" class="BlotterIcon"></div>
						<div class="card_content5">
							<label class="Nav_link" id="BlotterPage">Blotter</label>
						</div>
					</div>
					<div class="card_contaner2">
						<div class="card_header6"><img src="../Images/VotersIcon.jpg" class="Voters_Icon"></div>
						<div class="card_content6">
							<label class="Nav_link" id="VotersPage">Voters</label>
						</div>
					</div>
				</div>
			</div>
			<div class="child_body_contaner3"></div>
		</div>
	</div>
	<script type="text/javascript" src="../JAVAS_FOLDER/index.js"></script>
</body>
</html>