<?php
if (!isset($_SESSION['user'])) {
    to("./index.php");
    exit();
}
// print_r($rows);
?>

<div class="container p-5">
    <div class="mx-auto d-flex justify-content-center align-items-around" style="background-color: #054853; min-height:300px; border-radius: 20px;max-width: 500px;">
        <form action="./api/add_vote.php" method="POST">
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
    add_option.addEventListener("click", e => {
        let form = add_option.parentNode;
        let new_form = option_form.cloneNode(true);
        let input = new_form.childNodes[3];
        input.value = "";
        form.insertBefore(new_form, add_option);
    })
</script>
<!-- <script src="./app.js">
    
</script> -->
