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
            <!-- Main 01 -->
            <div class="col-12" style="background-color: #071252;">
                <div class="col-12 col-lg-10 offset-lg-1 py-5 mt-lg-5">
                    <div class="row mt-5">
                        <div class="col-12 col-lg-6">
                            <h1 class="bold-fontAU textGREDIENT ">Discover a World of Tech</h1>
                        </div>
                        <div class="col-12 text-lg-end col-lg-6">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 01 -->

            <!-- Main 02 -->
            <div class="col-12 col-lg-10 offset-lg-1 py-5">
                <div class="row mt-5 align-items-start justify-content-around">

                    <div class="col-12 col-lg-3" id="div0" onclick="showBlog('blog1');">
                        <div class="col-12 " style="background-color: #00ff9d;" id="div1">
                            <img class="img-fluid" src="Img/RDBlog.jpg">
                        </div>
                        <div class="col-12 p-4" style="background-color: #29abe2;" id="div2">
                            <h6 class="fw-bold">BLOG 01</h6></br>
                            <h5>January 15, 2023</h5>
                            <h5 class="fw-bold">
                                The Importance of Responsive Web Design
                            </h5>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3" id="div0" onclick="showBlog('blog2');">
                        <div class="col-12 " style="background-color: #00ff9d;" id="div1">
                            <img class="img-fluid" src="Img/MDBlog.jpg">
                        </div>
                        <div class="col-12 p-4" style="background-color: #29abe2;" id="div2">
                            <h6 class="fw-bold">BLOG 02</h6></br>
                            <h5>March 24, 2023</h5>
                            <h5 class="fw-bold">
                                Mobile App Development Trends to Watch
                            </h5>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3" id="div0" onclick="showBlog('blog3');">
                        <div class="col-12 " style="background-color: #00ff9d;" id="div1">
                            <img class="img-fluid" src="Img/AMBlog.jpg">
                        </div>
                        <div class="col-12 p-4" style="background-color: #29abe2;" id="div2">
                            <h6 class="fw-bold">BLOG 03</h6></br>
                            <h5>June 20, 2023</h5>
                            <h5 class="fw-bold">
                                Accelerating Software Development with Agile Methodology
                            </h5>
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

</body>

</html>