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
    if( isset($data['cust_id']) && isset($data['amt']) && isset($data['type']) && isset($data['restaurant']) && isset($data['admin_id']) && isset($data['remark']) ){
        //$transaction_id = $data['transaction_id'] != '' ? $data['transaction_id'] : 0 ;
        $cust_id = $data['cust_id'] != '' ? $data['cust_id'] : 0 ;
        $amt = $data['amt'] != '' ? $data['amt'] : 0 ;
        $type = $data['type'] != '' ? $data['type'] : 0 ;
        $restaurant = $data['restaurant'] != '' ? $data['restaurant'] : 0 ;
        $admin_id = $data['admin_id'] != '' ? $data['admin_id'] : 0 ;
        //$date = $data['date'] != '' ? $data['date'] : 0 ;
        $remark = $data['remark'] != '' ? $data['remark'] : 0 ;
        //$status = $data['status'] != '' ? $data['status'] : 0 ;

        $sql = "INSERT INTO `customer_amt`( `cust_id`, `restaurant`, `admin_id`, `amt`, `type`, `remark`) VALUES ( $cust_id, '$restaurant', '$admin_id', $amt, '$type','$remark')";
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
        $err= " set key as -> `cust_id`, `restaurant`, `admin_id`, `amt`, `type`, `remark`";
    }
} else {
    $err = " Header Should be POST";
}
sendPostRes($response, $err);
