<?php

require "connection.php";

$userName = $_POST["userName"];
$userEmail = $_POST["userEmail"];
$userCountry = $_POST["userCountry"];

if (empty($userName)) {
    echo ("1");
} else if (!preg_match('/^[A-Za-z\s]+$/', $userName)) {
    echo ("2");
} else if (strlen($userName) > 100) {
    echo ("3");
} else if (empty($userEmail)) {
    echo ("4");
} else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    echo ("5");
} else if (strlen($userEmail) > 100) {
    echo ("6");
} else if ($userCountry == 0) {
    echo ("7");
} else {

    $prefix = 'USR';
    $randomString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);
    $timestamp = time();
    $UserID = $prefix . $randomString . $timestamp;

    Database::iud("INSERT INTO `user` (`id`,`name`,`email`,`country_id`,`password`,`status_ue_id`)
 VALUES ('" . $UserID . "','" . $userName . "','" . $userEmail . "','" . $userCountry . "','123','1')  ");

    echo ("8");
}
