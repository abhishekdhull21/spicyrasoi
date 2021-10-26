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

fwrite($file, (date('H:i:s',) . ROOTPATH . "  restaurant/fetch.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
    if (isset($data['restaurant'])) {
        $restaurant = $data['restaurant'];
        $mobile = $data['mobile'];
        if (strlen($mobile) == 10) {
            //     $category =  filter_var($data['category'], FILTER_SANITIZE_STRING);
            if ($result = mysqli_query($con, "SELECT * FROM `customer` where restaurant = $restaurant and user_mobile  = $mobile")) {
                if (mysqli_num_rows($result) > 0) {

                    $response = array(
                        "success" => true,
                        "data" => mysqli_fetch_all($result, MYSQLI_ASSOC),
                        "error" => ""
                    );
                } else {
                    $response = array(
                        "success" => true,
                        "data" => array(),
                        "error" => ""
                    );
                }
            } else {
                $err = mysqli_error($con);
            }
        } else $err = "Enter valid mobile number";
    } else
        $err = "set key as -> restaurant ";
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);
