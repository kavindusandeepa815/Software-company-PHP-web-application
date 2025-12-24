<?php

require "connection.php";

$search = $_POST["search"];
$searchWhat = $_POST["searchWhat"];


if (empty($search)) {
    echo "1";
} else {

    if ($searchWhat == "searchPrdHE") {
        $query = ("SELECT project.title AS title,employee_projects.project_id AS pid,employee.id AS eid,employee.name AS ename,employee_projects.role AS erole,
        employee_projects.end AS eend,employee_projects.start AS estart,status_pr.name AS prsname,status_pr.id AS prsid
        FROM `employee_projects` 
        INNER JOIN `project` ON `project`.`id`=`employee_projects`.`project_id`
        INNER JOIN `employee` ON `employee`.`id`=`employee_projects`.`employee_id`
        INNER JOIN `status_pr` ON `status_pr`.`id`=`employee_projects`.`status_pr_id` 
        WHERE `employee_projects`.`project_id`='" . $search . "' ");
    }


    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;


    if ($num_rows >= 1) {

        for ($p = 0; $p < $num_rows; $p++) {
            $data = $result_set->fetch_assoc();

            $result_set2 = Database::search("SELECT * FROM `employee_payments` 
            INNER JOIN `employee_projects` ON `employee_projects`.`project_id`=`employee_payments`.`project_id` 
            INNER JOIN `status_py` ON `status_py`.`id`=`employee_payments`.`status_py_id`
            WHERE `employee_payments`.`employee_id`='" . $data["eid"] . "' AND `employee_payments`.`project_id`='" . $data["pid"] . "' AND `employee_payments`.`py_type_id`='5' ");
            $data2 = $result_set2->fetch_assoc();


            $result_set3 = Database::search("SELECT COUNT(*) AS numberOther FROM `employee_payments`  
            INNER JOIN `project` ON `project`.`id`=`employee_payments`.`project_id` 
            WHERE `employee_payments`.`employee_id`='" . $data["eid"] . "' AND `employee_payments`.`project_id`='" . $data["pid"] . "' AND `employee_payments`.`py_type_id`='4' ");
            $num_rows_data3 = $result_set3->num_rows;


?>

            <tr>
                <th scope="row"><?php echo $data["pid"]; ?></th>
                <td><?php echo $data["title"]; ?></td>
                <td><?php echo $data["eid"]; ?></td>
                <td><?php echo $data["ename"]; ?></td>
                <td><input type="text" class="form-control" id="updatePrdHERole_<?php echo $data["pid"]; ?>_<?php echo $data["eid"]; ?>" value="<?php echo $data["erole"]; ?>"></td>
                <?php
                if ($data2["name"] != "Complete") {
                ?>
                    <td>$<input type="text" class="form-control fw-bold text-danger" id="updatePrdHEAmount_<?php echo $data["pid"]; ?>_<?php echo $data["eid"]; ?>" value="<?php echo $data2["amount"]; ?>"></td>
                <?php
                } else {
                ?>
                    <td>$<input type="text" class="form-control fw-bold text-success" id="updatePrdHEAmount_<?php echo $data["pid"]; ?>_<?php echo $data["eid"]; ?>" value="<?php echo $data2["amount"]; ?>" value="<?php echo $data2["amount"]; ?>" disabled></td>
                <?php
                }
                ?>



                <?php
                if ($num_rows_data3 > 0) {
                    $data3 = $result_set3->fetch_assoc();
                ?>
                    <?php
                    if ($data3["numberOther"] > 0) {
                    ?>
                        <td class="form-control fw-bold text-danger"><?php echo $data3["numberOther"]; ?></td>
                    <?php
                    } else {
                    ?>
                        <td class="form-control fw-bold text-success"><?php echo $data3["numberOther"]; ?></td>
                    <?php
                    }
                    ?>
                <?php
                } else {
                ?>
                    <td class="form-control fw-bold text-success"><?php echo "0"; ?></td>
                <?php
                }
                ?>


                <td><?php echo $data["estart"]; ?></td>
                <td><input type="text" class="form-control" id="updatePrdHEEnd_<?php echo $data["pid"]; ?>_<?php echo $data["eid"]; ?>" value="<?php echo $data["eend"]; ?>"></td>
                <td>
                    <select class="form-select" id="updatePrdHEPrdStatus_<?php echo $data["pid"]; ?>_<?php echo $data["eid"]; ?>">

                        <option value="0">Project Status</option>

                        <?php
                        $type_rs = Database::search("SELECT * FROM `status_pr` ");
                        $type_num = $type_rs->num_rows;

                        for ($y = 0; $y < $type_num; $y++) {
                            $type_data = $type_rs->fetch_assoc();

                            if ($data["prsid"] == $type_data["id"]) {
                                $selected_type = "selected";
                            } else {
                                $selected_type = " ";
                            }

                        ?>

                            <option value="<?php echo $type_data["id"]; ?>" <?php echo $selected_type; ?>> <?php echo $type_data["name"]; ?></option>

                        <?php

                        }

                        ?>

                    </select>
                </td>
                <td>
                    <select class="form-select" id="updatePrdHEPayStatus_<?php echo $data["pid"]; ?>_<?php echo $data["eid"]; ?>">

                        <option value="0">Payment Status</option>

                        <?php
                        $payment_rs = Database::search("SELECT * FROM `status_py` ");
                        $payment_num = $payment_rs->num_rows;

                        for ($q = 0; $q < $payment_num; $q++) {
                            $payment_data = $payment_rs->fetch_assoc();

                            if ($data2["name"] == $payment_data["name"]) {
                                $selected_payment = "selected";
                            } else {
                                $selected_payment = " ";
                            }

                        ?>

                            <option value="<?php echo $payment_data["id"]; ?>" <?php echo $selected_payment; ?>> <?php echo $payment_data["name"]; ?></option>

                        <?php

                        }

                        ?>

                    </select>
                </td>

                <td><button class="btn btn-warning" type="button" onclick="updatePrdHE('<?php echo $data['pid']; ?>', '<?php echo $data['eid']; ?>')">Update</button></td>

                <?php
                if ($data["prsid"] == 2 || $data2["name"] == "Complete") {
                ?>
                    <td> <button class="btn btn-danger" type="button" disabled>Remove</button></td>

                <?php
                } else {
                ?>
                    <td> <button class="btn btn-danger" type="button" onclick="removePrdHE('<?php echo $data['pid']; ?>', '<?php echo $data['eid']; ?>')">Remove</button></td>
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