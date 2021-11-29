<h1>列出所有的問題</h1>

<?php

$subject = all('topics');
echo "<ol>";
foreach ($subject as $key => $value) {
    if (rows('options', ['topic_id' => $value['id']])) {
        echo "<li>";
        echo "<a href='index.php?do=vote&id={$value['id']}'>" . $value['topic'] . "</a>";
        echo "</li>";
    }
}
echo "</ol>";

?>