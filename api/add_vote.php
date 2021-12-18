<?php include_once "db.php";

//frontend add vote method
echo "tmp_name " . $_FILES['name']['tmp_name'] . "<br>";
echo "filename " . $_FILES['name']['name'] . "<br>";
echo "<pre>";
print_r($_FILES);
echo "</pre>";



$rows = find("users", ["account" => $_SESSION["user"]]);

insert("topics", ["topic" => $_POST["topics"], "designer" => $rows["name"]]);

$id = find("topics", ["topic" => $_POST["topics"]]);

echo $id["id"];
foreach ($_POST["option"] as $key => $value) {
    insert("options", ["opt" => $value, "topic_id" => $id["id"]]);
}

del('options', ['opt' => ''], ['topic_id' => $id["id"]]);

if (!empty($_FILES['name']['tmp_name'])) {
    $filename = $_FILES['name']['name'];
    echo 1111;
    move_uploaded_file($_FILES['name']['tmp_name'], "../vote_img/" . $filename);
    update('topics', ['img_name' => $filename], ['id' => $id['id']]);
}

to("../index.php");

?>