

<h1>問卷結果0.0</h1>

<?php

$sql = "SELECT * FROM `topics`, `options` WHERE `topics`.`id` = `options`.`topic_id` AND `topics`.`id` = '{$_GET['id']}'";

$rows = q($sql);
// echo $sql;
?>

<!-- <h1><?=$rows[0][topic];?></h1> -->


<ul class="list-group col-md-4" style="font-size:1.25rem">
<?php
foreach ($rows as $key => $row) {
    echo "<li class='list-group-item'>";
    echo "<span>{$row['opt']}</span>";
    echo "<span class='badge badge-info float-right'>{$row['count']}</span>";
    echo "</li>";
}
?>
</ul>
