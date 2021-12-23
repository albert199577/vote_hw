<?php 
$subject = find('topics', $_GET['id']);
$option = all('options', ['topic_id' => $_GET['id']]);

?>

<div class="container p-5">
    <div class="mx-auto d-flex justify-content-center align-items-around" style="background-color: #054853; min-height:300px; border-radius: 20px;max-width: 500px;">
        <form action="../api/edit_subject.php?id=<?=$_GET['id'];?>" method="POST">
        <h3 class="text-center m-5 text-white">編輯投票資訊</h3>
            <ul class="p-0">
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">主旨</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="topic" value="<?=$subject['topic'];?>" required>
                </div>
                <?php
                foreach($option as $key => $opt) {
                    echo "<div class='input-group my-2'>";
                        echo "<div class='input-group-prepend'>";
                            echo "<div class='input-group-text'>選項</div>";
                        echo "</div>";
                        echo "<input type='text' class='form-control' id='inlineFormInputGroupUsername' name='options[]' value='{$opt['opt']}'>";
                        echo "<input type='hidden' name='opt_id[]' value='{$opt['id']}'>";
                    echo "</div>";
                }
                ?>
            </ul>
            <li class="p-0 d-flex justify-content-center mb-4" style="list-style: none;">
                <a href="?do=manage_vote">
                    <button class="btn btn-light mt-3 mr-2 " type="button">回上一頁</button>
                </a>
                <button class="d-inline-block mt-3 ml-2 btn btn-light" type="submit">送出</button>
            </li>
        </form>
    </div>
</div>