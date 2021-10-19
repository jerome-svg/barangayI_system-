<?php 



	if(isset($_POST['Generate'])){


	    $fullname = $_POST['Data_Fullname'];
		$Data_Data_issued = $_POST['Data_Data_issued'];	
		$Data_Data_Purok = $_POST['Data_Data_Purok'];
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
	<div class="Box_generator" id="invoice">

		<div class="box_FileClearace_BRG">
			<div class="box_FileClearace_BRG_child" >
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
					<div class="heading_text_content"><label class="contentOFfile1">CERTIFICATION</label></div>
					<div class="heading_text_content">
						<div class="heading_text_content_child">
						</div>
						<div class="heading_text_content_child">
							<br>
							<br>
							<label class="contentOFfile_NEW"><?php echo  $Data_Data_issued;?></label>
						</div>
					</div>
					<div class="heading_text_content">
						<br>
						<label class="contentOFfile3">TO WHOM IT MAY CONCERN:</label>
						<p class="label_P">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is the certify that according in the record kept in this office, 
							<?php echo $fullname;?> of legal age, single a resident of <?php echo $Data_Data_Purok; ?>, Barangay  Gwapo District, Cabanatuan City, whose family name is officially listed as one of the indigent families of Barangay Grapo. <br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certificate is issued upon the resquest of the above-mentioned name for whetever legal purpost may serve the best. Issued this 28<sub>th</sub> day of <?php echo  $Data_Data_issued;?>, at the office of the Punong Barangay, Barangay Grapo. 
						</p>
					</div>
					<div class="heading_text_content">
						<div class="Mark_Thumb">
						</div>
						<div class="Mark_Thumb">
							<div class="Mark_Thumb_child">
							</div>
						</div>
					</div>
				</div>
				<div class="content_FileClearace">
					<div class="content_FileClearace_BOX_chil">
						<label class="contentOFfile2">Prepared and Virified By:</label><br><br>
						<input type="text" class="contentOFfile5"><br>
						<label class="contentOFfile2">SIGNATURE OVER PRINTED NAME</label>
					</div>
					<div class="content_FileClearace_BOX_chil">
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