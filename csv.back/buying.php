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
$add_day = "(SELECT * FROM shicktest WHERE ifnull($today,0) > ' ') UNION (SELECT * FROM snacktable WHERE ifnull($today,0) > ' ') ORDER BY name ASC";
//$add_day = "SELECT * FROM shicktest WHERE NULLIF($today, ' ') IS NULL;
$day_result = mysqli_query($mysqli, $add_day);
while($user_row = mysqli_fetch_array($day_result)){
    if ( empty($user_row[$today] ) ) {
    }
    else {
        $usermenuz[$z] = $user_row[$today];
        $z++;
    }
}
$csv_dump .= "재료명,필요량,구매량,";
$csv_dump .= "\r\n";
$z=0;
$i=0;

$mate_query = "SELECT * FROM buying";
$mate_result = mysqli_query($mysqli,$mate_query);
while($mate_row = mysqli_fetch_array($mate_result)){
    $array[] = $mate_row[matename];
    $per_array[] = $mate_row[per];
}

$count = count($array);

while ($z<3000){
    if ( empty($usermenuz[$z])){
        break;
    } else {

        $dou_menu_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
        $dou_menu_result = mysqli_query($mysqli, $dou_menu_query);
        $dou_menu_row = mysqli_fetch_array($dou_menu_result);

        $dou_obj[$i] = $dou_menu_row;

        $x = 0;

        while($x<$count){
            
            $mate[$x] = $array[$x];
            $per[$x] = $per_array[$x];

            if(in_array($mate[$x], preg_replace("/[0-9]/","",$dou_obj[$i]))){

                $checkout[$i] = preg_replace("/[0-9]/","",$dou_obj[$i]);
                $key[$i] = array_search($mate[$x], $checkout[$i]);
                $showout[$i] = preg_replace("/[^0-9]/","",$dou_obj[$i]);
                $mates[$x] = $mates[$x] + $showout[$i][$key[$i]];

            }

            $x++;

        }

        $z++;
        $i++;

    }
}

        $c = 0;

        while($c<$count){
            
            $csv_dump .= $mate[$c].",";
            $csv_dump .= $mates[$c].",";

            $per_mate[$c] = $mates[$c] * $per[$c];

            $csv_dump .= $per_mate[$c].",";
            $csv_dump .= "\r\n";

            $c++;

        }





header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename='.$today.' 구매목록.csv');
echo "\xEF\xBB\xBF";
echo $csv_dump;
?>