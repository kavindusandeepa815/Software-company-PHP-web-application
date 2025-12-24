<?php

require "connection.php";

$updateProjectTitle = $_POST["updateProjectTitle"];
$updateProjectStatus = $_POST["updateProjectStatus"];
$updateProjectEnd = $_POST["updateProjectEnd"];
$updateProjectAmount = $_POST["updateProjectAmount"];
$updateProjectAffiliate = $_POST["updateProjectAffiliate"];
$updateProjectAdvanced = $_POST["updateProjectAdvanced"];
$pid = $_POST["pid"];
$uid = $_POST["uid"];



if (empty($updateProjectTitle)) {
    echo ("1");
} else if ($updateProjectStatus == 0) {
    echo ("2");
} else if (empty($updateProjectEnd)) {
    echo ("3");
} else if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $updateProjectEnd)) {
    echo ("4");
} else if (empty($updateProjectAmount)) {
    echo ("5");
} else if (!preg_match('/^[0-9]+$/', $updateProjectAmount)) {
    echo ("6");
} else if (empty($updateProjectAffiliate)) {
    echo ("7");
} else if (!preg_match('/^[0-9]+$/', $updateProjectAffiliate)) {
    echo ("8");
} else if (empty($updateProjectAdvanced)) {
    echo ("9");
} else if (!preg_match('/^[0-9]+$/', $updateProjectAdvanced)) {
    echo ("10");
} else if (empty($pid)) {
    echo ("11");
} else if (empty($uid)) {
    echo ("11");
} else {

    Database::iud("UPDATE `project` SET `title`='" . $updateProjectTitle . "',`status_pr_id`='" . $updateProjectStatus . "',`end`='" . $updateProjectEnd . "',
    `affiliate`='" . $updateProjectAffiliate . "' WHERE `id`='" . $pid . "' AND `user_id`='" . $uid . "' ");

    Database::iud("UPDATE `user_payments` SET `amount`='" . $updateProjectAmount . "' WHERE `project_id`='" . $pid . "' AND `py_type_id`='1' AND `user_id`='" . $uid . "'  ");
    Database::iud("UPDATE `user_payments` SET `amount`='" . $updateProjectAdvanced . "' WHERE `project_id`='" . $pid . "' AND `py_type_id`='2' AND `user_id`='" . $uid . "'  ");

    echo ("12");
}
