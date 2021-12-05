
<section class="container text-center">
    <h1>問卷結果</h1>
    
    <?php
    
    $sql = "SELECT * FROM `topics`, `options` WHERE `topics`.`id` = `options`.`topic_id` AND `topics`.`id` = '{$_GET['id']}'";
    
    $rows = q($sql);
    // echo $sql;
    ?>
    
    <!-- <h1><?=$rows[0][topic];?></h1> -->
    
    
    <ul class="list-group row justify-content-center flex-column" style="font-size:1.25rem">
    <?php
    foreach ($rows as $key => $row) {
        echo "<li class='list-group-item'>";
        echo "<span>{$row['opt']}</span>";
        echo "<span class='badge badge-info float-right'>{$row['count']}</span>";
        echo "</li>";
    }
    ?>
        <li class="row justify-content-center align-items-center">
            <a href="index.php" class="mx-auto btn btn-info mt-3">回首頁</a>
        </li>
    </ul>
</section>
