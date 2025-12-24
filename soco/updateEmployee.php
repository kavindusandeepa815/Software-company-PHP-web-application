<?php

require "connection.php";

$updateEmpName = $_POST["updateEmpName"];
$updateEmpEmail = $_POST["updateEmpEmail"];
$updateEmpContact = $_POST["updateEmpContact"];
$updateEmpBank = $_POST["updateEmpBank"];
$updateEmpType = $_POST["updateEmpType"];
$updateEmpStatus = $_POST["updateEmpStatus"];
$updateEmpId = $_POST["updateEmpId"];

if (empty($updateEmpName)) {
    echo ("1");
} else if (!preg_match('/^[A-Za-z\s]+$/', $updateEmpName)) {
    echo ("2");
} else if (strlen($updateEmpName) > 100) {
    echo ("3");
} else if (empty($updateEmpEmail)) {
    echo ("4");
} else if (!filter_var($updateEmpEmail, FILTER_VALIDATE_EMAIL)) {
    echo ("5");
} else if (strlen($updateEmpEmail) > 100) {
    echo ("6");
} else if (empty($updateEmpContact)) {
    echo ("7");
} else if (!preg_match('/^[0-9]+$/', $updateEmpContact)) {
    echo ("8");
} else if (strlen($updateEmpContact) > 14) {
    echo ("9");
} else if (empty($updateEmpBank)) {
    echo ("10");
} else if ($updateEmpType == 0) {
    echo ("11");
} else if ($updateEmpStatus == 0) {
    echo ("12");
} else if (empty($updateEmpId)) {
    echo ("13");
} else {

    Database::iud("UPDATE `employee` SET `name`='" . $updateEmpName . "',`email`='" . $updateEmpEmail . "',`contact`='" . $updateEmpContact . "',`bank`='" . $updateEmpBank . "',
    `status_ue_id`='" . $updateEmpStatus . "',`pr_type_id`='" . $updateEmpType . "'
     WHERE `id`='" . $updateEmpId . "' ");

    echo ("14");
}
