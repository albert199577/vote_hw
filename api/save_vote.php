<?php
include_once "db.php";

//紀錄帳號與投票項目資料表連結 以判斷是否投票
$topic_id = $_GET['id'];
$user_id = (find('users', ['account' => $_SESSION['user']]))['id'];
insert('user_vote', ['user_id' => $user_id, 'topic_id' => $topic_id]);


//在選項加上投票數
$opt_id = $_POST['opt'];
echo $opt_id;
echo "<br>";
$opt = find('options', $opt_id);
$opt['count']++;
echo $opt['count'];
update('options', ['count' => $opt['count']], ['id' => $opt_id]);


to("../index.php?do=vote_result&id={$opt['topic_id']}");

?>
