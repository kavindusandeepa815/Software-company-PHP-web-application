<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$id = $_POST["id"];
$email = $_POST["email"];

if (empty($id)) {
    echo "1";
} else if (empty($email)) { 
    echo "1";
} else {

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
    $mail->Subject = 'MaestroCrew';
    $bodyContent = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Thank You for Contacting Us</title>
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
            <h1>Thank You for Contacting Us</h1>
            <p>Dear Client,</p>
            <p>We appreciate you reaching out to us through our contact form. Your message has been received, and we want to express our gratitude for taking the time to contact us.</p>
            <p>Our team is currently reviewing your message, and we will get back to you as soon as possible. Your inquiry is important to us, and we are committed to providing you with the best possible assistance.</p>
            <p>In the meantime, feel free to explore our website to learn more about our products/services or read our blog for helpful insights.</p>
            <p>If you have any further questions or require immediate assistance, please don t hesitate to contact us at MaestroCrew@gmail.com.</p>
            <p>Thank you once again for choosing us. We look forward to serving you!</p>
            <p>Visit our site www.maestrocrew.com</p>
            <p>Best regards,</p>
            <p>MaestroCrew</p> 
        </div>
    </body>
    </html>
    
    ';
    $mail->Body    = $bodyContent; 

    if (!$mail->send()) {
        echo "2";
    } else {

        Database::iud("UPDATE `contact` SET `status_ue_id`='2' WHERE `id`='" . $id . "'  ");

        echo "3";
    }
}
