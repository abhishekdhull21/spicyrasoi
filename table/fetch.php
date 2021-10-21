<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$status = true;
$response = "";

header("Content-Type:application/json");
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, (date('H:i:s',) . "  table/fetch.php," . file_get_contents('php://input') . "\n"));
if (isset($data['admin_id']) && isset($data['restaurant'])) {
    $admin_id = $data['admin_id'];
    $restaurant = $data['restaurant'];
    if ($result = mysqli_query($con, "SELECT * FROM `tables`  where restaurant= $restaurant and `status` = 1")) {
        if (mysqli_num_rows($result) > 0) {
            $response = array(
                "success" => true,
                "data" => mysqli_fetch_all($result, MYSQLI_ASSOC),
                "error" => ""
            );
        } else {
            $err = "No Table found";
        }
    } else {
        $err = mysqli_error($con);
    }
} else $err = "sedn key restaurant admin_id";
sendPostRes($response, $err);
