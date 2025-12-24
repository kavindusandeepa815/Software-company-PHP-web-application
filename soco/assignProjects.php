<?php

require "connection.php";

$pid = $_POST["pid"];
$eid = $_POST["eid"];
$role = $_POST["role"];
$end = $_POST["end"];
$amount = $_POST["amount"];

if (empty($pid)) {
    echo ("1");
} else if (empty($eid)) {
    echo ("3");
} else if (empty($role)) {
    echo ("5");
} else if (empty($end)) {
    echo ("6");
} else if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $end)) {
    echo ("7");
} else if (empty($amount)) {
    echo ("8");
} else if (!preg_match('/^[0-9]+$/', $amount)) {
    echo ("9");
} else {


    $date = new DateTime();
    $timeZone = new DateTimeZone("Asia/Colombo");
    $date->setTimezone($timeZone);

    $start = $date->format("Y-m-d");
    $date_time = $date->format("Y-m-d H:i:s");


    Database::iud("INSERT INTO `employee_projects` (`start`,`end`,`role`,`employee_id`,`project_id`,`status_pr_id`)
    VALUES ('" . $start . "','" . $end . "','" . $role . "','" . $eid . "','" . $pid . "','3')  ");

    Database::iud("INSERT INTO `employee_payments` (`amount`,`date_time`,`employee_id`,`project_id`,`status_py_id`,`py_type_id`)
    VALUES ('" . $amount . "','" . $date_time . "','" . $eid . "','" . $pid . "','1','5')  ");

    echo ("10");
}
