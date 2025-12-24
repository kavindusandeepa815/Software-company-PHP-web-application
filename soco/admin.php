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

    <?php

    session_start();

    if (isset($_SESSION["admin"])) {

        require "connection.php";

        $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $_SESSION["admin"]["email"] . "' ");
        $admin_data = $admin_rs->fetch_assoc();

    ?>

        <div class="container-fluid animated-element">
            <div class="row">


                <div class="loader-overlay animated-element">
                    <div class="d-flex align-items-center">
                        <strong role="status">Loading...</strong>
                        <div class="spinner-border ms-auto" aria-hidden="true"></div>
                    </div>
                </div>


                <!-- Main 01 -->
                <div class="col-12 col-lg-10 offset-lg-1 mt-2 mb-2 mb-lg-5">
                    <div class="col-12 d-flex justify-content-end mt-5">
                        <label><?php echo $admin_data["email"]; ?></label>
                        <button class="btn btn-danger ms-3" onclick="adminSignOut();">Sign Out</button>
                    </div>
                </div>
                <!-- Main 01 -->



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



                <div class="col-12 border border-1 border-dark border-bottom-0 border-end-0 border-start-0">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-2 ">
                            <div class="col-12 border border-3 border-info border-bottom-0 border-top-0 border-start-0">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Users</button>
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-affiliate" type="button" role="tab" aria-controls="v-pills-affiliate" aria-selected="false">Affiliate</button>
                                    <button class="nav-link" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false">Employers</button>
                                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Projects</button>
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Payments</button>
                                    <button class="nav-link" id="v-pills-email-tab" data-bs-toggle="pill" data-bs-target="#v-pills-email" type="button" role="tab" aria-controls="v-pills-email" aria-selected="false">Email</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-10 mt-4 mt-lg-0">
                            <div class="col-12">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <!-- Home -->
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                        <div class="col-12 mb-4">
                                            <div class="row justify-content-around mb-4">
                                                <div class="col-5 col-lg-2 p-4 mt-3 mt-lg-0" style="background-color: #E4FF00;">

                                                    <?php
                                                    $total_users_rs =  Database::search("SELECT COUNT(*) AS total_users FROM `user` ");
                                                    $total_users =  $total_users_rs->fetch_assoc();

                                                    $total_affiliate_rs =  Database::search("SELECT COUNT(*) AS total_affiliate FROM `affiliate_start` ");
                                                    $total_affiliate =  $total_affiliate_rs->fetch_assoc();

                                                    $total_employee_rs =  Database::search("SELECT COUNT(*) AS total_employee FROM `employee` ");
                                                    $total_employees =  $total_employee_rs->fetch_assoc();

                                                    $total_uncolplete_rs =  Database::search("SELECT COUNT(*) AS total_uncolplete FROM `project` WHERE `status_pr_id`='3' ");
                                                    $total_uncomplete =  $total_uncolplete_rs->fetch_assoc();
                                                    ?>

                                                    <span>Total Users:</span>
                                                    <span class="fw-bold"><?php echo $total_users["total_users"]; ?></span></br>
                                                </div>
                                                <div class="col-5 col-lg-2 p-4 mt-3 mt-lg-0" style="background-color: #E4FF00;">
                                                    <span>Total Employies:</span>
                                                    <span class="fw-bold"><?php echo $total_employees["total_employee"]; ?></span></br>
                                                </div>
                                                <div class="col-5 col-lg-2 p-4 mt-3 mt-lg-0" style="background-color: #E4FF00;">
                                                    <span>Un complete Projects:</span>
                                                    <span class="fw-bold"><?php echo $total_uncomplete["total_uncolplete"]; ?></span></br>
                                                </div>
                                                <div class="col-5 col-lg-2 p-4 mt-3 mt-lg-0" style="background-color: #E4FF00;">
                                                    <span>Total Affiliate:</span>
                                                    <span class="fw-bold"><?php echo $total_affiliate["total_affiliate"]; ?></span></br>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="col-12 mb-4">
                                                <h3>Contact Forms</h3>
                                            </div>

                                            <?php

                                            $contact_rs = Database::search("SELECT contact.id AS cid,contact.date_time,contact.name,contact.email,contact.message,contact.country_id,country.id,country.name AS cname FROM `contact` 
                                        INNER JOIN `country` ON `country`.`id`=`contact`.`country_id` 
                                        WHERE `status_ue_id`='1' ");
                                            $contact_num = $contact_rs->num_rows;

                                            if ($contact_num == 0) {

                                            ?>

                                                <div class="col-12 mb-4">
                                                    <div class="col-12 border border-2 rounded-2 border-black p-3">
                                                        <h1>Not Contact Forms</h1>
                                                    </div>
                                                </div>

                                            <?php

                                            } else {

                                            ?>

                                                <?php

                                                for ($cf = 0; $cf < $contact_num; $cf++) {
                                                    $contact_data = $contact_rs->fetch_assoc();

                                                ?>

                                                    <div class="col-12 mb-4">
                                                        <div class="card">
                                                            <h5 class="card-header">Message</h5>
                                                            <div class="card-body">
                                                                <div class="input-group mb-2">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                                                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $contact_data["date_time"]; ?>" disabled>
                                                                </div>
                                                                <div class="input-group mb-2">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $contact_data["name"]; ?>" disabled>
                                                                </div>
                                                                <div class="input-group mb-2">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                                                    <input type="text" id="gotItContactEmail" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $contact_data["email"]; ?>" disabled>
                                                                </div>
                                                                <div class="input-group mb-2">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">Affiliate</span>
                                                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $contact_data["affiliate"]; ?>" disabled>
                                                                </div>
                                                                <div class="input-group mb-2">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">Country</span>
                                                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $contact_data["cname"]; ?>" disabled>
                                                                </div>
                                                                <button class="btn btn-success" onclick="gotItContact(<?php echo $contact_data['cid']; ?>);">Got It</button>
                                                                <button class="btn btn-danger" onclick="dismissContact(<?php echo $contact_data['cid']; ?>);">Dismiss</button>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-12 border border-2 rounded-2 border-black p-3">
                                                            <span>Date:<strong><?php echo $contact_data["date_time"]; ?></strong></span>&nbsp;
                                                            <span>Name:<strong><?php echo $contact_data["name"]; ?></strong></span>&nbsp;
                                                            <span>Email:<strong id="gotItContactEmail"><?php echo $contact_data["email"]; ?></strong></span>&nbsp;
                                                            <span>Affiliate:<strong><?php echo $contact_data["affiliate"]; ?></strong></span>&nbsp;
                                                            <span>Country:<strong><?php echo $contact_data["cname"]; ?></strong></span></br>
                                                            <p class="mt-1">
                                                                <?php echo $contact_data["message"]; ?>
                                                            </p>
                                                            <button class="btn btn-success" onclick="gotItContact(<?php echo $contact_data['cid']; ?>);">Got It</button>
                                                            <button class="btn btn-danger" onclick="dismissContact(<?php echo $contact_data['cid']; ?>);">Dismiss</button>
                                                        </div> -->
                                                    </div>

                                            <?php

                                                }
                                            }

                                            ?>

                                            <!--  -->
                                            <div class="col-12 mb-4">
                                                <h3>Start Project</h3>
                                            </div>
                                            <div class="col-12 mb-4 overFlow">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Start</th>
                                                            <th scope="col">End</th>
                                                            <th scope="col">Amount</th>
                                                            <th scope="col">Afiiliate Amount</th>
                                                            <th scope="col">Afiiliate ID</th>
                                                            <th scope="col">Advanced</th>
                                                            <th scope="col">ADD</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">0</th>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Title" value="" id="StartPrjAdmTitle">
                                                            </td>
                                                            <td>
                                                                <select class="form-select" id="StartPrjAdmType">

                                                                    <option value="0">Project Type</option>

                                                                    <?php
                                                                    $type_rs = Database::search("SELECT * FROM `pr_type` ");
                                                                    $type_num = $type_rs->num_rows;

                                                                    for ($y = 0; $y < $type_num; $y++) {
                                                                        $type_data = $type_rs->fetch_assoc();


                                                                    ?>

                                                                        <option value="<?php echo $type_data["id"]; ?>"> <?php echo $type_data["name"]; ?></option>

                                                                    <?php

                                                                    }

                                                                    ?>

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Email" value="" id="StartPrjAdmEmail">
                                                            </td>
                                                            <td>
                                                                <select class="form-select" id="StartPrjAdmStatus">

                                                                    <option value="0">Project Status</option>

                                                                    <?php
                                                                    $status_pr_rs = Database::search("SELECT * FROM `status_pr` ");
                                                                    $status_pr_num = $status_pr_rs->num_rows;

                                                                    for ($a = 0; $a < $status_pr_num; $a++) {
                                                                        $status_pr_data = $status_pr_rs->fetch_assoc();


                                                                    ?>

                                                                        <option value="<?php echo $status_pr_data["id"]; ?>"> <?php echo $status_pr_data["name"]; ?></option>

                                                                    <?php

                                                                    }

                                                                    ?>

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Start Date" value="" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="2023-5-5" value="" id="StartPrjAdmEnd">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="$250" value="" id="StartPrjAdmAmount">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="$250" value="" id="StartPrjAdmAffiliate">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Affiliate Id" value="" id="StartPrjAdmAffiliateID">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="$250" value="" id="StartPrjAdmAdvanced">
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-success" onclick="startProjectAdmin();">Add</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Home -->

                                    <!-- Users -->
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Users</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="User Email" id="SuserEmail">
                                                <button class="btn btn-success" onclick="searchU('SuserEmail');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="User Name" id="SuserName">
                                                <button class="btn btn-success" onclick="searchU('SuserName');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control d-none" placeholder="User Name" id="SuserAll" disabled>
                                                <button class="btn btn-success" onclick="searchU('SuserAll');">Search All</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control d-none" placeholder="User Name" id="SuserAllNone" disabled>
                                                <button class="btn btn-success" onclick="searchU('SuserAllNone');">Search All None</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Country</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Update</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">0</th>
                                                        <td><input type="text" class="form-control" placeholder="Name" id="userName"></td>
                                                        <td><input type="text" class="form-control" placeholder="Email" id="userEmail"></td>
                                                        <td>
                                                            <select class="form-select" id="userCountry">

                                                                <option value="0">Country</option>

                                                                <?php
                                                                $country_rs = Database::search("SELECT * FROM `country` ");
                                                                $country_num = $country_rs->num_rows;

                                                                for ($c = 0; $c < $country_num; $c++) {
                                                                    $country_data = $country_rs->fetch_assoc();


                                                                ?>

                                                                    <option value="<?php echo $country_data["id"]; ?>"> <?php echo $country_data["name"]; ?></option>

                                                                <?php

                                                                }

                                                                ?>

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select" disabled>

                                                                <option value="0">Status</option>

                                                                <?php
                                                                $status_ue_rs = Database::search("SELECT * FROM `status_ue` ");
                                                                $status_ue_num = $status_ue_rs->num_rows;

                                                                for ($z = 0; $z < $status_ue_num; $z++) {
                                                                    $status_ue_data = $status_ue_rs->fetch_assoc();

                                                                ?>

                                                                    <option value="<?php echo $status_ue_data["id"]; ?>"> <?php echo $status_ue_data["name"]; ?></option>

                                                                <?php

                                                                }

                                                                ?>

                                                            </select>
                                                        </td>
                                                        <td><button class="btn btn-success" onclick="adduser()">Add</button></td>
                                                    </tr>
                                                </tbody>
                                                <tbody id="SuserResult">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Users -->


                                    <!-- Affiliate -->
                                    <div class="tab-pane fade" id="v-pills-affiliate" role="tabpanel" aria-labelledby="v-pills-affiliate-tab" tabindex="0">
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Affiliate</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Affiliate Email" id="SaffiliateEmail">
                                                <button class="btn btn-success" onclick="search_affiliate('SaffiliateEmail');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control d-none" placeholder="User Name" id="SaffiliateAll" disabled>
                                                <button class="btn btn-success" onclick="search_affiliate('SaffiliateAll');">Search All</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control d-none" placeholder="User Name" id="SaffiliateAllNone" disabled>
                                                <button class="btn btn-success" onclick="search_affiliate('SaffiliateAllNone');">Search All None</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Country</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Update</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="SaffiliateResult">

                                                </tbody>
                                            </table>
                                        </div>
                                        </hr>
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Affiliate Other</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Affiliate ID" id="searchAffiliateOther">
                                                <button class="btn btn-success" onclick="searchAffiliateOther()">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Company</th>
                                                        <th scope="col">URL</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Update</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ResultAffiliateOther">

                                                </tbody>
                                            </table>
                                        </div>
                                        <hr />
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Affiliate has Projects</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Project ID" id="searchAffiliateHPrd">
                                                <button class="btn btn-success" onclick="searchAffiliateHPrd();">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Project ID</th>
                                                        <th scope="col">Project title</th>
                                                        <th scope="col">Affiliate</th>
                                                        <th scope="col">Start</th>
                                                        <th scope="col">End</th>
                                                        <th scope="col">Projet Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="SaffiliateHPrdResult">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Affiliate Payment</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Affiliate ID" id="SaffiliatePAYafID">
                                                <button class="btn btn-success" onclick="search_affiliate_payment('SaffiliatePAYafID');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Project ID" id="SaffiliatePAYprjID">
                                                <button class="btn btn-success" onclick="search_affiliate_payment('SaffiliatePAYprjID');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">PAYID</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Project</th>
                                                        <th scope="col">AFF Name</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Update</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="SaffiliatePAYResult">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Affiliate-->


                                    <!-- Employers -->
                                    <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Employers</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Employee Email" id="SemployeeEmail">
                                                <button class="btn btn-success" onclick="searchEmp('SemployeeEmail');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Employee Name" id="SemployeeName">
                                                <button class="btn btn-success" onclick="searchEmp('SemployeeName');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="SemployeeType">

                                                    <option value="0">Type</option>

                                                    <?php
                                                    $type_rs = Database::search("SELECT * FROM `pr_type` ");
                                                    $type_num = $type_rs->num_rows;

                                                    for ($y = 0; $y < $type_num; $y++) {
                                                        $type_data = $type_rs->fetch_assoc();


                                                    ?>

                                                        <option value="<?php echo $type_data["id"]; ?>"> <?php echo $type_data["name"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                                <button class="btn btn-success" onclick="searchEmp('SemployeeType');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control d-none" placeholder="User Name" id="SemployeeAll" disabled>
                                                <button class="btn btn-success" onclick="searchEmp('SemployeeAll');">Search All</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Contact</th>
                                                        <th scope="col">Bank</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Add/Update</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">0</th>
                                                        <td><input type="text" class="form-control" value="" id="employeeName"></td>
                                                        <td><input type="text" class="form-control" value="" id="employeeEmail"></td>
                                                        <td><input type="text" class="form-control" value="" id="employeeContact"></td>
                                                        <td><input type="text" class="form-control" value="" id="employeeBank"></td>
                                                        <td>
                                                            <select class="form-select" id="employeeProType">

                                                                <option value="0">Type</option>

                                                                <?php
                                                                $type_rs = Database::search("SELECT * FROM `pr_type` ");
                                                                $type_num = $type_rs->num_rows;

                                                                for ($y = 0; $y < $type_num; $y++) {
                                                                    $type_data = $type_rs->fetch_assoc();


                                                                ?>

                                                                    <option value="<?php echo $type_data["id"]; ?>"> <?php echo $type_data["name"]; ?></option>

                                                                <?php

                                                                }

                                                                ?>

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select" disabled>

                                                                <option value="0">Status</option>

                                                                <?php
                                                                $status_pr_rs = Database::search("SELECT * FROM `status_ue` ");
                                                                $status_pr_num = $status_pr_rs->num_rows;

                                                                for ($a = 0; $a < $status_pr_num; $a++) {
                                                                    $status_pr_data = $status_pr_rs->fetch_assoc();


                                                                ?>

                                                                    <option value="<?php echo $status_pr_data["id"]; ?>"> <?php echo $status_pr_data["name"]; ?></option>

                                                                <?php

                                                                }

                                                                ?>

                                                            </select>
                                                        </td>
                                                        <td><button class=" ms-4 btn btn-success mb-3" type="button" onclick="addEmployees();">Add</button></td>
                                                    </tr>
                                                </tbody>
                                                <tbody id="SemployeeResult">
                                                    <!-- <tr>
                                                    <th scope="row">1</th>
                                                    <td><input type="text" class="form-control" value="Mark"></td>
                                                    <td><input type="text" class="form-control" value="Mark@gmail.com"></td>
                                                    <td><input type="text" class="form-control" value="0713548752"></td>
                                                    <td><input type="text" class="form-control" value="BOC 245879521 Wellawaya"></td>
                                                    <td>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option>Type</option>
                                                            <option selected value="1">Web</option>
                                                            <option value="2">mobile</option>
                                                            <option value="3">Software</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option>Type</option>
                                                            <option selected value="1">Web</option>
                                                            <option value="2">mobile</option>
                                                            <option value="3">Software</option>
                                                        </select>
                                                    </td>
                                                    <td><button class=" ms-4 btn btn-warning mb-3" type="button">Update</button></td>
                                                </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr />
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Employee has Projects</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="SemployeeHPstatus">

                                                    <option value="0">Project Status</option>

                                                    <?php
                                                    $status_pr_rs = Database::search("SELECT * FROM `status_pr` ");
                                                    $status_pr_num = $status_pr_rs->num_rows;

                                                    for ($a = 0; $a < $status_pr_num; $a++) {
                                                        $status_pr_data = $status_pr_rs->fetch_assoc();


                                                    ?>

                                                        <option value="<?php echo $status_pr_data["id"]; ?>"> <?php echo $status_pr_data["name"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                                <button class="btn btn-success" onclick="searchEmpHP('SemployeeHPstatus');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Employee Email" id="SemployeeHPemail">
                                                <button class="btn btn-success" onclick="searchEmpHP('SemployeeHPemail');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Employee Name" id="SemployeeHPname">
                                                <button class="btn btn-success" onclick="searchEmpHP('SemployeeHPname');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">E ID</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Project ID</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Start</th>
                                                        <th scope="col">End</th>
                                                        <th scope="col">Payment</th>
                                                        <th scope="col">Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="SemployeeHPResult">
                                                    <!-- <tr>
                                                    <th scope="row">1</th>
                                                    <td>asd vfg</td>
                                                    <td>45</td>
                                                    <td>web</td>
                                                    <td>2023/02/2</td>
                                                    <td>2023/02/2</td>
                                                    <td>$225</td>
                                                    <td>full</td>
                                                </tr> -->
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <!-- Employers -->

                                    <!-- Projects -->
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Projects</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="SprdPrdstatus">

                                                    <option value="0">Project Status</option>

                                                    <?php
                                                    $status_pr_rs = Database::search("SELECT * FROM `status_pr` ");
                                                    $status_pr_num = $status_pr_rs->num_rows;

                                                    for ($a = 0; $a < $status_pr_num; $a++) {
                                                        $status_pr_data = $status_pr_rs->fetch_assoc();


                                                    ?>

                                                        <option value="<?php echo $status_pr_data["id"]; ?>"> <?php echo $status_pr_data["name"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                                <button class="btn btn-success" onclick="searchP('SprdPrdstatus');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="User Email" id="SprdUemail">
                                                <button class="btn btn-success" onclick="searchP('SprdUemail');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Project ID" id="SprdPrdid">
                                                <button class="btn btn-success" onclick="searchP('SprdPrdid');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">P ID</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">U Email</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Start</th>
                                                        <th scope="col">End</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Affiliate </th>
                                                        <th scope="col">Advanced</th>
                                                        <th scope="col">Other</th>
                                                        <th scope="col">Due</th>
                                                        <th scope="col">Update</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="SprdResult">
                                                    <!-- <tr>
                                                    <th scope="row">1</th>
                                                    <td>
                                                        <input type="text" class="form-control" value="web123">
                                                    </td>
                                                    <td>mark@gmail.com</td>
                                                    <td>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>Type</option>
                                                            <option value="1">Un complete</option>
                                                            <option value="2">Complete</option>
                                                            <option value="3">Cancel</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>Status</option>
                                                            <option value="1">Un complete</option>
                                                            <option value="2">Complete</option>
                                                            <option value="3">Cancel</option>
                                                        </select>
                                                    </td>
                                                    <td>2023/5/5</td>
                                                    <td><input type="text" class="form-control" value="2023/5/5"></td>
                                                    <td><input type="text" class="form-control" value="$250"></td>
                                                    <td><input type="text" class="form-control" value="$250"></td>
                                                    <td><input type="text" class="form-control" value="$250"></td>
                                                    <td>$100</td>
                                                    <td>
                                                        <button class="btn btn-warning" type="button" id="button-addon2">Update</button>
                                                    </td>
                                                </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--  -->
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Assign Employies for Project</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Project ID" id="assignProjectsPid">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Employee ID" id="assignProjectsEid">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Role" id="assignProjectsRole">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Amount" id="assignProjectsAmount">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="End 2023-5-5" id="assignProjectsEnd">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <button class="btn btn-success" onclick="assignProjects();">Add</button>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Projects has Employies</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Project ID" id="searchPrdHE">
                                                <button class="btn btn-success" onclick="searchPrdHE('searchPrdHE')">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">P ID</th>
                                                        <th scope="col">P title</th>
                                                        <th scope="col">E ID</th>
                                                        <th scope="col">E Name</th>
                                                        <th scope="col">Role</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Other</th>
                                                        <th scope="col">Start</th>
                                                        <th scope="col">End</th>
                                                        <th scope="col">Projet Status</th>
                                                        <th scope="col">Payment Status</th>
                                                        <th scope="col">Update</th>
                                                        <th scope="col">Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="SprdPrdPhE">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Description</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Project ID" id="searchDescriptionId">
                                                <button class="btn btn-success" onclick="searchDescription();">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div id="searchdescriptionResult">

                                            </div>
                                        </div>
                                        <hr />
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Project ID" id="addDescriptionId">
                                            <textarea class="form-control mt-2" id="addDescriptionText" rows="5"></textarea>
                                            <button class="btn btn-success mt-2" onclick="addDescription();">Add</button>
                                        </div>

                                    </div>
                                    <!-- Projects -->

                                    <!-- Payments -->
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">

                                        <div class="col-12 mb-4">
                                            <h3 class="fw-bold">Payments</h3>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="SearchPaymentsAdmPyStuUser">

                                                    <option value="0">User Payment Status</option>

                                                    <?php
                                                    $status_py_rs = Database::search("SELECT * FROM `status_py` ");
                                                    $status_py_num = $status_py_rs->num_rows;

                                                    for ($y = 0; $y < $status_py_num; $y++) {
                                                        $status_py_data = $status_py_rs->fetch_assoc();

                                                    ?>

                                                        <option value="<?php echo $status_py_data["id"]; ?>"> <?php echo $status_py_data["name"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                                <button class="btn btn-success" onclick="SearchPaymentsAdm('SearchPaymentsAdmPyStuUser');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="SearchPaymentsAdmPyStuEmployee">

                                                    <option value="0">Employee Payment Status</option>

                                                    <?php
                                                    $status_py_rs = Database::search("SELECT * FROM `status_py` ");
                                                    $status_py_num = $status_py_rs->num_rows;

                                                    for ($y = 0; $y < $status_py_num; $y++) {
                                                        $status_py_data = $status_py_rs->fetch_assoc();

                                                    ?>

                                                        <option value="<?php echo $status_py_data["id"]; ?>"> <?php echo $status_py_data["name"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                                <button class="btn btn-success" onclick="SearchPaymentsAdm('SearchPaymentsAdmPyStuEmployee');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Payment ID" id="SearchPaymentsAdmPayID">
                                                <button class="btn btn-success" onclick="SearchPaymentsAdm('SearchPaymentsAdmPayID');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Project ID (User Payments)" id="SearchPaymentsAdmPid">
                                                <button class="btn btn-success" onclick="SearchPaymentsAdm('SearchPaymentsAdmPid');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Project ID (Employee Payments)" id="SearchPaymentsAdmPidEmployee">
                                                <button class="btn btn-success" onclick="SearchPaymentsAdm('SearchPaymentsAdmPidEmployee');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="User Email" id="SearchPaymentsAdmUsemil">
                                                <button class="btn btn-success" onclick="SearchPaymentsAdm('SearchPaymentsAdmUsemil');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Employee Email" id="SearchPaymentsAdmEmemil">
                                                <button class="btn btn-success" onclick="SearchPaymentsAdm('SearchPaymentsAdmEmemil');">Search</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Date Time</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Project ID</th>
                                                        <th scope="col">U/E ID</th>
                                                        <th scope="col">U/E Email</th>
                                                        <th scope="col">Add</th>
                                                        <th scope="col">Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="SearchPaymentsAdmResult">
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td><input type="text" class="form-control" placeholder="Amount" value="" id="addPaymentAdmAmount"></td>
                                                        <td>
                                                            <select class="form-select" id="addPaymentAdmType">

                                                                <option value="0">Payment Type</option>

                                                                <?php
                                                                $py_type_rs = Database::search("SELECT * FROM `py_type` ");
                                                                $py_type_num = $py_type_rs->num_rows;

                                                                for ($y = 0; $y < $py_type_num; $y++) {
                                                                    $py_type_data = $py_type_rs->fetch_assoc();

                                                                ?>

                                                                    <option value="<?php echo $py_type_data["id"]; ?>"> <?php echo $py_type_data["name"]; ?></option>

                                                                <?php

                                                                }

                                                                ?>

                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control" placeholder="Date Time" disabled></td>
                                                        <td>
                                                            <select class="form-select" disabled>

                                                                <option value="0">Payment Status</option>

                                                                <?php
                                                                $status_py_rs = Database::search("SELECT * FROM `status_py` ");
                                                                $status_py_num = $status_py_rs->num_rows;

                                                                for ($y = 0; $y < $status_py_num; $y++) {
                                                                    $status_py_data = $status_py_rs->fetch_assoc();

                                                                ?>

                                                                    <option value="<?php echo $status_py_data["id"]; ?>"> <?php echo $status_py_data["name"]; ?></option>

                                                                <?php

                                                                }

                                                                ?>

                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control" placeholder="Project ID" value="" id="addPaymentAdmPId"></td>
                                                        <td><input type="text" class="form-control" placeholder="ID" value="" id="addPaymentAdmUEId"></td>
                                                        <td><input type="text" class="form-control" placeholder="abc@gmail.com" disabled></td>
                                                        <td>
                                                            <button class="btn btn-success" onclick="addpaymentAdm();">Add</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <!-- Payments -->

                                    <!-- Email -->
                                    <div class="tab-pane fade" id="v-pills-email" role="tabpanel" aria-labelledby="v-pills-email-tab" tabindex="0">
                                        fgfgfg
                                    </div>
                                    <!-- Email -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    <?php

    } else {
        header("Location:adminSignIn.php");
    }

    ?>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>