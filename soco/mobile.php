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
            <div class="col-12 baxFixMobile subImg hideElement" style="background-color: #071252;">
                <div class="col-12 col-lg-10 offset-lg-1 py-5 mt-lg-5 ">
                    <div class="row mt-5">
                        <div class="col-12 col-lg-6">
                            <h1 class="bold-fontAU text-white subText hideElement">Mobile Development</h1>
                            <p class="mt-4 fs-5 text-white subText2 hideElement">
                                Explore the realm of mobile app development, from iOS and Android to cross-platform solutions. Create innovative apps for a global audience.
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
            <div class="col-12 col-lg-10 offset-lg-1 py-5 mt-lg-5 reveal">
                <div class="col-12 reveal">
                    <h5 class="fw-bold" style="color: #071252; text-decoration: underline;">Featured Services</h5>
                    <div class="mt-4">
                        <li>iOS App Development</li>
                        <li>Android App Development</li>
                        <li>Cross-Platform App Development</li>
                        <li>UI/UX Design for Mobile Apps</li>
                        <li>UI Animations</li>
                        <li>Mobile App Prototyping and Wireframing</li>
                        <li>App Backend Development</li>
                        <li>Mobile App Testing and Quality Assurance</li>
                        <li>App Store Submission and Maintenance</li>
                        <li>Augmented Reality (AR) and Virtual Reality (VR) Apps</li>
                        <li>Integration of APIs and Third-Party Services</li>
                    </div>
                </div>
            </div>
            <!-- Main 02 -->

            <!-- Main 03 -->
            <div class="col-12 col-lg-10 offset-lg-1 py-5 reveal">
                <div class="col-12 reveal">
                    <h5 class="fw-bold" style="color: #071252; text-decoration: underline;">Design Architecture</h5>
                    <div class="mt-4">
                        <li>Platform Selection</li>
                        <li>Native vs. Cross-Platform Development</li>
                        <li>User Interface (UI) Design</li>
                        <li>Backend Services</li>
                        <li>App Components</li>
                        <li>Data Management</li>
                        <li>Offline Support</li>
                        <li>Security</li>
                        <li>Performance Optimization</li>
                        <li>Testing and Quality Assurance</li>
                    </div>
                </div>
            </div>
            <!-- Main 03 -->

            <!-- Main 04 -->
            <div class="col-12 reveal" style="background-color: #E0FAFF ;">
                <div class="col-12 col-lg-10 offset-lg-1 py-5 reveal">
                    <div class="col-12 text-center">
                        <h1 class="fw-bold" style="color: #071252;">
                            Comprehensive Mobile App Solutions for Your Business
                        </h1>
                    </div>
                    <div class="col-8 offset-2 mt-4 text-center">
                        <p>
                            At MaestroCrew, we are dedicated to providing top-tier mobile app development services tailored to meet your business needs. When you choose us as your mobile app development partner, we offer a range of invaluable deliverables to ensure the success of your app
                        </p>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6 ">
                            <div class="mt-4">
                                <li>Complete Project Execution</li>
                                <li>Interactive Wireframes and Prototypes</li>
                                <li>Functional Specifications (SRS Documents)</li>
                                <li>Platform Selection and Strategy</li>
                                <li>User-Centric UI/UX Design</li>
                                <li>Backend Services and APIs</li>
                                <li>Security and Privacy</li>
                                <li>Quality Assurance and Testing</li>
                                <li>Timely Delivery and Ongoing Support</li>
                                <li>Performance Optimization</li>
                                <li>App Launch and Distribution</li>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                            <img src="Img/mobileD2.jpg" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 04 -->

            <!-- Main 05 -->
            <div class="col-12 col-lg-10 offset-lg-1 py-5 reveal">
                <div class="col-12">
                    <h5 class="fw-bold" style="color: #071252; text-decoration: underline;">FAQs</h5>
                    <div class="mt-4">

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                                Q: What services does your company offer?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample1">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: We provide a wide range of services, including web development, mobile app development, software development, UI/UX design, and digital consulting.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                Q: What kind of mobile applications do you develop?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample2">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: We specialize in developing both native and cross-platform mobile applications for iOS and Android platforms. Our team can build custom apps, enterprise solutions, e-commerce apps, and more.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                                Q: How do I start the mobile app development process with your company?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample3">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: To begin, you can reach out to us through our contact form or call us directly. We'll schedule an initial discussion to understand your app idea and requirements.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                                Q: What is the typical mobile app development timeline?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample4">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: The development timeline can vary depending on the complexity and features of the app. We provide estimated timelines during the planning phase and work efficiently to meet deadlines.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5">
                                Q: How much does it cost to develop a mobile app?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample5">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: The cost of app development depends on factors like features, design, platforms, and complexity. We offer personalized quotes after assessing your specific project needs.<strong>
                                    For example, if you want Cleaning company mobile app (Inculdes normal functions) it will usually cost you at least $3000. Not includes hosting.</strong>
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample6">
                                Q: Do you provide app maintenance and support after the launch?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample6">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: Yes, we offer post-launch maintenance and support packages to ensure your app remains updated, secure, and compatible with the latest devices and OS versions.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample7" role="button" aria-expanded="false" aria-controls="collapseExample7">
                                Q: What technologies do you use for mobile app development?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample7">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: Our team is skilled in using native technologies like Swift for iOS and Java/Kotlin for Android, as well as cross-platform frameworks like React Native and Flutter.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample8" role="button" aria-expanded="false" aria-controls="collapseExample8">
                                Q: Do you provide ongoing app updates and feature enhancements?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample8">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: Yes, we offer ongoing support and regular updates to improve your app's performance, add new features, and adapt to changing user needs.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample9" role="button" aria-expanded="false" aria-controls="collapseExample9">
                                Q: Can you develop apps for both smartphones and tablets?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample9">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: Yes, we can create responsive mobile apps that work seamlessly on both smartphones and tablets, providing a consistent user experience across devices.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample10" role="button" aria-expanded="false" aria-controls="collapseExample10">
                                Q: How do you ensure the security of the mobile app and user data?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample10">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: We follow industry best practices for app security and data protection. We conduct rigorous testing and implement security measures to safeguard user information.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Main 05 -->

            <!-- Main 06 -->
            <div class="col-12" style="background-color: #F0F2FF;">
                <div class="col-12 col-lg-10 offset-lg-1 py-5 reveal">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6">
                            <h5 class="fw-bold">
                                CONTACT FOR</br>
                                QUICK CUSTOM QUOTE
                            </h5>
                            <div class="mt-4">
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
                                For a fast and tailored quote, get in touch with us now. We offer quick custom solutions to meet your unique needs. <strong>Contact us today!</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main 06 -->

        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>