<?php include_once "db.php";

$id = $_GET['id'];
//進入投票頁之前讓瀏覽人數+1
$viewers = find('topics', $id)['viewers'];
$viewers += 1;

update('topics', ['viewers' => $viewers], ['id' => $id]);

to("../?do=vote&id=$id");

?>