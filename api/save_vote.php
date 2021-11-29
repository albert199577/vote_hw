<?php
include_once "db.php";
$opt_id = $_POST['opt'];
echo $opt_id;
echo "<br>";
$opt = find('options', $opt_id);

$opt['count']++;
echo $opt['count'];
update('options', ['count' => $opt['count']], ['id' => $opt_id]);

// header("location:../index.php?do=vote_result");
to("../index.php?do=vote_result&id={$opt['topic_id']}");

?>
