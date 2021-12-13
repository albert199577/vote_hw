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


<div class="container p-5">
    <div class="mx-auto d-flex justify-content-center align-items-around" style="background-color: #054853; min-height:300px; border-radius: 20px;max-width: 500px;">
        <form action="./api/edit_subject.php" method="POST">
        <h3 class="text-center m-5 text-white">建立投票</h3>
            <ul class="p-0">
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">主旨</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="topics" required>
                </div>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">選項</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="option[]">
                </div>
                <button type="button" class="add-option d-block mx-auto btn btn-outline-light"><i class="fas fa-plus"></i></button>
            </ul>
            <button class="mx-auto d-block my-3 btn btn-light" type="submit">送出</button>
        </form>
    </div>
</div>