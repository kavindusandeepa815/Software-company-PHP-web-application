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

            <?php
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            ?>


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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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




                <div class="col-12 py-5">
                    <div class="col-12 col-lg-4 offset-lg-4 mt-5 mb-3 text-center">
                        <h1 class="fw-bold">Register</h1>
                    </div>
                    <div class="col-12 col-lg-4 offset-lg-4 mt-5 mb-5 text-center p-4">
                        <div class="row">
                            <div class="col-4 border border-end-0 border-start-0 border-top-0 border-5 border-success">
                                <span>Step 01</span>
                            </div>
                            <div class="col-4">
                                <span>Step 02</span>
                            </div>
                            <div class="col-4">
                                <span>Step 03</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 offset-lg-4 py-5  p-4 signInDeco">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="userRegisterAEmail">
                            <div class="invalid-feedback" id="userRegisterAEmailMessage">
                                Please Enter Email.
                            </div>
                        </div>
                        <div class="mb-3 d-grid">
                            <button type="button" class="btn btn-primary" onclick="userRegisterA('<?php echo $id; ?>');">Register</button>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="signIn.php">Back to Sign In</a>
                        </div>
                    </div>
                </div>

            <?php
            } else {
            ?>

                <div class="mt-5 d-flex justify-content-center">
                    <div class="col-lg-4 col-12 mt-5 py-5 bg-danger border border-1 rounded-2 text-center">
                        <h3 class="text-white">Something Went Wrong.</h3>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>