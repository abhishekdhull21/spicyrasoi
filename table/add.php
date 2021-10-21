<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$response = "";

$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, ("table/add.php," . file_get_contents('php://input') . "\n"));
if (isset($data['admin_id']) && isset($data['restaurant'])) {
    $admin_id = $data['admin_id'];
    $restaurant = $data['restaurant'];
    $sql = "INSERT INTO tables (admin_id,restaurant) VALUES ($admin_id,$restaurant)";
    if ($result =  mysqli_query($con, $sql)) {
        $response = array(
            "success" => true,
            "error" => ""
        );
    } else {
        $err = mysqli_error($con);
    }
} else $err = "send key admin_id and restaurant";
sendPostRes($response, $err);
