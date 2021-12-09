<?php
session_start() ;
include('./conDB/config.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');  

$sql = "SELECT  * from  users where user_id  LIKE '%".$user_id."%'  ";

$user_id = $_REQUEST['user_id'];

define('LINE_API',"https://notify-api.line.me/api/notify");
 
$token = "olZX5Ty01iwnn1vBVcFgbARGy8TMaX9fM5Gc59qKk5x"; //ใส่Token ที่copy เอาไว้
$newmessage = "ถึง: คุณโอ";
$str =  "เรื่อง: การจองของคุณ $user_id  ได้รับการอนุมัติ";
 //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

$res = notify_message($str,$token,$newmessage);
print_r($_GET);
function notify_message($message,$token,){
 $queryData = array('message' => $message);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 return $res;
}
//https://havespirit.blogspot.com/2017/02/line-notify-php.html
//https://medium.com/@nattaponsirikamonnet/%E0%B8%A1%E0%B8%B2%E0%B8%A5%E0%B8%AD%E0%B8%87-line-notify-%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B9%80%E0%B8%96%E0%B8%AD%E0%B8%B0-%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%90%E0%B8%B2%E0%B8%99-65a7fc83d97f
?>