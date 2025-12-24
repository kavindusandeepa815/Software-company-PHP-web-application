<?php

require "connection.php";

$title = $_POST["title"];
$type = $_POST["type"];
$email = $_POST["email"];
$status = $_POST["status"];
$end = $_POST["end"];
$amount = $_POST["amount"];
$affiliate = $_POST["affiliate"];
$affiliateId = $_POST["affiliateId"];
$advanced = $_POST["advanced"];


if (empty($title)) {
    echo ("1");
} else if ($type == 0) {
    echo ("2");
} else if (empty($email)) {
    echo ("3");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("4");
} else if ($status == 0) {
    echo ("5");
} else if (empty($end)) {
    echo ("6");
} else if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $end)) {
    echo ("7");
} else if (empty($amount)) {
    echo ("8");
} else if (!preg_match('/^[0-9]+$/', $amount)) {
    echo ("9");
} else if (empty($affiliate)) {
    echo ("10");
} else if (!preg_match('/^[0-9]+$/', $affiliate)) {
    echo ("11");
} else if (empty($advanced)) {
    echo ("12");
} else if (!preg_match('/^[0-9]+$/', $advanced)) {
    echo ("13");
} else if (empty($affiliateId)) {
    echo ("16");
} else {


    $date = new DateTime();
    $timeZone = new DateTimeZone("Asia/Colombo");
    $date->setTimezone($timeZone);

    $start = $date->format("Y-m-d");
    $date_time = $date->format("Y-m-d H:i:s");

    $result_set1 = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' ");
    $result = $result_set1->num_rows;

    if ($result >= 1) {

        $result_set3 = Database::search("SELECT * FROM `affiliate_start` WHERE `id`='" . $affiliateId . "' ");
        $result_set3_num =  $result_set3->num_rows;

        if ($result_set3_num == 1) {

            $data1 = $result_set1->fetch_assoc();

            $prefix = 'PRJ';
            $randomString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);
            $timestamp = time();
            $ProjectID = $prefix . $randomString . $timestamp;

            Database::iud("INSERT INTO `project` (`id`,`user_id`,`title`,`pr_type_id`,`start`,`end`,`status_pr_id`,`affiliate`)
            VALUES ('" . $ProjectID . "','" . $data1["id"] . "','" . $title . "','" . $type . "','" . $start . "','" . $end . "','" . $status . "','" . $affiliate . "')  ");

            $result_set2 = Database::search("SELECT * FROM `project` WHERE `user_id`='" . $data1["id"] . "' AND `title`='" . $title . "' AND `start`='" . $start . "' ");
            $data2 = $result_set2->fetch_assoc();

            $prefix = 'PAY';
            $randomString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);
            $timestamp = time();
            $USerPayIDA = $prefix . $randomString . $timestamp;

            Database::iud("INSERT INTO `user_payments` (`id`,`amount`,`date_time`,`user_id`,`project_id`,`py_type_id`,`status_py_id`)
            VALUES ('" . $USerPayIDA . "','" . $amount . "','" . $date_time . "','" . $data1["id"]  . "','" . $data2["id"] . "','1','1')  ");

            $prefix = 'PAY';
            $randomString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);
            $timestamp = time();
            $USerPayIDBB = $prefix . $randomString . $timestamp;

            Database::iud("INSERT INTO `user_payments` (`id`,`amount`,`date_time`,`user_id`,`project_id`,`py_type_id`,`status_py_id`)
            VALUES ('" . $USerPayIDBB . "','" . $advanced . "','" . $date_time . "','" . $data1["id"]  . "','" . $data2["id"] . "','2','1')  ");


            Database::iud("INSERT INTO `affiliate_has_project` (`affiliate_start_id`,`project_id`)
            VALUES ('" . $affiliateId . "','" . $data2["id"] . "')  ");

            $prefix = 'AFPAY';
            $randomString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);
            $timestamp = time();
            $AFFPayIDBB = $prefix . $randomString . $timestamp;

            Database::iud("INSERT INTO `affiliate_payment` (`id`,`amount`,`date_time`,`project_id`,`status_py_id`,`affiliate_id`)
            VALUES ('" . $AFFPayIDBB . "','" . $affiliate . "','" . $date_time . "','" . $data2["id"] . "','1','".$affiliateId."')  ");



            echo ("14");
        } else {
            echo ("16");
        }
    } else {
        echo ("15");
    }
}
