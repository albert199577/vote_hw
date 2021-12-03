<?php include "db.php"?>;

<?php 
if(isset($_SESSION['option'])) {
    $_SESSION['option'] ++;
} else {
    $_SESSION['option'] = 1;
}

echo $_SESSION['option'];
to("../backend/index.php?do=add_subject_form");
?>