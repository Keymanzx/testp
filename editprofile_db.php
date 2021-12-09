<meta charset="UTF-8">
<?php
session_start() ;

include './conDB/config.php';

//ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
    if($_SESSION["user_id"]==''){
        echo "<script type='text/javascript'>"; 
        echo "alert('Error');"; 
        echo "window.location = 'userprofile.php'; "; 
        echo "</script>";
        }
    
 //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
      $user_id = $_SESSION["user_id"];
      $user_name = $_POST["Firstname"];
      $user_no = $_POST["Num"];
      $major = $_POST["Major"];
      $class = $_POST["Cls"];
      $user_tell = $_POST["Tell"];
      $facebook = $_POST["Facebook"];
      $lne_id = $_POST["lne"];
      $user_email = $_POST["Email"];

    //ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
        $sql = " UPDATE users SET  
        user_name ='$user_name' ,
        user_no ='$user_no' ,
        major ='$major' ,
        class ='$class' ,
        user_tell ='$user_tell',
        facebook ='$facebook', 
        lne_id ='$lne_id' ,
        user_email ='$user_email'   
        WHERE user_id ='$user_id' ";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
    
    mysqli_close($con); //ปิดการเชื่อมต่อ database 
    
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลสำเร็จ');";
        echo "window.location = 'patient.php'; ";
        echo "</script>";
        
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('เกิดข้อผิดพลาด กรุณากรอกใหม่อีกครั้ง');";
            echo "window.location = 'userprofile.php'; ";
        echo "</script>";
    }

    ?>