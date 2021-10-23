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
    if (isset($data['name']) && isset($data['admin_id']) && isset($data['restaurant']) && isset($data['gst']) && isset($data['mobile']) && isset($data['sex'])  && isset($data['state']) && isset($data['district']) && isset($data['city']) && isset($data['pincode']) && isset($data['id_proof']) && isset($data['whereto']) && isset($data['wherefrom']) && isset($data['checkin']) && isset($data['checkout'])) {

        $admin_id = $data['admin_id'] != '' ? $data['admin_id'] : 0;
        $restaurant = $data['restaurant'] != '' ? $data['restaurant'] : 0;
        $name =  filter_var($data['name'], FILTER_SANITIZE_STRING);
        // $phone =  filter_var($data['phone'], FILTER_SANITIZE_STRING);
        $mobile =  filter_var($data['mobile'], FILTER_SANITIZE_STRING);
        $sex =  filter_var($data['sex'], FILTER_SANITIZE_STRING);
        // $email =  filter_var($data['email'], FILTER_SANITIZE_STRING);
        $gst =  filter_var($data['gst'], FILTER_SANITIZE_STRING);
        // $country =  filter_var($data['country'], FILTER_SANITIZE_STRING);
        $state =  filter_var($data['state'], FILTER_SANITIZE_STRING);
        $district =  filter_var($data['district'], FILTER_SANITIZE_STRING);
        $city =  filter_var($data['city'], FILTER_SANITIZE_STRING);
        $pincode =  filter_var($data['pincode'], FILTER_SANITIZE_STRING);
        $id_proof =  filter_var($data['id_proof'], FILTER_SANITIZE_STRING);
        $wherefrom =  filter_var($data['wherefrom'], FILTER_SANITIZE_STRING);
        $whereto =  filter_var($data['whereto'], FILTER_SANITIZE_STRING);
        $checkin =  filter_var($data['checkin'], FILTER_SANITIZE_STRING);
        $checkout =  filter_var($data['checkout'], FILTER_SANITIZE_STRING);

        // if ($result = mysqli_query($con, "SELECT restaurantid FROM `restaurant` WHERE name = '$name' and $mobile = '$mobile'")) {
        // if (mysqli_num_rows($result) < 1) {
        $sql = "INSERT INTO `customer`( `restaurant`, `user_name`, `user_mobile`, `user_sex`,`gst`,  `state`, `district`, `city`, `pincode`, `checkin`, `checkout`, `whereto`, `wherefrom`, `id_proof`, admin_id) VALUES ($restaurant,'$name', '$mobile',  '$sex','$gst','$state','$district','$city',$pincode,'$checkin','$checkout','$whereto','$wherefrom','$id_proof',$admin_id)";
        if ($result =  mysqli_query($con, $sql)) {

            $response = array(
                "success" => true,
                "error" => ""
            );
        } else {
            $err = mysqli_error($con);
        }
        // } else {
        //     $err = "Restaurant already exists";
        // }
        // } else {
        //     $err = mysqli_error($con);
        // }
    } else {
        $err = 'set key as -> {
            "admin_id": 123460,
            "restaurant": 900000,
            "name": "",
            "sex": "0",
            "mobile": "",
            "gst": "12",
            "state": "Haryana",
            "district": "",
            "city": "",
            "pincode": "126102",
            "id_proof": "12",
            "whereto": "",
            "wherefrom": "",
            "checkin": "2021-10-30",
            "checkout": "2021-10-23"
          }';
    }
} else {
    $err = "Header should be `POST`";
}
sendPostRes($response, $err);
