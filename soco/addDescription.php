<?php

require "connection.php";

$id = $_POST["id"];
$text = $_POST["text"];

if (empty($id)) {
    echo ("1");
} else if (empty($text)) {
    echo ("1");
} else {

    Database::iud("INSERT INTO `description` (`project_id`,`description`) VALUES ('".$id."','".$text."') ");

    echo ("2");

}
