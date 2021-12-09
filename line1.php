<?php
session_start() ;
include('./conDB/config.php');

$sql_insert  ="insert   into  users( id) 
value ( $user_id)  ";
//post ข้อมูลมาเก็บไว้ที่ตัวแปร
// $id = $_POST['id'];
// $email = $_POST['email'];
// $number = $_POST['number'];
// $company = $_POST['company'];
// $messages = $_POST['message'];

///ส่วนที่ 1 line แจ้งเตือน จัดเรียงข้อความที่จะส่งเข้า line ไว้ในตัวแปร $message
$header = 'ส่งข้อความถึงเรา';
$message = " ผู้แจ้ง ".$user_id ; //ข้อความที่จะส่ง


//  echo '<iframe src="http://10.10.10.11/notify.php?message=$message"></iframe>'; 


///ส่วนที่ 2 line แจ้งเตือน  ส่วนนี้จะทำการเรียกใช้ function sendlinemesg() เพื่อทำการส่งข้อมูลไปที่ line
sendlinemesg();
header('Content-Type: text/html; charset=utf8');
$res = notify_message($message);



///ส่วนที่ 3 line แจ้งเตือน
function sendlinemesg()
{
    define('LINE_API', "https://notify-api.line.me/api/notify");
    define('LINE_TOKEN', "olZX5Ty01iwnn1vBVcFgbARGy8TMaX9fM5Gc59qKk5x"); //เปลี่ยนใส่ Token ของเราที่นี่ 

    function notify_message($message)
    {
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                    . "Authorization: Bearer " . LINE_TOKEN . "\r\n"
                    . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents(LINE_API, FALSE, $context);
        $res = json_decode($result);
        return $res;
    }
}