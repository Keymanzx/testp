<?php
session_start();
if(isset($_POST['Adminname'])){
include('./conDB/config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
	$admin_username = $_POST["Adminname"];
	$admin_password = $_POST["Adminpass"];
	
	$sql="SELECT * FROM admin 
	WHERE  admin_username='".$admin_username."' 
	AND  admin_password='".$admin_password."' ";
	$result = mysqli_query($con,$sql);
  
	if(mysqli_num_rows($result)==1){
		$row = mysqli_fetch_array($result);

		$_SESSION["admin_username"] = $row["admin_username"];
		$_SESSION["admin_password"] = $row["admin_password"];
		// $_SESSION["user_name"] = $row["user_name"];
		
		if($_SESSION["admin_username"]== $_POST["Adminname"]){ 

			Header("Location: adminpage.php");

		  }
		
	}else{

	  echo "<script>";
		  echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
		  echo "window.history.back()";
	  echo "</script>";
	 
	}
	}else{

	Header("Location: adminpage.php");
   
  }

?>
