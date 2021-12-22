<!-- <div class="text-center font-weight">
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
        <!--<div>
            <input type="submit" value="送出">
        </div>
    </form>
</div> -->

<?php
if (!isset($_SESSION['user'])) {
    to("./index.php");
    exit();
}
// print_r($rows);
?>

<div class="container p-3 p-md-5">
    <div class="mx-auto d-flex justify-content-center align-items-around" style="background-color: #054853; min-height:300px; border-radius: 20px;max-width: 500px;">
        <form action="../api/add_vote.php" method="POST" enctype="multipart/form-data">
        <h3 class="text-center m-5 text-white">建立投票</h3> 
            <ul class="p-3">
                <div class="input-group-prepend text-center bg-light my-2">
                    <label for="upload"></label>
                    <input class="form-control" type="file" name="name" id="upload" accept="image/jpeg" display="none">
                </div>
                <!-- <div class='custom-file mx-auto d-block mb-2'>
                    <label for="upload" class='custom-file-label'>投票標題圖片</label>
                    <input class="custom-file-input" type="file" name="name" id="upload" accept="image/jpeg">
                </div> -->
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
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">選項</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="option[]">
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

<script>
    let add_option = document.querySelector("button.add-option");
    let option_form = document.getElementsByClassName("input-group my-2")[1];
    let all_option = document.getElementsByClassName("input-group my-2");
    console.log(all_option);
    add_option.addEventListener("click", e => {
        let form = add_option.parentNode;
        let new_form = option_form.cloneNode(true);
        let input = new_form.childNodes[3];
        input.value = "";
        if (all_option.length < 7) {
            form.insertBefore(new_form, add_option);
        }
    })
</script>