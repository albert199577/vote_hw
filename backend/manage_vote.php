<h1>列出所有的問題</h1>

<?php

$subject = all('topics');
echo "<ol class='p-0'>";


foreach ($subject as $key => $value) {
    echo "<li class='list-group-item'>";
    //question
    echo "<a class='d-inline-block col-md-2' href='index.php?do=vote&id={$value['id']}'>" . $value['topic'] . "</a>";
    //總投票顯示
    $count = q("select sum(`count`) as '總計' from `options` where `topic_id` = '{$value['id']}'");
    //總投票顯示
    echo "<span class='d-inline-block col-md-2 text-center'>";
    echo "總投票數 " . $count[0]['總計'];
    echo "</span>";
    //上下架
    echo "<a href='../api/change_vote_status.php?id={$value['id']}' class='d-inline-block col-md-2 text-center'>";
    echo "<button type='button' class='btn btn-info'>";
    echo ($value['status'] == 1) ? '下架' : '上架';
    echo "</button>";
    // 管理題目
    echo "<a href='?do=edit_subject&id={$value['id']}' class='d-inline-block col-md-2 text-center'>";
    echo "<button class='btn btn-info'>管理</button>";
    echo "</a>";
    //看結果按鈕
    echo "<a href='../?do=vote_result&id={$value['id']}' class='d-inline-block col-md-2 text-center'>";
    echo "<button class='btn btn-secondary'>觀看結果</button>";
    echo "</a>";
    echo "<a href='../api/del_vote.php?id={$value['id']}' class='d-inline-block col-md-2 text-center'>";
    echo "<button class='btn btn-danger'>刪除投票</button>";
    echo "</a>";
    echo "</li>";
}

?>
<a class="mt-5 d-inline-block mx-auto" href="?do=add_subject_form">
    <button type='button' class='btn btn-secondary'><i class='fas fa-plus'></i></button>
</a>


