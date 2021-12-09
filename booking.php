<?php
session_start() ;
include('./conDB/config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
	$user_id = $_SESSION["user_id"];
	// $admin_id = $_SESSION["admin_id"];
	$problem= $_POST["problem"];
	$booking_start_date = $_POST["booking_start_date"];
	$purpose = $_POST["purpose"];
	$booking_type= $_POST["booking_type"];
	$status = "รอดำเนินการ";
	
	
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO `booking` ( `booking_start_date`, `purpose`, `booking_type`,`user_id`,`problem`,`status`) 
			 VALUES('$booking_start_date', '$purpose', '$booking_type', '$user_id', '$problem','$status')";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
	
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ทำการจองสำเร็จ');";
	echo "window.location = 'userpage.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('ทำการจองไม่สำเร็จ');";
	echo "window.location = '#'; ";
	echo "</script>";
}
?>

