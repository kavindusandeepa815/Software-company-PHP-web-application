<?php

require "connection.php";

$search = $_POST["search"];
$searchWhat = $_POST["searchWhat"];
$searchTextB = $_POST["searchTextB"];


if ($searchWhat == "SprdPrdstatus") {
    $search = "abc";
}

if ($searchWhat == "SprdPrdid") {
    $searchTextB = "abc";
}


if (empty($search)) {
    echo "1";
} else if ($searchTextB == 0) {
    echo "3";
} else {

    if ($searchWhat == "SprdUemail") {
        $query = ("SELECT project.id AS pid,project.title AS ptitle,project.pr_type_id AS prtypeid,project.start AS pstart,project.end AS pend,project.affiliate AS paffiliate,project.status_pr_id AS pstatusprid,
        user.email AS uemail,user.id AS userid,pr_type.name AS prname,status_pr.name AS statusName
        FROM `project` 
        INNER JOIN `user` ON `user`.`id`=`project`.`user_id` 
        INNER JOIN `pr_type` ON `pr_type`.`id`=`project`.`pr_type_id` 
        INNER JOIN `status_pr` ON `status_pr`.`id` =`project`.`status_pr_id` 
        WHERE `user`.`email`='" . $search . "' AND `project`.`status_pr_id`='" . $searchTextB . "'  ");
    }

    if ($searchWhat == "SprdPrdid") {
        $query = ("SELECT project.id AS pid,project.title AS ptitle,project.pr_type_id AS prtypeid,project.start AS pstart,project.end AS pend,project.affiliate AS paffiliate,project.status_pr_id AS pstatusprid,
        user.email AS uemail,user.id AS userid,pr_type.name AS prname,status_pr.name AS statusName
        FROM `project` 
        INNER JOIN `user` ON `user`.`id`=`project`.`user_id` 
        INNER JOIN `pr_type` ON `pr_type`.`id`=`project`.`pr_type_id` 
        INNER JOIN `status_pr` ON `status_pr`.`id` =`project`.`status_pr_id` 
        WHERE `project`.`id`='" . $search . "' ");
    }

    if ($searchWhat == "SprdPrdstatus") {
        $query = ("SELECT project.id AS pid,project.title AS ptitle,project.pr_type_id AS prtypeid,project.start AS pstart,project.end AS pend,project.affiliate AS paffiliate,project.status_pr_id AS pstatusprid,
        user.email AS uemail,user.id AS userid,pr_type.name AS prname,status_pr.name AS statusName
        FROM `project` 
        INNER JOIN `user` ON `user`.`id`=`project`.`user_id` 
        INNER JOIN `pr_type` ON `pr_type`.`id`=`project`.`pr_type_id` 
        INNER JOIN `status_pr` ON `status_pr`.`id` =`project`.`status_pr_id` 
        WHERE `project`.`status_pr_id`='" . $searchTextB . "' ");
    }





    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;

    $due_payment = 0;
    $full_payment = 0;
    $adv_payment = 0;
    $idf = 0;
    $ida = 0;

    if ($num_rows >= 1) {

        for ($x = 0; $x < $num_rows; $x++) {
            $data = $result_set->fetch_assoc();

            $result_set2 = Database::search("SELECT * FROM `user_payments` INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` WHERE `user_payments`.`user_id`='" . $data["userid"] . "' AND `project`.`id`='" . $data["pid"] . "' AND `user_payments`.`py_type_id`='1' ");
            $data2 = $result_set2->fetch_assoc();

            $result_set3 = Database::search("SELECT * FROM `user_payments` INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` WHERE `user_payments`.`user_id`='" . $data["userid"] . "' AND `project`.`id`='" . $data["pid"] . "' AND `user_payments`.`py_type_id`='2' ");
            $data3 = $result_set3->fetch_assoc();

            $result_set4 = Database::search("SELECT COUNT(*) AS numberOther FROM `user_payments`  INNER JOIN `project` ON `project`.`id`=`user_payments`.`project_id` WHERE `user_payments`.`user_id`='" . $data["userid"] . "' AND `user_payments`.`project_id`='" . $data["pid"] . "' AND `user_payments`.`py_type_id`='3' ");
            $num_rows_data4 = $result_set4->num_rows;

?>

            <tr>
                <th scope="row"><?php echo $data["pid"]; ?></th>
                <td><input type="text" class="form-control" id="updateProjectTitle_<?php echo $data["pid"]; ?>_<?php echo $data["userid"]; ?>" value="<?php echo $data["ptitle"]; ?>"></td>
                <td><?php echo $data["uemail"]; ?></td>
                <td><?php echo $data["prname"]; ?></td>
                <td>
                    <select class="form-select" id="updateProjectStatus_<?php echo $data["pid"]; ?>_<?php echo $data["userid"]; ?>">

                        <option value="0">Status</option>

                        <?php
                        $type_rs = Database::search("SELECT * FROM `status_pr` ");
                        $type_num = $type_rs->num_rows;

                        for ($y = 0; $y < $type_num; $y++) {
                            $type_data = $type_rs->fetch_assoc();

                            if ($data["pstatusprid"] == $type_data["id"]) {
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

                <td><?php echo $data["pstart"]; ?></td>
                <td><input type="text" class="form-control" id="updateProjectEnd_<?php echo $data["pid"]; ?>_<?php echo $data["userid"]; ?>" value="<?php echo $data["pend"]; ?>"></td>

                <?php
                if ($data2["status_py_id"] != 2) {
                ?>
                    <?php $idf = 1; ?>
                    <td>$<input type="text" class="form-control fw-bold text-danger" id="updateProjectAmount_<?php echo $data["pid"]; ?>_<?php echo $data["userid"]; ?>" value="<?php echo $data2["amount"]; ?>"></td>
                <?php
                } else {
                ?>
                    <?php $idf = 2; ?>
                    <td>$<input type="text" class="form-control fw-bold text-success" id="updateProjectAmount_<?php echo $data["pid"]; ?>_<?php echo $data["userid"]; ?>"  value="<?php echo $data2["amount"]; ?>" disabled></td>
                <?php
                }
                ?>

                <td>$<input type="text" class="form-control" id="updateProjectAffiliate_<?php echo $data["pid"]; ?>_<?php echo $data["userid"]; ?>" value="<?php echo $data["paffiliate"]; ?>"></td>

                <?php
                if ($data3["status_py_id"] != 2) {
                ?>
                    <?php $ida = 3; ?>
                    <td>$<input type="text" class="form-control fw-bold text-danger" id="updateProjectAdvanced_<?php echo $data["pid"]; ?>_<?php echo $data["userid"]; ?>" value="<?php echo $data3["amount"]; ?>"></td>
                <?php
                } else {
                ?>
                    <?php $ida = 4; ?>
                    <td>$<input type="text" class="form-control fw-bold text-success" id="updateProjectAdvanced_<?php echo $data["pid"]; ?>_<?php echo $data["userid"]; ?>" value="<?php echo $data3["amount"]; ?>" disabled></td>
                <?php
                }
                ?>


                <?php
                if ($num_rows_data4 > 0) {
                    $data4 = $result_set4->fetch_assoc();
                ?>
                    <?php
                    if ($data4["numberOther"] > 0) {
                    ?>
                        <td class="form-control fw-bold text-danger"><?php echo $data4["numberOther"]; ?></td>
                    <?php
                    } else {
                    ?>
                        <td class="form-control fw-bold text-success"><?php echo $data4["numberOther"]; ?></td>
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


                <?php
                if ($idf == 1 && $ida == 3) {

                    $due_payment = $data2["amount"];
                } else if ($idf == 1 && $ida == 4) {

                    $full_payment = $data2["amount"];
                    $adv_payment = $data3["amount"];;

                    $due_payment = $full_payment - $adv_payment;
                } else if ($idf == 2 && $ida == 3) {

                    $due_payment = 0;
                } else if ($idf == 2 && $ida == 4) {

                    $due_payment = 0;
                }
                ?>

                <?php
                if ($due_payment > 0) {
                ?>
                    <td class="fw-bold text-danger">$ <?php echo $due_payment; ?></td>
                <?php
                } else {
                ?>
                    <td class="fw-bold text-success">$ <?php echo $due_payment; ?></td>
                <?php
                }
                ?>


                <?php
                if ($data["pstatusprid"] == 2) {
                ?>
                    <td> <button class="btn btn-warning" type="button" disabled>Update</button></td>

                <?php
                } else {
                ?>
                    <td> <button class="btn btn-warning" type="button" onclick="updateProject('<?php echo $data['pid']; ?>', '<?php echo $data['userid']; ?>');">Update</button></td>
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