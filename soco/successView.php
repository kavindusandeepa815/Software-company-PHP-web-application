<!DOCTYPE html>
<html>

<head>
    <title>MaestroCrew</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

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

                    <div class="col-12 mt-5">
                        <div class="col-12 col-lg-10 offset-lg-1 text-center mt-5">
                            <nav class="mt-5" aria-label="breadcrumb">
                                <ol class="breadcrumb mt-5">
                                    <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                                </ol>
                            </nav>
                            <img src="Img/success.png" class="successIMG">
                            <h3 class="mt-5 fw-bold">Payment Success.</h3>
                            <p>We deeply appreciate your business
                                and trust in MaestroCrew. Thank you for
                                choosing us for your development needs. 
                                We look forward to serving you again soon.
                                Feel free to reach out if you have any questions
                                or require further assistance. Your satisfaction is our priority.
                            </p>
                            <div class="col-12 py-5">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-success" type="button" onclick="window.location='<?php echo 'invoice.php?id=' . $payment_id; ?>'">View Invoice</button>
                                    <a href="profile.php" class="btn btn-success" type="button">Back to Profile</a>
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

</body>

</html>