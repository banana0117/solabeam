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


$csv_dump .= "설문조사일,유저ID,이름,아기이름,성별,개월수,생일,시기,체중,키,전화번호,수유방법,수유량,가족력,기존이유식알러지,특이사항,다른특이사항,병원특이사항,바라는점,먹어본재료,";
$csv_dump .= "\r\n";

$z=0;

$obj = "object";

$pre_query = "SELECT * FROM presearch WHERE date = '$cndate' ORDER BY date DESC";
$pre_result = mysqli_query($mysqli,$pre_query);
while ($pre_row = mysqli_fetch_array($pre_result)){

            $csv_dump .= $pre_row[date].",";
            $csv_dump .= $pre_row[userid].",";
            $csv_dump .= $pre_row[usernames].",";
            $csv_dump .= $pre_row[babyname].",";
            $csv_dump .= $pre_row[gender].",";
            $csv_dump .= $pre_row[monthly].",";
            $csv_dump .= $pre_row[birthday].",";
            $csv_dump .= "=\"".$pre_row[phone]."\",";
            $csv_dump .= $pre_row[weight].",";
            $csv_dump .= $pre_row[height].",";
            $csv_dump .= $pre_row[phone].",";
            $csv_dump .= $pre_row[milk].",";
            $csv_dump .= $pre_row[nursing].",";
            $csv_dump .= $pre_row[family].",";
            $csv_dump .= $pre_row[eusikall].",";
            $csv_dump .= $pre_row[unusual].",";
            $csv_dump .= $pre_row[otherunusual].",";
            $csv_dump .= $pre_row[hospitalunusual].",";
            $csv_dump .= $pre_row[wish].",";
            $csv_dump .= $pre_row[$obj].",";
            $csv_dump .= "\r\n";

}





header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename='.$today.' 사전설문조사.csv');

echo "\xEF\xBB\xBF";
echo $csv_dump;

?>