<?php 
if (isset($_SESSION['reg_susses'])) {
    echo "<script>alert('註冊成功, 請登入')</script>";
    unset($_SESSION['reg_susses']);
}

if (isset($_SESSION['error'])) {
    echo "<script>alert('帳號密碼錯誤, 請重新輸入')</script>";
    unset($_SESSION['error']);
}

?>

<div class="container my-5" style="min-height: calc(1080px - 74px - 200px - 400px)">
    <form action="./api/check_login.php" method="post">
        <h2 class="text-center">會員登入</h2>
        <li class="row justify-content-center align-items-center mx-3 flex-nowrap">
            <label class="col-md-1 my-0 w-25 text-center" for="">帳號</label>
            <input class="col-md-2 border rounded-pill" type="text" name="account" required>
        </li>
        <li class="row justify-content-center align-items-center mx-3 flex-nowrap mt-2">
            <label class="col-md-1 my-0 w-25 text-center" for="">密碼</label>
            <input class="col-md-2 border rounded-pill" type="password" name="password" required>
        </li>
        <li class="row justify-content-center align-items-center">
        <?php
        if (isset($_SESSION['error'])) {
            echo "<a class=' nav-link'>{$_SESSION['error']}</a>";
        }
        ?>
        </li>
        <li class="row justify-content-center align-items-center">
            <button type="submit" class="mr-3 btn btn-info mt-3">登入</button>
            <a href="./?do=reg">
                <button type="button" class="ml-3 btn btn-info mt-3">註冊</button>
            </a>
        </li>
    </form>
</div>
