編輯
<?php 
$subject = find('topics', $_GET['id']);
$option = all('options', ['topic_id' => $_GET['id']]);


?>
<!-- 有問題 -->
<form action="../api/edit_subject.php" method="post" class="col-6 m-auto text-center">
    <label>問卷主題: <input type="text" name="topic" value="<?=$subject['topic'];?>"></label>
    <input type="hidden" name="topic_id" value="<?=$subject['id'];?>">
    <?php
    foreach($option as $key => $opt) {
        echo "<label class='list-group-item'>";
        echo "選項" . ($key + 1);
        echo "<input type='text' name='options[]' value='{$opt['opt']}'>";
        echo "<input type='hidden' name= 'opt_id[]' value='{$opt['id']}'>";
        echo "</label>";
    }

    if(count($option) < 4) {
        for($i = 0; $i < (4 - count($options)); $i++) {
            echo "<label class='list-group-item'>";
            echo "選項" . (count($options) + 1 + $i);
            echo "<input type='text' name='options[]' value=''>";
            echo "</label>";
        }
    }
    ?>
    <input type="submit" value="送出">
</form>

