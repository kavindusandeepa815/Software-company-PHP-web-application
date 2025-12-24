<?php

session_start();

require "connection.php";

$email = $_POST["email"];
$password = $_POST["password"];
$remember = $_POST["remember"];

if (empty($email)) {
    echo "1";
} else if (empty($password)) {
    echo "2";
} else {

    $user_rs = Database::search("SELECT * FROM `affiliate_start` WHERE `email`='" . $email . "' AND `password`='" . $password . "' ");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {

        if ($remember == "true") {

            setcookie("affiliate_email", $email, time() + (60 * 60 * 24 * 365));
            setcookie("affiliate_password", $password, time() + (60 * 60 * 24 * 365));
        } else {
            setcookie("affiliate_email", "", -1);
            setcookie("affiliate_password", "", -1);
        }

        $user_data = $user_rs->fetch_assoc();
        $_SESSION["affiliate"] = $user_data;

        echo "3";
    } else {

        echo "4";
    }
}
