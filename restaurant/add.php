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
fwrite($file, (ROOTPATH . "/add.php," / date("g-m-s") . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
    if (isset($data['name']) && isset($data['admin_id']) && isset($data['address']) && isset($data['mobile'])) {
        $admin_id = $data['admin_id'] != '' ? $data['admin_id'] : 0;

        $name =  filter_var($data['name'], FILTER_SANITIZE_STRING);
        $address =  filter_var($data['address'], FILTER_SANITIZE_STRING);
        $mobile =  filter_var($data['mobile'], FILTER_SANITIZE_STRING);
        if ($result = mysqli_query($con, "SELECT restaurantid FROM `restaurant` WHERE name = '$restaurant'")) {
            if (mysqli_num_rows($result) < 1) {
                $sql = "INSERT INTO `restaurant`( `name`, `address`, `mobile`, `added_by`) VALUES ('$name', '$address', '$mobile', $admin_id)";
                if ($result =  mysqli_query($con, $sql)) {

                    $response = array(
                        "success" => true,
                        "error" => ""
                    );
                } else {
                    $err = mysqli_error($con);
                }
            } else {
                $err = "Restaurant already exists";
            }
        } else {
            $err = mysqli_error($con);
        }
    } else {
        $err = "set key as -> admin_id, mobile, name and address";
    }
} else {
    $err = "Header should be `POST`";
}
sendPostRes($response, $err);
