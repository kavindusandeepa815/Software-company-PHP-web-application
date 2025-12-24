<?php

require "connection.php";

if (isset($_POST["id"])) {

    $id = $_POST["id"];

    $email = $_POST["email"];
    $name = $_POST["name"];
    $country = $_POST["country"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];


    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);


    if (empty($email)) {
        echo ("1");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo ("2");
    } else if (strlen($email) > 100) {
        echo ("3");
    } else if (empty($name)) {
        echo ("4");
    } else if (!preg_match('/^[A-Za-z\s]+$/', $name)) {
        echo ("5");
    } else if (strlen($name) > 100) {
        echo ("6");
    } else if ($country == 0) {
        echo ("7");
    } else if (empty($password)) {
        echo ("8");
    } else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 5) {
        echo ("9");
    } else if (empty($repassword)) {
        echo ("10");
    } else if ($password !== $repassword) {
        echo ("11");
    } else {


        if ($id == "user") {

            $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' ");
            $user_num = $user_rs->num_rows;

            if ($user_num == 1) {

                Database::iud("UPDATE `user` SET `name`='" . $name . "',`country_id`='" . $country . "',`password`='" . $password . "',`status_ue_id`='1' WHERE `email`='" . $email . "'  ");

                echo "13";
            } else {
                echo "12";
            }
        } else if ($id == "affiliate") {

            $user_rs = Database::search("SELECT * FROM `affiliate_start` WHERE `email`='" . $email . "' ");
            $user_num = $user_rs->num_rows;
            $user_data = $user_rs->fetch_assoc();

            if ($user_num == 1) {

                Database::iud("UPDATE `affiliate_start` SET `name`='" . $name . "',`country_id`='" . $country . "',`password`='" . $password . "',`status_ue_id`='1' WHERE `email`='" . $email . "'  ");

                Database::iud("INSERT INTO `affiliate_company` (`affiliate_start_id`,`company_name`,`company_url`) VALUES ('" . $user_data["id"] . "','None','None') ");

                Database::iud("INSERT INTO `affiliate_billing` (`affiliate_start_id`,`description`) VALUES ('" . $user_data["id"] . "','None') ");

                echo "13";
            } else {
                echo "12";
            }
        } else {
            echo ("Something went wrong.");
        }
    }
} else {
    echo ("Something went wrong.");
}
