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

<div class="container my-5" style="min-height: calc(1080px - 74px - 200px - 393px)">
    <form action="./api/check_login.php" method="post">
        <h2 class="text-center m-5">會員登入</h2>
        <li class="row justify-content-center align-items-center mx-3 flex-nowrap" style="height: 3rem">
            <label class="mx-md-4 mr-3 my-0 text-center" for="">帳號</label>
            <input class="px-3 border rounded-pill" style="height: 2.2rem; width: 200px" type="text" name="account" required>
        </li>
        <li class="row justify-content-center align-items-center mx-3 flex-nowrap mt-2" style="height: 3rem">
            <label class="mx-md-4 mr-3 my-0 text-center" for="">密碼</label>
            <input class="px-3 border rounded-pill" style="height: 2.2rem; width: 200px" type="password" name="password" required>
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
