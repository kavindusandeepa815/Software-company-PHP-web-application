<?php

require "connection.php";

$id = $_POST["id"];
$text = $_POST["text"];

if (empty($id)) {
    echo ("1");
} else if (empty($text)) {
    echo ("1");
} else {


    $query = ("SELECT * FROM `description` WHERE `project_id`='" . $id . "' ");

    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;


    if ($num_rows > 0) {

        Database::iud("UPDATE `description` SET `description`='" . $text . "' WHERE `project_id`='" . $id . "' ");
        echo ("3");
    } else {
        echo ("2");
    }
}
