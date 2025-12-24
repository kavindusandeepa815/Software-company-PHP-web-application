<?php

require "connection.php";

if (isset($_POST["id"])) {

    $id = $_POST["id"];
    $email = $_POST["email"];
    $vcode = $_POST["vcode"];

    if (empty($email)) {
        echo "1";
    } else if (empty($vcode)) {
        echo "2";
    } else {

        if ($id == "user") {

            $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `v_code`='" . $vcode . "' ");
            $user_num = $user_rs->num_rows;

            if ($user_num == 1) {
                echo "3";
            } else {
                echo "4";
            }
        } else if ($id == "affiliate") {

            $user_rs = Database::search("SELECT * FROM `affiliate_start` WHERE `email`='" . $email . "' AND `v_code`='" . $vcode . "' ");
            $user_num = $user_rs->num_rows;

            if ($user_num == 1) {
                echo "3";
            } else {
                echo "4";
            }
        } else {
            echo ("Something went wrong.");
        }
    }
} else {
    echo ("Something went wrong.");
}
