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
// if (isset($data['table']) && isset($data['data'])) {
//     $table = $data['table'];
//     $admin_id = $data['admin_id'];
//     $restaurant = $data['restaurant'];
//     $obj = json_encode($data['data']);
//     $sql = "SELECT * FROM tables_session WHERE table_id = $table and restaurant = $restaurant";
//     if ($res = mysqli_query($con, $sql)) {
//         $sql = "INSERT INTO `tables_session`( `table_id`, `data`,admin_id,restaurant,status) VALUES ($table,'$obj',$admin_id,$restaurant,1)";
//         if ($res->num_rows > 0)
//             $sql = "UPDATE `tables_session` SET `data` = '$obj', `status`= 1 where `table_id` = $table and restaurant = $restaurant";
//         if ($res = mysqli_query($con, $sql)) {
//             $response = array(
//                 "success" => true,
//                 "data" => json_decode($res, true),
//                 "error" => ""
//             );
//         } else $error .= mysqli_error($con);
//     } else $error .= mysqli_error($con);
// } else $error .= "Null Request key table and data admin_id restaurant";

sendPostRes($response, $error);