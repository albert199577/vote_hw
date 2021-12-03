<?php include_once "db.php";

unlink("../img/" . $image['name']);

$img = find('ad', $_GET['id']);

del('ad', [`id` => $_GET['id']]);

// to("../backend/?do=ad");
?>