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
    if (isset($data['name']) && isset($data['admin_id']) && isset($data['restaurant']) && isset($data['phone']) && isset($data['mobile']) && isset($data['email']) && isset($data['gst']) && isset($data['country']) && isset($data['state']) && isset($data['district']) && isset($data['city'])) {

        $admin_id = $data['admin_id'] != '' ? $data['admin_id'] : 0;
        $restaurant = $data['restaurant'] != '' ? $data['restaurant'] : 0;
        $name =  filter_var($data['name'], FILTER_SANITIZE_STRING);
        $phone =  filter_var($data['phone'], FILTER_SANITIZE_STRING);
        $mobile =  filter_var($data['mobile'], FILTER_SANITIZE_STRING);
        $email =  filter_var($data['email'], FILTER_SANITIZE_STRING);
        $gst =  filter_var($data['gst'], FILTER_SANITIZE_STRING);
        $country =  filter_var($data['country'], FILTER_SANITIZE_STRING);
        $state =  filter_var($data['state'], FILTER_SANITIZE_STRING);
        $district =  filter_var($data['district'], FILTER_SANITIZE_STRING);
        $city =  filter_var($data['city'], FILTER_SANITIZE_STRING);

        if ($result = mysqli_query($con, "SELECT restaurantid FROM `restaurant` WHERE restaurantid = $restaurant")) {
            if (mysqli_num_rows($result) > 0) {
                $sql = "UPDATE `restaurant` set  `name`='$name',  `mobile` = '$mobile', `phone` = '$phone', `email` =' $email', `gst` = '$gst', `country` = '$country', `state` = '$state', `district` = '$district', `city` ='$city' WHERE restaurantid = $restaurant";
                if ($result =  mysqli_query($con, $sql)) {

                    $response = array(
                        "success" => true,
                        "error" => ""
                    );
                } else {
                    $err = mysqli_error($con);
                }
            } else {
                $err = "Restaurant Not exists";
            }
        } else {
            $err = mysqli_error($con);
        }
    } else {
        $err = "set key as -> admin_id, mobile, name,phone,gst,coutry,city,district, state,email";
    }
} else {
    $err = "Header should be `POST`";
}
sendPostRes($response, $err);
