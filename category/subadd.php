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
    if (isset($data['title']) && isset($data['admin']) && isset($data['category']) && isset($data['resturent'])) {
        $admin = $data['admin'];
        $resturent = $data['resturent'];
        $category = $data['category'];
        $title =  filter_var($data['title'], FILTER_SANITIZE_STRING);
        if ($result = mysqli_query($con, "SELECT `name` FROM `subcategory` where `name` = '$title' and `cat_id` = $category")) {
            if (mysqli_num_rows($result) < 1) {
                $sql = "INSERT INTO `subcategory`( `cat_id`, `name`, `created_by`, `resturent_id`) VALUES($category,'$title',$admin,$resturent)";
                if ($result =  mysqli_query($con, $sql)) {

                    $response = array(
                        "success" => true,
                        "error" => ""
                    );
                } else {
                    $err = mysqli_error($con);
                }
            } else {
                $err = "Sub-Category already exists";
            }
        } else {
            $err = mysqli_error($con);
        }
    } else {
        $err = "set key as -> `admin` and `title`,resturent ";
    }
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);
