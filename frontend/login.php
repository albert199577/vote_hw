<div class="container">
    <form action="./api/check_login.php" method="post">
        <h2 class="m-auto">會員登入</h2>
        <table class="m-auto" id="loginForm">
            <tr>
                <td>帳號：</td>
                <td><input type="text" name="account"></td>
            </tr>
            <tr>
                <td>密碼：</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="登入">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
</div>
