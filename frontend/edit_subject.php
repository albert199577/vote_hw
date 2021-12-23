<?php 
$subject = find('topics', $_GET['id']);
$option = all('options', ['topic_id' => $_GET['id']]);
?>

<div class="container p-5" style="min-height: 506px">
    <div class="mx-auto d-flex justify-content-center align-items-around" style="background-color: #054853; min-height:300px; border-radius: 20px;max-width: 500px;">
        <form action="./api/edit_subject.php?id=<?=$_GET['id'];?>" method="POST">
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
                <!-- <button type="button" class="add-option d-block mx-auto btn btn-outline-light"><i class="fas fa-plus"></i></button> -->
                <li class="p-0 d-flex justify-content-center mb-4" style="list-style: none;">
                    <a href="?do=manage_vote">
                        <button class="btn btn-light mt-3 mr-2 " type="button">回上一頁</button>
                    </a>
                    <button class="d-inline-block mt-3 ml-2 btn btn-light" type="submit">送出</button>
                </li>
            </ul>
        </form>
    </div>
</div>
<!-- <script>
    let add_option = document.querySelector("button.add-option");
    let option_form = document.getElementsByClassName("input-group my-2")[1];
    let all_option = document.getElementsByClassName("input-group my-2");
    console.log(all_option);
    add_option.addEventListener("click", e => {
        let form = add_option.parentNode;
        console.log(form);
        let new_form = option_form.cloneNode(true);
        console.log(new_form);
        let input = new_form.childNodes[1];
        console.log(input);
        input.value = "";
        new_form.childNodes[2].value ="";
        console.log(new_form);

        // if (all_option.length < 7) {
            form.insertBefore(new_form, add_option);
        // }
    })
</script> -->