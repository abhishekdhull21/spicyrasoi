<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$response = "";

$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, ("table/add.php," . file_get_contents('php://input') . "\n"));

$sql = "INSERT INTO tables (status) VALUES (1)";
if ($result =  mysqli_query($con, $sql)) {
    $response = array(
        "success" => true,
        "error" => ""
    );
} else {
    $err = mysqli_error($con);
}
sendPostRes($response, $err);
