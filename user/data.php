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

fwrite($file, (date('H:i:s') . "  user/data.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){

    //     $category =  filter_var($data['category'], FILTER_SANITIZE_STRING);

    $sql = "SELECT `user_id`as userid,
        `user_name` as username,
        `user_mobile`as mobile,
        `user_email` as email,
        `user_sex` as sex,
        `user_dob` as dob,
        `user_address` as address, `join_on`, `email_verified`, `mobile_verified`, `user_verified`, `user_status` FROM `users` WHERE 1";
    if (isset($data['getwithrestaurant']) && isset($data['restaurant']) && $data['getwithrestaurant'] == true) {
        $restaurant = $data['restaurant'];
        $sql = "SELECT `user_id`as userid,
        `user_name` as username,
        `user_mobile`as mobile,
        `user_email` as email,
        `user_sex` as sex,
        `user_dob` as dob,
        `user_address` as address, `join_on`, `email_verified`, `mobile_verified`, `user_verified`, `user_status` FROM `users` WHERE restaurant = $restaurant";
    }
    if ($result = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($result) > 0) {

            $response = array(
                "success" => true,
                "data" => mysqli_fetch_all($result, MYSQLI_ASSOC),
                "error" => ""
            );
        } else {
            $err = "No User found";
        }
    } else {
        $err = mysqli_error($con);
    }
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);