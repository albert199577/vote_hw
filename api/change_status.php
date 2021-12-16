<?php include_once "db.php";

//backend change ad release  status
$id = $_GET['id'];
$img = find('ad', $id);
$img['sh'] = ($img['sh'] + 1) % 2;
update('ad', ['sh' => $img['sh']], ['id' => $id]);

to("../backend/?do=ad");

?>