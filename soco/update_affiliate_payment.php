<?php

require "connection.php";

$id = $_POST["id"];
$status = $_POST["status"];

if (empty($id)) {
    echo ("1");
} else if ($status == 0) {
    echo ("2");
} else {

    $date = new DateTime();
    $timeZone = new DateTimeZone("Asia/Colombo");
    $date->setTimezone($timeZone);

    $start = $date->format("Y-m-d");
    $date_time = $date->format("Y-m-d H:i:s");

    Database::iud("UPDATE `affiliate_payment` SET `status_py_id`='" . $status . "',`date_time`='".$date_time."' WHERE `id`='" . $id . "' ");
    echo ("3");
}
