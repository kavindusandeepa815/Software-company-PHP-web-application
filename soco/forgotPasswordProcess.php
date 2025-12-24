<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["id"])) {

    $id = $_POST["id"];
    $email = $_POST["email"];

    if (empty($email)) {
        echo "1";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo ("5");
    } else if (strlen($email) > 100) {
        echo ("6");
    } else {

        if ($id == "user") {

            $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' ");
            $user_num = $user_rs->num_rows;

            if ($user_num > 0) {

                $code = uniqid(); 

                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'kavindusandeepa815@gmail.com';
                $mail->Password = 'qvjukcbkfmekgwsa';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('kavindusandeepa815@gmail.com', 'MaestroCrew');
                $mail->addReplyTo('kavindusandeepa815@gmail.com', 'MaestroCrew');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'MaestroCrew Verification Code';
                $bodyContent = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Verification Code</title>
                <style>
                    /* Add some basic styles for readability and branding */
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #fff;
                    }
                    h1 {
                        color: #007BFF; 
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <img src="https://cdn.pixabay.com/photo/2015/10/31/12/54/google-1015751_1280.png" alt="Company Logo" style="max-width: 128px; height: auto;">
                    <h1>Verification Code</h1>
                    <p>Dear user,</p>
                    <p>Your verification code is:</p>
                    <h2 style="color: #007BFF;">' . $code . '</h2>
                    <p>Please use this code to reset password.</p>
                    <p>If you didn\'t request this code, you can safely ignore this email.</p>
                    <p>Best regards,</p>
                    <p>MaestroCrew</p>
                </div>
            </body>
            </html>';
                $mail->Body    = $bodyContent;

                if (!$mail->send()) {
                    echo "3";
                } else {

                    Database::iud("UPDATE `user` SET `v_code`='" . $code . "' WHERE `email`='" . $email . "'  ");

                    echo "4";
                }
            } else {
                echo "2";
            }
        } else if ($id == "affiliate") {

            $user_rs = Database::search("SELECT * FROM `affiliate_start` WHERE `email`='" . $email . "' ");
            $user_num = $user_rs->num_rows;

            if ($user_num > 0) {

                $code = uniqid();

                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'kavindusandeepa815@gmail.com';
                $mail->Password = 'qvjukcbkfmekgwsa';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('kavindusandeepa815@gmail.com', 'MaestroCrew');
                $mail->addReplyTo('kavindusandeepa815@gmail.com', 'MaestroCrew');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'MaestroCrew Verification Code';
                $bodyContent = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Verification Code</title>
                <style>
                    /* Add some basic styles for readability and branding */
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #fff;
                    }
                    h1 {
                        color: #007BFF;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <img src="https://cdn.pixabay.com/photo/2015/10/31/12/54/google-1015751_1280.png" alt="Company Logo" style="max-width: 128px; height: auto;">
                    <h1>Verification Code</h1>
                    <p>Dear user,</p>
                    <p>Your verification code is:</p>
                    <h2 style="color: #007BFF;">' . $code . '</h2>
                    <p>Please use this code to reset password.</p>
                    <p>If you didn\'t request this code, you can safely ignore this email.</p>
                    <p>Best regards,</p>
                    <p>MaestroCrew</p>
                </div>
            </body>
            </html>';
                $mail->Body    = $bodyContent;

                if (!$mail->send()) {
                    echo "3";
                } else {

                    Database::iud("UPDATE `affiliate_start` SET `v_code`='" . $code . "' WHERE `email`='" . $email . "'  ");

                    echo "4";
                }
            } else {
                echo "2";
            }
        } else {
            echo ("Something went wrong.");
        }
    }
} else {
    echo ("Something went wrong.");
}
