<?php

require "connection.php";

$search = $_POST["search"];
$searchWhat = $_POST["searchWhat"];



if (empty($search)) {
    echo "1";
} else {

    if ($searchWhat == "SaffiliatePAYafID") {
        $query = ("SELECT 
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
        WHERE `affiliate_payment`.`affiliate_id`='" . $search . "' ");
    }

    if ($searchWhat == "SaffiliatePAYprjID") {
        $query = ("SELECT 
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
        WHERE `affiliate_payment`.`project_id`='" . $search . "' ");
    }


    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;

    if ($num_rows >= 1) {

        for ($x = 0; $x < $num_rows; $x++) {
            $data = $result_set->fetch_assoc();

?>

            <tr>
                <th scope="row"><?php echo $data["apid"]; ?></th>
                <?php

                if ($data["spyname"] == "Complete") {
                ?>
                    <td class="fw-bold"><?php echo $data["amount"]; ?></td>
                <?php
                } else {
                ?>
                    <td class="fw-bold text-danger"><?php echo $data["amount"]; ?></td>
                <?php
                }

                ?>
                <td scope="row"><?php echo $data["date_time"]; ?></td>
                <td scope="row"><?php echo $data["pid"]; ?></td>
                <td scope="row"><?php echo $data["afname"]; ?></td>
                <td>
                    <select class="form-select" id="updateAffiliatepayment_<?php echo $data["apid"]; ?>" style="width: 120px;">
                        <option value="0">Select Country</option>
                        <?php

                        $status_rs = Database::search("SELECT * FROM `status_py` ");
                        $status_num = $status_rs->num_rows;
                        for ($s = 0; $s < $status_num; $s++) {
                            $status_data = $status_rs->fetch_assoc();

                            if ($data["spyid"] == $status_data["id"]) {
                                $selected_status = "selected";
                            } else {
                                $selected_status = " ";
                            }

                        ?>
                            <option value="<?php echo $status_data["id"]; ?>" <?php echo $selected_status; ?>><?php echo $status_data["name"]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
                <td><button class="btn btn-warning" onclick="updateAffiliatepayment('<?php echo $data['apid']; ?>');">Update</button></td>
            </tr>

<?php

        }
    } else {
        echo ("2");
    }
}
?>