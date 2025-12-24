<?php

require "connection.php";

$name = $_POST["name"];
$url = $_POST["url"];
$description = $_POST["description"];
$id = $_POST["id"];

if (empty($id)) {
    echo ("1");
} else if (empty($name)) {
    echo ("2");
} else if (empty($url)) {
    echo ("3");
} else if (empty($description)) {
    echo ("4");
} else {

    Database::iud("UPDATE `affiliate_company` 
    SET `company_name`='" . $name . "',`company_url`='" . $url . "'
    WHERE `affiliate_start_id`='" . $id . "' ");

    Database::iud("UPDATE `affiliate_billing` 
    SET `description`='" . $description . "'
    WHERE `affiliate_start_id`='" . $id . "' ");

    echo ("5");
}
