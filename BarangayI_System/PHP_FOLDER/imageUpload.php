<?php 

	
	include('DBconnection.php');


	if(isset($_POST['Save_image'])){

		$ImageName = $_FILES['File_image']['name'];
		$Tmp_name = $_FILES['File_image']['tmp_name'];
		$sizes = $_FILES['File_image']['size'];
		$Imageowner_name = $_POST['Image_ownername'];


		$nameOnwer = "SELECT * FROM all_image WHERE image_onwerFullname = '$Imageowner_name'";

		$preparename = $pdo->prepare($nameOnwer);
		$preparename->execute();

		$onwerData = $preparename->rowCount();


		function getData_IMAGE($number){
		if($number > 0){
			throw new Exception("the owner name is Use");
		}
				return true;
			}
			try{
				getData_IMAGE($onwerData);
			}
			catch(Exception $e){
				
				echo "<script> alert('Error ". $e->getMessage() . "')</script>";

				 header("Refresh: 1; url=../HTML_FOLDER/HouseHold_page.php");
				 die();
			}


		
		$fileActualExt  = pathinfo($ImageName, PATHINFO_EXTENSION);

		$Extallowed = array('jpg', 'png', 'jpeg', 'JPG', 'PNG');

		if(in_array($fileActualExt, $Extallowed)){
			if($sizes < 6000000){
	
				$sql = "SELECT * FROM all_image WHERE image_name = '$ImageName'";

				$prepare = $pdo->prepare($sql);
				$prepare->execute();

				$newData = $prepare->rowCount();

				if($newData > 0){
					echo "<body>
							<div class='contaner'>
								<div class='bouns_Error'><div class='ballError'></div></div>
								<div class='bouns_Error'><h1 class='text'>The image is use</h1></div>
							</div>
						  </body>";

						  header("Refresh: 2; url=../HTML_FOLDER/HouseHold_page.php");
				}
				else{
					if($Tmp_name == ""){
						echo "<body>
							<div class='contaner'>
								<div class='bouns_Error'><div class='ballError'></div></div>
								<div class='bouns_Error'><h1 class='text'>Try another image</h1></div>
							</div>
						  </body>";

						  header("Refresh: 2; url=../HTML_FOLDER/HouseHold_page.php");
					}
					else{


 						$sql = "INSERT INTO all_image(image_name,image_onwerFullname) 
 							VALUES(:image_name,:image_onwerFullname)";
							$prepare = $pdo->prepare($sql);
							$prepare->execute(
								['image_name' => $ImageName, 'image_onwerFullname' => $Imageowner_name]
							);

							if($prepare){

								$fileDestination = '../HTML_FOLDER/Image_profile/' . $ImageName;

								move_uploaded_file($Tmp_name, $fileDestination);

								echo "<body>
										<div class='contaner'>
											<div class='bouns_ball'><div class='ball'></div></div>
											<div class='bouns_ball'><h1>Upload Successfully</h1></div>
										</div>
									</body>";

								header("Refresh: 2; url=../HTML_FOLDER/HouseHold_page.php");

								

							}
							else{
								echo "Not upload";
							}
					}
				}

			}
		}
		else{
			echo "<body>
					<div class='contaner'>
						<div class='bouns_Error'><div class='ballError'></div></div>
						<div class='bouns_Error'><h1 class='text'>File is not Supported</h1></div>
					</div>
				 </body>";

				header("Refresh: 2; url=../HTML_FOLDER/HouseHold_page.php");
			
		}

	}

 ?>
<style type="text/css">
	body{
		margin: 0;
		padding: 0;
		display: flex;
		justify-content: center;
		background: #ECEFF0;
		align-items: center;
	}
	.contaner{
		width: 30%;
		height: 10vh;
	}
	.bouns_ball:nth-child(1){
		width: 18%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		float: left;
		
	}
	.ball{
		background: #2B486F;
		width: 55%;
		height: 55%;
		border-radius: 100%;
		animation: bouns 0.90s infinite;

	}
	@keyframes bouns{
		20%{
			transform: translate(0px, -150%);
			width: 55%;
		}
		10%{
			transform: translate(0px, 0%);
			width: 62%;
		}
	}
	.bouns_ball:nth-child(2){
		width: 82%;
		height: 100%;
		float: right;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	h1{
		font-size: 2.23vw;
		letter-spacing: 1px;
		font-family: "Palatino Linotype";
		color: #2B6A6F;
	}
	.bouns_Error:nth-child(1){
		width: 18%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		float: left;
		
	}
	.ballError{
		background: #A42006;
		width: 55%;
		height: 55%;
		border-radius: 100%;
		animation: bouns 0.90s infinite;

	}
	.bouns_Error:nth-child(2){
		width: 82%;
		height: 100%;
		float: right;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.text{
		font-size: 2.23vw;
		letter-spacing: 1px;
		font-family: "Palatino Linotype";
		color: #F05637;
	}
</style>