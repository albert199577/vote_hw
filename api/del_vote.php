<?php include_once "db.php";?>

<?php
//backend del vote method
$id = $_GET['id'];

$img = find('topics', $_GET['id']);

unlink("../vote_img/" . $img['img_name']);

del("topics", ["id" => "$id"]);

del("options", ["topic_id" => "$id"]);

to("../backend/");

?>