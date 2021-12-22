
<h2 class="m-4 text-center">所有會員</h2>
<?php 
$users = all('users');
echo "<ol class='p-0'>";
// echo "<pre>";
// print_r($users);
// echo "</pre>";

// $arr = ["會員編號", "姓名", "性別", "帳號", "密碼", "電話", "生日"];
$arr = ["會員編號", "姓名", "性別", "帳號", "電話", "生日"];
echo "<li class='list-group-item' style='display: grid; grid-template-columns: repeat(6, 1fr);'>";
foreach ($arr as $key => $value) {
    echo "<span class='text-center'>{$value}</span>";
    
}
echo "</li>";
foreach ($users as $key => $value) {
    echo "<li class='list-group-item' style='display: grid; grid-template-columns: repeat(6, 1fr);'>";
    //question
    
    echo "<span class='text-center'>{$value['id']}</span>";
    echo "<span class='text-center'>{$value['name']}</span>";
    echo "<span class='text-center'>{$value['gender']}</span>";
    echo "<span class='text-center'>{$value['account']}</span>";
    // echo "<span class='text-center'>{$value['password']}</span>";
    echo "<span class='text-center'>{$value['mobile']}</span>";
    echo "<span class='text-center'>{$value['birthday']}</span>";

    echo "</li>";
}



?>