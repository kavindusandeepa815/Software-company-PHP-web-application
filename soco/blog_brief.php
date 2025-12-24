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



            <?php

            if (isset($_GET['id'])) {
                $blogId = $_GET['id'];
            } else {
                die("ID not provided.");
            }

            $blogData = json_decode(file_get_contents('blog_data.json'), true);

            $selectedData = null;
            foreach ($blogData as $blogs) {
                if ($blogs['id'] === $blogId) {
                    $selectedData = $blogs;
                    break;
                }
            }

            ?>



            <!-- Main 01 -->
            <div class="col-12 col-lg-10 offset-lg-1 py-5 mt-5">
                <div class="col-12">
                    <img class="img-thumbnail" src="<?php echo $selectedData["photo"] ?>" style="max-width: 512px;">
                </div>
                <div class="col-12 mt-5">
                    <h1 class="fw-bold ">
                        <?php echo $selectedData["title"] ?>
                    </h1>
                </div>
                <div class="col-12 mt-4">
                    <p>
                        <?php echo $selectedData["content1"] ?>
                    <p>
                    <p>
                        <?php echo $selectedData["content2"] ?>
                    </p>
                </div>
            </div>
            <!-- Main 01 -->



        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>