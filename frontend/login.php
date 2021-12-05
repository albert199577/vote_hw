<div class="container">
    <form action="./api/check_login.php" method="post">
        <h2 class="text-center">會員登入</h2>
        <li class="row justify-content-center align-items-center">
            <label class="col-md-1 my-0" for="">帳號</label>
            <input class="col-md-3" type="text" name="account" required>
        </li>
        <li class="row justify-content-center align-items-center">
            <label class="col-md-1 my-0" for="">密碼</label>
            <input class="col-md-3" type="password" name="password" required>
        </li>
        <li class="row justify-content-center align-items-center">
        <?php
        if (isset($_SESSION['error'])) {
            echo "<a class=' nav-link'>{$_SESSION['error']}</a>";
        }
        ?>
        </li>
        <li class="row justify-content-center align-items-center">
            <button type="submit" class="mx-auto btn btn-info mt-3">登入</button>
        </li>
    </form>
</div>
