<?php
require_once('./config.php');
require_once('./functions.php');
$err = "";
$pass = "";
$token = "";
$device_type = "";
$status = true;
define('ROOTPATH', dirname(__FILE__));

// if (isset(getallheaders()['Device-Type']))
//     $device_type = getallheaders()['Device-Type'];

// $content_type = (getallheaders());
$file = fopen("./logs/" . date("d-m-y") . ".txt", "a");

fwrite($file, (date('H:i:s') . " verify.php," . file_get_contents('php://input') . "\n"));
sleep(1);
$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
    if (isset($data['otp'])) {
        $pin = $data['otp'] != null ? $data['otp'] : 0;
        $restaurant = $data['restaurant'];
        //     $category =  filter_var($data['category'], FILTER_SANITIZE_STRING);
        $sql = "SELECT  `pin`  FROM `restaurant` WHERE  restaurantid = $restaurant and pin = $pin";
        if ($res = mysqli_query($con, $sql)) {
            // print_r($res);
            if (mysqli_num_rows($res) > 0) {
                if ($pin === mysqli_fetch_assoc($res)['pin']) {
                    $result = resetTable($con, $restaurant);
                    if ($result[0]) {
                        $response = array("success" => true, "error" => "");
                    } else
                        $err = $result[1];
                } else $err = "OTP not verified";
            } else
                $err = "OTP not verified, contact to Administrator";
        } else
            $err = mysqli_error($con);
    } else $err = "OTP not found";
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);

function resetTable($con, $restaurant)
{
    $sql = "SELECT orderid FROM orders WHERE restaurant = $restaurant";
    if ($res = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($res))
            if (!deleteOrder($con, $row['orderid'])) {
                return array(false, "something going wrong");
            }
    } else {
        return array(false, "err" => mysqli_error($con));
    }
    return array(true);
}

function deleteOrder($con, $orderid)
{
    $tables = array("orders", "orders_product");
    foreach ($tables as $table) {
        $sql = "DELETE FROM $table WHERE orderid = $orderid";
        if (!mysqli_query($con, $sql)) {
            return false;
        }
    }
    return true;
}
