<!DOCTYPE html>
<html>

<head>
    <title>MaestroCrew</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="Img/MaestroCrew8.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

    <div class="container-fluid animated-element">
        <div class="row">

            <?php

            session_start();

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


                <i class="bi bi-list d-lg-none fs-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop"></i>

                <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel" style="background-color: #040d39;">
                    <div class="offcanvas-header">
                        <img class="p-4 profilelogo" src="Img/MaestroCrew11.png">
                        <button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            <div class="nav flex-column nav-pills" style="background-color: #040d39;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <div class="p-3 text-white leftprofilediv active" id="v-pills-start-tab" data-bs-toggle="pill" data-bs-target="#v-pills-start" type="button" role="tab" aria-controls="v-pills-start" aria-selected="true"><i class="bi bi-house-gear me-3 opacity-50"></i>Home</div>
                                <div class="p-3 text-white leftprofilediv" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-person-circle me-3 opacity-50"></i>Profile</div>
                                <div class="p-3 text-white leftprofilediv" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-window-desktop me-3 opacity-50"></i>Projects</div>
                                <div class="p-3 text-white leftprofilediv" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="bi bi-paypal  me-3 opacity-50"></i>Payments</div>
                                <div class="p-3 text-danger leftprofilediv" style="cursor: pointer;" onclick="affiliateSignOut();"><i class="bi bi-power me-3 fs-5 opacity-50"></i>Sign Out</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">

                        <div class="col-2 d-none d-lg-block" style="background-color: #071252;">
                            <img class="p-4 profilelogo" src="Img/MaestroCrew11.png">
                        </div>

                        <div class="col-10">
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="row" style="height: 100vh;">

                        <div class="nav flex-column nav-pills col-2 d-none d-lg-block" style="background-color: #040d39;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <div class="p-3 text-white leftprofilediv active" id="v-pills-start-tab" data-bs-toggle="pill" data-bs-target="#v-pills-start" type="button" role="tab" aria-controls="v-pills-start" aria-selected="true"><i class="bi bi-house-gear ms-3 me-3 opacity-50"></i>Home</div>
                            <div class="p-3 text-white leftprofilediv" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-person-circle ms-3 me-3 opacity-50"></i>Profile</div>
                            <div class="p-3 text-white leftprofilediv" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-window-desktop ms-3 me-3 opacity-50"></i>Projects</div>
                            <div class="p-3 text-white leftprofilediv" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="bi bi-paypal ms-3 me-3 opacity-50"></i>Payments</div>
                            <div class="p-3 text-danger leftprofilediv" style="cursor: pointer;" onclick="affiliateSignOut();"><i class="bi bi-power ms-3 me-3 fs-5 opacity-50"></i>Sign Out</div>
                        </div>

                        <div class="col-12 col-lg-10 mt-4 mt-lg-0" style="background-color: #F3F3F3;">
                            <div class="tab-content" id="v-pills-tabContent">

                                <div class="tab-pane fade  show active" id="v-pills-start" role="tabpanel" aria-labelledby="v-pills-start-tab" tabindex="0">
                                    <div class="col-12 mt-4">
                                        <div class="col-12 mb-3">
                                            <h3>Home</h3>
                                        </div>

                                        <div class="row g-3 rounded-2 p-3 align-items-center mb-4" style="background-color: #e8ecfd;">
                                            <div class="col-12 col-lg-3 offset-lg-2 rounded-2 p-3 shadow" style="background-color: #daddfe; border-style: solid; border-bottom: none; border-left: none; border-right: none; border-color: #8000ff;">

                                                <?php

                                                $date = new DateTime();
                                                $timeZone = new DateTimeZone("Asia/Colombo");
                                                $date->setTimezone($timeZone);

                                                $clickdate = $date->format("Y-m-d");

                                                $startDate = $date->sub(new DateInterval('P30D'))->format("Y-m-d");

                                                $total_clicks_rs =  Database::search("SELECT COUNT(*) AS total_clicks FROM `affiliate_data` WHERE `id` = '" . $affiliate_data["id"] . "' AND `clickdate` BETWEEN '" . $startDate . "' AND '" . $clickdate . "'");
                                                $total_clicks =  $total_clicks_rs->fetch_assoc();

                                                $total_clicks_rs2 =  Database::search("SELECT COUNT(*) AS total_clicks2 FROM `affiliate_data` WHERE `id` = '" . $affiliate_data["id"] . "' ");
                                                $total_clicks2 =  $total_clicks_rs2->fetch_assoc();

                                                ?>

                                                <h5>Total Link Clicks</h5>
                                                <p class="fw-bold fs-3"><?php echo $total_clicks["total_clicks"]; ?></p>
                                                <p class="text-end opacity-75">Last 30 Days</p>
                                            </div>
                                            <div class="col-12 col-lg-3 offset-lg-2 rounded-2 p-3 shadow" style="background-color: #daddfe; border-style: solid; border-bottom: none; border-left: none; border-right: none; border-color: #8000ff;">

                                                <?php

                                                $total_orders_rs =  Database::search("SELECT COUNT(*) AS total_orders FROM `affiliate_has_project` INNER JOIN `project` ON `project`.`id`=`affiliate_has_project`.`project_id` WHERE `affiliate_has_project`.`affiliate_start_id` = '" . $affiliate_data["id"] . "' AND `project`.`start` BETWEEN '" . $startDate . "' AND '" . $clickdate . "'");
                                                $total_orders =  $total_orders_rs->fetch_assoc();

                                                $total_orders_rs2 =  Database::search("SELECT COUNT(*) AS total_orders2 FROM `affiliate_has_project` INNER JOIN `project` ON `project`.`id`=`affiliate_has_project`.`project_id` WHERE `affiliate_has_project`.`affiliate_start_id` = '" . $affiliate_data["id"] . "'");
                                                $total_orders2 =  $total_orders_rs2->fetch_assoc();

                                                ?>

                                                <h5>Total Orders</h5>
                                                <p class="fw-bold fs-3"><?php echo $total_orders["total_orders"]; ?></p>
                                                <p class="text-end opacity-75">Last 30 Days</p>
                                            </div>
                                        </div>

                                        <div class="row g-3 rounded-2 p-3 align-items-center mb-4">
                                            <div class="col-12 col-lg-8 offset-lg-2 rounded-2 p-3 shadow">

                                                <?php

                                                $total_earnings_rs =  Database::search("SELECT SUM(`affiliate`) AS total_earnings FROM `project` INNER JOIN `affiliate_has_project` ON `project`.`id`=`affiliate_has_project`.`project_id` WHERE `affiliate_has_project`.`affiliate_start_id` = '" . $affiliate_data["id"] . "' AND `project`.`start` BETWEEN '" . $startDate . "' AND '" . $clickdate . "'");
                                                $total_earnings =  $total_earnings_rs->fetch_assoc();

                                                $total_earnings_rs2 =  Database::search("SELECT SUM(`affiliate`) AS total_earnings2 FROM `project` INNER JOIN `affiliate_has_project` ON `project`.`id`=`affiliate_has_project`.`project_id` WHERE `affiliate_has_project`.`affiliate_start_id` = '" . $affiliate_data["id"] . "' ");
                                                $total_earnings2 =  $total_earnings_rs2->fetch_assoc();

                                                ?>

                                                <h5>Total Earnings</h5>
                                                <p class="fw-bold fs-3">$<?php echo $total_earnings["total_earnings"]; ?></p>
                                                <p class="text-end opacity-75">Last 30 Days</p>
                                            </div>
                                        </div>

                                        <div class="row g-3 rounded-2 p-3 align-items-center mb-4" style="background-color: #ffeaf4;">
                                            <div class="col-12 col-lg-8 offset-lg-2 rounded-2 p-3 shadow" style="background-color: #ffceff; border-style: solid; border-bottom: none; border-left: none; border-right: none; border-color: #ff15ff;">
                                                <h5>Summary</h5>
                                                <div class="row">
                                                    <div class="col-12 col-lg-4 p-3">
                                                        <p>Total Link Cliks</p>
                                                        <div class="p-2 rounded-2" style="background-color: #6a00d5;">
                                                            <p class="fw-bold fs-5 text-white"><?php echo $total_clicks2["total_clicks2"]; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 p-3">
                                                        <p>Total Orders</p>
                                                        <div class="p-2 rounded-2" style="background-color: #6a00d5;">
                                                            <p class="fw-bold fs-5 text-white"><?php echo $total_orders2["total_orders2"]; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 p-3">
                                                        <p>Total Earnings</p>
                                                        <div class="p-2 rounded-2" style="background-color: #008080;">
                                                            <p class="fw-bold fs-5 text-white">$<?php echo $total_earnings2["total_earnings2"]; ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p class="text-end opacity-75">Since Started </p>
                                            </div>
                                        </div>

                                        <div class="row g-3 rounded-2 p-3 align-items-center mb-4">
                                            <div class="col-12 col-lg-8 offset-lg-2 rounded-2 p-3 shadow">
                                                <h5>Referral Link</h5>
                                                <div class="p-3 rounded-2" style="background-color: #d5d5d5; display: flex; flex-direction: column; justify-content: center;">
                                                    <p>
                                                        https://www.maestrocrew.com/redirect.php?abc=<?php echo $affiliate_data["id"]; ?>&target=https://www.maestrocrew.com
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row g-3 rounded-2 p-3 align-items-center mb-4">
                                            <div class="col-12 col-lg-8 offset-lg-2 rounded-2 p-3 shadow">
                                                <h5>Coupon Code</h5>
                                                <div class="p-3 rounded-2" style="background-color: #d5d5d5; display: flex; flex-direction: column; justify-content: center;">
                                                    <p>
                                                        <?php echo $affiliate_data["id"]; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Main 0 -->
                                        <div class="col-12 py-5">
                                            <div class="col-10 offset-1">
                                                <div class="col-12 text-center">
                                                    <div class="contact-section">
                                                        <h1 class="fw-bold">Email Us</h1>
                                                        <p>Feel free to get in touch with us. We'd love to hear from you!</p>
                                                        <p class="text-primary">service@maestrocrew.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Main 0 -->

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                    <div class="col-12 mt-4">
                                        <div class="col-12 col-lg-4">
                                            <div class="col-12 mb-3">
                                                <h3>Profile</h3>
                                            </div>
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

                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
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

                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                                    <div class="col-12 mt-4">
                                        <div class="col-12 mb-3">
                                            <h4>Pending Payments</h4>
                                        </div>

                                        <?php

                                        $payment_rs = Database::search("SELECT 
                                        affiliate_payment.id AS apid,
                                        affiliate_payment.amount,
                                        affiliate_payment.date_time,
                                        affiliate_payment.project_id AS pid,
                                        affiliate_payment.status_py_id AS spyid,
                                        affiliate_payment.affiliate_id AS afid,
                                        status_py.name AS spyname,
                                        affiliate_start.name AS afname   
                                        FROM `affiliate_payment` 
                                        INNER JOIN `status_py` ON `status_py`.`id`=`affiliate_payment`.`status_py_id` 
                                        INNER JOIN `affiliate_start` ON `affiliate_start`.`id`=`affiliate_payment`.`affiliate_id` 
                                        WHERE `affiliate_payment`.`affiliate_id` = '" . $affiliate_data["id"] . "' AND `affiliate_payment`.`status_py_id`='1' ");



                                        $payment_num = $payment_rs->num_rows;

                                        if ($payment_num > 0) {

                                            for ($py = 0; $py < $payment_num; $py++) {

                                                $payment_data = $payment_rs->fetch_assoc();

                                        ?>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <?php echo $payment_data["apid"]; ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <blockquote class="blockquote mb-0">
                                                            <span>Project ID:</span>
                                                            <span class="fw-bold"> <?php echo $payment_data["pid"]; ?></span></br>
                                                            <span>Date:</span>
                                                            <span class="fw-bold"> <?php echo $payment_data["date_time"]; ?></span></br>
                                                            <span>Amount:</span>
                                                            <span class="fw-bold">$<?php echo $payment_data["amount"]; ?></span></br>
                                                            <span>Status</span>
                                                            <span class="fw-bold text-danger"><?php echo $payment_data["spyname"]; ?></span></br>
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
                                            <h4>All Payments</h4>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">PAYID</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Project</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $payment_rs2 = Database::search("SELECT 
                                                    affiliate_payment.id AS apid,
                                                    affiliate_payment.amount,
                                                    affiliate_payment.date_time,
                                                    affiliate_payment.project_id AS pid,
                                                    affiliate_payment.status_py_id AS spyid,
                                                    affiliate_payment.affiliate_id AS afid,
                                                    status_py.name AS spyname,
                                                    affiliate_start.name AS afname   
                                                    FROM `affiliate_payment` 
                                                    INNER JOIN `status_py` ON `status_py`.`id`=`affiliate_payment`.`status_py_id` 
                                                    INNER JOIN `affiliate_start` ON `affiliate_start`.`id`=`affiliate_payment`.`affiliate_id` 
                                                    WHERE `affiliate_payment`.`affiliate_id` = '" . $affiliate_data["id"] . "' AND `affiliate_payment`.`status_py_id`!='1' ");

                                                    $payment_num2 = $payment_rs2->num_rows;

                                                    if ($payment_num2 > 0) {
                                                        for ($py2 = 0; $py2 < $payment_num2; $py2++) {
                                                            $payment_data2 = $payment_rs2->fetch_assoc();

                                                    ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $payment_data2["apid"]; ?></th>
                                                                <td><?php echo $payment_data2["amount"]; ?></td>
                                                                <td><?php echo $payment_data2["date_time"]; ?></td>
                                                                <td><?php echo $payment_data2["pid"]; ?></td>

                                                                <?php

                                                                if ($payment_data2["spyname"] == "Complete") {
                                                                ?>
                                                                    <td class="fw-bold text-success"><?php echo $payment_data2["spyname"]; ?></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td class="fw-bold text-danger"><?php echo $payment_data2["spyname"]; ?></td>
                                                                <?php
                                                                }

                                                                ?>

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
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

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