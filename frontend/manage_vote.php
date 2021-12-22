<?php
$rows = find("users", ["account" => $_SESSION["user"]]);
$subject = find_vote('topics',['designer' => $rows["name"]]);
$status = all("topics");
?>

<h3 class="text-center my-5">我的投票</h3> 
<div class="container my-5" style="min-height: calc(1080px - 74px - 200px - 400px)">
<?php
if (count($subject) == 0) {
            echo "<li class='mt-5' style='list-style: none; text-align: center'>";
            echo "<h2 class='m-5'>目前尚未建立投票</h2>";
            echo "<a href='?do=add_vote' class='d-inline-block col-md-2 text-center'>";
            echo "<button class='btn btn-info'>立即建立投票</button>";
            echo "</a>";
            echo "</li>";
        } else {
?>
<?php
    echo "<ol class='p-0 text-center'>";
    foreach ($subject as $key => $value) {
        echo "<li class='list-group-item d-flex align-items-center flex-wrap'>";
        //question
        echo "<p class='d-inline-block col-md-4 m-0 col-6'>" . $value['topic'] . "</p>";
        //總投票顯示
        $count = q("select sum(`count`) as '總計' from `options` where `topic_id` = '{$value['id']}'");
        //總投票顯示
        echo "<span class='d-inline-block col-md-2 text-center col-6'>";
        echo "總投票數 " . $count[0]['總計'];
        echo "</span>";
        // 管理題目
        echo "<a href='?do=edit_subject&id={$value['id']}' class='d-inline-block col-md-2 text-center col-6 my-2'>";
        echo "<button class='btn btn-info'>管理</button>";
        echo "</a>";
        //看結果按鈕
        echo "<a href='./?do=vote_result&id={$value['id']}' class='d-inline-block col-md-2 text-center col-6 my-2'>";
        echo "<button class='btn btn-secondary'>觀看結果</button>";
        echo "</a>";
        echo "</li>";
    }
    echo "</ol>";

}
?>

</div>
