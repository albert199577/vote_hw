<?php 
if (isset($_SESSION['reg_error'])) {
    echo "<script>alert('此帳號已存在, 請重新輸入')</script>";
    unset($_SESSION['reg_error']);
}
?>
<div class="container p-md-5 p-sm-3 flex-grow-1">
    <div class="mx-auto d-flex justify-content-center align-items-around" style="background-color: #054853; min-height:300px; border-radius: 20px;max-width: 500px;">
        <form action="./api/reg.php" method="POST">
        <h3 class="text-center m-5 text-white">填寫註冊資料</h3>
            <ul class="p-0">
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">帳號</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="account" required>
                </div>
                <div class="input-group my-2 ">
                    <div class="input-group-prepend">
                        <div class="input-group-text">密碼</div>
                    </div>
                    <input type="password" class="form-control" id="inlineFormInputGroupUsername" name="password" required>
                </div>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">暱稱</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="name" required>
                </div>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">性別</div>
                    </div>
                    <select class="form-control" name="gender" required>
                        <option value=""></option>
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </div>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">電話</div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="mobile" required>
                </div>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">生日</div>
                    </div>
                    <input type="date" class="form-control" id="inlineFormInputGroupUsername" name="birthday" required>
                </div>
                <div class="input-group my-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">E-mail</div>
                    </div>
                    <input type="email" class="form-control" id="inlineFormInputGroupUsername" name="email" required>
                </div>
            </ul>
            <button class="mx-auto d-block my-5 btn btn-light" type="submit">送出</button>
        </form>
    </div>
</div>
