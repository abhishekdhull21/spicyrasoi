<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$status = true;
$response = "";

define('ROOTPATH', dirname(__FILE__));
header("Content-Type:application/json");
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, (date('H:i:s',) . ROOTPATH . " fetchstatus.php  :" . file_get_contents('php://input') . "\n"));
$data = json_decode(file_get_contents('php://input'), true);
// $data = json_encode($data);
if (isset($data['table'])  && isset($data['restaurant'])) {
    $table = $data['table'];
    $tableid = $table['tableid'];
    // $admin_id = $data['admin_id'];
    $restaurant = $data['restaurant'];
    if ($result = mysqli_query($con, "SELECT a.orderid,b.id as kot,c.bill_no,c.user_id FROM tables_session a, order_kot b,orders c where a.orderid = b.orderid and a.orderid = c.orderid and a.tablename = $tableid and a.restaurant = $restaurant and a.status = 1 limit 1")) {
        if (mysqli_num_rows($result) > 0) {
            $response = array(
                "success" => true,
                "data" => mysqli_fetch_assoc($result),
                "error" => ""
            );
        } else $err = "No Table found";
    } else $err = mysqli_error($con);
} else $err = "send key table and restaurant";
sendPostRes($response, $err);
