
<h2 class="text-center font-wegth-bold">編輯倫波圖</h2>
<?php
$ad = find('ad', $_GET['id']);
?>
<img src="../img/<?=$ad['name'];?>" alt="" style="width: 250px; height: 250px">
<form action="../api/edit_ad.php" method="post" enctype="multipart/form-data">
    <div class="text-center">
        <label for="upload"><?=$ad['name']?></label>
        <input type="file" name="name" id="upload">
    </div>
    <div class="text-center input-group">
        <label for="intro">說明：</label>
        <input class="input-group-prepend" type="text" name="intro" id="intro" value="<?=$ad['intro'];?>">
    </div>
    <div class="text-center">
        <input type="hidden" name="id" value="<?=$ad['id'];?>">
        <input  type="submit" value="上傳" class="btn btn-primary">
    </div>
</form>