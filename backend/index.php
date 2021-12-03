<?php include_once "../api/db.php"?>
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
<body>
    <a href="index.php">
        <div class="jumbotron m-0 p-0" style="overflow: hidden; height: 200px">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner position-relative">
                    <div class="carousel-item active position-absolute">
                        <img src="../img/dessert-01.jpg" class="d-block w-100" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/dessert-02.jpg" class="d-block w-100" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/dessert-03.jpg" class="d-block w-100" alt="Third slide">
                    </div>
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
    <div class="p-2 text-center text-light bg-primary fixed-bottom">
        版權所有，歡迎盜用
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="../main.js"></script>
</body>
</html>