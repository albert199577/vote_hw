<?php include_once "db.php";

//backend del ad method
$img = find('ad', $_GET['id']);
unlink("../img/" . $img['name']);


del('ad', ['id' => $_GET['id']]);

to("../backend/?do=ad");

?>