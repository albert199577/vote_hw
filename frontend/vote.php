<div class="container p-5" style="min-height: 506px">
    <h2 class="text-center mt-4">投票頁</h2>


    <?php

    $id = $_GET['id'];
    $user_id = (find('users', ['account' => $_SESSION['user']]))['id'];

    $subject = find('topics', $id);
    $options = all('options', ['topic_id' => $id]);

    $check_rep = find_vote('user_vote', ['user_id' => $user_id, 'topic_id' => $id]);

    // dd($options);
    ?>

    <h5 class="text-center my-2"><?=$subject['topic'];?></h5>
    <section class="container d-flex align-items-center flex-column">
        <form action="./api/save_vote.php?id=<?=$id?>" method="post" style="min-width: 300px">
            <ul class="p-0">
                <?php
                foreach ($options as $key => $opt) {
                    echo "<label class='list-group-item list-group-item-action list-group-item-info'>";
                    if (isset($check_rep[0])) {
                        //如果此帳號已經投過票就不讓他投
                        echo "<input type='radio' name='opt' value='{$opt['id']}' disabled>";
                    } else {
                        echo "<input type='radio' name='opt' value='{$opt['id']}' required>";
                    }
                    echo $opt['opt'];
                    echo "</label>";

                }
                ?>
            </ul>
            <li class="p-0 d-flex justify-content-center mb-4" style="list-style: none;">
            <?php
            if (isset($check_rep[0])) {
                //如果此帳號已經投過票出現投票結果按鈕
                $id = $_GET['id'];
                echo "<a href='?do=vote_result&id=$id'>";
                echo "<button class='btn btn-info mt-3 mr-2' type='button'>觀看投票結果</button>";
                echo "</a>";
            } else {
                echo "<button class='btn btn-info mt-3 mr-2' type='submit'>投票</button>";
            }
            ?>
                <a href="index.php">
                    <button class="btn btn-info mt-3 ml-2 " type="button">回上一頁</button>
                </a>
            </li>

        </form>
    </section>

</div>
