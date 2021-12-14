<?php include_once "db.php";


$account = $_POST['account'];

$count = check_rep("users", "account", "$account");
echo "<pre>";
print_r($count);
echo "</pre>";

if (isset($count)) {
    // 帳號已存在
    echo "<script>alert('此帳號已存在')</script>";
} else {
    insert('users',$_POST);
}


to("../index.php");

?>