<?php
session_start() ;
include('./conDB/config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้
//Query database from user ID
$sql= "SELECT * FROM users 
	    WHERE  user_id='".$_SESSION["user_id"]."'";
	    $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);

        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["user_username"] = $row["user_username"];
        $_SESSION["user_name"] = $row["user_name"];
		$_SESSION["user_password"] = $row["user_password"];
        $_SESSION["user_no"] = $row["user_no"];
        $_SESSION["major"] = $row["major"];
        $_SESSION["class"] = $row["class"];
        $_SESSION["user_tell"] = $row["user_tell"];
        $_SESSION["facebook"] = $row["facebook"];
        $_SESSION["lne_id"] = $row["lne_id"];
        $_SESSION["user_email"] = $row["user_email"];     
?>