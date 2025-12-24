<?php

require "connection.php";

$employeeName = $_POST["employeeName"];
$employeeEmail = $_POST["employeeEmail"];
$employeeContact = $_POST["employeeContact"];
$employeeBank = $_POST["employeeBank"];
$employeeProType = $_POST["employeeProType"];

if (empty($employeeName)) {
    echo ("1");
} else if (!preg_match('/^[A-Za-z\s]+$/', $employeeName)) {
    echo ("2");
} else if (strlen($employeeName) > 100) {
    echo ("3");
} else if (empty($employeeEmail)) {
    echo ("4");
} else if (!filter_var($employeeEmail, FILTER_VALIDATE_EMAIL)) {
    echo ("5");
} else if (strlen($employeeEmail) > 100) {
    echo ("6");
} else if (empty($employeeContact)) {
    echo ("7");
} else if (!preg_match('/^[0-9]+$/', $employeeContact)) {
    echo ("8");
} else if (strlen($employeeContact) > 14) {
    echo ("9");
} else if (empty($employeeBank)) {
    echo ("10");
} else if ($employeeProType == 0) {
    echo ("11");
} else {


    $prefix = 'EMP';
    $randomString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);
    $timestamp = time();
    $EmployeeID = $prefix . $randomString . $timestamp;


    Database::iud("INSERT INTO `employee` (`id`,`name`,`email`,`contact`,`bank`,`status_ue_id`,`pr_type_id`)
    VALUES ('" . $EmployeeID . "','" . $employeeName . "','" . $employeeEmail . "','" . $employeeContact . "','" . $employeeBank . "','1','" . $employeeProType . "')  ");

    echo ("12");
}
