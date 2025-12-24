<?php

require "connection.php";


$updatePaymentAdmType = $_POST["updatePaymentAdmType"];
$updatePaymentAdmStatus = $_POST["updatePaymentAdmStatus"];
$id = $_POST["id"];
$pid = $_POST["pid"];
$uid = $_POST["uid"];


if ($updatePaymentAdmType == 0) {
    echo ("1");
} else if ($updatePaymentAdmStatus == 0) {
    echo ("1");
} else if (empty($id)) {
    echo ("1");
} else if (empty($pid)) {
    echo ("1");
} else if (empty($uid)) {
    echo ("1");
} else {


    if ($updatePaymentAdmType == 4) {

        Database::iud("DELETE FROM `employee_payments` 
        WHERE `employee_payments`.`employee_id`='" . $uid . "' AND `employee_payments`.`project_id`='" . $pid . "' AND `employee_payments`.`py_type_id`='4' AND `employee_payments`.`id`='" . $id . "' ");
        echo ("6");
    } else if ($updatePaymentAdmType == 3) {

        Database::iud("DELETE FROM `user_payments` 
        WHERE `user_payments`.`user_id`='" . $uid . "' AND `user_payments`.`project_id`='" . $pid . "' AND `user_payments`.`py_type_id`='3' AND `user_payments`.`id`='" . $id . "' ");
        echo ("6");
    } else if ($updatePaymentAdmType == 5) {
        echo ("2");
    } else if ($updatePaymentAdmType == 2) {
        echo ("2");
    } else if ($updatePaymentAdmType == 1) {
        echo ("2");
    }
}
