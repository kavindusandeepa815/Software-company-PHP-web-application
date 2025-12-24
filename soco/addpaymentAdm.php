<?php

require "connection.php";

$addPaymentAdmAmount = $_POST["addPaymentAdmAmount"];
$addPaymentAdmType = $_POST["addPaymentAdmType"];
$addPaymentAdmPId = $_POST["addPaymentAdmPId"];
$addPaymentAdmUEId = $_POST["addPaymentAdmUEId"];


if (empty($addPaymentAdmAmount)) {
    echo ("1");
} else if (!preg_match('/^[0-9]+$/', $addPaymentAdmAmount)) {
    echo ("2");
} else if ($addPaymentAdmType == 0) {
    echo ("3");
} else if (empty($addPaymentAdmPId)) {
    echo ("4");
} else if (empty($addPaymentAdmUEId)) {
    echo ("6");
} else {


    $date = new DateTime();
    $timeZone = new DateTimeZone("Asia/Colombo");
    $date->setTimezone($timeZone);

    $date_time = $date->format("Y-m-d H:i:s");

    if ($addPaymentAdmType == 4) {

        Database::iud("INSERT INTO `employee_payments` (`amount`,`date_time`,`employee_id`,`project_id`,`status_py_id`,`py_type_id`)
        VALUES ('" . $addPaymentAdmAmount . "','" . $date_time . "','" . $addPaymentAdmUEId . "','" . $addPaymentAdmPId . "','1','" . $addPaymentAdmType . "') ");
    } else if ($addPaymentAdmType == 3) {


        $prefix = 'PAY';
        $randomString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);
        $timestamp = time();
        $UsrpaymentID = $prefix . $randomString . $timestamp;


        Database::iud("INSERT INTO `user_payments` (`id`,`amount`,`date_time`,`user_id`,`project_id`,`status_py_id`,`py_type_id`)
        VALUES ('" . $UsrpaymentID . "','" . $addPaymentAdmAmount . "','" . $date_time . "','" . $addPaymentAdmUEId . "','" . $addPaymentAdmPId . "','1','" . $addPaymentAdmType . "') ");
    } else {
        echo ("8");
    }

    echo ("9");
}
