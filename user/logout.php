<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$pass = "";
$token = "";
$device_type = "";
$status = true;
// define('ROOTPATH', dirname(__FILE__));

// if (isset(getallheaders()['Device-Type']))
//     $device_type = getallheaders()['Device-Type'];

// $content_type = (getallheaders());
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");

fwrite($file, (date('H:i:s') . "  user/logout.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($isset($data['token'])) {
    // The request is using the POST method
    header("Content-Type:application/json");
    $token = $data['token'];
    $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){

    //     $category =  filter_var($data['category'], FILTER_SANITIZE_STRING);
    $sql = "DELETE FROM `logined_user` WHERE `token`= '$token'";
    if ($result = mysqli_query($con, $sql)) {
        $response = array(
            "success" => true,
            "error" => ""
        );
    } else {
        $err = mysqli_error($con);
    }
} else {
    $err = "send valid token";
}
sendPostRes($response, $err);
