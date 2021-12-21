<?php
    $dsn = "mysql:host=127.0.0.1;charset=utf8;dbname=topics";
    $pdo = new PDO($dsn, 'root', '');
    // $dsn = "mysql:host=127.0.0.1;charset=utf8;dbname=s1100405";
    // $pdo = new PDO($dsn, 's1100405', 's1100405');
    session_start();

//ALL function
        
    function all($table, ...$arg) {
        global $pdo;
        $sql = "SELECT * FROM `$table` ";
        if(isset($arg[0])) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key` = '$value'";
                }
                $sql = $sql . "where " . implode(" AND ", $tmp);
            } else {
                $sql = $sql . $arg[0];
            }
        }
        if(isset($arg[1])) {
            $sql = $sql . $arg[1];
        }

        $rows = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    

//Find function
//取得符合條件的資料
    function find($table, $id) {
        global $pdo;
        $sql = "SELECT * FROM `$table` WHERE ";
        if (is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key` = '$value'";
            }
            $sql = $sql . implode(" AND ", $tmp);
        } else {
            $sql = $sql . "`id` = '$id'";
        }
        $rows = $pdo -> query($sql) -> fetch(PDO::FETCH_ASSOC);
        return $rows;
    }

//取得符合條件的資料 (管理我的投票)
    function find_vote($table, $id) {
        global $pdo;
        $sql = "SELECT * FROM `$table` WHERE ";
        if (is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key` = '$value'";
            }
            $sql = $sql . implode(" AND ", $tmp);
        } else {
            $sql = $sql . "`id` = '$id'";
        }
        $rows = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

//取得符合類似條件的資料
    function find_like($table, $topic) {
        global $pdo;
        $sql = "SELECT * FROM `$table` WHERE ";
        if (is_array($topic)) {
            foreach ($topic as $key => $value) {
                $tmp = "`topic` LIKE '%{$value}%'";
            }
            $sql = $sql . $tmp;
        }
        // echo $sql;
        $rows = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }


// UPDATE `users` SET `id`='[value-1]',`account`='[value-2]' WHERE
    function update($table, $data, $where) {
        global $pdo;
        $sql_set = "";
        foreach($data as $key => $value) {
            $data_tmp[] = "`$key` = '$value'";
        }   
        $sql_set .= implode(" , ", $data_tmp);

        $sql_where ="";
        print_r($where);
        foreach($where as $key => $value) {
            $where_tmp[] = "`$key` = '$value'";

        }   
        $sql_where .= implode(" AND ", $where_tmp);
        // echo $sql_where;
        // echo "<br>";
        $sql = "UPDATE `$table` SET $sql_set WHERE $sql_where";
        echo $sql;
        $rows = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);
        return $rows;
        $pdo -> exec($sql);
    }
?>


<?php
// insert('students', ['name' => '劉銘', 'birthday' => '2000-03-09']);
function insert($table, ...$arg) {
    global $pdo;
    $sql_set = "";
    $sql_where = "";
    if(isset($arg[0])) {
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
    $sql = "INSERT INTO `$table`($sql_set) VALUES ($sql_where)";
    echo $sql;
    echo "<br>";
    $pdo -> exec($sql);
}

?>

<?php
// Delete function
// del('students', ['name' => '劉銘'],[ 'birthday' => '2000-03-09']);
    function del($table, ...$arg) {
        global $pdo; 
        $sql_where = "";
        if(isset($arg[0])) {
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
        $pdo -> exec($sql);
    }
?>
<?php
function dd($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>

<?php

function rows($table, $arr) {
    global $pdo;
    $sql = "SELECT count(*) FROM `$table` WHERE ";
    foreach ($arr as $key => $value) {
        $tmp[] = "`$key` = '$value'";
    }
    $sql = $sql . implode(" AND ", $tmp);
    $rows = $pdo->query($sql)->fetchColumn();
    return $rows;
}

// echo rows('options', ['topic_id' => 0])


?>

<?php
//header method
function to($url) {
    header("location:$url");
}

?>

<?php
//任意查詢
function q($sql) {
    global $pdo;
    return $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);

}
?>

<?php

//帳號及信箱驗證是否重複
function check_rep($table, $where, $data) {
    global $pdo;
    $sql = "SELECT * FROM `$table` WHERE `$where` = '$data' LIMIT 1";
    echo $sql;
    return $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);
}

?>

<?php
//依照搜尋排列
function search($table, $where, $field, $order) {
    global $pdo;
    $sql_where = '';
    foreach ($where as $key => $value) {
        $sql_where = "`$key` = '$value'";
    }
    $sql = "SELECT * FROM `$table` WHERE " . $sql_where . " ORDER BY `$field` $order";
    // echo $sql;
    return $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);
}



?>