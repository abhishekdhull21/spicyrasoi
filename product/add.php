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
fwrite($file, ("product/add.php," . file_get_contents('php://input') . "\n"));

$response = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    header("Content-Type:application/json");
    $data = json_decode(file_get_contents('php://input'), true);
    // condition to check request in json 
    // if(strpos($content_type, "application/json") !== false){
    if (isset($data['category']) && isset($data['admin_id']) && isset($data['restaurant']) && isset($data['product']) && isset($data['store-price']) && isset($data['swiggy-price']) && isset($data['zomato-price']) && isset($data['local-price']) && isset($data['gst']) && isset($data['discount']) && isset($data['unit-name']) && isset($data['hsn-code'])) {
        $category = $data['category'] != '' ? $data['category'] : 0;
        $subcategory = $data['subcategory'] != '' ? $data['subcategory'] : 0;
        $store_price = $data['store-price'] != '' ? $data['store-price'] : 0;
        $swiggy_price = $data['swiggy-price'] != '' ? $data['swiggy-price'] : 0;
        $zomato_price = $data['zomato-price'] != '' ? $data['zomato-price'] : 0;
        $local_price = $data['local-price'] != '' ? $data['local-price'] : 0;
        $discount = $data['discount'] != '' ? $data['discount'] : 0;
        $admin_id = $data['admin_id'] != '' ? $data['admin_id'] : 0;
        $restaurant = $data['restaurant'] != '' ? $data['restaurant'] : 0;
        $gst = $data['gst'] != '' ? $data['gst'] : 0;
        // $hsn = $data['hsn-ceod'] != '' ? $data['hsn-code'] : 0;
        $gst_type =  filter_var($data['gst_type'], FILTER_SANITIZE_STRING);
        $food_type =  filter_var($data['food_type'], FILTER_SANITIZE_STRING);
        $hsn =  filter_var($data['hsn-code'], FILTER_SANITIZE_STRING);
        $product =  filter_var($data['product'], FILTER_SANITIZE_STRING);
        $unit =  filter_var($data['unit-name'], FILTER_SANITIZE_STRING);
<<<<<<< HEAD
        if ($result = mysqli_query($con, "SELECT product_name FROM `product` where product_name = '$product' AND sub_category='$subcategory' AND restaurant='$restaurant' AND category='$category'")) {
=======
        if ($result = mysqli_query($con, "SELECT product_name FROM `product` where restaurant = $restaurant and category = $category and product_name = '$product'")) {
>>>>>>> 785535e4255976ab38577e474bdb16e3c4b682b6
            if (mysqli_num_rows($result) < 1) {
                $sql = "INSERT INTO `product`( `category`,admin_id,restaurant,`sub_category`, `product_name`, `store_price`, `swiggy_price`, `zomato_price`, `local_price`,`gst_type`,`food_type`, `gst`, `discount`, `unit_name`, `hsn_code`) VALUES($category,$admin_id,$restaurant,$subcategory,'$product',$store_price,$swiggy_price,$zomato_price,$local_price,'$gst_type','$food_type','$gst',$discount,'$unit','$hsn')";


                if ($result =  mysqli_query($con, $sql)) {

                    $response = array(
                        "success" => true,
                        "error" => ""
                    );
                } else {
                    $err = mysqli_error($con);
                }
            } else {
                $err = "Product already exists";
            }
        } else {
            $err = mysqli_error($con);
        }
    } else {
        $err = "set key as -> `product`, `category`, `store-price`, `zomato-price`, `swiggy-price`, `local-price`, `discount`, `gst`, `unit-name`, `hsn-code`";
    }
} else {
    $err = "Header should be POST";
}
sendPostRes($response, $err);
