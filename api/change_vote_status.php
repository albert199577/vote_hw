<?php include_once "db.php";

$id = $_GET['id'];
$vote = find('topics', $id);
print_r($vote);
echo $vote['status'];
$vote['status'] = ($vote['status'] + 1) % 2;
echo $vote['status'];

update('topics', ['status' => $vote['status']], ['id' => $id]);

to("../?do=manage_vote");

?>