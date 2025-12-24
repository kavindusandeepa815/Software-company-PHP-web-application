<?php

require "connection.php";

$search = $_POST["search"];
$searchWhat = $_POST["searchWhat"];
$searchTextB = $_POST["searchTextB"];
$searchTextC = $_POST["searchTextC"];


if ($searchWhat == "SearchPaymentsAdmPyStuEmployee") {
    $search = "abc";
    $searchTextB = 1;
}

if ($searchWhat == "SearchPaymentsAdmPyStuUser") {
    $search = "abc";
    $searchTextC = 1;
}

if ($searchWhat == "SearchPaymentsAdmUsemil") {
    $searchTextC = 1;
    $searchTextB = 1;
}

if ($searchWhat == "SearchPaymentsAdmEmemil") {
    $searchTextC = 1;
    $searchTextB = 1;
}

if ($searchWhat == "SearchPaymentsAdmPid") {
    $searchTextC = 1;
    $searchTextB = 1;
}

if ($searchWhat == "SearchPaymentsAdmPidEmployee") {
    $searchTextC = 1;
    $searchTextB = 1;
}

if ($searchWhat == "SearchPaymentsAdmPayID") {
    $searchTextC = 1;
    $searchTextB = 1;
}


if (empty($search)) {
    echo "1";
} else if ($searchTextB == 0) {
    echo "3";
} else if ($searchTextC == 0) {
    echo "3";
} else {

    if ($searchWhat == "SearchPaymentsAdmPyStuUser") {
        $query = ("SELECT user_payments.id AS upid,user_payments.amount AS upamount,user_payments.date_time AS update_time,user_payments.user_id AS upuid,user_payments.project_id AS uppid,user_payments.py_type_id AS uppy_type_id,user_payments.status_py_id AS upstatus_py_id,
         status_py.name AS status_py_name,py_type.name AS py_type_name,user.email AS uemail
         FROM `user_payments`
         INNER JOIN `user` ON `user`.`id`=`user_payments`.`user_id` 
         INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` 
         INNER JOIN `py_type` ON `py_type`.`id`=`user_payments`.`py_type_id` 
         INNER JOIN `status_py` ON `status_py`.`id`=`user_payments`.`status_py_id` 
         WHERE `user_payments`.`status_py_id`='" . $searchTextB . "' ");
    }

    if ($searchWhat == "SearchPaymentsAdmPyStuEmployee") {
        $query = ("SELECT employee_payments.id AS upid,employee_payments.amount AS upamount,employee_payments.date_time AS update_time,employee_payments.employee_id AS upuid,employee_payments.project_id AS uppid,employee_payments.py_type_id AS uppy_type_id,employee_payments.status_py_id AS upstatus_py_id,
         status_py.name AS status_py_name,py_type.name AS py_type_name,employee.email AS uemail
         FROM `employee_payments`
         INNER JOIN `employee` ON `employee`.`id`=`employee_payments`.`employee_id` 
         INNER JOIN `project` ON `project`.`id`=`employee_payments`.`project_id` 
         INNER JOIN `py_type` ON `py_type`.`id`=`employee_payments`.`py_type_id` 
         INNER JOIN `status_py` ON `status_py`.`id`=`employee_payments`.`status_py_id` 
         WHERE `employee_payments`.`status_py_id`='" . $searchTextC . "' ");
    }

    if ($searchWhat == "SearchPaymentsAdmUsemil") {
        $query = ("SELECT user_payments.id AS upid,user_payments.amount AS upamount,user_payments.date_time AS update_time,user_payments.user_id AS upuid,user_payments.project_id AS uppid,user_payments.py_type_id AS uppy_type_id,user_payments.status_py_id AS upstatus_py_id,
         status_py.name AS status_py_name,py_type.name AS py_type_name,user.email AS uemail
         FROM `user_payments`
         INNER JOIN `user` ON `user`.`id`=`user_payments`.`user_id` 
         INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` 
         INNER JOIN `py_type` ON `py_type`.`id`=`user_payments`.`py_type_id` 
         INNER JOIN `status_py` ON `status_py`.`id`=`user_payments`.`status_py_id` 
         WHERE `user`.`email`='" . $search . "' ");
    }

    if ($searchWhat == "SearchPaymentsAdmEmemil") {
        $query = ("SELECT employee_payments.id AS upid,employee_payments.amount AS upamount,employee_payments.date_time AS update_time,employee_payments.employee_id AS upuid,employee_payments.project_id AS uppid,employee_payments.py_type_id AS uppy_type_id,employee_payments.status_py_id AS upstatus_py_id,
         status_py.name AS status_py_name,py_type.name AS py_type_name,employee.email AS uemail
         FROM `employee_payments`
         INNER JOIN `employee` ON `employee`.`id`=`employee_payments`.`employee_id` 
         INNER JOIN `project` ON `project`.`id`=`employee_payments`.`project_id` 
         INNER JOIN `py_type` ON `py_type`.`id`=`employee_payments`.`py_type_id` 
         INNER JOIN `status_py` ON `status_py`.`id`=`employee_payments`.`status_py_id` 
         WHERE `employee`.`email`='" . $search . "' ");
    }

    if ($searchWhat == "SearchPaymentsAdmPid") {
        $query = ("SELECT user_payments.id AS upid,user_payments.amount AS upamount,user_payments.date_time AS update_time,user_payments.user_id AS upuid,user_payments.project_id AS uppid,user_payments.py_type_id AS uppy_type_id,user_payments.status_py_id AS upstatus_py_id,
         status_py.name AS status_py_name,py_type.name AS py_type_name,user.email AS uemail
         FROM `user_payments`
         INNER JOIN `user` ON `user`.`id`=`user_payments`.`user_id` 
         INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` 
         INNER JOIN `py_type` ON `py_type`.`id`=`user_payments`.`py_type_id` 
         INNER JOIN `status_py` ON `status_py`.`id`=`user_payments`.`status_py_id` 
         WHERE `user_payments`.`project_id`='" . $search . "' ");
    }


    if ($searchWhat == "SearchPaymentsAdmPidEmployee") {
        $query = ("SELECT employee_payments.id AS upid,employee_payments.amount AS upamount,employee_payments.date_time AS update_time,employee_payments.employee_id AS upuid,employee_payments.project_id AS uppid,employee_payments.py_type_id AS uppy_type_id,employee_payments.status_py_id AS upstatus_py_id,
         status_py.name AS status_py_name,py_type.name AS py_type_name,employee.email AS uemail
         FROM `employee_payments`
         INNER JOIN `employee` ON `employee`.`id`=`employee_payments`.`employee_id` 
         INNER JOIN `project` ON `project`.`id`=`employee_payments`.`project_id` 
         INNER JOIN `py_type` ON `py_type`.`id`=`employee_payments`.`py_type_id` 
         INNER JOIN `status_py` ON `status_py`.`id`=`employee_payments`.`status_py_id` 
         WHERE `employee_payments`.`project_id`='" . $search . "' ");
    }


    if ($searchWhat == "SearchPaymentsAdmPayID") {
        $query = ("SELECT user_payments.id AS upid,user_payments.amount AS upamount,user_payments.date_time AS update_time,user_payments.user_id AS upuid,user_payments.project_id AS uppid,user_payments.py_type_id AS uppy_type_id,user_payments.status_py_id AS upstatus_py_id,
         status_py.name AS status_py_name,py_type.name AS py_type_name,user.email AS uemail
         FROM `user_payments`
         INNER JOIN `user` ON `user`.`id`=`user_payments`.`user_id` 
         INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` 
         INNER JOIN `py_type` ON `py_type`.`id`=`user_payments`.`py_type_id` 
         INNER JOIN `status_py` ON `status_py`.`id`=`user_payments`.`status_py_id` 
         WHERE `user_payments`.`id`='" . $search . "' ");
    }


    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;

    if ($num_rows >= 1) {

        for ($x = 0; $x < $num_rows; $x++) {
            $data = $result_set->fetch_assoc();

?>

            <tr>
                <th scope="row"><?php echo $data["upid"]; ?></th>
                <?php
                if ($data["status_py_name"] == "Complete") {
                ?>
                    <td>$<input type="text" class="form-control fw-bold text-success" id="updatePaymentAdmAmount_<?php echo $data["upid"]; ?>"  value="<?php echo $data["upamount"]; ?>"></td>
                <?php
                } else {
                ?>
                    <td>$<input type="text" class="form-control fw-bold text-danger" id="updatePaymentAdmAmount_<?php echo $data["upid"]; ?>"   value="<?php echo $data["upamount"]; ?>"></td>
                <?php
                }
                ?>

                <td>
                    <select class="form-select" disabled id="updatePaymentAdmType_<?php echo $data["upid"]; ?>">

                        <option value="0">Status</option>

                        <?php
                        $payment_rs = Database::search("SELECT * FROM `py_type` ");
                        $payment_num = $payment_rs->num_rows;

                        for ($k = 0; $k < $payment_num; $k++) {
                            $payment_data = $payment_rs->fetch_assoc();

                            if ($data["uppy_type_id"] == $payment_data["id"]) {
                                $selected_status_payment = "selected";
                            } else {
                                $selected_status_payment = " ";
                            }

                        ?>

                            <option value="<?php echo $payment_data["id"]; ?>" <?php echo $selected_status_payment; ?>> <?php echo $payment_data["name"]; ?></option>

                        <?php

                        }

                        ?>

                    </select>
                </td>

                <td><?php echo $data["update_time"]; ?></td>


                <td>
                    <select class="form-select" id="updatePaymentAdmStatus_<?php echo $data["upid"]; ?>">

                        <option value="0">Status</option>

                        <?php
                        $status_ue_rs = Database::search("SELECT * FROM `status_py` ");
                        $status_ue_num = $status_ue_rs->num_rows;

                        for ($z = 0; $z < $status_ue_num; $z++) {
                            $status_ue_data = $status_ue_rs->fetch_assoc();

                            if ($data["upstatus_py_id"] == $status_ue_data["id"]) {
                                $selected_status_ue = "selected";
                            } else {
                                $selected_status_ue = " ";
                            }

                        ?>

                            <option value="<?php echo $status_ue_data["id"]; ?>" <?php echo $selected_status_ue; ?>> <?php echo $status_ue_data["name"]; ?></option>

                        <?php

                        }

                        ?>

                    </select>
                </td>

                <td><?php echo $data["uppid"]; ?></td>
                <td><?php echo $data["upuid"]; ?></td>
                <td><?php echo $data["uemail"]; ?></td>


                <?php
                if ($data["status_py_name"] == "Complete") {
                ?>
                    <td><button class=" btn btn-warning " type="button" disabled>Update</button></td>
                <?php
                } else {
                ?>
                    <td><button class=" btn btn-warning " type="button" onclick="updatePaymentAdm('<?php echo $data['uppid']; ?>','<?php echo $data['upuid']; ?>','<?php echo $data['upid']; ?>');">Update</button></td>
                <?php
                }
                ?>



                <?php
                if ($data["status_py_name"] == "Complete") {
                ?>
                    <td><button class=" btn btn-danger" type="button" disabled>Remove</button></td>
                <?php
                } else {
                ?>
                    <td><button class=" btn btn-danger " type="button" onclick="removePaymentAdm('<?php echo $data['uppid']; ?>', '<?php echo $data['upuid']; ?>', '<?php echo $data['upid']; ?>');">Remove</button></td>
                <?php
                }
                ?>

            </tr>

<?php

        }
    } else {
        echo ("2");
    }
}
?>