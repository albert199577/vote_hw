    <?php


    $rows = find("users", ["account" => $_SESSION["user"]]);
    $subject = find_vote('topics',['designer' => $rows["name"]]);
    $status = all("topics");
    echo "<ol class='p-0 flex-grow-1'>";
    foreach ($subject as $key => $value) {
        echo "<li class='list-group-item'>";
        //question
        echo "<p class='d-inline-block col-md-4'>" . $value['topic'] . "</p>";
        //總投票顯示
        $count = q("select sum(`count`) as '總計' from `options` where `topic_id` = '{$value['id']}'");
        //總投票顯示
        echo "<span class='d-inline-block col-md-2 text-center'>";
        echo "總投票數 " . $count[0]['總計'];
        echo "</span>";
        // 管理題目
        echo "<a href='?do=edit_subject&id={$value['id']}' class='d-inline-block col-md-2 text-center'>";
        echo "<button class='btn btn-info'>管理</button>";
        echo "</a>";
        //看結果按鈕
        echo "<a href='./?do=vote_result&id={$value['id']}' class='d-inline-block col-md-2 text-center'>";
        echo "<button class='btn btn-secondary'>觀看結果</button>";
        echo "</a>";
        echo "</li>";
    }
    echo "</ol>";
    ?>