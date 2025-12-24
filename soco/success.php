<?php

require "connection.php";

$id = $_GET["id"]; 

$date = new DateTime();
$timeZone = new DateTimeZone("Asia/Colombo");
$date->setTimezone($timeZone);

$date_time = $date->format("Y-m-d H:i:s");

Database::iud("UPDATE `user_payments` SET `status_py_id`='2',`date_time`='" . $date_time . "'  WHERE `id`='" . $id . "' ");

header("Location: successView.php?id=" . $id);

?>

