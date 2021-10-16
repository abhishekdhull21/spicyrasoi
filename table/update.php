<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$response = "";
define('ROOTPATH', dirname(__FILE__));

$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, (ROOTPATH . "::" . file_get_contents('php://input') . "\n"));
$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['table'])  && isset($data['status'])) {
    $status = $data['status'] != null ? $data['status'] : 0;
    $sql = "UPDATE  tables SET status = $status";
    if ($result =  mysqli_query($con, $sql)) {
        $response = array(
            "success" => true,
            "error" => ""
        );
    } else {
        $err = mysqli_error($con);
    }
} else $err = "key status table";
sendPostRes($response, $err);
