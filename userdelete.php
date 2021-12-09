<?php
//1. เชื่อมต่อ database: 
include('./conDB/config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า user_id จากไฟล์แสดงข้อมูล
$user_id = $_REQUEST["user_id"];
 
//ลบข้อมูลออกจาก database ตาม user_id ที่ส่งมา
 
$sql = "DELETE FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));   
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ลบสำเร็จ');";
	echo "window.location = 'patient.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to delete again');";
	echo "</script>";
}
?>