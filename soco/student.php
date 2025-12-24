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

    <div class="container-fluid">
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
            <div class="col-12 " style="background-color: #F0F2FF;">
                <div class="col-10 offset-1 py-5 mt-lg-5 ">
                    <div class="row mt-5">
                        <div class="col-12 col-lg-6">
                            <h1 class="fw-bold" style="color: #071252;">Welcome to MaestroCrew: Your Academic Support Hub!</h1>
                            <p class="mt-4 fs-5">
                                At MaestroCrew, we are dedicated to helping students excel in their academic journey. Our platform is designed to provide comprehensive assistance with assignments and projects, empowering students to achieve their academic goals with confidence.
                            </p>
                        </div>
                        <!-- <div class="col-12 text-lg-end col-lg-6 ">
                            <img class="img-fluid " src="Img/webD.jpg">
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- Main 01 -->

            <!-- Main 02 -->
            <div class="col-12 py-5">
                <div class="col-10 offset-1">
                    <h3 class="fw-bold">How We Help</h3>
                    <div class="col-12 mt-4">
                        <h5 class="fw-bold ">
                            Customized Solutions
                        </h5>
                        <p>
                            Understand that every student's needs are unique. That's why we provide personalized assistance, tailored to specific requirements, ensuring top-notch solutions for each project or assignment.
                        </p>
                    </div>
                    <div class="col-12 mt-4">
                        <h5 class="fw-bold ">
                            On-Time Delivery
                        </h5>
                        <p>
                            Meeting deadlines is essential, and we take punctuality seriously. Our team works diligently to deliver assignments and projects on time, allowing students to submit their work promptly.
                        </p>
                    </div>
                    <div class="col-12 mt-4">
                        <h5 class="fw-bold ">
                            Quality Assurance
                        </h5>
                        <p>
                            Our commitment to excellence drives us to maintain the highest quality standards. Each project undergoes thorough review and quality checks to ensure academic integrity and accuracy.
                        </p>
                    </div>
                    <div class="col-12 mt-4">
                        <h5 class="fw-bold ">
                            24/7 Support
                        </h5>
                        <p>
                            We understand that academic challenges can arise at any time. Our round-the-clock support team is available to address queries and provide assistance whenever needed.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Main 02 -->


            <!-- Main 03 -->
            <div class="col-12 py-5">
                <div class="col-10 offset-1">
                    <h3 class="fw-bold">Why Choose MaestroCrew</h3>
                    <div class="col-12">
                        <p>
                            We are more than just an academic support platform. We are passionate about fostering a positive learning experience and empowering students to reach their full potential. With MaestroCrew by their side, students can gain the confidence, knowledge, and skills they need to excel in their studies and achieve academic success.
                        </p>
                        <p>
                            Let us be your academic ally, supporting you every step of the way. Explore our services and take your academic journey to new heights with MaestroCrew!
                        </p>
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