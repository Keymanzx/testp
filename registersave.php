<?php
include('./conDB/config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
	$user_username = $_POST["Username"];
	$user_password = $_POST["Userpass"];
	$name = $_POST["Firstname"];
	$user_no = $_POST["Num"];
	$major = $_POST["Major"];
	$class = $_POST["Cls"];
	$user_tell = $_POST["Tell"];
	$facebook = $_POST["Facebook"];
	$lne_id = $_POST["lne"];
	$user_email = $_POST["Email"];

	//check usernameซ้ำ
	$check = "SELECT  user_username FROM users  WHERE user_username = '$user_username' ";
    $result1 = mysqli_query($con, $check) or die(mysqli_error($con));
    $num=mysqli_num_rows($result1);

	if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }else{
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO `users` ( `user_id`, `user_username`, `user_password`, `user_name`, `user_no`, `major`, `class`, 
				`user_tell`, `facebook`, `lne_id`, `user_email`) 
			 VALUES('','$user_username', '$user_password', '$name', '$user_no', '$major', '$class', '$user_tell'
			 , '$facebook', '$lne_id', '$user_email')";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
	echo "<script type='text/javascript'>";
	echo "alert('สมัครสมาชิกสำเร็จ');";
	echo "window.location = 'login.php'; ";
	echo "</script>";
}
	
	
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);

?>

