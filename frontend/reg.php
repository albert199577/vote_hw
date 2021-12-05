<section class="container justify-content-center">
    <h1 class="text-center mt-3">填寫註冊資料</h1>
    <form class="text-center mt-5 row justify-content-center flex-column" action="./api/reg.php" method="post" id="regForm">
        <li class="row justify-content-center align-items-center">
            <label class="col-md-2 my-0" for="">姓名</label>
            <input class="col-md-3" type="text" name="name" required>
        </li>
        <li class="row justify-content-center align-items-center">
            <label class="col-md-2 my-0" for="">電話</label>
            <input class="col-md-3" type="text" name="mobile" required>
        </li>
        <li class="row justify-content-center align-items-center">
            <label class="col-md-2 my-0" for="">帳號</label>
            <input class="col-md-3" type="text" name="account" required>
        </li>
        <li class="row justify-content-center align-items-center">
            <label class="col-md-2 my-0" for="">密碼</label>
            <input class="col-md-3" type="password" name="password" required>
        </li>
        <li class="row justify-content-center align-items-center">
            <label class="col-md-2 my-0" for="">E-mail:</label>
            <input class="col-md-3" type="email" name="email" required>
        </li>
        <li class="row justify-content-center align-items-center">
            <label class="col-md-2 my-0" for="">生日</label>
            <input class="col-md-3 text-center" type="date" name="birthday" required>
        </li>
        <li class="row justify-content-center align-items-center">
            <label class="col-md-2 my-0" for="">性別</label>
            <select class="col-md-3 text-center" name="gender" id="" required>
                <option value="">選擇性別</option>
                <option value="男">男</option>
                <option value="女">女</option>
            </select>
        </li>
        <button type="submit" class="mx-auto btn btn-info mt-3">立即註冊</button>
    </form>
</section>
