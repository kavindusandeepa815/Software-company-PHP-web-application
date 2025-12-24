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

            <!-- Main 01 -->
            <div class="col-12 baxFixAbout" style="background-color: #071252;">
                <div class="col-12 col-lg-10 offset-lg-1 py-5 mt-lg-5">
                    <div class="row mt-5">
                        <div class="col-12 col-lg-6">
                            <h1 class="bold-fontAU textGREDIENT ">Engineering:</br>A mindset, not just a job.</h1>
                            <p class="mt-4 fs-5 textGREDIENT">
                                Welcome to MaestroCrew - Your Partner in Technology Innovation!
                            </p>
                        </div>
                        <div class="col-12 text-lg-end col-lg-6">
                            <!-- <img class="img-fluid borderGREDIENT" src="Img/team6.jpg"> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 01 -->

            <!-- Main 02 -->
            <div class="col-12 py-5">
                <div class="col-10 offset-1">
                    <div class="row">
                        <div class="col-12 col-lg-6" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="Img/whoweareNew.png" style="width: 100%; max-width: 100%; height: auto;" />
                        </div>
                        <div class="col-12 col-lg-6 mt-3 mt-lg-0 reveal" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div class="col-12">
                                <div class="col-8 fw-bold p-2 rounded-5" style="background-color: yellow; color: black;"><i class="bi bi-question-circle fw-bold me-3 ms-3"></i>Who We Are</div>
                            </div>
                            <div class="col-12 mt-4">
                                <h1 class="fw-bold">
                                    Discover Our Story
                                </h1>
                            </div>
                            <div class="col-12 mt-4 ">
                                <p>
                                    At MaestroCrew, we are passionate about transforming ideas into reality through cutting-edge web, mobile, and software solutions. As a leading technology development company, we bring together a team of skilled and creative professionals who thrive on innovation.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 02 -->

            <!-- Main 03 -->
            <div class="col-12 py-5 reveal">
                <div class="col-10 offset-1">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="col-12">
                                <h1 class="fw-bold">
                                    Our Mission
                                </h1>
                            </div>
                            <div class="col-12 mt-4 ">
                                <p>
                                    To empower businesses and organizations with innovative digital solutions that enhance their efficiency, productivity, and customer experiences. We aim to be the driving force behind our clients' success, helping them stay ahead in the ever-evolving digital landscape.
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                            <div class="col-12">
                                <h1 class="fw-bold">
                                    Why Choose Us
                                </h1>
                            </div>
                            <div class="col-12 mt-4 ">
                                <p>
                                    Choosing MaestroCrew means choosing a team of dedicated experts who are committed to your success. We go above and beyond to deliver exceptional solutions that exceed expectations and drive results.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 03 -->

            <!-- Main 04 -->
            <div class="col-12 py-5 reveal">
                <div class="col-10 offset-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-8 offset-2 col-lg-4 offset-lg-4 fw-bold p-2 rounded-5 text-center" style="background-color: yellow; color: black;"><i class="bi bi-telephone fw-bold me-3 ms-3"></i>Contact us now</div>
                        </div>
                        <div class="col-12 mt-4 text-center">
                            <h1 class="fw-bold">
                                Let's Turn Your Ideas into Reality
                            </h1>
                        </div>
                        <div class="col-12 col-lg-8 offset-lg-2 py-4 text-center">
                            <p> Are you ready to embark on a journey of innovation and success? Let's work together to bring your ideas to life and create a brighter digital future for your business. Contact us today to get started!</p>
                            <div class="mt-3 mb-3">
                                <button class="btn btn-primary contactButton" onclick="movePage('contact');">Contact Us</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 04 -->





        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>