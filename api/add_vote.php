<?php include_once "db.php";


$rows = find("users", ["account" => $_SESSION["user"]]);

insert("topics", ["topic" => $_POST["topics"], "designer" => $rows["name"]]);

$id = find("topics", ["topic" => $_POST["topics"]]);

echo $id["id"];
foreach ($_POST["option"] as $key => $value) {
    insert("options", ["opt" => $value, "topic_id" => $id["id"]]);
}

del('options', ['opt' => ''], ['topic_id' => $id["id"]]);

to("../index.php");

?>