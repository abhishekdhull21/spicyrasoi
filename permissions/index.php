<?php

$err = "";
$response = array("success" => true, "data" => "");
define('ROOTPATH', dirname(__FILE__));
require_once('../config.php');
require_once('../functions.php');

$request = json_decode(file_get_contents('php://input'), true);
saveRequest($request, ROOTPATH);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($request['request']))
        die(sendPostRes($request, "`request` parameter not sent..."));
    switch ($request['request']) {
        case 'grant':
            verify($request, array("admin_id", "permissions"));
            grant($request);
            $response['data'] = 'Permission Granted';
            break;
        case 'access':
            verify($request, array("admin_id"));
            $res = access($request);
            $response['data'] = $res;
            break;
        case 'revoke':
            verify($request, array("admin_id", "permissions"));
            delete($request);
            // $response['data'] = $res;
            break;




        default:
            # code...
            break;
    }
} else $err = "Request should be POST current " . $_SERVER['REQUEST_METHOD'];

sendPostRes($response, $err);




function access($data)
{
    global $con;
    $admin_id = $data['admin_id'];
    $sql = "SELECT a.permission_id,b.permission,a.status as status FROM admin_permission a, permissions b WHERE a.permission_id = b.id and a.admin = $admin_id and a.status = 1";

    if (!$res = mysqli_query($con, $sql)) die(sendPostRes(false, mysqli_error($con)));
    return mysqli_fetch_all($res);
}

function grant($data)
{
    global $con;
    $admin_id = $data['admin_id'];
    $permissions = $data['permissions'];
    $sql = "UPDATE `admin_permission` SET `status`=0 where admin = $admin_id";
    mysqli_query($con, $sql);
    foreach ($permissions as $id) {
        if (check($data, $id) == true) {
            $sql = "UPDATE `admin_permission` SET `status`=1 where admin = $admin_id";
        } else {
            $sql = "INSERT INTO admin_permission (`admin`,`permission_id`,`status`) values($admin_id,$id,1)";
        }
        if (!mysqli_query($con, $sql)) die(sendPostRes(false, mysqli_error($con)));
    }
}
function delete($data)
{
    global $con;
    $notification_id = isset($data['notification_id']) ? $data['notification_id'] : 0;
    $sql = "DELETE FROM `notifications` WHERE id = $notification_id";
    if (!mysqli_query($con, $sql)) die(sendPostRes(false, mysqli_error($con)));
}
function check($data, $permission_id)
{
    global $con;
    $admin_id =  $data['admin_id'];
    $sql = "SELECT (permission_id) as total FROM admin_permission WHERE permission_id = $permission_id and admin = $admin_id";
    if (!$res = mysqli_query($con, $sql)) die(sendPostRes(false, mysqli_error($con)));
    if (mysqli_num_rows($res) > 0) return true;
    return false;
}
