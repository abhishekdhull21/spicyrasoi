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
fwrite($file, (ROOTPATH . "/add.php," . date("g-m-s") . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
    //{"admin_id":123460,"name":"Test Name","mobile":"123","phone":"147","email":"sdfk@agkjla.cld","gst":"12456","country":"INDIA","state":"Haryana","district":"Jind","city":"Ramrai"}
    if (isset($data['name']) && isset($data['admin_id']) && isset($data['restaurant']) && isset($data['mobile'])) {
        $admin_id = $data['admin_id'] != '' ? $data['admin_id'] : 0;
        $restaurant = $data['restaurant'] != '' ? $data['restaurant'] : 0;
        $name =  filter_var($data['name'], FILTER_SANITIZE_STRING);
        $mobile =  filter_var($data['mobile'], FILTER_SANITIZE_STRING);
        $sql = "INSERT INTO `customer`( `restaurant`, `user_name`, `user_mobile`,  admin_id) VALUES ($restaurant,'$name', '$mobile', $admin_id)";
        if ($result =  mysqli_query($con, $sql)) {
            $sdata = "SELECT user_id,user_name from customer where user_mobile  = '$mobile' order by user_id desc";
            if ($res =  mysqli_query($con, $sdata)) {
                $response = array(
                    "success" => true,
                    "data" => array("user_id" => $res['user_id'], "user_name" => $res['user_name']),
                    "error" => ""
                );
            } else {
                $err = mysqli_error($con);
            }
        } else {
            $err = mysqli_error($con);
        }
    } else {
        $err = 'set key as -> {
            "admin_id": ,
            "restaurant": ,
            "name": "",
            "mobile": "",
            
          }';
    }
} else {
    $err = "Header should be `POST`";
}
sendPostRes($response, $err);
