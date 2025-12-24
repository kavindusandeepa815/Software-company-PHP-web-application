<?php

require "connection.php";

$search = $_POST["search"];



if (empty($search)) {
    echo "1";
} else {

    $query = ("SELECT 
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
    WHERE `affiliate_has_project`.`affiliate_start_id` = '" . $search . "' ");


    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;


    if ($num_rows >= 1) {

        for ($p = 0; $p < $num_rows; $p++) {
            $data = $result_set->fetch_assoc();

?>

            <tr>
                <th scope="row"><?php echo $data["pid"]; ?></th>
                <td><?php echo $data["ptitle"]; ?></td>
                <td><?php echo $data["paffiliate"]; ?></td>
                <td><?php echo $data["pstart"]; ?></td>
                <td><?php echo $data["pend"]; ?></td>

                <?php
                if ($data["statusName"] != "Complete") {
                ?>
                    <td class="text-danger fw-bold"><?php echo $data["statusName"]; ?></td>
                <?php
                } else {
                ?>
                    <td class="text-success fw-bold"><?php echo $data["statusName"]; ?></td>
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