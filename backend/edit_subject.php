<?php 
$subject = find('topics', $_GET['id']);
$option = all('options', ['topic_id' => $_GET['id']]);



?>
<form action="../api/edit_subject.php" method="post" class="col-6 m-auto text-center">
    <label>問卷主題: <input type="text" name="topic" value="<?=$subject['topic'];?>"></label>
    <input type="hidden" name="topic_id" value="<?=$subject['id'];?>">
    <a href="../api/add_option.php?id=<?=$subject['id'];?>">
        <input class="bg-info border-info text-light d-inline-block rounded" type="button" value="+">
    </a>
    <?php
    foreach($option as $key => $opt) {
        echo "<label class='list-group-item'>";
        echo "選項" . ($key + 1);
        echo "<input type='text' name='options[]' value='{$opt['opt']}'>";
        echo "<input type='hidden' name='opt_id[]' value='{$opt['id']}'>";
        echo "</label>";
    }
    ?>
    <input type="submit" value="送出">
</form>

