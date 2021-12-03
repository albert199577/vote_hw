<h2>投票頁</h2>


<?php

$id = $_GET['id'];

$subject =find('topics', $id);

$options = all('options', ['topic_id' => $id]);

// dd($options);
?>

<h1><?=$subject['topic'];?></h1>
<ol class="list-group">
<form action="./api/save_vote.php?<?=$id?>" method="post">
    <ul>
    <?php
    foreach ($options as $key => $opt) {
        echo "<label class='list-group-item list-group-item-action list-group-item-info'>";
        echo "<input type='radio' name='opt' value='{$opt['id']}'>";
        echo $opt['opt'];
        echo "</label>";
    }
    ?>

    </ul>
    <input class="btn btn-info mt-3" type="submit" value="投票">
</ol>
</form>