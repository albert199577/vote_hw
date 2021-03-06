<?php
$dsn = "mysql:host=127.0.0.1;charset=utf8;dbname=students";
$pdo = new PDO($dsn, 'root', '');

//ALL function

function all($table, ...$arg)
{
    global $pdo;
    $sql = "SELECT * FROM `$table` ";
    if (isset($arg[0])) {
        if (is_array($arg[0])) {
            foreach ($arg[0] as $key => $value) {
                $tmp[] = "`$key` = '$value'";
            }
            $sql = $sql . "where " . implode(" AND ", $tmp);
        } else {
            $sql = $sql . $arg[0];
        }
    }
    if (isset($arg[1])) {
        $sql = $sql . $arg[1];
    }
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

//Find function

function find($table, $id)
{
    global $pdo;
    $sql = "SELECT * FROM `$table` WHERE `id` = '$id'";
    $rows = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $rows;
}

// echo "<pre>";
// print_r(find('students', 3));
// echo "</pre>";

/*
update function
1. 指定資料表 $table
2. 指定更新欄位 $column
3. 指定更新條件
 */

$arr1 = ['name' => '劉銘',
    'birthday' => '2000-03-09',
    'parent' => '許延安',
];
$where = ['major' => '商業經營科',

];

print_r(array_keys($arr1));
// $sql = "";
// foreach($arr1 as $key => $value) {
//     $sql = $sql . "`$key` = '$value', ";
// }
// echo trim($sql, ',');
// echo "<br>";
// foreach($arr1 as $key => $value) {
//     $sql = $sql . "`$key` = '$value', ";
// }
// echo mb_substr($sql, 0, mb_strlen($sql) - 5);

//Find function
// update('students', $arr1, $where);
function update($table, $arr1, $where)
{
    global $pdo;
    $sql_set = "";
    foreach ($arr1 as $key => $value) {
        $sql_set = $sql_set . "`$key` = '$value',";
    }
    $sql_set = trim($sql_set, ',');
    echo $sql_set;
    echo "<br>";
    $sql_where = "";
    foreach ($where as $key => $value) {
        $sql_where = $sql_where . "`$key` = '$value' AND ";
    }
    $sql_where = mb_substr($sql_where, 0, mb_strlen($sql_where) - 5);
    // echo $sql_where;

    mb_substr($sql_where, 0, mb_strlen($sql_where) - 5);
    echo $sql_where;
    echo "<br>";
    $sql = "UPDATE `$table` SET $sql_set WHERE $sql_where ";
    echo $sql;
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
    $pdo->exec($sql);
}
?>


<?php
// insert('students', ['name' => '劉銘', 'birthday' => '2000-03-09']);
function insert($table, ...$arg)
{
    global $pdo;
    $sql_set = "";
    $sql_where = "";
    // $sql = "INSERT INTO `$table` (`id`, `uni_id`, `seat_num`, `name`) VALUES (NULL, '2', '3', '45')"
    if (isset($arg[0])) {
        if (is_array($arg)) {
            foreach ($arg as $value) {
                foreach ($value as $key => $value) {
                    $set[] = "`$key`";
                    $where[] = "'$value'";
                }
            }
            $sql_set = $sql_set . implode(", ", $set);
            $sql_where = $sql_where . implode(", ", $where);
        }
    }

    $sql = "INSERT into $table(`" . implode('`,`', array_keys($array)) . "`)
                    VALUES (`" . implode(array_keys($array)) . "`)";
    $sql = "INSERT INTO `$table`($sql_set) VALUES ($sql_where)";
    echo $sql;
    $pdo->exec($sql);
}

?>

<?php
// Delete function
// del('students', ['name' => '劉銘'], ['birthday' => '2000-03-09']);
function del($table, ...$arg)
{
    global $pdo;
    $sql_where = "";
    if (isset($arg[0])) {
        if (is_array($arg)) {
            foreach ($arg as $value) {
                foreach ($value as $key => $value) {
                    $where[] = "`$key` = '$value'";
                }
            }
            $sql_where = $sql_where . implode(" AND ", $where);
        }
    }

    $sql = "DELETE FROM `$table` WHERE $sql_where ";
    echo $sql;
    $pdo->exec($sql);
}
?>

