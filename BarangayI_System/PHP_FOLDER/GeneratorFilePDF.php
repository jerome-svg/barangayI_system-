<?php 



	if(isset($_POST['Generate'])){


		$fullname = $_POST['Data_Fullname'];
		$Data_address = $_POST['Data_Address'];
		$Data_Dbirth = $_POST['Data_Dbirth'];
		$Data_Height = $_POST['Data_Height'];
		$Data_Weight = $_POST['Data_Weight'];
		$Data_Purpose = $_POST['Data_Purpose'];
		$Data_PlaceOfbirth = $_POST['Data_PlaceOfbirth'];
		$Data_CivilStatus = $_POST['Data_CivilStatus'];
		$Data_Data_issued = $_POST['Data_Data_issued'];
	}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title><title>Barangay Information System/House</title>
	<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
	<meta charset="utf-8">
	<meta name="description" content="The Barangay Information System">
	<meta name="keywords" content="Barangay Information System">
	<meta name="author" content="Jerome L. Valdez">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../Images/BRGlogo.png" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="../CSS_FOLDER/Style2.css"></title>
</head>
<body>
	<div class="Box_generator"  id="invoice">

		<div class="box_FileClearace_BRG">
			<div class="box_FileClearace_BRG_child">
				<div class="content_FileClearace">
					<div class="heading_FileClearace">
						<img src="../Images/cabLogo.png" class="logo_Cab">
					</div>
					<div class="heading_FileClearace">
						<br>
						<br>
						<br>
						<br>
						<label class="contentOFfile">Republic of the Philipines</label><br>
						<label class="contentOFfile">Provice of Nueva Ecija</label><br>
						<label class="contentOFfile">City of Cabanatuan</label><br>
						<label class="contentOFfile">BARANGAY GWAPO</label><br>
					</div>
					<div class="heading_FileClearace">
						
					</div>
				</div>
				<div class="content_FileClearace">
					<div class="heading_text_content"><label class="contentOFfile1">BARANGAY CLEARANCE</label></div>
					<div class="heading_text_content">
						<div class="heading_text_content_child">
							<label class="contentOFfile2">Name:&nbsp;<?php echo $fullname; ?></label><br>
							<label class="contentOFfile2">ADDRESS:&nbsp;<?php echo $Data_address; ?></label><br>
							<label class="contentOFfile2">DATA OF BITH: &nbsp;<?php echo $Data_Dbirth; ?></label><br>
							<label class="contentOFfile2">
								HEIGHT:&nbsp;<?php echo $Data_Height; ?>
							</label>
							<label class="contentOFfile2">
								WEIGHT:&nbsp;<?php echo $Data_Weight; ?>	
							</label><br>
							<label class="contentOFfile2">PURPOSE: &nbsp;<?php echo $Data_Purpose; ?></label><br>
						</div>
						<div class="heading_text_content_child">
							<label class="contentOFfile2">PLACE OF BIRTH:&nbsp;<?php echo $Data_PlaceOfbirth; ?></label><br>
							<label class="contentOFfile2">ADDRESS:&nbsp;<?php echo $Data_address; ?></label><br>
						</div>
					</div>
					<div class="heading_text_content">
						<br>
						<label class="contentOFfile3">TO WHOM IT MAY CONCERN:</label>
						<p class="label_P">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to ceftify that Ms, / Mrs, /Mr, / &nbsp;<?php echo $fullname; ?> whose name, sigrature, left and right thumb mark apprears below had undergone that identification process of this office. This clearance is issued on the&nbsp;<?php echo $Data_Data_issued;?> and valid only for ninet (90) days from the date of issuance.
						</p>
					</div>
					<div class="heading_text_content">
						<div class="Mark_Thumb">
							<br>
							<br>
							<label class="contentOFfile2">Community tax Cert. NO:__________</label><br>
							<label class="contentOFfile2">Place Issued:__________</label><br>
							<label class="contentOFfile2">Data Issued:__________</label><br><br><br>
							<input type="text" value="<?php echo $fullname;?>" class="contentOFfile5" disabled><br>
							<label class="contentOFfile2">SIGNATURE OVER PRINTED NAME</label>
						</div>
						<div class="Mark_Thumb">
							<div class="Mark_Thumb_child">
								<div class="Mark_Thumb_child_sun_new">
									<p>LEFT THUMB MARK</p>
								</div>
								<div class="Mark_Thumb_child_sun_new">
									<p>RIGHT THUMB MARK</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="content_FileClearace">
					<div class="content_FileClearace_BOX_chil">
						<br>
						<br>
						<label class="contentOFfile2">Prepared and Virified By:</label><br><br>
						<input type="text" class="contentOFfile5"><br>
						<label class="contentOFfile2">SIGNATURE OVER PRINTED NAME</label>
					</div>
					<div class="content_FileClearace_BOX_chil">
						<br>
						<br>
						<label class="contentOFfile2">Approved By:</label><br><br>
						<input type="text" class="contentOFfile5"><br>
						<label class="contentOFfile2">SIGNATURE OVER PRINTED NAME</label>
					</div>
				</div>
				<div class="BoXGenerate">
					<button onclick="generatePDF();" class="dl_BTN_coNTENT">DOWNLOAD</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	function generatePDF(){


			const data = document.getElementById('invoice');

		html2pdf()
		.from(data)
		.save();
	
}
</script>