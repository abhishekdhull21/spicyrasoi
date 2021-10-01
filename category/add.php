<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$pass = "";
$token = "";
$device_type = "";
define('ROOTPATH', dirname(__FILE__));

// if (isset(getallheaders()['Device-Type']))
//     $device_type = getallheaders()['Device-Type'];

// $content_type = (getallheaders());
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, ("category/add.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
    if (isset($data['category']) && isset($data['admin'])) {
        $admin = $data['admin'];
        $category =  filter_var($data['category'], FILTER_SANITIZE_STRING);
        if ($result = mysqli_query($con, "SELECT cat_name FROM `category` where cat_name = '$category'")) {
            if (mysqli_num_rows($result) < 1) {
                $sql = "INSERT INTO category (`cat_name`,`created_by`) VALUES('$category',$admin)";


                if ($result =  mysqli_query($con, $sql)) {

                    $response = array(
                        "success" => true,
                        "error" => ""
                    );
                } else {
                    $err = mysqli_error($con);
                }
            } else {
                $err = "Category already exists";
            }
        } else {
            $err = mysqli_error($con);
        }
    } else {
        $err = "set key as -> `admin` and `category` ";
    }
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);
