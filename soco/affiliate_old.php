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

    <div class="container-fluid animated-element">
        <div class="row">

            <?php include "header.php"; ?>

            <?php

            if (isset($_SESSION["affiliate"])) {

                require "connection.php";

                $affiliate_rs = Database::search("SELECT * FROM `affiliate_start` WHERE `email`='" . $_SESSION["affiliate"]["email"] . "' ");
                $affiliate_data = $affiliate_rs->fetch_assoc();

            ?>

                <div class="loader-overlay animated-element">
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

                <div id="error-message"></div>


                <!-- Main 01 -->
                <div class="col-12 col-lg-10 offset-lg-1 mt-2 mt-lg-5">
                    <div class="col-12 d-flex justify-content-end mt-5">
                        <button class="btn btn-danger" onclick="affiliateSignOut();">Sign Out</button>
                    </div>
                </div>
                <!-- Main 01 -->

                <!-- Main 02 -->
                <div class="col-12 mt-5 mb-5">
                    <div class="col-12 col-lg-10 offset-lg-1 py-5 ">
                        <div class="col-12">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Profile</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Available Project</button>
                                    <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Payments</button> -->
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">


                                <!-- Start Project -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                    <div class="col-12 mt-4">
                                        <div class="col-12 col-lg-4">
                                            <div class="d-flex justify-content-center">
                                                <div class="mb-3">
                                                    <img class="img-thumbnail" src="Img/userMC.png" style="max-width: 180px;">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" value="<?php echo $affiliate_data["name"]; ?>" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="Email" class="form-control" value="<?php echo $affiliate_data["email"]; ?>" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Country</label>
                                                <select class="form-select" disabled>
                                                    <option value="0">Select Country</option>
                                                    <?php

                                                    $country_rs = Database::search("SELECT * FROM `country` ");
                                                    $country_num = $country_rs->num_rows;
                                                    for ($c = 0; $c < $country_num; $c++) {
                                                        $country_data = $country_rs->fetch_assoc();

                                                        if ($affiliate_data["country_id"] == $country_data["id"]) {
                                                            $selected_country = "selected";
                                                        } else {
                                                            $selected_country = " ";
                                                        }

                                                    ?>
                                                        <option value="<?php echo $country_data["id"]; ?>" <?php echo $selected_country; ?>><?php echo $country_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="userUpdateUserPassword" value="<?php echo $affiliate_data["password"]; ?>" disabled>
                                                    <button class="btn btn-warning" onclick="changePasswordType();">View</button>
                                                </div>
                                            </div>
                                            </hr>

                                            <?php

                                            $affiliate_rs2 = Database::search("SELECT * FROM `affiliate_start`
                                            INNER JOIN `affiliate_company` ON `affiliate_company`.`affiliate_start_id` = `affiliate_start`.`id`
                                            INNER JOIN `affiliate_billing` ON `affiliate_billing`.`affiliate_start_id` = `affiliate_start`.`id`
                                            WHERE `id` = '" . $affiliate_data["id"] . "' ");

                                            $affiliate_data2 = $affiliate_rs2->fetch_assoc();

                                            ?>

                                            <div class="mb-3">
                                                <label class="form-label">Company Name</label>
                                                <input type="Email" class="form-control" value="<?php echo $affiliate_data2["company_name"]; ?>" id="updateAffiliateProfileName_<?php echo $affiliate_data['id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">URL</label>
                                                <input type="Email" class="form-control" value="<?php echo $affiliate_data2["company_url"]; ?>" id="updateAffiliateProfileUrl_<?php echo $affiliate_data['id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description(Payment)</label>
                                                <input type="Email" class="form-control" value="<?php echo $affiliate_data2["description"]; ?>" id="updateAffiliateProfileDes_<?php echo $affiliate_data['id']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-success" onclick="updateAffiliateProfile('<?php echo $affiliate_data['id']; ?>');">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Start Project -->


                                <!-- Available Project -->
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                    <div class="col-12 mt-4">
                                        <div class="col-12 mb-3">
                                            <h4>Pending Projects</h4>
                                        </div>

                                        <?php

                                        $project_rs = Database::search("SELECT 
                                        project.id AS pid,
                                        project.title AS ptitle,
                                        project.pr_type_id AS prtypeid, 
                                        project.start AS pstart,
                                        project.end AS pend,
                                        project.affiliate AS paffiliate,
                                        project.status_pr_id AS pstatusprid,
                                        affiliate_start.email AS aemail,
                                        affiliate_start.id AS afid,
                                        pr_type.name AS prname,
                                        status_pr.name AS statusName
                                        FROM `affiliate_has_project`
                                        INNER JOIN `project` ON `project`.`id` = `affiliate_has_project`.`project_id`
                                        INNER JOIN `affiliate_start` ON `affiliate_start`.`id` = `affiliate_has_project`.`affiliate_start_id`
                                        INNER JOIN `pr_type` ON `pr_type`.`id` = `project`.`pr_type_id`
                                        INNER JOIN `status_pr` ON `status_pr`.`id` = `project`.`status_pr_id`
                                        WHERE `affiliate_has_project`.`affiliate_start_id` = '" . $affiliate_data["id"] . "' AND `project`.`status_pr_id` = '3' ");



                                        $project_num = $project_rs->num_rows;

                                        if ($project_num > 0) {

                                            for ($ap = 0; $ap < $project_num; $ap++) {

                                                $project_data = $project_rs->fetch_assoc();

                                        ?>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <?php echo $project_data["prname"]; ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <blockquote class="blockquote mb-0">
                                                            <span>Project ID:</span>
                                                            <span class="fw-bold"> <?php echo $project_data["pid"]; ?></span></br>
                                                            <span>Project Title:</span>
                                                            <span class="fw-bold"> <?php echo $project_data["ptitle"]; ?></span></br>
                                                            <span>Start Date:</span>
                                                            <span class="fw-bold"> <?php echo $project_data["pstart"]; ?></span></br>
                                                            <span>End Date:</span>
                                                            <span class="fw-bold"> <?php echo $project_data["pend"]; ?></span></br>
                                                            <span>Affiliate Payment:</span>
                                                            <span class="fw-bold">$<?php echo $project_data["paffiliate"]; ?></span></br>
                                                            <span>Project Status</span>
                                                            <span class="fw-bold text-danger"><?php echo $project_data["statusName"]; ?></span></br>
                                                        </blockquote>
                                                    </div>
                                                </div>

                                            <?php

                                            }
                                        } else {

                                            ?>

                                            <div class="card">
                                                <div class="card-header">
                                                    None
                                                </div>
                                                <div class="card-body">
                                                    <blockquote class="blockquote mb-0">
                                                        <h2>No Project Available</h2>
                                                    </blockquote>
                                                </div>
                                            </div>

                                        <?php

                                        }

                                        ?>

                                        <hr />
                                        <div class="col-12 mb-3">
                                            <h4>All Projects</h4>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Project ID</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Start</th>
                                                        <th scope="col">End</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $project_rs2 =  Database::search("SELECT 
                                                    project.id AS pid,
                                                    project.title AS ptitle,
                                                    project.pr_type_id AS prtypeid,
                                                    project.start AS pstart,
                                                    project.end AS pend,
                                                    project.affiliate AS paffiliate,
                                                    project.status_pr_id AS pstatusprid,
                                                    affiliate_start.email AS aemail,
                                                    affiliate_start.id AS afid,
                                                    pr_type.name AS prname,
                                                    status_pr.name AS statusName
                                                    FROM `affiliate_has_project` 
                                                    INNER JOIN `affiliate_start` ON `affiliate_start`.`id`=`affiliate_has_project`.`affiliate_start_id` 
                                                    INNER JOIN `project` ON `project`.`id`=`affiliate_has_project`.`project_id` 
                                                    INNER JOIN `pr_type` ON `pr_type`.`id`=`project`.`pr_type_id` 
                                                    INNER JOIN `status_pr` ON `status_pr`.`id` =`project`.`status_pr_id` 
                                                    WHERE `affiliate_has_project`.`affiliate_start_id`='" . $affiliate_data["id"] . "' AND `project`.`status_pr_id`!='3' ");

                                                    $project_num2 = $project_rs2->num_rows;

                                                    if ($project_num2 > 0) {
                                                        for ($p2 = 0; $p2 < $project_num2; $p2++) {
                                                            $project_data2 = $project_rs2->fetch_assoc();

                                                    ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $project_data2["pid"]; ?></th>
                                                                <td><?php echo $project_data2["ptitle"]; ?></td>
                                                                <td><?php echo $project_data2["pstart"]; ?></td>
                                                                <td><?php echo $project_data2["pend"]; ?></td>

                                                                <?php
                                                                if ($project_data2["pstatusprid"] == 2) {
                                                                ?>
                                                                    <td class="fw-bold text-success"><?php echo $project_data2["statusName"]; ?></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td class="fw-bold text-danger"><?php echo $project_data2["statusName"]; ?></td>
                                                                <?php
                                                                }
                                                                ?>

                                                                <td>$<?php echo $project_data2["paffiliate"]; ?></td>

                                                            </tr>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <th scope="row">NO</th>
                                                            <td>NO</td>
                                                            <td>NO</td>
                                                            <td>NO</td>
                                                            <td>NO</td>
                                                            <td>NO</td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <!-- Available Project -->


                                <!-- Payments -->
                                <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                                    <div class="col-12 mt-4">
                                        <div class="col-12 mb-3">
                                            <h4>Pending Payments</h4>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Payments -->


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main 02 -->
            <?php

            } else {
            ?>

                <div class="mt-5 d-flex justify-content-center">
                    <div class="col-lg-4 col-12 mt-5 py-5 bg-danger border border-1 rounded-2 text-center">
                        <h3 class="text-white">Please Login First.</h3>
                    </div>
                </div>

            <?php
            }

            ?>

        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>