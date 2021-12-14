<?php include_once "./api/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷系統</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/style.css">
    <style>
        * {
            /* border: 1px solid #000; */
        }
    </style>
</head>
<body>
    <div class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light container">
            <a class="navbar-brand" href="index.php">
                <img src="./icon/logo.svg" alt="vote_img" style="height: 3rem;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <form class="form-inline my-2 my-lg-0" action="./api/search.php">
                    <input class="form-control mr-sm-0" type="search" placeholder="尋找投票" aria-label="Search" name="keyword">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
            <?php
            if (isset($_SESSION['user'])) {
                $rows = find("users", ["account" => $_SESSION["user"]]);
                echo "<li class='nav-item '>";
                    echo "<a class='nav-link'>{$rows["name"]}</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo    "<a class='nav-link' href='?do=manage_vote'>我的公投</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo    "<a class='nav-link' href='?do=edit_member_data'>編輯會員資料</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo    "<a class='nav-link' href='logout.php'>登出</a>";
                echo "</li>";
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link ml-3 px-3 d-inline-block" href="?do=login" style="border: 1px solid #666; border-radius: 20px;">登入</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3 px-3 d-inline-block" href="?do=reg"  style="border: 1px solid #666; border-radius: 20px;">註冊</a>
                </li>
        <?php
            }
        ?>
            </ul>
        </div>
        </nav>
    </div>
    <!-- header -->
    
    <section class="back-img"> 
        <h3>準備好製作第一個投票了嗎？</h3>
        <a href="?do=add_vote">
            <button class="start btn btn-outline-light mt-3">現在開始</button>
        </a>
    </section>
    <?php
    $do = isset($_GET['do']) ? $_GET['do'] : 'show_vote_list';
    $file ="./frontend/" . $do . ".php";
    if (file_exists($file)) {
        include $file;
    } else {
        include "./frontend/show_vote_list.php";
    }
    ?> 
    <footer> 
        <div class="logo">
            <img src="./icon/logo.svg" alt="vote_img">
        </div>
        <ul class="about">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Login</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <img src="./icon/facebook.svg" alt="facebook">
            </li>
            <li>
                <img src="./icon/instagram.svg" alt="instagram">
            </li>
            <li>
                <img src="./icon/twitter.svg" alt="twitter">
            </li>
            <li>
                <img src="./icon/youtube.svg" alt="youtube">
            </li>
        </ul>
    </footer>
    <!-- <div class="p-5 text-center text-light bg-primary fixed-bottom">
        版權所有，歡迎盜用
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>