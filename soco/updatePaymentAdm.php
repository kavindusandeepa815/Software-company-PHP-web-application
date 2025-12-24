<?php

require "connection.php";


$updatePaymentAdmAmount = $_POST["updatePaymentAdmAmount"];
$updatePaymentAdmType = $_POST["updatePaymentAdmType"];
$updatePaymentAdmStatus = $_POST["updatePaymentAdmStatus"];
$id = $_POST["id"];
$pid = $_POST["pid"];
$uid = $_POST["uid"];


if (empty($updatePaymentAdmAmount)) {
    echo ("1");
} else if (!preg_match('/^[0-9]+$/', $updatePaymentAdmAmount)) {
    echo ("2");
} else if ($updatePaymentAdmType == 0) {
    echo ("3");
} else if ($updatePaymentAdmStatus == 0) {
    echo ("4");
} else if (empty($id)) {
    echo ("5");
} else if (empty($pid)) {
    echo ("5");
} else if (empty($uid)) {
    echo ("5");
} else {

    // echo $updatePaymentAdmAmount;
    // echo $updatePaymentAdmType;
    // echo $updatePaymentAdmStatus;
    // echo $id;
    // echo $pid;
    // echo $uid;

    $date = new DateTime();
    $timeZone = new DateTimeZone("Asia/Colombo");
    $date->setTimezone($timeZone);

    $date_time = $date->format("Y-m-d H:i:s");


    if ($updatePaymentAdmType == 4) {

        Database::iud("UPDATE `employee_payments` SET `amount`='" . $updatePaymentAdmAmount . "' , `status_py_id`='" . $updatePaymentAdmStatus . "' , `date_time`='".$date_time."' 
        WHERE  `employee_payments`.`id`='" . $id . "' ");
        echo ("6");
    } else if ($updatePaymentAdmType == 3) {

        Database::iud("UPDATE `user_payments` SET `amount`='" . $updatePaymentAdmAmount . "' , `status_py_id`='" . $updatePaymentAdmStatus . "'  , `date_time`='".$date_time."' 
        WHERE  `user_payments`.`id`='" . $id . "' ");
        echo ("6");
    } else if ($updatePaymentAdmType == 5) {

        Database::iud("UPDATE `employee_payments` SET `amount`='" . $updatePaymentAdmAmount . "' , `status_py_id`='" . $updatePaymentAdmStatus . "'  , `date_time`='".$date_time."' 
        WHERE  `employee_payments`.`id`='" . $id . "' ");
        echo ("6");
    } else if ($updatePaymentAdmType == 2) {

        Database::iud("UPDATE `user_payments` SET `amount`='" . $updatePaymentAdmAmount . "' , `status_py_id`='" . $updatePaymentAdmStatus . "'  , `date_time`='".$date_time."' 
        WHERE  `user_payments`.`id`='" . $id . "' ");
        echo ("6");
    } else if ($updatePaymentAdmType == 1) {

        Database::iud("UPDATE `user_payments` SET `amount`='" . $updatePaymentAdmAmount . "' , `status_py_id`='" . $updatePaymentAdmStatus . "'  , `date_time`='".$date_time."' 
        WHERE  `user_payments`.`id`='" . $id . "' ");
        echo ("6");
    }
} 
