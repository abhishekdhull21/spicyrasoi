<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$response = "";
define('ROOTPATH', dirname(__FILE__));

$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, (ROOTPATH . "update.php ::" . file_get_contents('php://input') . "\n"));
$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['table'])  && isset($data['status']) && isset($data['restaurant'])) {
    $status = $data['status'] != null ? $data['status'] : 0;
    $restaurant = $data['restaurant'] != null ? $data['restaurant'] : 0;
    // $table = $data['table'] != null ? $data['table'] : 0;
    $table = $data['table'] != null ? $data['table'] : array();
    $table_name = $table['tableid'];
    $tableid = $table['table'];
    $tablegroup = $table['tablegroup'];
    $sql = "UPDATE  tables_session SET `status` = 0 , data = null,orderid=0 where `tablename`= $table_name and restaurant = $restaurant";
    if ($result =  mysqli_query($con, $sql)) {
        $response = array(
            "success" => true,
            "error" => ""
        );
    } else {
        $err = mysqli_error($con);
    }
} else $err = "key status table and restaurant";
sendPostRes($response, $err);
