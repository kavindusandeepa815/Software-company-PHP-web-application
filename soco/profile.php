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

            if (isset($_SESSION["user"])) {

                require "connection.php";

                $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $_SESSION["user"]["email"] . "' ");
                $user_data = $user_rs->fetch_assoc();

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
                                <div class="p-3 text-white leftprofilediv active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-person-circle  me-3 opacity-50"></i>Profile</div>
                                <div class="p-3 text-white leftprofilediv" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-window-desktop me-3 opacity-50"></i>Projects</div>
                                <div class="p-3 text-white leftprofilediv" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="bi bi-paypal  me-3 opacity-50"></i>Payments</div>
                                <div class="p-3 text-danger leftprofilediv" style="cursor: pointer;" onclick="userSignOut();"><i class="bi bi-power me-3 fs-5 opacity-50"></i>Sign Out</div>
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
                    <div class="row">

                        <div class="nav flex-column nav-pills col-2 d-none d-lg-block" style="background-color: #040d39; height: 100vh;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <div class="p-3 text-white leftprofilediv active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-person-circle ms-3 me-3 opacity-50"></i>Profile</div>
                            <div class="p-3 text-white leftprofilediv" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-window-desktop ms-3 me-3 opacity-50"></i>Projects</div>
                            <div class="p-3 text-white leftprofilediv" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="bi bi-paypal ms-3 me-3 opacity-50"></i>Payments</div>
                            <div class="p-3 text-danger leftprofilediv" style="cursor: pointer;" onclick="userSignOut();"><i class="bi bi-power ms-3 me-3 fs-5 opacity-50"></i>Sign Out</div>
                        </div>

                        <div class="col-12 col-lg-10 mt-4 mt-lg-0" style="background-color: #F3F3F3;">
                            <div class="tab-content" id="v-pills-tabContent">

                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                    <div class="col-12 mt-4">
                                        <h3>Profile</h3>
                                        <div class="col-12 col-lg-4 mt-4">
                                            <div class="d-flex justify-content-center">
                                                <div class="mb-3">
                                                    <img class="img-thumbnail" src="Img/userMC.png" style="max-width: 180px;">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" value="<?php echo $user_data["name"]; ?>" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="Email" class="form-control" value="<?php echo $user_data["email"]; ?>" disabled>
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

                                                        if ($user_data["country_id"] == $country_data["id"]) {
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
                                                    <input type="password" class="form-control" id="userUpdateUserPassword" value="<?php echo $user_data["password"]; ?>" disabled>
                                                    <button class="btn btn-warning" onclick="changePasswordType();">View</button>
                                                </div>
                                            </div>
                                            <div class="mb-3 d-none">
                                                <label class="form-label">Secret Code</label>

                                                <?php
                                                $maestrocrew = "None";

                                                if (isset($_COOKIE["maestrocrew"])) {
                                                    $maestrocrew = $_COOKIE["maestrocrew"];
                                                }
                                                ?>

                                                <input type="text" class="form-control" value="<?php echo $maestrocrew; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                                    <div class="col-12 mt-4">
                                        <div class="col-12 mb-3">
                                            <h3>Pending Projects</h3>
                                        </div>

                                        <?php

                                        $project_rs =  Database::search("SELECT project.id AS pid,project.title AS ptitle,project.pr_type_id AS prtypeid,project.start AS pstart,project.end AS pend,project.affiliate AS paffiliate,project.status_pr_id AS pstatusprid,
                                        user.email AS uemail,user.id AS userid,pr_type.name AS prname,status_pr.name AS statusName
                                        FROM `project` 
                                        INNER JOIN `user` ON `user`.`id`=`project`.`user_id` 
                                        INNER JOIN `pr_type` ON `pr_type`.`id`=`project`.`pr_type_id` 
                                        INNER JOIN `status_pr` ON `status_pr`.`id` =`project`.`status_pr_id` 
                                        WHERE `user`.`email`='" . $user_data["email"] . "' AND `project`.`status_pr_id`='3' ");

                                        $project_num = $project_rs->num_rows;

                                        if ($project_num > 0) {

                                            for ($p = 0; $p < $project_num; $p++) {

                                                $project_data = $project_rs->fetch_assoc();

                                                $result_set2 = Database::search("SELECT * FROM `user_payments` INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` WHERE `user_payments`.`user_id`='" . $project_data["userid"] . "' AND `project`.`id`='" . $project_data["pid"] . "' AND `user_payments`.`py_type_id`='1' ");
                                                $data2 = $result_set2->fetch_assoc();

                                                $result_set3 = Database::search("SELECT * FROM `user_payments` INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` WHERE `user_payments`.`user_id`='" . $project_data["userid"] . "' AND `project`.`id`='" . $project_data["pid"] . "' AND `user_payments`.`py_type_id`='2' ");
                                                $data3 = $result_set3->fetch_assoc();

                                                $result_set4 = Database::search("SELECT * FROM `user_payments` INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` WHERE `user_payments`.`user_id`='" . $project_data["userid"] . "' AND `project`.`id`='" . $project_data["pid"] . "' AND `user_payments`.`py_type_id`='3' ");
                                                $result_set4_num = $result_set4->num_rows;

                                                // $result_setOtherA = Database::search("SELECT SUM(amount) AS otherAmountA FROM `user_payments` INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` WHERE `user_payments`.`user_id`='" . $project_data["userid"] . "' AND `project`.`id`='" . $project_data["pid"] . "' AND `user_payments`.`py_type_id`='3' AND `user_payments`.`status_py_id`='1' ");
                                                // $data_other_A = $result_setOtherA->fetch_assoc();

                                                // $result_setOtherB = Database::search("SELECT SUM(amount) AS otherAmountB FROM `user_payments` INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` WHERE `user_payments`.`user_id`='" . $project_data["userid"] . "' AND `project`.`id`='" . $project_data["pid"] . "' AND `user_payments`.`py_type_id`='3' AND `user_payments`.`status_py_id`='2' ");
                                                // $data_other_B = $result_setOtherB->fetch_assoc();

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
                                                            <span>Full Payment:</span>
                                                            <?php
                                                            if ($data2["status_py_id"] != 2) {
                                                            ?>
                                                                <span class="fw-bold text-danger">$<?php echo $data2["amount"]; ?></span></br>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <span class="fw-bold text-success">$<?php echo $data2["amount"]; ?></span></br>
                                                            <?php
                                                            }
                                                            ?>

                                                            <span>Advanced Payment:</span>
                                                            <?php
                                                            if ($data3["status_py_id"] != 2) {
                                                            ?>
                                                                <span class="fw-bold text-danger">$<?php echo $data3["amount"]; ?></span></br>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <span class="fw-bold text-success">$<?php echo $data3["amount"]; ?></span></br>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php

                                                            ?>

                                                            <?php
                                                            for ($op = 0; $op < $result_set4_num; $op++) {
                                                                $data4 = $result_set4->fetch_assoc();

                                                                if ($data4["status_py_id"] == 1) {
                                                            ?>
                                                                    <span>Other payments:</span>
                                                                    <span class="fw-bold text-danger">$<?php echo $data4["amount"]; ?></span></br>

                                                                <?php
                                                                } else if ($data4["status_py_id"] == 2) {
                                                                ?>
                                                                    <span>Other payments:</span>
                                                                    <span class="fw-bold text-success">$<?php echo $data4["amount"]; ?></span></br>

                                                                <?php
                                                                } else if ($data4["status_py_id"] == 3) {
                                                                ?>
                                                            <?php
                                                                }
                                                            }

                                                            ?>

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
                                            <h3>All Projects</h3>
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

                                                    $project_rs2 =  Database::search("SELECT project.id AS pid,project.title AS ptitle,project.pr_type_id AS prtypeid,project.start AS pstart,project.end AS pend,project.affiliate AS paffiliate,project.status_pr_id AS pstatusprid,
                                                    user.email AS uemail,user.id AS userid,pr_type.name AS prname,status_pr.name AS statusName
                                                    FROM `project` 
                                                    INNER JOIN `user` ON `user`.`id`=`project`.`user_id` 
                                                    INNER JOIN `pr_type` ON `pr_type`.`id`=`project`.`pr_type_id` 
                                                    INNER JOIN `status_pr` ON `status_pr`.`id` =`project`.`status_pr_id` 
                                                    WHERE `user`.`email`='" . $user_data["email"] . "' AND `project`.`status_pr_id`!='3' ");

                                                    $project_num2 = $project_rs2->num_rows;

                                                    if ($project_num2 > 0) {
                                                        for ($p2 = 0; $p2 < $project_num2; $p2++) {
                                                            $project_data2 = $project_rs2->fetch_assoc();

                                                            $result_setPaymentA = Database::search("SELECT * FROM `user_payments`  INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` WHERE `user_payments`.`user_id`='" . $project_data2["userid"] . "' AND `user_payments`.`project_id`='" . $project_data2["pid"] . "' AND `user_payments`.`py_type_id`='2' ");
                                                            $result_setPayment_dataA = $result_setPaymentA->fetch_assoc();

                                                            $result_setPayment = Database::search("SELECT SUM(amount) AS paymentData FROM `user_payments`  INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` WHERE `user_payments`.`user_id`='" . $project_data2["userid"] . "' AND `user_payments`.`project_id`='" . $project_data2["pid"] . "' ");
                                                            $result_setPayment_data = $result_setPayment->fetch_assoc();



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

                                                                <?php

                                                                if ($result_setPayment_dataA && $result_setPayment_data) {
                                                                    $amountFull = $result_setPayment_data['paymentData'] - $result_setPayment_dataA['amount']; // Replace 'your_column_name' with the actual column name you want to subtract
                                                                } else {
                                                                    $amountFull = 0;
                                                                }

                                                                ?>

                                                                <td>$<?php echo $amountFull ?></td>

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
                                            <h3>Pending Payments</h3>
                                        </div>
                                        <?php
                                        $payment_user_rs =   Database::search("SELECT user_payments.id AS upid,user_payments.amount AS upamount,user_payments.date_time AS update_time,user_payments.user_id AS upuid,user_payments.project_id AS uppid,user_payments.py_type_id AS uppy_type_id,user_payments.status_py_id AS upstatus_py_id,
                                        status_py.name AS status_py_name,py_type.name AS py_type_name,user.email AS uemail,project.title AS ptitle
                                        FROM `user_payments`
                                        INNER JOIN `user` ON `user`.`id`=`user_payments`.`user_id` 
                                        INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` 
                                        INNER JOIN `py_type` ON `py_type`.`id`=`user_payments`.`py_type_id` 
                                        INNER JOIN `status_py` ON `status_py`.`id`=`user_payments`.`status_py_id` 
                                        WHERE `user`.`email`='" . $user_data["email"] . "' AND `status_py_id`='1' ");

                                        $payment_user_num = $payment_user_rs->num_rows;

                                        if ($payment_user_num > 0) {

                                            for ($up = 0; $up < $payment_user_num; $up++) {
                                                $payment_user_data = $payment_user_rs->fetch_assoc();
                                        ?>
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        Payment
                                                    </div>
                                                    <div class="card-body">
                                                        <blockquote class="blockquote mb-0">
                                                            <span>Project Title:</span>
                                                            <span class="fw-bold"><?php echo $payment_user_data["ptitle"]; ?></span></br>
                                                            <span>Date:</span>
                                                            <span class="fw-bold"><?php echo $payment_user_data["update_time"]; ?></span></br>
                                                            <span>Amount:</span>
                                                            <span class="fw-bold">$<?php echo $payment_user_data["upamount"]; ?></span></br>
                                                            <span>Payment Type:</span>
                                                            <span class="fw-bold"><?php echo $payment_user_data["py_type_name"]; ?></span></br>
                                                            <span>Status:</span>
                                                            <span class="fw-bold text-warning">Pending</span></br>
                                                        </blockquote>
                                                    </div>
                                                    <div class="card-footer">
                                                        <!-- <button class="btn btn-success" onclick="window.location='<?php echo 'payment.php?id=' . $payment_user_data['upid']; ?>'">Checkout</button> -->
                                                        <button type="submit" id="payhere-payment" onclick="payNow('<?php echo $payment_user_data['upid']; ?>');">PayHere Pay</button>
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
                                                        <h2>No Payment Available</h2>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        <?php
                                        }

                                        ?>
                                        <hr />
                                        <div class="col-12 mb-3">
                                            <h3>All Payments</h3>
                                        </div>
                                        <div class="col-12 mb-4 overFlow">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Payment ID</th>
                                                        <th scope="col">Project ID</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $payment2_user_rs =   Database::search("SELECT user_payments.id AS upid,user_payments.amount AS upamount,user_payments.date_time AS update_time,user_payments.user_id AS upuid,user_payments.project_id AS uppid,user_payments.py_type_id AS uppy_type_id,user_payments.status_py_id AS upstatus_py_id,
                                                    status_py.name AS status_py_name,py_type.name AS py_type_name,user.email AS uemail,project.title AS ptitle
                                                    FROM `user_payments`
                                                    INNER JOIN `user` ON `user`.`id`=`user_payments`.`user_id` 
                                                    INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` 
                                                    INNER JOIN `py_type` ON `py_type`.`id`=`user_payments`.`py_type_id` 
                                                    INNER JOIN `status_py` ON `status_py`.`id`=`user_payments`.`status_py_id` 
                                                    WHERE `user`.`email`='" . $user_data["email"] . "' AND `status_py_id`!='1' ");

                                                    $payment2_user_num = $payment2_user_rs->num_rows;

                                                    if ($payment2_user_num > 0) {

                                                        for ($up2 = 0; $up2 < $payment2_user_num; $up2++) {
                                                            $payment2_user_data = $payment2_user_rs->fetch_assoc();
                                                    ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $payment2_user_data["upid"]; ?></th>
                                                                <td><?php echo $payment2_user_data["uppid"]; ?></td>
                                                                <td><?php echo $payment2_user_data["ptitle"]; ?></td>
                                                                <td><?php echo $payment2_user_data["update_time"]; ?></td>
                                                                <td><?php echo $payment2_user_data["upamount"]; ?></td>
                                                                <td><?php echo $payment2_user_data["py_type_name"]; ?></td>

                                                                <?php
                                                                if ($payment2_user_data["upstatus_py_id"] == 2) {
                                                                ?>
                                                                    <td class="fw-bold text-success"><?php echo $payment2_user_data["status_py_name"]; ?></td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td class="fw-bold text-danger"><?php echo $payment2_user_data["status_py_name"]; ?></td>
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
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>

</html>