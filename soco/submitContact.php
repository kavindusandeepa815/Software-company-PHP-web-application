<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$name = $_POST["name"];
$email = $_POST["email"];
$country = $_POST["country"];
$message = $_POST["message"];


$maestrocrew = 1;

if (isset($_COOKIE["maestrocrew"])) {
    $maestrocrew = $_COOKIE["maestrocrew"];
}


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
} else if (empty($message)) {
    echo ("8");
} else {

    $date = new DateTime();
    $timeZone = new DateTimeZone("Asia/Colombo");
    $date->setTimezone($timeZone);

    $date_time = $date->format("Y-m-d H:i:s");



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
    $mail->Subject = 'Message From Client';
    $bodyContent = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Client Message</title>
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
            .message {
                background-color: #F0FBFF ;
                padding: 10px;
                border-radius: 5px;
            }
            .client-info {
                font-size: 18px;
                font-weight: bold;
            }
            .client-message {
                font-size: 16px;
                line-height: 1.5;
            }
            .signature {
                color: #555;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img src="https://cdn.pixabay.com/photo/2015/10/31/12/54/google-1015751_1280.png" alt="Company Logo" style="max-width: 128px; height: auto;">
            <h1>Client Message</h1>
            <div class="message">
                <p>Dear Admin,</p>
                <p class="client-info">Client Name:</p>
                <p style="color: #007BFF; font-size: 18px; margin-bottom: 10px;">' . $name . '</p>
                <p class="client-info">Client Email:</p>
                <p style="color: #007BFF; font-size: 18px; margin-bottom: 10px;">' . $email . '</p>
                <p class="client-info">Affiliate:</p>
                <p style="color: #007BFF; font-size: 18px; margin-bottom: 10px;">' . $maestrocrew . '</p>
                <p class="client-info">Client Message:</p>
                <p class="client-message">' . $message . '</p>
                <p>Please quickly contact this client.</p>
            </div>
            <p class="signature">Best regards,<br>MaestroCrew</p>
        </div>
    </body>
    </html>    
';
    $mail->Body    = $bodyContent;


    if (!$mail->send()) {
        echo "10";
    } else {

        Database::iud("INSERT INTO `contact` (`date_time`,`name`,`email`,`message`,`country_id`,`status_ue_id`,`affiliate`) 
        VALUES ('" . $date_time . "','" . $name . "','" . $email . "','" . $message . "','" . $country . "','1','".$maestrocrew."') ");

        echo "9";
    }
}
