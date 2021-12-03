<?php 

if(isset($_SESSION['option'])) {
    $_SESSION['option'] ++;
} else {
    $_SESSION['option'] = 1;
}

// to("../backend/index.php?do=add_subject_form");
?>