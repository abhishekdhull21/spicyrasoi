
<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$pass = "";
$token = "";
$device_type = "";
$status = true;
define('ROOTPATH', dirname(__FILE__));

// if (isset(getallheaders()['Device-Type']))
//     $device_type = getallheaders()['Device-Type'];

// $content_type = (getallheaders());
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");

fwrite($file, (date('H:i:s',) . "  analytics/salepaymenttype.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
    if (isset($data['start'], $data['end'], $data['restaurant'])) {
        $start = $data['start'];
        $end = $data['end'];
        $restaurant = $data['restaurant'];
        //    $start = $data['start'];
        //     $category =  filter_var($data['category'], FILTER_SANITIZE_STRING);
        " grOUP BY a.pay_type";


        if ($result = mysqli_query($con, "SELECT a.pay_type,SUM(a.order_value) as total FROM `orders` a WHERE a.date BETWEEN date('$start') and date('$end') and  a.restaurant = $restaurant  group by a.pay_type")) {
            if (mysqli_num_rows($result) > 0) {

                $response = array(
                    "success" => true,
                    "data" => mysqli_fetch_all($result, MYSQLI_ASSOC),
                    "error" => ""
                );
            } else {
                $err = "No data found";
            }
        } else {
            $err = mysqli_error($con);
        }
    } else {
        $err = "set key as -> `admin`,`start`,`end` and `restaurant` ";
    }
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);