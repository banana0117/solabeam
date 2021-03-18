<?php
$year = $_POST['reyear'];
$month = $_POST['remonth'];
$day = $_POST['reday'];

if ( empty ( $year ) ) {

    $cndate = $_POST['cndate'];

} else {

    $cndate = "$year"."-"."$month"."-"."$day";

}


    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$z = 0;
$today = $cndate;
//$add_day = "SELECT * FROM shicktest WHERE $today IS NOT NULL AND $today NOT LIKE '% %'";
$add_day = "SELECT * FROM shicktest WHERE ifnull($today,0) > ' ' ORDER BY name ASC ";
//$add_day = "SELECT * FROM shicktest WHERE NULLIF($today, ' ') IS NULL;
$day_result = mysqli_query($mysqli, $add_day);
while($user_row = mysqli_fetch_array($day_result)){

if ( empty($user_row[$today] ) ) {
}
else {
$useridz[$z] = str_replace("-1","",$user_row[userid]);
$z++;
}

}


//엑셀쿼리


$delivery_dump = "도담밀멤버십";

$csv_dump .= "시기,일련번호,메뉴,재료1,재료2,재료3,재료4,재료5,재료6,탄수화물,단백질,지방,칼로리,";
$csv_dump .= "\r\n";

$z=0;



$sql = "SELECT * FROM menutest WHERE 1";
$sql_result = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_array($sql_result)) {

    $csv_dump .= $row[0].",";
    $csv_dump .= $row[1].",";
    $csv_dump .= $row[2].",";
    $csv_dump .= $row[3].",";
    $csv_dump .= $row[4].",";
    $csv_dump .= $row[5].",";
    $csv_dump .= $row[6].",";
    $csv_dump .= $row[7].",";
    $csv_dump .= $row[8].",";
    $csv_dump .= $row[9].",";
    $csv_dump .= $row[10].",";
    $csv_dump .= $row[11].",";
    $csv_dump .= $row[12].",";    
    $csv_dump .= "\r\n";

}



header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename='.$today.' 메뉴목록.csv');

echo "\xEF\xBB\xBF";
echo $csv_dump;

?>



