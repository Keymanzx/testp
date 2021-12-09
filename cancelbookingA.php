<?php
//1. เชื่อมต่อ database: 
include('./conDB/config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า user_id จากไฟล์แสดงข้อมูล
$id= $_REQUEST["id"];
 
//ลบข้อมูลออกจาก database ตาม user_id ที่ส่งมา
 
$sql = "DELETE FROM booking WHERE id = '$id'";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));   
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ลบสำเร็จ');";
	echo "window.location = 'adminpage.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to delete again');";
	echo "</script>";
}
?>