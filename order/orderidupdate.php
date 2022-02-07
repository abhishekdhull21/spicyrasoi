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

fwrite($file, (date('H:i:s',) . ROOTPATH . "  order/feorderidupdate.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
        // {"total":149,"discount":"9","balance":140,"received":"147","grand_total":147,"gst":"5","gst_amount":7.45,"orderid":"900000123460023722211106000000","mode":"Cash"}

    if (isset($data['orderid']) && isset($data['mode']) && isset($data['received']) && isset($data['grand_total']) && isset($data['discount']) && isset($data['balance'])) {
        $orderid = $data['orderid'];
        $mode = $data['mode'];
        $discount = $data['discount'];
        $recived = $data['received'];
        $grand_total = $data['grand_total'];
        $balance = $data['balance'];
        $gst = $data['gst'] != null ? $data['gst'] : 0;
        $gst_amount = $data['gst_amount'] != null ? $data['gst_amount'] : 0;
        //     $category =  filter_var($data['category'], FILTER_SANITIZE_STRING);


        if ($result = mysqli_query($con, "UPDATE `orders` SET pay_type='$mode',discount=$discount, gst ='$gst', gst_amount ='$gst_amount',  recived=$recived,balance=$balance,paid=$grand_total where orderid='$orderid'")) {
            if ($result = mysqli_query($con, "UPDATE `tables_session` SET status=0 where orderid='$orderid'")) {
                $response = array(
                    "success" => true,

                    "error" => ""
                );
            } else {
                $err = mysqli_error($con);
            }
        } else {
            $err = mysqli_error($con);
        }
    } else
        $err = "set key as -> orderid ";
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);
