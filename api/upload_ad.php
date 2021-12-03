<?php include_once "db.php";
echo "tmp_name" . $_FILES['name']['tmp_name'] . "<br>";
echo "filename" . $_FILES['name']['name'] . "<br>";
echo "intro" . $_POST['intro'] . "<br>";


if (!empty($_FILES['name']['tmp_name'])) {
    $intro = $_POST['intro'];
    $filename = $_FILES['name']['name'];

    move_uploaded_file($_FILES['name']['tmp_name'], "../img/{$filename}");

    insert('ad', ['name' => $filename, 'sh' => 0, 'intro' => $intro]);
}

to("../backend/?do=ad");
?>