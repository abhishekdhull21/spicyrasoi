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
fwrite($file, ("resturant/rest_status.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){

    if (isset($data['rest_id']) && isset($data['status'])) {
        
        $rest_id = $data['rest_id'] != '' ? $data['rest_id'] : 0;
        $status = $data['status'] != '' ? $data['status'] : 0;
       
        // echo  "SELECT product_name FROM `product` where restaurant = $restaurant and product_id = $productid";
        // if ($result = mysqli_query($con, "SELECT * FROM `resturant` where restaurant = $restaurant and product_id = $productid")) {
        //     if (mysqli_num_rows($result) > 0) {
                $sql = "UPDATE `restaurant` SET `status`=$status WHERE `restaurantid`=$rest_id";


                if ($result =  mysqli_query($con, $sql)) {

                    $response = array(
                        "success" => true,
                        "error" => ""
                    );
                } else {
                    $err = mysqli_error($con);
                }
        //     } else {
        //         $err = "Product doesn't exists";
        //     }
        // } else {
        //     $err = mysqli_error($con);
        // }
    } else {
        $err = "set key as -> `product`,`productid`, `category`, `store-price`, `zomato-price`, `swiggy-price`, `local-price`, `discount`, `gst`, `unit-name`, `hsn-code`";
    }
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);
