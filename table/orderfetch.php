<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$status = true;
$response = "";

define('ROOTPATH', dirname(__FILE__));
header("Content-Type:application/json");
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, (date('H:i:s',) . ROOTPATH . " orderfetch.php  :" . file_get_contents('php://input') . "\n"));
$data = json_decode(file_get_contents('php://input'), true);
// $data = json_encode($data);
if (isset($data['table'])  && isset($data['restaurant'])) {
    $table = $data['table'];
    // $admin_id = $data['admin_id'];
    $restaurant = $data['restaurant'];
    if ($result = mysqli_query($con, "SELECT data FROM `tables_session` where table_id = $table and restaurant = $restaurant  and `status`=1")) {
        if (mysqli_num_rows($result) > 0) {
            $response = array(
                "success" => true,
                "data" => json_decode(mysqli_fetch_assoc($result)["data"], true),
                "error" => ""
            );
        } else $err = "No Table found";
    } else $err = mysqli_error($con);
} else $err = "send key table and restaurant";
sendPostRes($response, $err);