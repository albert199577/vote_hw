<h2>投票頁</h2>


<?php

$id = $_GET['id'];

$subject =find('topics', $id);

$options = all('options', ['topic_id' => $id]);

// dd($options);
?>

<h1><?=$subject['topic'];?></h1>

<form action="./api/save_vote.php?<?=$id?>" method="post">
    <ul>
    <?php
    foreach ($options as $key => $opt) {
        echo "<li>";
        echo "<input type='radio' name='opt' value='{$opt['id']}'>";
        echo $opt['opt'];
        echo "</li>";
    }
    ?>

    </ul>
    <input type="submit" value="送出">
</form>