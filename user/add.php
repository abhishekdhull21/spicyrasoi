<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$pass = "";
$token = "";
$device_type = "";
$username = "";
$mobile = "";
$email = "";
$address = "";
$sex = "";
$dob = "";

define('ROOTPATH', dirname(__FILE__));

// if (isset(getallheaders()['Device-Type']))
//     $device_type = getallheaders()['Device-Type'];

// $content_type = (getallheaders());
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, (date('H:i:s') . "user/add.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
    if (isset($data['username']) && isset($data['mobile'])) {
        if (strlen($data['mobile']) == 10) {
            $mobile = $data['mobile'];
            if (strlen($data['username']) > 0)
                $username = filter_var($data['username'], FILTER_SANITIZE_STRING);;
            if (isset($data['dob'])) $dob = $data['dob'];
            if (isset($data['sex'])) $sex = $data['sex'];
            if (isset($data['email'])) $email = filter_var($data['email'], FILTER_SANITIZE_STRING);

            if (isset($data['address']))
                $address =   filter_var($data['address'], FILTER_SANITIZE_STRING);
            $sql = "SELECT user_id FROM `users` where user_mobile = '$mobile'";
            if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) < 1) {
                    $sql = "INSERT INTO `users`( `user_name`, `user_mobile`, `user_email`, `user_sex`, `user_dob`, `user_address`) VALUES('$username','$mobile','$email','$sex','$dob','$address')                    ";

                    if ($result =  mysqli_query($con, $sql)) {

                        $response = array(
                            "success" => true,
                            "error" => ""
                        );
                    } else
                        $err = mysqli_error($con);
                } else
                    $err = "User already registerd with us";
            } else $err = mysqli_error($con);
        } else $err = "Enter a valid mobile number";
    } else {
        $err = "set key as -> `username`, `password`,`mobile`";
    }
} else {
    $err = "Send Request as POST Method";
}
sendPostRes($response, $err);
