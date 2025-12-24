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

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "' ");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {

        if ($remember == "true") {

            setcookie("email", $email, time() + (60 * 60 * 24 * 365));
            setcookie("password", $password, time() + (60 * 60 * 24 * 365));
        } else {
            setcookie("email", "", -1);
            setcookie("password", "", -1);
        }

        $user_data = $user_rs->fetch_assoc();
        $_SESSION["user"] = $user_data;

        echo "3";

    } else {

        echo "4";

    }
    
}
