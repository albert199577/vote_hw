<!-- <h1>列出所有的問題</h1> -->
<?php include_once "db.php"; ?>
<link rel="stylesheet" href="./style/style.css">
<main class="d-flex align-items-center flex-wrap justify-content-center" style="gap: 2rem">
    <section style="flex: 1 1;max-width: 100%; align-self: start;" class="p-5 ad">
        <p class="font-weight-bolder h3 m-4 text-center">ADVERTISEMENT</p>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <?php
            $img = all('ad', ['sh' => 1]);
            foreach ($img as $key => $value) {
                if ($key == 0) {
                    echo "<div class='carousel-item active'>";
                } else {
                    echo "<div class='carousel-item'>";
                }
                echo "<img src='./img/{$value['name']}' class='d-block w-100' title='{$value['intro']}'>";
                echo "</div>";
            }
            ?>
            </div>
        </div>
    </section>
    <section style="flex: 3 1;" >
        <div class="container vote-list">
            <ul class='list-grid p-0'>
        <?php
        $subject = all('topics');
        $keyword = $_GET['keyword'];
        if (isset($keyword)) {
            $find_like = find_like('topics', ['topic' => $keyword]);
            $subject = $find_like;
        }
        if (count($subject) == 0) {
            echo "<li class='mt-5' style='list-style: none; text-align: center'>";
            echo "<i class='fas fa-exclamation-triangle' style='font-size: 3rem;color: #dd2925;'></i>";
            echo "<h2 class='m-5'>目前暫無資料</h2>";
            echo "</li>";
        }
        foreach ($subject as $key => $value) {
            // print_r($value);
            if (rows('options', ['topic_id' => $value['id']])) {
                echo "<li class='vote-box row flex-column text-center'>";
                //question
                echo "<img src='./icon/youtube.svg' height='50%'>";
                if (isset($_SESSION['user'])) {
                    echo "<a class='d-inline-block' href='index.php?do=vote&id={$value['id']}'>" . $value['topic'] . "</a>";
                } else {
                    echo "<span class='d-inline-block text-center'>" . $value['topic']  . "</span>";
                }
                //總投票顯示
                $count = q("select sum(`count`) as '總計' from `options` where `topic_id` = '{$value['id']}'");
                // dd($count);
                echo "<span class='d-inline-block text-center'>";
                echo "投票總次數 " . $count[0]['總計'];
                echo "</span>";
                // 投票設計者
                echo "<span> Design By " . $value['designer'] . "<span>";
                //看結果按鈕
                echo "<a href='?do=vote_result&id={$value['id']}' class='d-inline-block text-center'>";
                echo "<button class='btn btn-secondary'>觀看結果</button>";
                echo "</a>";
                echo "</li>";
            }
        }

        ?>
            </ul>
        </div>
    </section>
</main>
