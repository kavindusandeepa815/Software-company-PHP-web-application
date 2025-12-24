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
                $newsId = $_GET['id'];
            } else {
                die("ID not provided.");
            }

            $newsData = json_decode(file_get_contents('news_data.json'), true);

            $selectedData = null;
            foreach ($newsData as $news) {
                if ($news['id'] === $newsId) {
                    $selectedData = $news;
                    break;
                }
            }

            ?>



            <!-- Main 01 -->
            <div class="col-12 col-lg-10 offset-lg-1 py-5 mt-5">
                <div class="col-12 mt-5">
                    <h1 class="fw-bold ">
                        <?php echo $selectedData["title"] ?>
                    </h1>
                </div>
                <div class="col-12 mt-4">
                    <p>
                        <?php echo $selectedData["contentA"] ?>
                    </p>
                </div>
                <div class="col-12 mt-4">
                    <h5 class="fw-bold ">
                        <?php echo $selectedData["content1"] ?>
                    </h5>
                    <p>
                        <?php echo $selectedData["content2"] ?>
                    </p>
                </div>
                <div class="col-12 mt-4">
                    <h5 class="fw-bold ">
                        <?php echo $selectedData["content3"] ?>
                    </h5>
                    <p>
                        <?php echo $selectedData["content4"] ?>
                    </p>
                </div>
                <div class="col-12 mt-4">
                    <h5 class="fw-bold ">
                        <?php echo $selectedData["content5"] ?>
                    </h5>
                    <p>
                        <?php echo $selectedData["content6"] ?>
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