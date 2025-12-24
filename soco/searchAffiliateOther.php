<?php

require "connection.php";

$search = $_POST["search"];



if (empty($search)) {
    echo "1";
} else {

    $query = ("SELECT * FROM `affiliate_start`
    INNER JOIN `affiliate_company` ON `affiliate_company`.`affiliate_start_id` = `affiliate_start`.`id`
    INNER JOIN `affiliate_billing` ON `affiliate_billing`.`affiliate_start_id` = `affiliate_start`.`id`
    WHERE `id` = '" . $search . "' ");


    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;


    if ($num_rows >= 1) {

        for ($p = 0; $p < $num_rows; $p++) {
            $data = $result_set->fetch_assoc();

?>

            <tr>
                <th scope="row"><?php echo $data["email"]; ?></th>
                <td><?php echo $data["name"]; ?></td>
                <td><input class="form-control" type="text" value="<?php echo $data["company_name"]; ?>" id="updateAffiliateProfileName_<?php echo $data['id']; ?>"></td>
                <td><input class="form-control" type="text" value="<?php echo $data["company_url"]; ?>" id="updateAffiliateProfileUrl_<?php echo $data['id']; ?>"></td>
                <td><input class="form-control" type="text" value="<?php echo $data["description"]; ?>" id="updateAffiliateProfileDes_<?php echo $data['id']; ?>"></td>
                <td><button  class="btn btn-warning" onclick="updateAffiliateProfile('<?php echo $data['id']; ?>');">Update</button></td>
            </tr>

<?php

        }
    } else {
        echo ("2");
    }
}
?>