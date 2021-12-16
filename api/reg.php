<?php include_once "db.php";

//frontend reg check method
$account = $_POST['account'];
$count = check_rep("users", "account", "$account");
echo "<pre>";
print_r($count);
echo "</pre>";

if (isset($count[0])) {
    // 帳號已存在
    $_SESSION['reg_error'] = "此帳號已存在, 請重新輸入";
    to("../?do=reg");
} else {
    //帳號註冊成功
    $_SESSION['reg_susses'] = "註冊成功, 請登入";
    insert('users',$_POST);
    to("../?do=login");
}

?>