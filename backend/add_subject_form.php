<div class="text-center font-weight">
    <form action="../api/new_subject.php">
        <label for="">
            問卷主題
            <input type="text" name="subject" onchange="api/tmp.php">
        </label>
        <a href="../api/new_option.php">
            <input class="bg-info border-info text-light d-inline-block rounded" type="button" value="+">
        </a>
        <!-- <?php
        //依據選項數來($_SESSION)增加選項
        if (isset($_SESSION['option'])) {
            for($i = 1; $i <= $_SESSION['option']; $i++) {
                echo "<label class='list-group-item'>";
                echo "選項" . $i;
                echo "<input type='text' name='options[]' value=''>";
                echo "</label>";
            }
        }

        ?> -->
        <!-- <label class='list-group-item'>
        選項
        <input type='text' name='options[]' value='{$opt['opt']}'>
        <input type='hidden' name='opt_id[]' value='{$opt['id']}'>
        </label> -->
        <div>
            <input type="submit" value="送出">
        </div>
    </form>
</div>