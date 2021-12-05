<?php include_once "db.php";

$keyword = $_GET['keyword'];

find_like('topics', ['topic' => $keyword]);

to("../index.php?keyword=$keyword");
?>

