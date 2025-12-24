<?php

require "connection.php";

$search = $_POST["search"];
$searchWhat = $_POST["searchWhat"];

if ($searchWhat == "SemployeeAll") {
    $search = "abc";
}


if (empty($search)) {
    echo "1";
} else {

    if ($searchWhat == "SemployeeEmail") {
        $query = ("SELECT * FROM `employee` WHERE `email`='" . $search . "' ");
    }

    if ($searchWhat == "SemployeeName") {
        $query = ("SELECT * FROM `employee` WHERE `name` LIKE '%" . $search . "%' ");
    }

    if ($searchWhat == "SemployeeType") {
        $query = ("SELECT * FROM `employee` WHERE `pr_type_id`='" . $search . "' ");
    }

    if ($searchWhat == "SemployeeAll") {
        $query = ("SELECT * FROM `employee` ");
    }




    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;

    if ($num_rows >= 1) {

        for ($x = 0; $x < $num_rows; $x++) {
            $data = $result_set->fetch_assoc();

?>

            <tr>
                <th scope="row"><?php echo $data["id"]; ?></th>
                <td><input type="text" class="form-control" id="updateEmpName_<?php echo $data["id"]; ?>" value="<?php echo $data["name"]; ?>"></td>
                <td><input type="text" class="form-control" id="updateEmpEmail_<?php echo $data["id"]; ?>" value="<?php echo $data["email"]; ?>"></td>
                <td><input type="text" class="form-control" id="updateEmpContact_<?php echo $data["id"]; ?>" value="<?php echo $data["contact"]; ?>"></td>
                <td><input type="text" class="form-control" id="updateEmpBank_<?php echo $data["id"]; ?>" value="<?php echo $data["bank"]; ?>"></td>
                <td>
                    <select class="form-select" id="updateEmpType_<?php echo $data["id"]; ?>">

                        <option value="0">Type</option>

                        <?php
                        $type_rs = Database::search("SELECT * FROM `pr_type` ");
                        $type_num = $type_rs->num_rows;

                        for ($y = 0; $y < $type_num; $y++) {
                            $type_data = $type_rs->fetch_assoc();

                            if ($data["pr_type_id"] == $type_data["id"]) {
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
                    <select class="form-select" id="updateEmpStatus_<?php echo $data["id"]; ?>">

                        <option value="0">Status</option>

                        <?php
                        $status_ue_rs = Database::search("SELECT * FROM `status_ue` ");
                        $status_ue_num = $status_ue_rs->num_rows;

                        for ($z = 0; $z < $status_ue_num; $z++) {
                            $status_ue_data = $status_ue_rs->fetch_assoc();

                            if ($data["status_ue_id"] == $status_ue_data["id"]) {
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
                <td><button class=" ms-4 btn btn-warning mb-3" type="button" onclick="updateEmployee('<?php echo $data['id']; ?>');">Update</button></td>
            </tr>

<?php

        }
    } else {
        echo ("2");
    }
}
?>