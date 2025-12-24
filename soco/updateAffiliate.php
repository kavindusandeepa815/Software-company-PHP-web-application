<?php

require "connection.php";

$name = $_POST["name"];
$email = $_POST["email"];
$country = $_POST["country"];
$status = $_POST["status"];
$id = $_POST["id"];

if (empty($id)) {
    echo ("1");
} else if (empty($name)) {
    echo ("2");
} else if (empty($email)) {
    echo ("3");
} else if ($country == 0) {
    echo ("4");
} else if ($status == 0) {
    echo ("5");
} else {

    Database::iud("UPDATE `affiliate_start` 
    SET `name`='" . $name . "',`status_ue_id`='" . $status . "',`email`='" . $email . "',`country_id`='" . $country . "'
    WHERE `id`='" . $id . "' ");

    echo ("6");
}
