<?php include_once "db.php";

//backend edit ad img 
echo "tmp_name" . $_FILES['name']['tmp_name'] . "<br>";
echo "filename" . $_FILES['name']['name'] . "<br>";
echo "intro" . $_POST['intro'] . "<br>";


if (!empty($_FILES['name']['tmp_name'])) {
    $filename = $_FILES['name']['name'];
    move_uploaded_file($_FILES['name']['tmp_name'], "../img/{$filename}");
}
$intro = $_POST['intro'];
if (isset($filename)) {
    update('ad', ['name' => $filename, 'intro' => $intro], ['id' => $_POST['id']]);
} else {
    update('ad', ['intro' => $intro], ['id' => $_POST['id']]);
}

to("../backend/?do=ad");
?>