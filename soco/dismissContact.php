<?php

require "connection.php";

$id = $_GET["id"];


if (empty($id)) {
    echo ("1");
} else {

    Database::iud("UPDATE `contact` SET `status_ue_id`='2'  WHERE `id`='" . $id . "' ");

    echo ("2");
}
