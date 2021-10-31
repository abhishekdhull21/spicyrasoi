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
fwrite($file, (ROOTPATH . "/addcateogry.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
    if (isset($data['title']) && isset($data['number']) && isset($data['admin_id']) && isset($data['restaurant'])) {
        $admin = $data['admin_id'];
        $restaurant = $data['restaurant'];
        $charge = $data['charge'] != null ? $data['charge'] : 0;
        $number = $data['number'] != null ? $data['number'] : 0;
        $title =  filter_var($data['title'], FILTER_SANITIZE_STRING);
        if ($result = mysqli_query($con, "SELECT id FROM `dashboard` where title = '$title' and restaurant = $restaurant")) {
            if (mysqli_num_rows($result) < 1) {
                $sql = "INSERT INTO dashboard (admin_id,restaurant,title,tables,charge) VALUES($admin,$restaurant,'$title',$number,$charge)";


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
        $err = "set key as -> `admin_id` and `number`,title restaurant ";
    }
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);
