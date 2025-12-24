<?php

require "connection.php";


$pid = $_POST["pid"];
$eid = $_POST["eid"];


if (empty($pid)) {
    echo ("1");
} else if (empty($eid)) {
    echo ("2");
} else {


    Database::iud("DELETE FROM `employee_projects` WHERE `employee_id`='" . $eid . "' AND `project_id`='" . $pid . "' ");

    Database::iud("DELETE FROM `employee_payments` WHERE `employee_id`='" . $eid . "' AND `project_id`='" . $pid . "' ");


    echo ("3");
}
