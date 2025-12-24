<?php

require "connection.php";


if (isset($_POST["id"])) {

    $id = $_POST["id"];
    $email = $_POST["email"];
    $vcode = $_POST["vcode"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);


    if (empty($email)) {
        echo ("1");
    } else if (empty($vcode)) {
        echo ("2");
    } else if (empty($password)) {
        echo ("3");
    } else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 5) {
        echo ("4");
    } else if (empty($repassword)) {
        echo ("5");
    } else if ($password !== $repassword) {
        echo ("6");
    } else {

        if ($id == "user") {

            $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `v_code`='" . $vcode . "' ");
            $user_num = $user_rs->num_rows;

            if ($user_num == 1) {

                Database::iud("UPDATE `user` SET `password`='" . $password . "' WHERE `email`='" . $email . "' ");

                echo ("8");
            } else {
                echo "7";
            }
        } else if ($id == "affiliate") {

            $user_rs = Database::search("SELECT * FROM `affiliate_start` WHERE `email`='" . $email . "' AND `v_code`='" . $vcode . "' ");
            $user_num = $user_rs->num_rows;

            if ($user_num == 1) {

                Database::iud("UPDATE `affiliate_start` SET `password`='" . $password . "' WHERE `email`='" . $email . "' ");

                echo ("8");
            } else {
                echo "7";
            }
        } else {
            echo "1";
        }
    }
} else {
    echo ("Something went wrong.");
}
