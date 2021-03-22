<?php
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
if($mysqli->connect_errno) die('Connect failed: '.$mysqli->connect_error);
if(!$mysqli->set_charset('utf8')) die('Error loading character set utf8: '.$mysqli->error);




//레코드 배열 작성 및 넘버링
function query_arr($qry) {
    global $mysqli;
    $result = $mysqli->query($qry);
    if($result === false) die("Query: [[ $qry ]] → Error: ".$mysqli->error);
    $arr = array();
    while($row = $result->fetch_array(MYSQLI_NUM)) $arr[] = $row[0];
    return $arr;
}

//DB import query임
function insert_rows($arr, $table_name, $mode='APPLY') {
    global $mysqli;
    foreach($arr as $rows) {

        $keys = array_keys($rows); // 입력된 배열에 있는 키값 분리
        $keys = array_map(array($mysqli,'real_escape_string'),$keys); // 키값 string 보안처리
        $keys = array_map('single_quotess', $keys); // keys 에 대한 insert 구문 콜백
        $values = array_values($rows); // 배열값 value 분리
        $values = array_map(array($mysqli,'real_escape_string'),$values); // 내용값 string 보안처리
        $values = array_map('single_quotes', $values); // values 에 대한 insert 구문 콜백

 

        $keys_str = implode(',', $keys); // 각 키값 구분
        $values_str = implode(',', $values); // 각 values값 구분

        if($mode == 'TEST') echo "INSERT INTO $table_names ($keys_str) VALUES ($values_str);<br/>"; // mode가 TEST mode 일때 query 텍스트 출력
        else query("INSERT INTO `$table_name`($keys_str) VALUES ($values_str);"); // mode가 APPLY 일때 query 구문 입력
    }

mysqli_close($mysqli);

}

function delete_rows($table_name){
global $mysqli;
query("DELETE FROM $table_name;");
}


function query_rows($qry) {
    global $mysqli;
    $result = $mysqli->query($qry);
    if($result === false) die("Query: [[ $qry ]] → Error: ".$mysqli->error);
    $rows= array();
    eval('while(@$row = $result->fetch_assoc()) array_push($rows, $row);');
    return $rows;
}

function query_row($qry) {
    $rows = query_rows($qry);
    if(count($rows)<1) return false;
    return $rows[0];
}

function query_values($qry) {
    global $mysqli;
    $result = $mysqli->query($qry);
    if($result === false) die("Query: [[ $qry ]] → Error: ".$mysqli->error);
    $arr = array();
    while($row = $result->fetch_row()) $arr[] = $row[0];
    return $arr;
}

function query_one($qry) {
    global $mysqli;
    $result = $mysqli->query($qry);
    if($result === false) die("Query: [[ $qry ]] → Error: ".$mysqli->error);
    $row = $result->fetch_row();
    if(count($row)<1) return false;
    return $row[0];
}

function query($qry) {
    global $mysqli;
    $result = $mysqli->query($qry);
    if($result === false) die("Query: [[ $qry ]] → Error: ".$mysqli->error);
    return $result ;
}

//DB로 넘어가는 쿼리의 string보안
function my_escape($str) {
    global $mysqli;
    return $mysqli->real_escape_string($str);
}

function insert_id() {
    global $mysqli;
    return $mysqli->insert_id;
}

//DB에 추가되는 항목들의 값을 고정시켜줌
function single_quotes($value) {
    return "'$value'";
}

//DB에 추가되는 항목들의 컬럼을 고정시켜줌
function single_quotess($keys) {
    return "`$keys`";
}


function print_rows($rows) {
    echo "<table><tr>";
    foreach($rows[0] as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr>";
    foreach($rows as $row) {
        echo "<tr>";
        foreach($row as $key => $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}


//DB import update query임
function insert_rows($arr, $table_name, $mode='APPLY') {
    global $mysqli;
    foreach($arr as $rows) {

        $keys = array_keys($rows); // 입력된 배열에 있는 키값 분리
        $keys = array_map(array($mysqli,'real_escape_string'),$keys); // 키값 string 보안처리
        $keys = array_map('single_quotess', $keys); // keys 에 대한 insert 구문 콜백
        $values = array_values($rows); // 배열값 value 분리
        $values = array_map(array($mysqli,'real_escape_string'),$values); // 내용값 string 보안처리
        $values = array_map('single_quotes', $values); // values 에 대한 insert 구문 콜백

 

        $keys_str = implode(',', $keys); // 각 키값 구분
        $values_str = implode(',', $values); // 각 values값 구분

        if($mode == 'TEST') echo "INSERT INTO $table_names ($keys_str) VALUES ($values_str);<br/>"; // mode가 TEST mode 일때 query 텍스트 출력
        else query("UPDATE `$table_name` SET ($keys_str) VALUES ($values_str);"); // mode가 APPLY 일때 query 구문 입력
    }

mysqli_close($mysqli);

}



?>