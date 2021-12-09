<meta charset="UTF-8">
<?php
session_start() ;

include './conDB/config.php';

$status = $_GET["status"];
$id = $_GET["id"];

$message = "\n".'ผู้ใช้ไอดี:'.$id."\n".'การจองของคุณได้รับการ'."\n".$status;

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

?>