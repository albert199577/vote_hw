<?php include_once "../api/db.php"?>
<?php
if (!isset($_SESSION['user'])) {
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
    <title>問卷系統</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            /* border: 1px solid #000; */
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">HOME</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">TAB <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?do=member">會員管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?do=show_vote_list">問卷管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?do=ad">廣告管理</a>
            </li>
    <?php
        if (isset($_SESSION['error'])) {
            echo "<a class='nav-link '>{$_SESSION['error']}</a>";
        }
    ?>
    <?php
        if (isset($_SESSION['user'])) {
            echo "<li class='nav-item'>";
                echo "<a class='nav-link'>{$_SESSION['user']}</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo    "<a class='nav-link' href=''>會員中心</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo    "<a class='nav-link' href='../logout.php'>登出</a>";
            echo "</li>";
        } else {
    ?>
            <li class="nav-item">
                <a class="nav-link" href="?do=login">會員登入</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?do=reg">註冊會員</a>
            </li>
    <?php
        }
    ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>
<body>
    <a href="index.php">
        <div class="jumbotron m-0 p-0" style="overflow: hidden; height: 200px">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
        <?php
        // $img = ['dessert-01.jpg', 'dessert-02.jpg', 'dessert-03.jpg'];
        $img = all('ad', ['sh' => 1]);
        foreach ($img as $key => $value) {
            if ($key == 0) {
                echo "<div class='carousel-item active'>";
            } else {
                echo "<div class='carousel-item'>";
            }
            echo "<img src='../img/{$value['name']}' class='d-block w-100' alt='{$value['intro']}'>";
            echo "</div>";
        }
        ?>
                </div>
            </div>
        </div>
    </a>
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