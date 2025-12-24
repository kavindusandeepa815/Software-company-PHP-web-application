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
            <div class="col-12 baxFixWeb subImg hideElement" style="background-color: #071252;">
                <div class="col-12 col-lg-10 offset-lg-1 py-5 mt-lg-5 ">
                    <div class="row mt-5">
                        <div class="col-12 col-lg-6">
                            <h1 class="bold-fontAU text-white subText hideElement">Web Development</h1>
                            <p class="mt-4 fs-5 text-white subText2 hideElement">
                                Unleash your creativity in web development. Master front-end and back-end technologies to craft stunning, dynamic websites and web applications.
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
                        <li>Custom Website Design and Development</li>
                        <li>Responsive Web Design</li>
                        <li>E-Commerce Solutions</li>
                        <li>CMS Customization</li>
                        <li>Web Application Development</li>
                        <li>SEO and Performance Optimization</li>
                        <li>UI Animations</li>
                        <li>Website Maintenance and Support</li>
                        <li>Web Hosting and Domain Management</li>
                        <li>UI/UX Design Services</li>
                        <li>Consultation and Project Planning</li>
                    </div>
                </div>
            </div>
            <!-- Main 02 -->

            <!-- Main 03 -->
            <div class="col-12 col-lg-10 offset-lg-1 py-5 reveal">
                <div class="col-12 reveal">
                    <h5 class="fw-bold" style="color: #071252; text-decoration: underline;">Design Architecture</h5>
                    <div class="mt-4">
                        <li>Information Architecture (IA)</li>
                        <li>User Interface (UI) Design</li>
                        <li>Responsive Design</li>
                        <li>Front-end Development</li>
                        <li>Back-end Development</li>
                        <li>Content Management System (CMS)</li>
                        <li>Scalability and Performance</li>
                        <li>Security</li>
                        <li>SEO (Search Engine Optimization)</li>
                        <li>Accessibility</li>
                    </div>
                </div>
            </div>
            <!-- Main 03 -->

            <!-- Main 04 -->
            <div class="col-12 reveal" style="background-color: #E0FAFF ;">
                <div class="col-12 col-lg-10 offset-lg-1 py-5 reveal">
                    <div class="col-12 text-center ">
                        <h1 class="fw-bold" style="color: #071252;">
                            Comprehensive Solutions for Your Digital Success
                        </h1>
                    </div>
                    <div class="col-8 offset-2 mt-4 text-center">
                        <p>
                            At MaestroCrew, we are committed to delivering top-notch web development services that cater to your unique business requirements. When you choose us as your trusted partner, we offer an array of valuable deliverables to ensure your digital success
                        </p>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6 ">
                            <div class="mt-4">
                                <li>Complete Project Execution</li>
                                <li>Wireframes and Prototypes</li>
                                <li>Functional Specifications (SRS Documents)</li>
                                <li>Responsive Design</li>
                                <li>Content Management System (CMS)</li>
                                <li>Search Engine Optimization (SEO)</li>
                                <li>Security and Performance</li>
                                <li>Quality Assurance and Testing</li>
                                <li>Timely Delivery and Ongoing Support</li>
                                <li>Launch</li>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                            <img src="Img/webD2.jpg" class="img-fluid rounded">
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
                                Q: How do I get started with a project?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample2">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: To start a project with us, simply reach out through our contact form or give us a call. We'll schedule an initial consultation to discuss your requirements and project scope.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                                Q: What is your typical development process?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample3">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: Our development process includes the following stages: requirements gathering, project planning, design and development, testing and quality assurance, deployment, and ongoing support.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                                Q: How long does it take to complete a typical project?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample4">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: Project timelines can vary based on the scope and complexity. We provide estimated timeframes during the project planning phase and work diligently to meet deadlines.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5">
                                Q: How much does a project cost?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample5">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: The cost of a project depends on various factors, such as the scope, features, and technology requirements. We offer custom quotes tailored to each project after understanding your needs. <strong>
                                    For example, if you want this type of website (which includes CMC, Admin panel, Payment gateway, Product) it will usually cost you at least $1500. Not includes hosting.</strong>
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample6">
                                Q: Do you work with startups and small businesses?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample6">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: Yes, we work with clients of all sizes, including startups and small businesses. We have experience in developing solutions that fit various budgets and requirements.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample7" role="button" aria-expanded="false" aria-controls="collapseExample7">
                                Q: Can you help with ongoing maintenance and support after the project is completed?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample7">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: Absolutely! We offer post-launch support and maintenance packages to ensure your project runs smoothly and stays up-to-date with evolving technologies.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample8" role="button" aria-expanded="false" aria-controls="collapseExample8">
                                Q: What technologies do you specialize in?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample8">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: Our team is proficient in a wide range of technologies, including but not limited to HTML/CSS, JavaScript, React, Node.js, PHP, WordPress.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample9" role="button" aria-expanded="false" aria-controls="collapseExample9">
                                Q: Can you integrate third-party services into our project?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample9">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: Yes, we can integrate various third-party services, APIs, and platforms to enhance the functionality and user experience of your project.
                            </div>
                        </div>

                        <li>
                            <a class="text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseExample10" role="button" aria-expanded="false" aria-controls="collapseExample10">
                                Q: How do you ensure the security of our project and data?
                            </a>
                        </li>
                        <div class="collapse" id="collapseExample10">
                            <div class="card card-body" style="background-color: #F7F7F7 ;">
                                A: We follow industry best practices to secure our projects and maintain strict confidentiality of client data. We implement security measures and conduct regular audits to identify and mitigate potential vulnerabilities.
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