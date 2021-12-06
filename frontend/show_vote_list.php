<!-- <h1>列出所有的問題</h1> -->


<div class="container vote-list">
    <ul class='list-grid p-0 '>
<?php
$subject = all('topics'); 
foreach ($subject as $key => $value) {
    if (rows('options', ['topic_id' => $value['id']])) {
        echo "<li class='vote-box row flex-column text-center'>";
        //question
        echo "<img src='./icon/youtube.svg' height='30%'>";
        if (isset($_SESSION['user'])) {
            echo "<a class='d-inline-block' href='index.php?do=vote&id={$value['id']}'>" . $value['topic'] . "</a>";
        } else {
            echo "<span class='d-inline-block text-center'>" . $value['topic']  . "</span>";
        }
        //總投票顯示
        $count = q("select sum(`count`) as '總計' from `options` where `topic_id` = '{$value['id']}'");
        // dd($count);
        echo "<span class='d-inline-block text-center'>";
        echo "投票總次數 " . $count[0]['總計'];
        echo "</span>";
        //看結果按鈕
        echo "<a href='?do=vote_result&id={$value['id']}' class='d-inline-block text-center'>";
        echo "<button class='btn btn-secondary'>觀看結果</button>";
        echo "</a>";
        echo "</li>";
    }
}

?>
    </ul>
</div>
