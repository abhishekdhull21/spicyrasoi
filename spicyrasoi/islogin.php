<?php
$isLogined = true;
$token = "";
$admin_id = "";
$admin_type = "";
$restaurant = "";

if (!isset($_GET['user']) || $_GET['user'] == 'undefined') {
    if (!isset($_SESSION['token']))
        $isLogined = false;
} else {

    $_SESSION['token'] = $_GET['user'];
}
// if (!isset($_SESSION['user'])) {
$token = $_SESSION['token'];
$user = new User($con);
($user->fetchUser($token));
$_SESSION['user'] = serialize($user);
// }
// $user = unserialize($_SESSION['user']);
$admin_id = $user->userid;
$admin_type = $user->admin_type;
$restaurant = $user->restaurant;
