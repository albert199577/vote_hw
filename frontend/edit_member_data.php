<?php
include_once "./api/db.php";

if (!isset($_SESSION['user'])) {
    to("./index.php");
    exit();
}

$rows = find("users", ["account" => $_SESSION['user']]);

// print_r($rows);
?>
<div class="container p-4">
    <div class="mx-auto d-flex justify-content-center align-items-around" style="background-color: #054853; min-height:300px; border-radius: 20px;max-width: 500px;">
        <form action="./api/edit_member_data.php" method="POST">
        <h3 class="text-center m-5 text-white">編輯會員資料</h3>
            <ul class="p-0 mx-4 text-center">
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">帳號</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" value="<?=$rows["account"];?>" disabled>
                </div>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">密碼</div>
                    </div>
                    <input type="password" class="form-control" id="inlineFormInputGroupUsername" name="password" value="<?=$rows["password"];?>" required>
                </div>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">暱稱</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="name" value="<?=$rows["name"];?>" required>
                </div>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">電話</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="mobile" value="<?=$rows["mobile"];?>" required>
                </div>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">E-mail</div>
                    </div>
                    <input type="email" class="form-control" id="inlineFormInputGroupUsername" name="email" value="<?=$rows["email"];?>" required>
                </div>
            </ul>
            <button class="mx-auto d-block my-5 btn btn-light" type="submit">送出</button>
        </form>
    </div>
</div>
