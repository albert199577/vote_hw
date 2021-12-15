<h2 class="text-center font-weight-bold">倫波圖管理</h2>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form action="../api/upload_ad.php" method="post" enctype="multipart/form-data">
                <div class="text-center">
                    <label for="upload">選擇檔案: </label>
                    <input type="file" name="name" id="upload">
                </div>
                <div class="text-center input-group">
                    <label for="intro">說明: </label>
                    <input class="input-group-prepend" type="text" name="intro" id="intro">
                </div>
                <div class="text-center">
                    <input  type="submit" value="上傳" class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col-md-9">
            <h3 class="text-center">圖片列表</h3>
            <table class="table text-center">
                <tr>
                    <td>圖片</td>
                    <td>說明</td>
                    <td>狀態</td>
                    <td colspan="3">管理</td>
                </tr>
                <?php
                $rows = all('ad');
                foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<img src='../img/{$row['name']}' style='width: 100px; height: 100px';>";
                    echo "</td>";
                    echo "<td>{$row['intro']}</td>";
                    echo "<td>";
                    echo "<a href='../api/change_status.php?id={$row['id']}'>";
                    echo ($row['sh'] == 1) ? "展示中" : "下架中";
                    echo "</td>";
                    echo "</a>";
                    echo "<td>";
                    echo "<button>修改</button>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='?do=edit_ad&id={$row['id']}'>";
                    echo "<button>重新上傳</button>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='../api/del_ad.php?id={$row['id']}'>";
                    echo "<button>刪除</button>";
                    echo "</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>

        </div>
        
    </div>
    
</div>