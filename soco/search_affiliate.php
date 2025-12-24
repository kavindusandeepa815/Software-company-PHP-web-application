<?php

require "connection.php";

$search = $_POST["search"];
$searchWhat = $_POST["searchWhat"];

if ($searchWhat == "SaffiliateAll") {
    $search = "abc";
}

if ($searchWhat == "SaffiliateAllNone") {
    $search = "abc";
}

if (empty($search)) {
    echo "1";
} else {

    if ($searchWhat == "SaffiliateEmail") {
        $query = ("SELECT 
        affiliate_start.id AS aid,
        affiliate_start.name AS aname,
        affiliate_start.email,
        affiliate_start.country_id AS affiliate_CId,
        affiliate_start.status_ue_id,
        country.name AS cname 
        FROM `affiliate_start` 
        INNER JOIN `country` ON `country`.`id`=`affiliate_start`.`country_id` 
        WHERE `affiliate_start`.`email`='" . $search . "' ");
    }

    if ($searchWhat == "SaffiliateAll") {
        $query = ("SELECT 
        affiliate_start.id AS aid,
        affiliate_start.name AS aname,
        affiliate_start.email,
        affiliate_start.country_id AS affiliate_CId,
        affiliate_start.status_ue_id,
        country.name AS cname 
        FROM `affiliate_start` 
        INNER JOIN `country` ON `country`.`id`=`affiliate_start`.`country_id` ");
    }

    if ($searchWhat == "SaffiliateAllNone") {
        $query = ("SELECT 
        affiliate_start.id AS aid,
        affiliate_start.name AS aname,
        affiliate_start.email,
        affiliate_start.country_id AS affiliate_CId,
        affiliate_start.status_ue_id,
        country.name AS cname 
        FROM `affiliate_start` 
        INNER JOIN `country` ON `country`.`id`=`affiliate_start`.`country_id` 
        WHERE `affiliate_start`.`name`='None' AND `status_ue_id`='2' ");
    }


    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;

    if ($num_rows >= 1) {

        for ($x = 0; $x < $num_rows; $x++) {
            $data = $result_set->fetch_assoc();

?>

            <tr>
                <th scope="row"><?php echo $data["aid"]; ?></th>
                <?php

                if ($data["aname"] == "None" && $data["status_ue_id"] == "2") {
                ?>
                    <td><input type="text" class="form-control text-danger" id="updateAffiliateAdmName_<?php echo $data["aid"]; ?>" value="<?php echo $data["aname"]; ?>"></td>
                <?php
                } else {
                ?>
                    <td><input type="text" class="form-control" id="updateAffiliateAdmName_<?php echo $data["aid"]; ?>" value="<?php echo $data["aname"]; ?>"></td>
                <?php
                }

                ?>
                <td><input type="text" class="form-control" id="updateAffiliateAdmEmail_<?php echo $data["aid"]; ?>" value="<?php echo $data["email"]; ?>"></td>
                <td>
                    <select class="form-select" id="updateAffiliateAdmCountry_<?php echo $data["aid"]; ?>">
                        <option value="0">Select Country</option>
                        <?php

                        $country_rs = Database::search("SELECT * FROM `country` ");
                        $country_num = $country_rs->num_rows;
                        for ($c = 0; $c < $country_num; $c++) {
                            $country_data = $country_rs->fetch_assoc();

                            if ($data["affiliate_CId"] == $country_data["id"]) {
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
                    <select class="form-select" id="updateAffiliateAdmStatus_<?php echo $data["aid"]; ?>">

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

                if ($searchWhat == "SaffiliateAllNone") {
                ?>
                    <td><button class=" ms-4 btn btn-danger mb-3" type="button">Remove</button></td>
                <?php
                } else {
                ?>
                    <td><button class=" ms-4 btn btn-warning mb-3" type="button" onclick="updateAffiliate('<?php echo $data['aid']; ?>');">Update</button></td>
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