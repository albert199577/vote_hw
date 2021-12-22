<?php include_once "../api/db.php"?>
<?php
$king = find('users',['account' => $_SESSION['user']]);

if (!isset($_SESSION['user'])) {
    to("../index.php");
    exit();
}
//後台使用者判斷
if ($king['id'] != 1) {
    to("../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTE Backstage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="short icon" href="../icon/logo.svg">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="../icon/logo.svg" alt="vote_img" style="height: 3rem;">
            <span class="mx-3">HOME</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">回前台</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=member">會員管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=manage_vote">投票管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=ad">廣告管理</a>
                </li>
        <?php
            $rows = find("users", ["account" => $_SESSION["user"]]);
            if (isset($_SESSION['user'])) {
                echo "<li class='nav-item'>";
                    echo "<a class='nav-link'>{$rows["name"]}</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo    "<a class='nav-link' href='../logout.php'>登出</a>";
                echo "</li>";
            }
        ?>
            </ul>
        </div>
    </nav>
    <div class="container">
    <?php
    $do = isset($_GET['do']) ? $_GET['do'] : 'manage_vote';
    $file = $do . ".php";
    if (file_exists($file)) {
        include $file;
    } else {
        include "manage_vote.php";
    }
    ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="../main.js"></script>
</body>
</html>