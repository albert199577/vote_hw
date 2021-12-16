<?php include_once "db.php";?>

<?php
//backend del vote method
$id = $_GET['id'];

del("topics", ["id" => "$id"]);

del("options", ["topic_id" => "$id"]);

to("../backend/");

?>