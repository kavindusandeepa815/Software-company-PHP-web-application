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
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Alert -->



            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Reset Password</h1>
                            <button type="button" class="btn-close btn btn-danger bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="col-12 mb-3 text-center">
                                    <h1 class="fw-bold">Forgot Password</h1>
                                </div>
                                <div class="alert alert-danger d-none" role="alert" id="forgotPasswordEmailAlert">
                                    ...
                                </div>
                                <div class="col-12 p-4 signInDeco">
                                    <div class="mb-5">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="forgotPasswordEmail">
                                        <div class="invalid-feedback d-none" id="forgotPasswordEmailMessage">
                                            Please enter your email.
                                        </div>
                                        <div class="invalid-feedback d-none" id="forgotPasswordEmailMessageBB">
                                            Please enter correct email address.
                                        </div>
                                        <div class="invalid-feedback d-none" id="forgotPasswordEmailMessageCC">
                                            Email should be less than 100 characters.
                                        </div>
                                    </div>
                                    <div class="mb-3 d-grid">
                                        <button type="button" class="btn btn-primary" onclick="forgotPassword('affiliate');">Get Verification Code</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <?php

            $email = "";
            $password = "";

            if (isset($_COOKIE["affiliate_email"])) {
                $email = $_COOKIE["affiliate_email"];
            }

            if (isset($_COOKIE["affiliate_password"])) {
                $password = $_COOKIE["affiliate_password"];
            }

            ?>


            <div class="col-12 py-5">
                <div class="col-12 col-lg-4 offset-lg-4 mt-5 mb-3 text-center">
                    <h1 class="fw-bold">Affiliate Sign In</h1>
                </div>
                <div class="col-12 col-lg-4 offset-lg-4 py-5  p-4 signInDeco">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="affiliateSignInEmail" value="<?php echo $email; ?>">
                        <div class="invalid-feedback d-none" id="affiliateSignInEmailMessage">
                            Please enter your email.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="affiliateSignInPassword" value="<?php echo $password; ?>">
                        <div class="invalid-feedback" id="affiliateSignInPasswordMessage">
                            Please enter your password.
                        </div>
                    </div>
                    <div class="mb-3">
                        <sapn class="text-decoration-underline text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="cursor: pointer;">Forgot Password</span>
                    </div>
                    <div class="mb-3 d-grid">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="affiliateSignInRemember" checked>
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 d-grid">
                        <button type="button" class="btn btn-primary" onclick="affiliateSignIn();">Sign IN</button>
                    </div>
                    <div class="mb-3 text-center">
                        <a href="registerA.php?id=affiliate">Not have an account? Register Here</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>