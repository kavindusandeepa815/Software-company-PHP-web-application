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
            <div class="col-12" style="background-color: #071252;">
                <div class="col-12 col-lg-10 offset-lg-1 py-5 mt-lg-5">
                    <div class="row mt-5">
                        <div class="col-12 col-lg-6">
                            <h1 class="bold-fontAU textGREDIENT ">The latest in digital</br>transformation innovation.</h1>
                        </div>
                        <div class="col-12 text-lg-end col-lg-6">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 01 -->

            <!-- Main 02 -->
            <div class="col-12 col-lg-10 offset-lg-1 py-5 mt-lg-5">
                <div class="row mt-5 align-items-start justify-content-around">

                    <div class="col-12 col-lg-3 p-4" style="background-color: #00ff9d;">
                        <h6 class="fw-bold">INDUSTRY NEWS AND EVENTS</h6></br>
                        <h5>July 20, 2023</h5>
                        <h5 class="fw-bold">Stay updated with the latest tech industry news and events shaping the future of technology and innovation.</h5>
                        <p class="text-decoration-underline text-end" style="cursor: pointer;" onclick="showDetails('news1')">Read More</p>
                    </div>

                    <div class="col-12 col-lg-5 p-4" style="background-color: #29abe2;">
                        <h6 class="fw-bold">TIPS AND TUTORIALS</h6></br>
                        <h5>July 20, 2023</h5>
                        <h5 class="fw-bold">Enhance your skills with expert tips and step-by-step tutorials on web, mobile, and software development. Level up your projects today!</h5>
                        <p class="text-decoration-underline text-end" style="cursor: pointer;" onclick="showDetails('news2')">Read More</p>
                    </div>

                    <div class="col-12 col-lg-3 p-4" style="background-color: #00ff9d;">
                        <h6 class="fw-bold">TECH-RELATED NEWS</h6></br>
                        <h5>July 20, 2023</h5>
                        <h5 class="fw-bold">Get the latest updates on technology news worldwide, covering breakthroughs, cybersecurity, AI, and more in just one place.</h5>
                        <p class="text-decoration-underline text-end" style="cursor: pointer;" onclick="showDetails('news3')">Read More</p>
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