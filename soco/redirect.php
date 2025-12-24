<?php

if (isset($_GET["abc"])) {

    $abc = $_GET["abc"];

    setcookie("maestrocrew", $abc, time() + (60 * 60 * 24 * 30 * 2));

    require "connection.php";

    $date = new DateTime();
    $timeZone = new DateTimeZone("Asia/Colombo");
    $date->setTimezone($timeZone);

    $clickdate = $date->format("Y-m-d");

    Database::iud("INSERT INTO `affiliate_data` (`id`,`clickdate`) VALUES ('" . $abc . "','" . $clickdate . "')  ");

    $target = $_GET['target'];
    header("Location: $target");
    exit;
} else {
    header("Location: $target");
    exit;
}
