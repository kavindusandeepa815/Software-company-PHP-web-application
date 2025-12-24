<?php

session_start();

require "connection.php";

$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email)) {
    echo "1";
} else if (empty($password)) {
    echo "2";
} else {

    $user_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "' ");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {

        $user_data = $user_rs->fetch_assoc();

        if (strcmp($password, $user_data["password"]) == 0) {

            $_SESSION["admin"] = $user_data;

            echo ("3");
        } else {
            echo ("4");
        }
    } else {
        echo ("5");
    }
}
