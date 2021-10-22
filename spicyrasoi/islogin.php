<?php
$isLogined = true;
$token = "";
$admin_id = "";
$admin_type = "";
$restaurant = "";
require_once('../config.php');
if (!isset($_GET['user']) || $_GET['user'] == 'undefined') {
    if (!isset($_SESSION['token'])) {
        $isLogined = false;
    }
} else {
    $_SESSION['token'] = $_GET['user'];
}
$token = $_SESSION['token'];
if (!isset($_SESSION['user'])) {
    $user = new User($con);
    $user->fetchUser($token);
    // if ($user->userid != null && $user->userid != null) {
    $restaurant = $user->restaurant;
    $admin_id = $user->userid;
    $admin_type = $user->admin_type;
    // $restaurant = $user->restaurant;
    $_SESSION['user'] = serialize($user);
} else {
    $user = unserialize($_SESSION['user']);
    if ($user->userid != null && $user->userid != null) {
        $restaurant = $user->restaurant;
        $admin_id = $user->userid;
    }
}
