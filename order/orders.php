<?php
require_once('../config.php');
require_once('../functions.php');
$err = "";
$pass = "";
$token = "";
$device_type = "";
// define('ROOTPATH', dirname(__FILE__));

// if (isset(getallheaders()['Device-Type']))
//     $device_type = getallheaders()['Device-Type'];

// $content_type = (getallheaders());
$file = fopen("../logs/" . date("d-m-y") . ".txt", "a");
fwrite($file, ("product/orders.php," . file_get_contents('php://input') . "\n"));

$response = "";
$error = "";
$data = json_decode(file_get_contents('php://input'), true);
if ($data != null) {
    $grandtotal = $data['totalPrice'];
    $orderid = $data['orderid'] != null ? $data['orderid'] : 0;
    $customerID = $data['customerID'] != null ? $data['customerID'] : 0;
    $customerName = $data['customerName'] != null ? $data['customerName'] : "Cash";
    // $qty = $data['qty'] != null ? $data['qty'] : 0;
    $table = $data['table'] != null ? $data['table'] : array();
    $table_name = $table['tableid'];
    $tableid = $table['table'];
    $tablegroup = $table['tablegroup'];
    $balance = $data['balance'] != null ? $data['balance'] : 0;
    $recived = $data['recived'] != null ? $data['recived'] : 0;
    $paid = $data['paid'] != null ? $data['paid'] : 0;
    $discount = $data['discount'] != null ? $data['discount'] : 0;
    $admin_id = $data['admin_id'] != null ? $data['admin_id'] : 0;
    $pay_type = $data['customerType'] != null ? $data['customerType'] : "Cash";
    $restaurant = $data['restaurant'] != null ? $data['restaurant'] : 0;
    $type = $data['type'] != null ? $data['type'] : "store_price";
    $obj = json_encode($data['data']);

    if ($orderid == 0) {
        $orderid = $restaurant . $admin_id . $table_name . date('zyHisu');
        $bill_no = getbillno($con, $restaurant);
        $sql = "INSERT INTO `orders`(`orderid`,`bill_no`, `order_value`, `order_type`,admin_id,restaurant,status,user_id,name,`tableid`,`tablegroup`,`kot_data`)  values('{$orderid}',{$bill_no},{$grandtotal},'$type',$admin_id,$restaurant,1,$customerID,'$customerName',$tableid,$tablegroup,'$obj')";
    } else
        $sql = "UPDATE  `orders` SET  `order_value` = order_value + $grandtotal,kot_data = '$obj',`user_id` = $customerID, `name` = '$customerName' where orderid = '$orderid' and restaurant = $restaurant ";
    if (mysqli_query($con, $sql)) {
        foreach ($data['data'] as $row => $value) {
            // print_r($value);
            $productid = $value["id"];
            $qty = $value['qty'] != null ? $value['qty'] : 0;
            $price = $value['price'] != null ? $value['price'] : 0;
            $subtotal = $value['subtotal'] != null ? $value['subtotal'] : 0;
            $resf = mysqli_query($con, "SELECT * from `orders_product` where product_id = $productid and orderid = '$orderid'");
            if (mysqli_num_rows($resf) < 1) {
                $sql = "INSERT INTO `orders_product`(`orderid`, `product_id`,`qty`,`price`,subtotal) values('$orderid',$productid,$qty,$price,$subtotal)";
            } else
                $sql = "UPDATE `orders_product` SET `qty`= qty + $qty,`subtotal`= subtotal + $subtotal where orderid= '$orderid 'and product_id= $productid";
            if (mysqli_query($con, $sql)) {
                setOrderIdTable($con, $orderid, $table, $restaurant);
                $response = array(
                    "success" => true,
                    "data" => array("orderid" => $orderid, "today_orders" => getTodayOrderNo($con, $restaurant)),
                    "error" => ""
                );
            } else
                $error .= mysqli_error($con);
        }
    } else $error .= mysqli_error($con);
} else $error .= "Null Request";

sendPostRes($response, $error);

function setOrderIdTable($con, $orderid, $table, $restaurant)
{
    global $admin_id, $err;
    $table_name = $table['tableid'];
    $tableid = $table['table'];
    $tablegroup = $table['tablegroup'];
    $sql = "SELECT * FROM `tables_session` where  tablename = $table_name  and restaurant = $restaurant limit 1";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0)
        $sql = "UPDATE `tables_session` SET orderid = '$orderid' ,status =1 where restaurant = $restaurant and tablename = $table_name";
    else
        $sql = "INSERT INTO `tables_session`(`tablename`,`table_id`,`table_cat`, `admin_id`, `restaurant`, `orderid`, `status`) values($table_name,$tableid,$tablegroup,$admin_id,$restaurant,'$orderid',1) ";
    if (!mysqli_query($con, $sql)) {
        echo mysqli_error($con);
    }
}
function getbillno($con,  $restaurant)
{
    global $admin_id, $err;
    $sql = "SELECT bill_no FROM `orders` where  restaurant = $restaurant order by id desc limit 1";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_assoc($res)['bill_no'] + 1;
    return 1;
}
function getTodayOrderNo($con,  $restaurant)
{
    global $admin_id, $err;
    $date = date('Y-m-d');
    $sql = "SELECT count(bill_no) as today_orders FROM `orders` where  restaurant = $restaurant and date like concat('$date','%')";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0)
        return mysqli_fetch_assoc($res)['today_orders'] + 1;
    return 1;
}
