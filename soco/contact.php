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

    <?php include "header.php"; ?>

    <div class="container-fluid animated-element">
        <div class="row">


            <div class="loader-overlay">
                <div class="d-flex align-items-center">
                    <strong role="status">Loading...</strong>
                    <div class="spinner-border ms-auto" aria-hidden="true"></div>
                </div>
            </div>


            <!-- Alert -->
            <div class="modal" tabindex="-1" id="myModel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-light fw-bold" id="myModelColor">
                            <h5 class="modal-title">Alert</h5>
                            <button type="button" class="btn-close bg-body" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="fs-5" id="alertMessage">Text</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Alert -->

            <!-- Main 01 -->
            <div class="col-12 py-5 mt-5">
                <div class="col-10 offset-1">
                    <div class="row">
                        <div class="col-12 col-lg-6" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="Img/contactusNew.png" style="width: 100%; max-width: 100%; height: auto;" />
                        </div>
                        <div class="col-12 col-lg-6 mt-3 mt-lg-0" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div class="col-12">
                                <div class="col-8 fw-bold p-2 rounded-5" style="background-color: yellow; color: black;"><i class="bi bi-telephone fw-bold me-3 ms-3"></i>Contact us now</div>
                            </div>
                            <div class="col-12 mt-4">
                                <h1 class="fw-bold">
                                    Let's Connect and Create Something Extraordinary!
                                </h1>
                            </div>
                            <div class="col-12 mt-4 ">
                                <p>
                                    Thank you for considering MaestroCrew for your next project. We look forward to hearing from you soon.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 01 -->



            <!-- Main 0 -->
            <div class="col-12 py-5 reveal">
                <div class="col-10 offset-1">
                    <div class="col-12 text-center">
                        <div class="contact-section">
                            <h1 class="fw-bold">Email Us</h1>
                            <p>Feel free to get in touch with us. We'd love to hear from you!</p>
                            <p class="text-primary">service@maestrocrew.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 0 -->


            <!-- Main 02 -->
            <div class="col-12 py-5">
                <div class="col-10 offset-1">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6">
                            <h3 class="fw-bold">
                                CONTACT FOR</br>
                                QUICK CUSTOM QUOTE
                            </h3>
                            <div class="mt-4 p-4 rounded-4" style="background-color: #c0efff;">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="contactFormName" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="contactFormEmail" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="contactFormCountry">
                                        <option value="0">Select Country</option>
                                        <?php

                                        require "connection.php";

                                        $country_rs = Database::search("SELECT * FROM `country` ");
                                        $country_num = $country_rs->num_rows;
                                        for ($c = 0; $c < $country_num; $c++) {
                                            $country_data = $country_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $country_data["id"]; ?>"><?php echo $country_data["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" id="contactFormMessage" rows="3" placeholder="Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="submitContact();">Submit</button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                            <p>
                                Feel free to reach out with any inquiries or to discuss your ideas and requirements. Our team is ready to help you turn your vision into reality.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 02 -->

        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>