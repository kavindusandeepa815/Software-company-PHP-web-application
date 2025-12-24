<?php

require "connection.php";

$updatePrdHERole = $_POST["updatePrdHERole"];
$updatePrdHEAmount = $_POST["updatePrdHEAmount"];
$updatePrdHEEnd = $_POST["updatePrdHEEnd"];
$updatePrdHEPrdStatus = $_POST["updatePrdHEPrdStatus"];
$updatePrdHEPayStatus = $_POST["updatePrdHEPayStatus"];
$pid = $_POST["pid"];
$eid = $_POST["eid"];


if (empty($updatePrdHERole)) {
    echo ("1");
} else if (empty($updatePrdHEAmount)) {
    echo ("2");
} else if (!preg_match('/^[0-9]+$/', $updatePrdHEAmount)) {
    echo ("3");
} else if (empty($updatePrdHEEnd)) {
    echo ("4");
} else if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $updatePrdHEEnd)) {
    echo ("5");
} else if ($updatePrdHEPrdStatus == 0) {
    echo ("6");
} else if ($updatePrdHEPayStatus == 0) {
    echo ("7");
} else if (empty($pid)) {
    echo ("8");
} else if (empty($eid)) {
    echo ("9");
} else {


    Database::iud("UPDATE `employee_projects` SET `role`='" . $updatePrdHERole . "',`end`='" . $updatePrdHEEnd . "',`status_pr_id`='" . $updatePrdHEPrdStatus . "'
    WHERE `employee_projects`.`employee_id`='" . $eid . "' AND `employee_projects`.`project_id`='" . $pid . "' ");

    Database::iud("UPDATE `employee_payments` SET `amount`='" . $updatePrdHEAmount . "',`status_py_id`='" . $updatePrdHEPayStatus . "'  
    WHERE `employee_payments`.`employee_id`='" . $eid . "' AND `employee_payments`.`project_id`='" . $pid . "' AND `employee_payments`.`py_type_id`='5' ");


    echo ("10");
}
