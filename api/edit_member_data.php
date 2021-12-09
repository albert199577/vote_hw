<?php include_once "db.php";

// echo $_SESSION['account'];
print_r($_POST);
echo $_SESSION["user"];
if (isset($_POST)) {
    update('users', $_POST, ['account' => $_SESSION['account']]); 
    // $rows = find("users", ["account" => $account])
}
to("../index.php");

?>