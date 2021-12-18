<?php
include_once "db.php";

$topic = $_POST['topic'];
$topic_id = $_GET['id'];


update('topics', ['topic' => $topic], ['id' => $topic_id]);

$options = $_POST['options'];
$opt_id = $_POST['opt_id'];

echo "<pre>";
print_r($options);
echo "</pre>";

echo "<br>";

foreach ($options as $key => $opt) {
    // echo $key;
    // if (array_key_exists($key, $opt_id)) {
    // 判斷選項是否為空值 ， 有的話加入ＤＢ 沒有的話不➕

    update('options', ['opt' => $opt], ['id' => $opt_id[$key]]);


    // } else {
    //     insert('options', ['opt' => $opt, 'topic_id' => $topic_id]);
    // }
    // del('options', ['opt' => ''], ['topic_id' => $topic_id]);
}


del('options', ['opt' => ''], ['topic_id' => $topic_id]);

// to("../backend/index.php");
?>