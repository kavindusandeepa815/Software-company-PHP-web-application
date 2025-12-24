<?php

require "connection.php";

$id = $_POST["id"];

if (empty($id)) {
    echo ("1");
} else {


    $query = ("SELECT * FROM `description` WHERE `project_id`='" . $id . "' ");

    $result_set = Database::search($query);
    $num_rows = $result_set->num_rows;


    if ($num_rows > 0) {
        $data = $result_set->fetch_assoc();
?>

        <textarea class="form-control" id="updateDescriptionText" rows="5"><?php echo $data["description"]; ?></textarea>
        <button class="btn btn-warning mt-2" onclick="updateDescription('<?php echo $data['project_id']; ?>');">Update</button>

<?php
    } else {
        echo ("2");
    }
}
?>