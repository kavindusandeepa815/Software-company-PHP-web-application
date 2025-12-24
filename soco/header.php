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

    <?php session_start(); ?>

    <div class="container-fluid position-fixed" style="background-color: #071252; z-index: 1;" id="balla">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <nav class="navbar navbar-expand-lg ">

                    <img class="navbar-brand imgLOGO" src="Img/MaestroCrew12.png" id="ballaImg" onclick="movePage('index');" />
                    <button class="navbar-toggler text-bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link  textGREDIENThover" href="service.php">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  textGREDIENThover" href="news.php">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link textGREDIENThover" href="about.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  textGREDIENThover" href="signIn.php">My Job</a>
                            </li>
                            <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                                <button type="button" id="ballaButton" class="btn btn-outline-info" onclick="movePage('contact');">Contact Us</button>
                            </li>
                        </ul>
                    </div>
                    <!-- </div> -->
                </nav>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>