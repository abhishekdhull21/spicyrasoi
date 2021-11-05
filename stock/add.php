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

$response ="";
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    //The request using POST method
    header("Content_Type:application/json");
    $data = json_decode(file_get_contents('php://input'),true);
    // Condition to check request in JSON
    if(isset($data['product_id']) && isset($data['in_out']) && isset($data['qty']) && isset($data['restaurant']) && isset($data['admin_id'])){
        $product_id = $data['product_id'] != '' ? $data['product_id'] : 0 ;
        $in_out = $data['in_out'] != '' ? $data['in_out'] : 0 ;
        $qty = $data['qty'] != '' ? $data['qty'] : 0 ;
        $restaurant = $data['restaurant'] != '' ? $data['restaurant'] : 0 ;
        $admin_id = $data['admin_id'] != '' ? $data['admin_id'] : 0 ;

        $sql = "INSERT INTO `stock`(`restaurant`, `admin_id`, `product_id`, `in_out`, `qty`) VALUES ($restaurant, $admin_id, '$product_id', '$in_out', $qty)";
        $res = mysqli_query($con,$sql);
        if($res){
            $response = array(
                "success" => true,

                "error" => ""
            );
        }else{
            $err = mysqli_error($con);
        }

    }
    else {
        $err= " set key as -> `restaurant`, `admin_id`, `product_id`, `in_out`, `qty`";
    }
} else {
    $err = " Header Should be POST";
}
sendPostRes($response, $err);
