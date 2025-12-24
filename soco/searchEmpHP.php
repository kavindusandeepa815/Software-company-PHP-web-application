<?php

require "connection.php";

$search = $_POST["search"];
$searchWhat = $_POST["searchWhat"];
$searchTextB = $_POST["searchTextB"];


if ($searchWhat == "SemployeeHPstatus") {
    $search = "abc";
}


if (empty($search)) {
    echo "1";
} else if ($searchTextB == 0) {
    echo "3";
} else {

    if ($searchWhat == "SemployeeHPemail") {
        $query = ("SELECT employee_projects.employee_id AS eid,employee_projects.project_id AS pid,employee_projects.start AS estart,employee_projects.end AS eend,
        employee_projects.role,employee.name AS ename,pr_type.name AS typee FROM `employee_projects`
         INNER JOIN `employee` ON `employee`.`id`=`employee_projects`.`employee_id` 
         INNER JOIN `project` ON `employee_projects`.`project_id`=`project`.`id` 
         INNER JOIN `pr_type` ON `pr_type`.`id`=`project`.`pr_type_id` 

         WHERE `employee`.`email`='" . $search . "' AND `employee_projects`.`status_pr_id`='" . $searchTextB . "'  ");
    }

    if ($searchWhat == "SemployeeHPname") {
        $query = ("SELECT employee_projects.employee_id AS eid,employee_projects.project_id AS pid,employee_projects.start AS estart,employee_projects.end AS eend,
        employee_projects.role,employee.name AS ename,pr_type.name AS typee FROM `employee_projects`
         INNER JOIN `employee` ON `employee`.`id`=`employee_projects`.`employee_id` 
         INNER JOIN `project` ON `employee_projects`.`project_id`=`project`.`id` 
         INNER JOIN `pr_type` ON `pr_type`.`id`=`project`.`pr_type_id` 

         WHERE `employee`.`name` LIKE '%" . $search . "%' AND `employee_projects`.`status_pr_id`='" . $searchTextB . "' ");
    }

    if ($searchWhat == "SemployeeHPstatus") {
        $query = ("SELECT employee_projects.employee_id AS eid,employee_projects.project_id AS pid,employee_projects.start AS estart,employee_projects.end AS eend,
        employee_projects.role,employee.name AS ename,pr_type.name AS typee FROM `employee_projects`
         INNER JOIN `employee` ON `employee`.`id`=`employee_projects`.`employee_id` 
         INNER JOIN `project` ON `employee_projects`.`project_id`=`project`.`id` 
         INNER JOIN `pr_type` ON `pr_type`.`id`=`project`.`pr_type_id` 

         WHERE  `employee_projects`.`status_pr_id`='" . $searchTextB . "'  ");
    }

    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;

    if ($num_rows >= 1) {

        for ($x = 0; $x < $num_rows; $x++) {
            $data = $result_set->fetch_assoc();


            $result_set2 = Database::search("SELECT employee_payments.amount AS amount,status_py.name AS namee 
            FROM `employee_payments` 
            INNER JOIN `employee_projects` ON `employee_projects`.`project_id`=`employee_payments`.`project_id` 
            INNER JOIN `status_py` ON `status_py`.`id`=`employee_payments`.`status_py_id`  
            WHERE `employee_payments`.`employee_id`='" . $data["eid"] . "' AND `employee_payments`.`project_id`='" . $data["pid"] . "' AND `employee_payments`.`py_type_id`='5'  ");
            $data2 = $result_set2->fetch_assoc();


?>

            <tr>
                <th scope="row"><?php echo $data["eid"]; ?></th>
                <td><?php echo $data["ename"]; ?></td>
                <td><?php echo $data["pid"]; ?></td>
                <td><?php echo $data["typee"]; ?></td>
                <td><?php echo $data["estart"]; ?></td>
                <td><?php echo $data["eend"]; ?></td>
                <?php
                if ($data2["namee"] == "Complete") {
                ?>
                    <td class="fw-bold text-success">$ <?php echo $data2["amount"]; ?></td>
                <?php
                } else {
                ?>
                    <td class="fw-bold text-danger">$ <?php echo $data2["amount"]; ?></td>
                <?php
                }
                ?>
                <td><?php echo $data["role"]; ?></td>
            </tr>

<?php

        }
    } else {
        echo ("2");
    }
}
?>