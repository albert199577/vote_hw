<?php include_once "./api/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷系統</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
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
            echo    "<a class='nav-link' href='logout.php'>登出</a>";
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
    <a href="index.php">
        <div class="jumbotron m-0 p-0" style="overflow: hidden; height: 250px">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./img/dessert-04.jpg" class="d-block w-100 h-25" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/dessert-02.jpg" class="d-block w-100 h-25" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img src="./img/dessert-03.jpg" class="d-block w-100 h-25" alt="Third slide">
                    </div>
                </div>
            </div>
        </div>
    </a>
    <?php
    $do = isset($_GET['do']) ? $_GET['do'] : 'show_vote_list';
    $file ="./frontend/" . $do . ".php";
    if (file_exists($file)) {
        include $file;
    } else {
        include "./frontend/show_vote_list.php";
    }
    ?>
    <!-- <div class="p-5 text-center text-light bg-primary fixed-bottom">
        版權所有，歡迎盜用
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>