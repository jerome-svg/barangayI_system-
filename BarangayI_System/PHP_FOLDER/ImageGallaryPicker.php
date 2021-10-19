<?php 

	include('DBconnection.php');


	if(isset($_GET['ID_Official_IMAGE_UP'])){
		$newID = $_GET['ID_Official_IMAGE_UP'];
	}
	else if(isset($_GET['HouseHold_ID'])){
		$newID = $_GET['HouseHold_ID'];
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Imege Galary</title>
	<link rel="shortcut icon" href="../Images/BRGlogo.png" type="image/x-icon"/>
</head>
<body>
	<div class="contanerImage">
		<div class="box_image">
			<div class="header">
				<div class="header_child">
					<label class="galary">Image Gallery</label>
				</div>
				<div class="header_child">
					<input type="hidden" id="HnewID" value="<?php echo $newID; ?>">
					<input type="text" id="Search_ImageH" class="input_search" placeholder="Search the name of owner">
					<input type="submit" onclick="search_image_HH();" value="Search" class="search_btn">
				</div>
			</div>
			<div class="content" id="newDataImageAll">
				<?php 
				if(isset($_GET['HouseHold_ID'])){

					
					$HHID = $_GET['HouseHold_ID'];

					$sql1 = "SELECT * FROM All_image";

					$prepare1 = $pdo->prepare($sql1);
					$prepare1->execute();
					$newData3 = $prepare1->fetchAll();

					foreach ($newData3 as $row) {
						// print_r($row['image_name']);
						// print_r($row['image_onwerFullname']);

						echo "<div class='box_imageP'>
								<div class='image_box_holder'>
								<img src='../HTML_FOLDER/Image_profile/".$row['image_name']."' class='img_picture'>
								</div>
								<div class='image_box_holder'>
									<div class='OnwrName'><label class='text_label'>".$row['image_onwerFullname']."</label></div>
									<div class='OnwrName'>
										<a href='UpdateImage.php?ImageID=".$row['image_id'].",".$HHID."' class='btn_setProfile'>SET PROFILE</a>
									</div>
								</div>
							  </div>";

					}


				}
				else if(isset($_GET['ID_Official_IMAGE_UP'])){


					$HHID = $_GET['ID_Official_IMAGE_UP'];

					$sql1 = "SELECT * FROM All_image";

					$prepare1 = $pdo->prepare($sql1);
					$prepare1->execute();
					$newData3 = $prepare1->fetchAll();

					foreach ($newData3 as $row) {
						// print_r($row['image_name']);
						// print_r($row['image_onwerFullname']);

						echo "<div class='box_imageP'>
								<div class='image_box_holder'>
								<img src='../HTML_FOLDER/Image_profile/".$row['image_name']."' class='img_picture'>
								</div>
								<div class='image_box_holder'>
									<div class='OnwrName'><label class='text_label'>".$row['image_onwerFullname']."</label></div>
									<div class='OnwrName'>
										<a href='UpdateImage.php?ImageID_V=".$row['image_id'].",".$HHID."' class='btn_setProfile'>SET PROFILE</a>
									</div>
								</div>
							  </div>";

					}
					
				}
				else{
					header("location: ../HTML_FOLDER/HouseHold_page.php");
				}
 				?>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="../JAVAS_FOLDER/SEARCHIMAGEFINDER.js"></script>
<style type="text/css">
	body{
		background: #fff;
		padding: 0;
		margin: 0;
	}
	.contanerImage{
		background: #fff;
		width: 100%;
		height: 100vh;
		border-radius: 5px;
		display: flex;

	}
	.box_image{
		width: 80%;
		height: 80%;
		border-radius: 5px;
		margin: auto;
	}
	.header{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		background: #fff;
		width: 100%;
		height: 10%;
		border-radius: 5px;
		display: flex;
		justify-content: space-around;
		position: relative;
		z-index: 1;
	}
	.content{
		background: #fff;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		width: 100%;
		height: 90%;
		border-radius: 5px;
		display: flex;
		flex-wrap: wrap;
		overflow: scroll;
		align-items: center;
		justify-content: space-around;
	}
	.header_child:nth-child(1){
		background: #fff;
		width: 50%;
		height: 100%;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		display: flex;
		align-items: center;
	}
	.header_child:nth-child(2){
		background: #fff;
		width: 50%;
		height: 100%;
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
		display: flex;
		align-items: center;
		justify-content: center;

	}
	.galary{
		font-family: "Palatino Linotype";
		font-size: 2.20vw;
		letter-spacing: 2px;
		color: #581845;
		position: relative;
		left: 8%;
	}
	.input_search{
		width: 50%;
		height: 50%;
		border: none;
		border: solid 1px #581845;
		outline:  none;
		border-radius: 5px;
		font-family: "Palatino Linotype";
		font-size: 1vw;
		letter-spacing: 2px;
		text-align: center;
		position: relative;
		left: 1%;
	}
	.search_btn{
		background: #581845;
		color: #fff;
		width: 24%;
		cursor: pointer;
		height: 56%;
		border: none;
		outline:  none;
		border-radius: 5px;
		font-family: "Palatino Linotype";
		font-size: 1.05vw;
		letter-spacing: 2px;
		position: relative;
		z-index: 2;
	}
	.search_btn:hover{
		background: #5D6D7E;
	}
	.box_imageP{
		width: 200px;
		height: 220px;
		border-radius: 5px;
		cursor: pointer;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		margin: 10px;

	}
	.image_box_holder:nth-child(1){
		background: #fff;
		width: 100%;
		height: 60%;
		border-top-right-radius: 5px;
		border-top-left-radius: 5px;

	}
	.image_box_holder:nth-child(2){
		background: #EAEDEC;
		width: 100%;
		height: 40%;
		border-bottom-right-radius: 5px;
		border-bottom-left-radius: 5px;
	}
	.img_picture{
		width: 100%;
		height: 100%;
		border-top-right-radius: 5px;
		border-top-left-radius: 5px;	
	}
	.OnwrName:nth-child(1){
		width: 100%;
		height: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.OnwrName:nth-child(2){
		width: 100%;
		height: 50%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.text_label{
		font-family: "Palatino Linotype";
		font-size: 1.05vw;
		letter-spacing: 2px;
		color: #581845;
	}
	.btn_setProfile{
		background: #581845;
		text-decoration: none;
		font-family: "Palatino Linotype";
		font-size: 1.05vw;
		padding: 3%;
		letter-spacing: 2px;
		color: #fff;
		border-radius: 3px;
		transition: 100ms linear;
	}
	.btn_setProfile:hover{
		background: #FF5733;
	}
</style>