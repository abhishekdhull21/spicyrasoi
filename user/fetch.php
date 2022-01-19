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

fwrite($file, (date('H:i:s') . "  user/fetch.php," . file_get_contents('php://input') . "\n"));

$response = "";
// print_r($_SERVER);
$device =  ($_SERVER['SystemRoot']);
$platform =  ($_SERVER['REMOTE_ADDR']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
    if (isset($data['mobile']) && isset($data['password'])) {
        $mobile = $data['mobile'];
        $password = md5($data['password']);
        do {
            $token = genrate_token(256);
            $res = check_token($con, $token);
        } while ($res["success"]);

        //     $category =  filter_var($data['category'], FILTER_SANITIZE_STRING);
        $sql = "SELECT `user_id` as userid FROM `users` where `user_mobile` ='$mobile'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            $sql = "SELECT `user_id` as userid,
        `user_name` as username,
        `user_mobile`as mobile,
        `user_email` as email,
        `user_sex` as sex,
        `user_dob` as dob,
        `user_address` as address, `join_on`, `email_verified`, `mobile_verified`, `user_verified`, `user_status` FROM `users` where `user_mobile` ='$mobile' and `password`='$password'";
            if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    // print_r($arr);
                    $res_token = add_new_token($con, $token, $arr[0]['userid'], $device, $platform);
                    if ($res_token === true)
                        $response = array(
                            "success" => true,
                            "token" => $token,
                            "error" => ""
                        );
                    else $err = $res_token;
                } else {
                    $err = "Please enter correct Password";
                }
            } else {
                $err = mysqli_error($con);
            }
        } else {
            $err = "No User found";
        }
    } else {
        $err = "set key as -> `mobile` and `password` ";
    }
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);
