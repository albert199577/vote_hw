<div class="container">
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
