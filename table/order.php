<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$response = "";
$error = "";

define('ROOTPATH', dirname(__FILE__));
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, (ROOTPATH . ":" . file_get_contents('php://input') . "\n"));

$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['table']) && isset($data['data'])) {
    $table = $data['table'];
    $obj = json_encode($data['data']);
    $sql = "INSERT INTO `tables_session`( `table_id`, `data`) VALUES ($table,'$obj')";
    if ($res = mysqli_query($con, $sql)) {
        $response = array(
            "success" => true,
            "data" => json_decode($res, true),
            "error" => ""
        );
    } else $error .= mysqli_error($con);
} else $error .= "Null Request key table and data";

sendPostRes($response, $error);
