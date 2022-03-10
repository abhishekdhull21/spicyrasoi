<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$pass = "";
$token = "";
$device_type = "";
$status = true;
define('ROOTPATH', dirname(__FILE__));

// if (isset(getallheaders()['Device-Type']))
//     $device_type = getallheaders()['Device-Type'];

// $content_type = (getallheaders());
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");

fwrite($file, (date('H:i:s',) . ROOTPATH . "  order/kotInfo.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){

    if (isset($data['today_kots'])) {
        $date = date('Y-m-d');
        $sql = "SELECT count(a.id) as kot_no FROM `order_kot` a where a.date like concat('$date','%')";
        //     $category =  filter_var($data['category'], FILTER_SANITIZE_STRING);
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) > 0) {

                $response = array(
                    "success" => true,
                    "data" => mysqli_fetch_assoc($result),
                    "error" => ""
                );
            } else {
                $err = "No Order found";
            }
        } else {
            $err = mysqli_error($con);
        }
    } else
        $err = "set key as -> today_kots ";
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);
