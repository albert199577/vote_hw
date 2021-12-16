<?php include_once "db.php";

//backend change vote release status
$id = $_GET['id'];
$vote = find('topics', $id);
echo "<pre>";
print_r($vote);
echo "</pre>";
echo $vote['status'];
$vote['status'] = ($vote['status'] + 1) % 2;
echo $vote['status'];

update('topics', ['status' => $vote['status']], ['id' => $id]);

to("../backend");

?>