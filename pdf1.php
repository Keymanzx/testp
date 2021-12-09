<?php
  require_once __DIR__ . '/vendor1/autoload.php';
  include('./conDB/config.php');
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $month_check = $_POST['use_month_check'];

  $sql = "SELECT  users.user_id, users.user_name,users.user_no, 
  users.user_tell,users.lne_id , users.facebook,
  users.user_email,booking.id,booking.status,booking.purpose,booking.booking_start_date,booking.booking_type,booking.problem
  FROM users 
  INNER JOIN booking ON users.user_id = booking.user_id
  WHERE booking.status = 'ยืนยัน' AND booking.booking_start_date  LIKE '%$month_check%' 
  ORDER BY booking_start_date  ASC";
  $result = mysqli_query($con, $sql);
 
  if (mysqli_num_rows($result) > 0) {
    $i = 1;
    while($row = mysqli_fetch_assoc($result)) {
      $tablebody .= '<tr style="border:1px solid #000;">
        <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
        <td style="border-right:1px solid #000;padding:3px;">'.$row['booking_start_date'].'</td>
        <td style="border-right:1px solid #000;padding:3px;">'.$row['user_name'].'</td>
        <td style="border-right:1px solid #000;padding:3px;">'.$row['user_no'].'</td>
        <td style="border-right:1px solid #000;padding:3px;">'.$row['user_tell'].'</td>      
        <td style="border-right:1px solid #000;padding:3px;">'.$row['purpose'].'</td>
        <td style="border-right:1px solid #000;padding:3px;">'.$row['problem'].'</td>
      </tr>';
      $i++;
    }
  }
// <td style="border-right:1px solid #000;padding:3px;">'.$row['booking_type'].'</td> <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="14%">อาจารย์ที่ปรึกษา </td>  
mysqli_close($con);
  
$mpdf = new \Mpdf\Mpdf();

$tableh = '
<style>
  body{
    font-family: "Garuda"; 
  }
</style>

<h2 style="text-align:center">บันทึกการให้คำปรึกษา </h2>
<h4 style="text-align:center">งานกิจการนักศึกษา มหาวิทยาลัยสงขลานคริทร์ วิทยาเขตตรัง </h4>
<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr style="border:1px solid #000;padding:4px;">
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="7%">ลำดับที่</td>
        <td  width="15%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp; วันที่การจอง </td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="22%">ชื่อ-นามสกุล</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">รหัสนักศึกษา</td>
        <td  width="15%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp; เบอร์โทรศัพท์ </td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">อาการ</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">ลักษณะปัญหา</td>
        
    </tr>

</thead>
  <tbody>';
  
$tableend = "</tbody>
</table>";

$mpdf->WriteHTML($tableh);

$mpdf->WriteHTML($tablebody);

$mpdf->WriteHTML($tableend);

$mpdf->Output();


?>