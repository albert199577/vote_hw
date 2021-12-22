
<link rel="stylesheet" href="./style/style.css">
<main class="d-flex align-items-center flex-wrap justify-content-center" style="gap: 1rem">
    <section style="flex: 1 1;max-width: 100%; align-self: start;" class="p-3 ad ml-5">
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
        <div class="container">
            <ul class="nav contain nav-tabs my-4 border-0" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active border-0 d-inline-block" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">最新投票</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link border-0" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">熱門投票</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link border-0" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">點閱率最高</a>
                    </li>
            </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active container vote-list mx-auto mt-0" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <ul class='list-grid p-0'>
                        <!-- 最新投票 -->
                        <?php
                        $subject = search('topics', ['status' => 1], 'id', 'DESC');
                        // $subject = all('topics', ['status' => 1]);
                        if (isset($_GET['keyword'])) {
                            $keyword = $_GET['keyword'];
                            if ($keyword != "") {
                                $find_like = find_like('topics', ['topic' => $keyword]);
                                $subject = $find_like;
                            }
                        }
                        if (count($subject) == 0) {
                            echo "<li class='mt-5' style='list-style: none; text-align: center'>";
                            echo "<i class='fas fa-exclamation-triangle' style='font-size: 3rem;color: #dd2925;'></i>";
                            echo "<h2 class='m-5'>目前暫無資料</h2>";
                            echo "</li>";
                        }
                        ?>
                        <?php
                        // print_r($subject);
                        foreach ($subject as $key => $value) {
                            if (rows('options', ['topic_id' => $value['id']])) {
                                echo "<li class='vote-box row flex-column'>";
                                //question
                                if (!empty($value['img_name'])) {
                                    $file = "./vote_img/" . $value['img_name'];
                                } else {
                                    $file = "";
                                }
                                if (file_exists($file)) {
                                    echo "<div class='h-50 text-center'>";
                                    echo "<img src='$file' height='100%' width: 'auto'>";
                                    echo "</div>";
                                } else {
                                    echo "<div class='h-50' style='background: linear-gradient(#00bbbe, #1cc2e5)'></div>";
                                    // echo "<img src='./icon/youtube.svg' height='50%'>";
                                }
                                echo "<section class='h-50 px-3'>";
                                if (isset($_SESSION['user'])) {
                                    echo "<a class='d-block my-1' style='font-weight: 700' href='./api/viewers.php?id={$value['id']}'>" . $value['topic'] . "</a>";
                                } else {
                                    echo "<span class='d-inline-block text-center my-1' style='font-weight: 700'>" . $value['topic']  . "</span>";
                                }
                                //總投票顯示
                                $count = q("select sum(`count`) as '總計' from `options` where `topic_id` = '{$value['id']}'");
                                // dd($count);
                                echo "<p class='m-0 py-2'>";
                                echo "投票總次數 " . $count[0]['總計'];
                                echo "</p>";
                                // 投票設計者
                                echo "<p class='rounded-pill px-2 d-inline-block' style='border: 1px solid rgba(0, 0, 0, .3)'> Design By ";
                                echo $value['designer'];
                                echo "</p>";
                                // 觀看人數
                                echo "<p class='d-flex justify-content-between'>";
                                echo "<span class='d-inline-block float-left'><i class='far fa-eye'></i>";
                                echo $value['viewers'];
                                echo "</span>";
                                //看結果按鈕
                                echo "<a href='?do=vote_result&id={$value['id']}' class='d-block text-center text-info'>";
                                echo "觀看結果";
                                echo "</a>";
                                echo "</p>";
                                echo "<section>";
                                echo "</li>";
                            }
                        }
                        ?>
                        </ul>
                    </div>
                    <div class="tab-pane fade container vote-list mx-auto mt-0" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <ul class='list-grid p-0'>
                            <!-- 熱門投票 -->
                            <?php
                            $subject = search('topics', ['status' => 1], 'viewers', 'DESC');
                            if (isset($_GET['keyword'])) {
                                $keyword = $_GET['keyword'];
                                if ($keyword != "") {
                                    $find_like = find_like('topics', ['topic' => $keyword]);
                                    $subject = $find_like;
                                }
                            }
                            if (count($subject) == 0) {
                                echo "<li class='mt-5' style='list-style: none; text-align: center'>";
                                echo "<i class='fas fa-exclamation-triangle' style='font-size: 3rem;color: #dd2925;'></i>";
                                echo "<h2 class='m-5'>目前暫無資料</h2>";
                                echo "</li>";
                            }
                            ?>
                            <?php
                            // print_r($subject);
                            foreach ($subject as $key => $value) {
                                if (rows('options', ['topic_id' => $value['id']])) {
                                    echo "<li class='vote-box row flex-column'>";
                                    //question
                                    if (!empty($value['img_name'])) {
                                        $file = "./vote_img/" . $value['img_name'];
                                    } else {
                                        $file = "";
                                    }
                                    if (file_exists($file)) {
                                        echo "<div class='h-50 text-center'>";
                                        echo "<img src='$file' height='100%' width: 'auto'>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='h-50' style='background: linear-gradient(#00bbbe, #1cc2e5)'></div>";
                                        // echo "<img src='./icon/youtube.svg' height='50%'>";
                                    }
                                    echo "<section class='h-50 px-3'>";
                                    if (isset($_SESSION['user'])) {
                                        echo "<a class='d-block my-1' style='font-weight: 700' href='./api/viewers.php?id={$value['id']}'>" . $value['topic'] . "</a>";
                                    } else {
                                        echo "<span class='d-inline-block text-center'>" . $value['topic']  . "</span>";
                                    }
                                    //總投票顯示
                                    $count = q("select sum(`count`) as '總計' from `options` where `topic_id` = '{$value['id']}'");
                                    // dd($count);
                                    echo "<p>";
                                    echo "投票總次數 " . $count[0]['總計'];
                                    echo "</p>";
                                    // 投票設計者
                                    echo "<p class='rounded-pill px-2 d-inline-block' style='border: 1px solid rgba(0, 0, 0, .3)'> Design By ";
                                    echo $value['designer'];
                                    echo "</p>";
                                    // 觀看人數
                                    echo "<p class='d-flex justify-content-between'>";
                                    echo "<span class='d-inline-block float-left'><i class='far fa-eye'></i>";
                                    echo $value['viewers'];
                                    echo "</span>";
                                    //看結果按鈕
                                    echo "<a href='?do=vote_result&id={$value['id']}' class='d-block text-center text-info'>";
                                    echo "觀看結果";
                                    echo "</a>";
                                    echo "</p>";
                                    echo "<section>";
                                    echo "</li>";
                                }
                            }
                            ?>
                            </ul>
                    </div>
                    <div class="tab-pane fade container vote-list mx-auto mt-0" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <ul class='list-grid p-0'>
                            <!-- 點閱率最高 -->
                            <?php
                            $subject = search('topics', ['status' => 1], 'viewers', 'DESC');
                            if (isset($_GET['keyword'])) {
                                $keyword = $_GET['keyword'];
                                if ($keyword != "") {
                                    $find_like = find_like('topics', ['topic' => $keyword]);
                                    $subject = $find_like;
                                }
                            }
                            if (count($subject) == 0) {
                                echo "<li class='mt-5' style='list-style: none; text-align: center'>";
                                echo "<i class='fas fa-exclamation-triangle' style='font-size: 3rem;color: #dd2925;'></i>";
                                echo "<h2 class='m-5'>目前暫無資料</h2>";
                                echo "</li>";
                            }
                            ?>
                            <?php
                            // print_r($subject);
                            foreach ($subject as $key => $value) {
                                if (rows('options', ['topic_id' => $value['id']])) {
                                    echo "<li class='vote-box row flex-column'>";
                                    //question
                                    if (!empty($value['img_name'])) {
                                        $file = "./vote_img/" . $value['img_name'];
                                    } else {
                                        $file = "";
                                    }
                                    if (file_exists($file)) {
                                        echo "<div class='h-50 text-center'>";
                                        echo "<img src='$file' height='100%' width: 'auto'>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='h-50' style='background: linear-gradient(#00bbbe, #1cc2e5)'></div>";
                                        // echo "<img src='./icon/youtube.svg' height='50%'>";
                                    }
                                    echo "<section class='h-50 px-3'>";
                                    if (isset($_SESSION['user'])) {
                                        echo "<a class='d-block my-1' style='font-weight: 700' href='./api/viewers.php?id={$value['id']}'>" . $value['topic'] . "</a>";
                                    } else {
                                        echo "<span class='d-inline-block text-center'>" . $value['topic']  . "</span>";
                                    }
                                    //總投票顯示
                                    $count = q("select sum(`count`) as '總計' from `options` where `topic_id` = '{$value['id']}'");
                                    // dd($count);
                                    echo "<p>";
                                    echo "投票總次數 " . $count[0]['總計'];
                                    echo "</p>";
                                    // 投票設計者
                                    echo "<p class='rounded-pill px-2 d-inline-block' style='border: 1px solid rgba(0, 0, 0, .3)'> Design By ";
                                    echo $value['designer'];
                                    echo "</p>";
                                    // 觀看人數
                                    echo "<p class='d-flex justify-content-between'>";
                                    echo "<span class='d-inline-block float-left'><i class='far fa-eye'></i>";
                                    echo $value['viewers'];
                                    echo "</span>";
                                    //看結果按鈕
                                    echo "<a href='?do=vote_result&id={$value['id']}' class='d-block text-center text-info'>";
                                    echo "觀看結果";
                                    echo "</a>";
                                    echo "</p>";
                                    echo "<section>";
                                    echo "</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </ul>
        </div>
    </section>
</main>
