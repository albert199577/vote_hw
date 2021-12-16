<?php include_once "db.php";

//frontend search method 
$keyword = $_GET['keyword'];
to("../index.php?keyword=$keyword");
?>

