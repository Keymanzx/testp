<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
include './conDB/conn.php'; 

$json_data= array();

$query ="SELECT * FROM booking  ORDER by id";


$result = $mysqli->query($query);

while ($rs = $result->fetch_object()) {
    if ($rs->action == '') {
        $color = '#66CC00';
        //FF0000
    }
    if ($rs->action == 'accept' && $rs->status == '') {
        $color = '#FF9900';
        //FF0000
    }
    if ($rs->action == 'reject' && $rs->status == '') {
        $color = '#FFFFFF';
    }
    if ($rs->action == '' && $rs->status == '') {
        $color = '#e3bc08';
    }

    if ($rs->status == 'accept' && $rs->action == 'accept') {
        $color = '#02d667';
        //FF0000
    }
    if ($rs->status == 'reject' && $rs->action == 'accept') {
        $color = '#FFFFFF';
    }
    if ($rs->status == '' && $rs->action == 'accept') {
        $color = '#1e90ff';
    }
    $json_data[] = [
        
        'id' => $rs->id,
        'title' =>"ผู้ใช้ ID :  ".$rs->user_id ." "." "."ได้ทำการจอง",
        'start' => $rs->booking_start_date,
        // 'end' => $rs->booking_end_date,
        'url' => 'showEventsData.php?id=' . $rs->id,
        'color' => $color,
    ];
    
}
$json = json_encode($json_data);
echo $json;

//แสดงข้อมูลแบบง่ายๆ นะครับ ส่วนเรื่องความปลอดภัยของข้อมูล ต้องมีเงื่อนไขในการเข้าถึงข้อมูลด้วยนะครับ ถ้าไม่อยากให้ที่อื่นเรียใช้ข้อมูลได้ 