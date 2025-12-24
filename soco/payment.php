<?php

require "connection.php";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $array;

    $payment_user_rs =   Database::search("SELECT user_payments.id AS upid,user_payments.amount AS upamount,user_payments.date_time AS update_time,user_payments.user_id AS upuid,user_payments.project_id AS uppid,user_payments.py_type_id AS uppy_type_id,user_payments.status_py_id AS upstatus_py_id,
    status_py.name AS status_py_name,py_type.name AS py_type_name,user.email AS uemail,user.name AS uname,country.name AS country,project.title AS ptitle
    FROM `user_payments`
    INNER JOIN `user` ON `user`.`id`=`user_payments`.`user_id` 
    INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` 
    INNER JOIN `py_type` ON `py_type`.`id`=`user_payments`.`py_type_id` 
    INNER JOIN `status_py` ON `status_py`.`id`=`user_payments`.`status_py_id` 
    INNER JOIN `country` ON `country`.`id`=`user`.`country_id` 
    WHERE `user_payments`.`id`='" . $id . "'  ");

    $payment_user_data = $payment_user_rs->fetch_assoc();

    $project_id = $payment_user_data['uppid'];
    $payment_type = $payment_user_data["py_type_name"];


    $payment_id =  $payment_user_data['upid'];
    $item = $project_id . $payment_type . $payment_id;
    $amount =  $payment_user_data["upamount"];
    $name = $payment_user_data["uname"];
    $email = $payment_user_data["uemail"];
    $country = $payment_user_data["country"];

    $merchant_id = "1221608";
    $order_id = $payment_id;
    $currency = "USD";
    $merchant_secret = "MzIyOTI0MjQ3MzE4NTg0ODMwODgzMzU0NDc1MTIzNjIxOTA2Mzc="; 

    $hash = strtoupper(
        md5(
            $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
        )
    );


    $array["id"] = $payment_id;
    $array["item"] = $item;
    $array["amount"] = $amount;
    $array["fname"] = $name;
    $array["email"] = $email;
    $array["country"] = $country;
    $array["hash"] = $hash;


    echo json_encode($array);
} else {
    header("Location:profile.php");
}
