<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$pass = "";
$token = "";
$device_type = "";
define('ROOTPATH', dirname(__FILE__));

// $file = fopen("..logs/" . date("d-m-y"). ".text", "a");
// fwrite($file,("stock/add.php,".file_get_contents('php://input')."\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //The request using POST method
    header("Content_Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // Condition to check request in JSON
    if (isset($data['offerText']) && isset($data['offerValue']) && isset($data['restaurant'])) {
        $offerText = $data['offerText'] != '' ? $data['offerText'] : "Special";
        $offerValue = $data['offerValue'] != '' ? $data['offerValue'] : 0;
        $restaurant = $data['restaurant'] != '' ? $data['restaurant'] : 0;

        $sql = "SELECT offer_id FROM `offers`where offer_text = '$offerText' and offer_value = $offerValue and restaurant = $restaurant";
        $res = mysqli_query($con, $sql);
        // print_r($res);
        $sql = "INSERT INTO `offers`( `offer_text`, `offer_value`,`restaurant`) VALUES('$offerText',$offerValue,$restaurant)";
        if (mysqli_num_rows($res) > 0) {
            $offer_id = $res['offer_id'];
            $sql = "UPDATE `offers` SET offer_text = $offerText, offer_value = $offerValue where offer_id = $offer_id and restaurant = $restaurant and product_id = $product_id";
        }
        $res = mysqli_query($con, $sql);
        if ($res) {
            $response = array(
                "success" => true,

                "error" => ""
            );
        } else {
            $err = mysqli_error($con);
        }
    } else {
        $err = " set key as -> `offerText`, `offerValue`";
    }
} else {
    $err = " Header Should be POST";
}
sendPostRes($response, $err);
