<?php
session_start();
if(isset($_POST['Username'])){
include('./conDB/config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
	$user_username = $_POST["Username"];
	$user_password = $_POST["Userpass"];
	
	$sql="SELECT * FROM users 
	WHERE  user_username='".$user_username."' 
	AND  user_password='".$user_password."' ";
	$result = mysqli_query($con,$sql);
  
	if(mysqli_num_rows($result)==1){
		$row = mysqli_fetch_array($result);

		$_SESSION["user_id"] = $row["user_id"];
		$_SESSION["user_username"] = $row["user_username"];
		$_SESSION["user_name"] = $row["user_name"];
		
		
		if($_SESSION["user_username"]== $_POST["Username"]){ 

			Header("Location: userpage.php");

		  }
		
	}else{

	  echo "<script>";
		  echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
		  echo "window.history.back()";
	  echo "</script>";
	 
	}
	}else{

	Header("Location: index.php");
   
  }

?>
