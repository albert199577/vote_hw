<?php include_once "db.php";

if(isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}

if (rows('users', $_POST)) {
    $_SESSION['user'] = $_POST['account'];
    to("../index.php");
} else {
    $_SESSION['error'] = "帳號密碼錯誤";
    to("../index.php?do=login");
}




?>