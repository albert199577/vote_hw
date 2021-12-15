<?php include_once "db.php";?>

<?php

$id = $_GET['id'];

del("topics", ["id" => "$id"]);

del("options", ["topic_id" => "$id"]);

to("../backend/");

?>