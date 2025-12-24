<?php

require "connection.php";

$search = $_POST["search"];
$searchWhat = $_POST["searchWhat"];

if ($searchWhat == "SuserAll") {
    $search = "abc";
}

if ($searchWhat == "SuserAllNone") {
    $search = "abc";
}

if (empty($search)) {
    echo "1";
} else {

    if ($searchWhat == "SuserEmail") {
        $query = ("SELECT user.id,user.name AS uname,user.email,user.country_id AS userCId,user.status_ue_id,country.name AS cname FROM `user` INNER JOIN `country` ON `country`.`id`=`user`.`country_id` WHERE `email`='" . $search . "' ");
    }

    if ($searchWhat == "SuserName") {
        $query = ("SELECT user.id,user.name AS uname,user.email,user.country_id AS userCId,user.status_ue_id,country.name AS cname FROM `user` INNER JOIN `country` ON `country`.`id`=`user`.`country_id` WHERE `user`.`name` LIKE '%" . $search . "%' ");
    }

    if ($searchWhat == "SuserAll") {
        $query = ("SELECT user.id,user.name AS uname,user.email,user.country_id AS userCId,user.status_ue_id,country.name AS cname FROM `user` INNER JOIN `country` ON `country`.`id`=`user`.`country_id` ");
    }

    if ($searchWhat == "SuserAllNone") {
        $query = ("SELECT user.id,user.name AS uname,user.email,user.country_id AS userCId,user.status_ue_id,country.name AS cname FROM `user` INNER JOIN `country` ON `country`.`id`=`user`.`country_id` WHERE `user`.`name`='None' AND `status_ue_id`='2' ");
    }


    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;

    if ($num_rows >= 1) {

        for ($x = 0; $x < $num_rows; $x++) {
            $data = $result_set->fetch_assoc();

?>

            <tr>
                <th scope="row"><?php echo $data["id"]; ?></th>
                <?php

                if ($data["uname"] == "None" && $data["status_ue_id"] == "2") {
                ?>
                    <td><input type="text" class="form-control text-danger" id="updateUserAdmName_<?php echo $data["id"]; ?>" value="<?php echo $data["uname"]; ?>"></td>
                <?php
                } else {
                ?>
                    <td><input type="text" class="form-control" id="updateUserAdmName_<?php echo $data["id"]; ?>" value="<?php echo $data["uname"]; ?>"></td>
                <?php
                }

                ?>
                <td><input type="text" class="form-control" id="updateUserAdmEmail_<?php echo $data["id"]; ?>" value="<?php echo $data["email"]; ?>"></td>
                <td>
                    <select class="form-select" id="updateUserAdmCountry_<?php echo $data["id"]; ?>">
                        <option value="0">Select Country</option>
                        <?php

                        $country_rs = Database::search("SELECT * FROM `country` ");
                        $country_num = $country_rs->num_rows;
                        for ($c = 0; $c < $country_num; $c++) {
                            $country_data = $country_rs->fetch_assoc();

                            if ($data["userCId"] == $country_data["id"]) {
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
                </td>
                <td>
                    <select class="form-select" id="updateUserAdmStatus_<?php echo $data["id"]; ?>">

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

                <?php

                if ($searchWhat == "SuserAllNone") {
                ?>
                    <td><button class=" ms-4 btn btn-danger mb-3" type="button">Remove</button></td>
                <?php
                } else {
                ?>
                    <td><button class=" ms-4 btn btn-warning mb-3" type="button" onclick="updateUser('<?php echo $data['id']; ?>');">Update</button></td>
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