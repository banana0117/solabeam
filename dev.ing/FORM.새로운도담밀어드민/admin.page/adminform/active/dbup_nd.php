
<?php

include 'lib_my.php';
include 'lib_arr.php';

echo "$db_pass";

$action = '';
if(isset($_POST['action']))$action = $_POST['action'];

//폼이 입력되었을 때 처리부분
if($action == 'form_submit') {
    $table_name = trim($_POST['table_name']);

    //엑셀 자료를 행으로 나누기
    $rows = explode("\n", $_POST['excel_text']);
    for($i=0; $i<count($rows);$i++) {
        //공백만 있는 줄은 완전히 비움
        if(trim($rows[$i])=='')$rows[$i]='';
        else {
            //열로 나누기
            $rows[$i] = explode("\t", $rows[$i]);
            $rows[$i] = array_map('trim', $rows[$i]);
        }
    }

    //빈 줄 제거
    $rows = array_filter($rows);

    //첫줄에서 컬럼명 추출
    $colnames = $rows[0];
    array_splice($rows, 0, 1);

    //배열로 정리
    for($i=0;$i<count($rows);$i++) {
        $rows[$i] = array_combine($colnames, $rows[$i]);
    }


    //배열을 DB테이블로 삽입
    insert_rows($rows, $table_name);

echo '<p>성공입니다 <a href="https://dodammeal.com/wp-content/themes/storefront-child/dodamform.php">여기</a>를 눌러 이동하세요</p>';

    exit;
}

?>
