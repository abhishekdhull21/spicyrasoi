<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$pass = "";
$token = "";
$device_type = "";
// define('ROOTPATH', dirname(__FILE__));

// if (isset(getallheaders()['Device-Type']))
//     $device_type = getallheaders()['Device-Type'];

// $content_type = (getallheaders());
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, ("product/add.php," . file_get_contents('php://input') . "\n"));

$response = "";
$error = "";
$data = json_decode(file_get_contents('php://input'), true);
if ($data != null) {
    $grandtotal = $data['totalPrice'];
    $table = $data['table'] != null ? $data['table'] : 0;
    $type = $data['type'] != null ? $data['type'] : "store_price";
    $orderid = date('Hisu') . $table;
    $sql = "INSERT INTO `orders`(`orderid`, `order_value`, `order_type`)  values({$orderid},{$grandtotal},'$type')";
    if (mysqli_query($con, $sql)) {
        foreach ($data['data'] as $row => $value) {
            // print_r($value);
            $productid = $value["id"];
            $sql = "INSERT INTO `orders_product`( `orderid`, `product_id`) values($orderid,$productid)";
            if (mysqli_query($con, $sql)) {
                $response = array(
                    "success" => true,
                    "data" => array("orderid" => $orderid),
                    "error" => ""
                );
            } else
                $error .= mysqli_error($con);
        }
    } else $error .= mysqli_error($con);
} else $error .= "Null Request";

sendPostRes($response, $error);
