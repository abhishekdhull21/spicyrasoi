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
        case 'add':
            verify($request, array("title", "post", "isPublic", "restaurant"));
            add($request);
            $response['data'] = 'Notification created successfully';
            break;
        case 'get':
            verify($request, array("restaurant"));
            $res = get($request);
            $response['data'] = $res;
            break;
        case 'delete':
            verify($request, array("notification_id"));
            delete($request);
            // $response['data'] = $res;
            break;
        case 'read':
            verify($request, array("restaurant", "notification_id"));
            read($request);

            break;
        case 'isRead':
            verify($request, array("restaurant", "notification_id"));
            $res = isRead($request);
            if (!$res) $err = "Not view till now";
            break;

        case 'totalNotification':
            verify($request, array("restaurant"));
            $res = countUnRead($request);
            $response['data'] = $res;
            break;

        default:
            # code...
            break;
    }
} else $err = "Request should be POST current " . $_SERVER['REQUEST_METHOD'];

sendPostRes($response, $err);




function get($data)
{
    global $con;
    $restaurant = $data['restaurant'];
    $sql = "SELECT `id`, `title`, `post`, `date1`, `restaurant`, `type`, `remarks` FROM `notifications` WHERE status = 1 and restaurant in (0, $restaurant)";
    if (!$res = mysqli_query($con, $sql)) die(sendPostRes(false, mysqli_error($con)));
    return mysqli_fetch_all($res);
}

function add($data)
{
    global $con;
    $title = $data['title'];
    $post = $data['post'];
    $restaurant = isset($data['restaurant']) ? $data['restaurant'] : 0;
    $admin = isset($data['admin']) ? $data['admin'] : 0;
    $type = $data['isPublic'] != '' ? $data['isPublic'] : 1;
    $sql = "INSERT INTO `notifications`( `title`, `post`, `restaurant`, `type`) VALUES('$title','$post',$restaurant,$type)";
    if (!mysqli_query($con, $sql)) die(sendPostRes(false, mysqli_error($con)));
}
function delete($data)
{
    global $con;
    $notification_id = isset($data['notification_id']) ? $data['notification_id'] : 0;
    $sql = "DELETE FROM `notifications` WHERE id = $notification_id";
    if (!mysqli_query($con, $sql)) die(sendPostRes(false, mysqli_error($con)));
}
function read($data)
{
    global $con;
    $notification_id = isset($data['notification_id']) ? $data['notification_id'] : 0;
    $restaurant = isset($data['restaurant']) ? $data['restaurant'] : 0;
    $admin = isset($data['admin']) ? $data['admin'] : 0;
    $sql = "INSERT INTO `notification_show`( `notification_id`, `restaurant`, `admin_id`) VALUES ($notification_id,$restaurant,$admin)";
    if (!mysqli_query($con, $sql)) die(sendPostRes(false, mysqli_error($con)));
}

function isRead($data)
{
    global $con;

    $notification_id = isset($data['notification_id']) ? $data['notification_id'] : 0;
    $restaurant = isset($data['restaurant']) ? $data['restaurant'] : 0;
    $sql = "SELECT `id` FROM `notification_show` WHERE notification_id = $notification_id and restaurant = $restaurant";
    if (!$res = mysqli_query($con, $sql)) die(sendPostRes(false, mysqli_error($con)));
    if (mysqli_num_rows($res) > 0) return true;
    return false;
}
function countUnRead($data)
{
    global $con;

    $restaurant = isset($data['restaurant']) ? $data['restaurant'] : 0;
    $sql = "SELECT count(a.id) as total FROM `notifications` a WHERE a.id not in (SELECT b.notification_id from notification_show b where b.restaurant = $restaurant);";
    if (!$res = mysqli_query($con, $sql)) die(sendPostRes(false, mysqli_error($con)));
    if (mysqli_num_rows($res) > 0) return mysqli_fetch_assoc($res);
    return 0;
}
