<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$pass = "";
$token = "";
$device_type = "";
define('ROOTPATH', dirname(__FILE__));

// if (isset(getallheaders()['Device-Type']))
//     $device_type = getallheaders()['Device-Type'];

// $content_type = (getallheaders());
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, ("category/remove.php," . file_get_contents('php://input') . "\n"));

$response = "";
header("Content-Type:application/json");
$data = json_decode(file_get_contents('php://input'), true);
// condition to check request in json 
// if(strpos($content_type, "application/json") !== false){
if (isset($data['category'])) {
    $category = $data['category'] != '' ? $data['category'] : 0;
    if ($result = mysqli_query($con, "UPDATE `category` SET status = 0 WHERE `cat_id` = $category")) {


        $response = array(
            "success" => true,
            "error" => ""
        );
    } else {
        $err = mysqli_error($con);
    }
} else {
    $err = "set key as -> `productId`";
}

sendPostRes($response, $err);
