<?php
include('./conDB/config.php');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<?php
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);
?>
<br>
<div style="margin:auto;width:1000px;">
 
  <form method="post" action="">
    เลือกเดือน
    <select name="month_check" id="month_check">
      <?php for($i=1;$i<=12;$i++){ ?>
      <option value="<?=sprintf("%02d",$i)?>" <?=((isset($_POST['month_check']) && $_POST['month_check']==sprintf("%02d",$i)) || (!isset($_POST['month_check']) && date("m")==sprintf("%02d",$i)))?" selected":""?> >
      <?=$thai_month_arr[$i]?>
      </option>
      <?php } ?>
    </select>
    ปี
    <select name="year_check" id="year_check">
    <?php
    $data_year=intval(date("Y",strtotime("-2 year")));
    ?>
      <?php for($i=0;$i<=5;$i++){ ?>
      <option value="<?=$data_year+$i?>" <?=((isset($_POST['year_check']) && $_POST['year_check']==intval($data_year+$i)) || (!isset($_POST['year_check']) && date("Y")==intval($data_year+$i)))?" selected":""?> >
      <?=intval($data_year+$i)+543?>
      </option>
      <?php } ?>
    </select>
    <input type="submit" name="showData" id="showData" value="แสดงข้อมูล" />
  </form>
  <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="">
                                <thead>
                                    <tr>
                                        <th>วันที่การจอง</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>รหัสนักศึกษา</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>อีเมล</th>
                                        <th>Facebook</th>
                                        <th>Line</th>
                                        <th>อาการ</th>
                                        <th>ลักษณะปัญหา</th>
                                        <th>ขอพบอาจารย์ที่ปรึกษา</th>
                                        <!-- <th>ตรวจสอบ</th> -->
                                        <!-- <th>สถานะ</th> -->
                                    </tr>
                                </thead>
                                <div>

  <br>
  <br>
 
<?php
 // ถ้าไม่มีการส่งเดือนและปีมา ให้ใช้เดือนและปีในขณะปัจจุบันนั้น เป้นตัวกำหนด
if(!isset($_POST['month_check']) && !isset($_POST['year_check'])){
    $date_data_check=date("Y-m-");// จัดรูปแบบปีและเดือนของวันปัจจุบันในรูปแบบ 0000-00-
    $num_month_day=date("t"); // หาจำนวนวันของเดืนอ
    $use_month_check = $date_data_check;    
    $start_date_check = $date_data_check."01";
    $end_date_check = $date_data_check.$num_month_day;
    echo $use_month_check."<br>";
    echo $start_date_check."<br>"; // ได้ตัวแปรวันที่เริ่มต้นของเดือนไปใช้งาน
    echo $end_date_check."<br>"; // ได้ตัวแปรวันที่สิ้นสุดของเดือนไปใช้งาน
}else{ // ถ้ามีการส่งข้อมูล เดือนและปี มา ให้ใช้เดือนและปี ของค่าที่ส่งมาเป้นตำกำหนด
    $date_data_check=$_POST['year_check']."-".$_POST['month_check']."-"; // จัดรูปแบบปีและเดืนอที่ส่งมาในรูปแบบ 0000-00-
    $num_month_day=date("t",strtotime($_POST['year_check']."-".$_POST['month_check']."-01")); // หาจำนวนวันของเดืนอ
    $use_month_check = $date_data_check;        
    $start_date_check = $date_data_check."01";
    $end_date_check = $date_data_check.$num_month_day;
    echo $use_month_check."<br>";
    echo $start_date_check."<br>"; // ได้ตัวแปรวันที่เริ่มต้นของเดือนไปใช้งาน
    echo $end_date_check."<br>"; // ได้ตัวแปรวันที่สิ้นสุดของเดือนไปใช้งาน
}
?>

<?php
$data_arr = array();
$sql = "SELECT  users.user_id, users.user_name,users.user_no, 
users.user_tell,users.lne_id , users.facebook,
users.user_email,booking.id,booking.status,booking.purpose,booking.booking_start_date,booking.booking_type,booking.problem
FROM users 
INNER JOIN booking ON users.user_id = booking.user_id
WHERE booking.status = 'ยืนยัน' AND booking.booking_start_date = LIKE '%$use_month_check%' 
ORDER BY booking_start_date  ASC" ;

echo $sql;
$result = mysqli_query($con, $sql);
  // $content = "";
  if (mysqli_num_rows($result) > 0) {
    $i = 1;
    while($row = mysqli_fetch_assoc($result)) {
      
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row["booking_start_date"] . "</td> ";
        echo "<td>" . $row["user_name"] . "</td> ";
        echo "<td>" . $row["user_no"] . "</td> ";
        echo "<td>" . $row["user_tell"] . "</td> ";
        echo "<td>" . $row["user_email"] . "</td> ";
        echo "<td>" . $row["facebook"] . "</td> ";
        echo "<td>" . $row["lne_id"] . "</td> ";
        echo "<td>" . $row["purpose"] . "</td> ";
        echo "<td>" . $row["problem"] . "</td> ";
        echo "<td>" . $row["booking_type"] . "</td> ";

    echo "</tbody>";

    }
  }
////////////  ตัวอย่าง array ข้อมูล 


 
////////////  ตัวอย่าง array ข้อมูล  แบบดึงจากฐานข้อมูล
/*$sql = "
SELECT * FROM tbl_sale WHERE 
sale_date>='".$start_date_check."' AND  
sale_date<='".$end_date_check."'
ORDER BY sale_item,sale_date
";
echo $sql;
$result = $mysqli->query($sql);
if($result){
    while($row = $result->fetch_assoc()){
        // ถ้ามีตัวแปร array ของข้อมูลของวันที่นั้นแล้ว ให้เพิ่มค่าทีละ 1
        if(isset($data_arr[$row['sale_item']][$row['sale_date']])){
            $data_arr[$row['sale_item']][$row['sale_date']]+=1;
        }else{ // ถ้ายังไม่มีให้เท่ากับ 1
            $data_arr[$row['sale_item']][$row['sale_date']]=1;
        }
    }
}*/
?>
</table>
</div>
</body>
</html>