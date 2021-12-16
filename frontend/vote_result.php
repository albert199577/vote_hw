
<section class="container text-center py-5">
    <h2>問卷結果</h2>
    
    <?php
    
    $sql = "SELECT * FROM `topics`, `options` WHERE `topics`.`id` = `options`.`topic_id` AND `topics`.`id` = '{$_GET['id']}'";
    
    $rows = q($sql);
    // echo $sql;
    // echo "<pre>";
    // print_r($rows);
    // echo "</pre>";
    //抓出總計投票數
    $count = q("select sum(`count`) as '總計' from `options` where `topic_id` = '{$_GET['id']}'");
    // echo "<pre>";
    // print_r($count);
    // echo "</pre>";


    ?>
    
    <p class="h5"><?=$rows[0][topic];?></p>
    
    
    <ul class="list-group row justify-content-center flex-column" style="font-size:1.25rem">
    <?php
    foreach ($rows as $key => $row) {
        if ($count[0]["總計"] != 0) {
            $p = round(($row['count'] / $count[0]["總計"]) * 100, 2);
        } else {
            $p = 0;
        }
        $percent =  $p . "%";
        echo "<li class='d-flex justify-content-center align-items-center'>";
        echo "<div class='container d-flex justify-content-between position-relative align-items-center border  mx-3 my-2 p-0 overflow-hidden ' style='width: 300px; height: 3rem; border-radius: 1rem'>";
            echo "<p class='topics m-0 ml-3'>{$row['opt']}</p>";
            echo "<p class='percent m-0 mr-3'>";
            echo $p . "%";
            echo "</p>";
            echo "<div class='color position-absolute m-0' style='width:$percent; background-color: rgba(175, 175, 175, .2); height: 3rem; transition: width 0.5s ease 0s;'></div>";
        echo "</div>";
        echo "<p class='badge badge-info m-0 d-inline-block'>";
        echo $row['count'] . "票";
        echo "</p>";
        echo "</li>";
    }
    ?>
        <li style="list-style: none;">
            <p class="m-0 h6">總投票數 <?=$count[0]["總計"]?></p>
        </li>
        <li class="row justify-content-center align-items-center">
            <a href="index.php" class="mx-auto btn btn-info mt-3">回首頁</a>
        </li>
    </ul>
</section>
