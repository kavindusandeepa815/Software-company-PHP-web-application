<!DOCTYPE html>
<html>

<head>
    <title>MaestroCrew</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">


    <link rel="icon" href="Img/MaestroCrew8.png" />

</head>

<body>

    <div class="container-fluid animated-element">
        <div class="row">

            <?php include "header.php";

            require "connection.php"; 

            if (isset($_SESSION["user"])) {

            ?>

                <?php

                if (isset($_GET["id"])) {

                    $payment_id = $_GET["id"];

                ?>

                    <div class="loader-overlay animated-element">
                        <div class="d-flex align-items-center">
                            <strong role="status">Loading...</strong>
                            <div class="spinner-border ms-auto" aria-hidden="true"></div>
                        </div>
                    </div>

                    <?php

                    $payment_user_rs =   Database::search("SELECT user_payments.id AS upid,user_payments.amount AS upamount,user_payments.date_time AS update_time,user_payments.user_id AS upuid,user_payments.project_id AS uppid,user_payments.py_type_id AS uppy_type_id,user_payments.status_py_id AS upstatus_py_id,
                    status_py.name AS status_py_name,py_type.name AS py_type_name,user.email AS uemail,user.name AS uname,project.title AS ptitle
                    FROM `user_payments`
                    INNER JOIN `user` ON `user`.`id`=`user_payments`.`user_id` 
                    INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` 
                    INNER JOIN `py_type` ON `py_type`.`id`=`user_payments`.`py_type_id` 
                    INNER JOIN `status_py` ON `status_py`.`id`=`user_payments`.`status_py_id` 
                    WHERE `user_payments`.`id`='" . $payment_id . "'  ");

                    $payment_user_data = $payment_user_rs->fetch_assoc();

                    ?>

                    <div class="col-12 mt-5">
                        <div class="col-12 col-lg-10 mt-5 offset-lg-1">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                                </ol>
                            </nav>
                            <div class="col-12 text-end">
                                <button class="btn btn-success" onclick="printInvoice();"><i class="bi bi-printer-fill"></i>Print to PDF</button>
                            </div>

                            <div class="row mt-5" id="printContent">
                                <div class="col-12 mt-5" style="background-color: #071252;">
                                    <img src="img/MaestroCrew11.png" class="p-3 invoiceIMG">
                                </div>
                                <div class="col-12 p-3 text-end border border-2 border-primary border-end-0 border-top-0 border-start-0">
                                    <h3>INVOICE</h3>
                                    <span>Date and Time: <?php echo $payment_user_data["update_time"]; ?></span>
                                </div>
                                <div class="col-12 p-3 border border-2 border-primary border-end-0 border-top-0 border-start-0">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <h3>MaestroCrew</h3>
                                            <span>maestrocrew@gmail.com</span>
                                        </div>
                                        <div class="col-12 col-lg-6 text-lg-end mt-3 mt-lg-0">
                                            <h3><?php echo $payment_user_data["uname"]; ?></h3>
                                            <span><?php echo $payment_user_data["uemail"]; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 overFlow">
                                    <table class="table mt-3">
                                        <thead>
                                            <tr class="border border border-secondary">
                                                <th>Payment Id</th>
                                                <th>Project Id</th>
                                                <th>Product Title</th>
                                                <th class="text-end">Payment Type</th>
                                                <th class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td class="py-4 "><?php echo $payment_user_data["upid"]; ?></td>
                                            <td class="py-4"><?php echo $payment_user_data["uppid"]; ?></td>
                                            <td class="py-4"><?php echo $payment_user_data["ptitle"]; ?></td>
                                            <td class="py-4 text-end"><?php echo $payment_user_data["py_type_name"]; ?></td>
                                            <td class="py-4 text-end bg-primary text-white">$ <?php echo $payment_user_data["upamount"]; ?></td>
                                        </tbody>
                                        <tfoot>
                                            <tr>

                                            </tr>
                                            <tr>
                                                <td colspan="3" class="border-0"></td>
                                                <td class="py-4 mt-4 fs-5 text-end fw-bold border-primary">Total</td>
                                                <td class="py-4 text-end border-primary bg-primary text-white fs-5">$ <?php echo $payment_user_data["upamount"]; ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php
                } else {
                ?>
                    <div class="mt-5 d-flex justify-content-center">
                        <div class="col-lg-4 col-12 mt-5 py-5 bg-danger border border-1 rounded-2 text-center">
                            <h3 class="text-white">Something went wrong.</h3>
                        </div>
                    </div>
                <?php
                }
                ?>

            <?php
            } else {
            ?>
                <div class="mt-5 d-flex justify-content-center">
                    <div class="col-lg-4 col-12 mt-5 py-5 bg-danger border border-1 rounded-2 text-center">
                        <h3 class="text-white">Please Login First.</h3>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

</body>

</html>