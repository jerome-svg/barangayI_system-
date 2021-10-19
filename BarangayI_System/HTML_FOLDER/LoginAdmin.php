<?php 



	$Password1 = "Jerome2020";




 	 echo $newPass1 = password_hash($Password1, PASSWORD_BCRYPT);

 	 // echo $newPass1;
 	
 	 echo "<br>"; 
 	 echo $password2 = "Jerome2020";

  

 	 // echo "<br>";
 	 // echo $newPass1;


 	 // $Password2 = "asdasdas";





 	 // $password3 = password_verify($Password2,  $newPass1);
 	 // echo  $password3;

 	echo "<br>";


 	 if($password2 == $Password1){
 	 	echo "The password is Match";
 	 }
 	 else{
 	 	echo "Error Password";
 	 }






	// include('../PHP_FOLDER/DBconnection.php');

	// session_start();

	// if(isset($_POST['Login'])){

	// 	$Email = $_POST['Email'];
	// 	$password = $_POST['Password'];


	// 	$sql1 = "SELECT * FROM administrator WHERE 	admin_Email = '$Email'";


	// 	$prepare1 = $pdo->prepare($sql1);
	// 	$prepare1->execute();
	// 	$newData3 = $prepare1->fetchAll();

	// 	$newData1 = $prepare1->rowCount();
	// 	$newP = $newPassword = $newData3[0]['admin_Password'];


	// 	echo "<script>alert(".$newP.")</script>";

	// 	// function getData($number){
	// 	// 	if($number == 0){
	// 	// 		throw new Exception("NO USER RECORD");
	// 	// 	}
	// 	// 	return true;
	// 	// }
	// 	// try{
	// 	// 	getData($newData1);
	// 	// }
	// 	// catch(Exception $e){
	// 	// 	echo "<script>alert('YUO HAVE AN ERROR" . $e->getMessage() . "');</script>";
	// 	// 	die();
	// 	// }


 ?>