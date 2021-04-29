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
        $useridz[$z] = $user_row[userid];
        $usernamez[$z] = $user_row[name];
        $usermenuz[$z] = $user_row[$today];
        $z++;
    }

}


$csv_dump .= "고객명,메뉴명,재료,날짜,인증번호,산지,생산,일련번호,인증명,";
$csv_dump .= "\r\n";

$z = 0;
$k = 0;

while ($z<1600){

    if ( empty($usermenuz[$z])){

        break;

    } else {

        $array = array("아욱", "근대", "로메인", "비타민", "시금치", "청경채","배추","케일","블루베리","표고","새송이","양송이","대추");
        $menurray = array("청경채미음","비타민미음","한우비타민미음","한우청경채미음","닭고기비타민미음","닭고기청경채미음");

        $leaf_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
        $leaf_result = mysqli_query($mysqli, $leaf_query);
        $leaf_row = mysqli_fetch_array($leaf_result);
        $leaf_rows[$z] = $leaf_row;

        $inten[$z] = array_intersect($array, preg_replace("/[0-9]/", "", $leaf_rows[$z]));
        $intens[$z] = implode("", $inten[$z]);

            if ( $intens[$z] == "" ) {
                
                $z++;
                
            } elseif (in_array($intens[$z], preg_replace("/[0-9]/","",$leaf_rows[$z]))){
                $checkout[$z] = preg_replace("/[0-9]/","",$leaf_rows[$z]);
                $key[$z] = array_search($intens[$z], $checkout[$z]);
                $showout[$z] = preg_replace("/[^0-9]/","",$leaf_rows[$z]);
                $ssal[$z] .= $intens[$z]." ".$showout[$z][$key[$z]]."g";

                $acc_query = "SELECT * FROM acctest WHERE ingredients = '$intens[$z]'";
                $acc_result = mysqli_query($mysqli, $acc_query);
                $acc_row = mysqli_fetch_array($acc_result);

                $acc_name[$z] = $acc_row[accreditname];
                $acc_num[$z] = $acc_row[accreditnum];
                $acc_area[$z] = $acc_row[area];
                $acc_producer[$z] = $acc_row[producer];

                $menu_num_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
                $menu_num_result = mysqli_query($mysqli, $menu_num_query);
                $menu_num_row = mysqli_fetch_array($menu_num_result);
                $num_rowz[$z] = $menu_num_row[numbering];
                $num_count[$z] = $menu_num_row[menucount];

                if(in_array($usermenuz[$z],$menurray)){
                    $ssal[$z] .= "(물 600ml)";
                }

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= $ssal[$z].",";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $acc_num[$z].",";
                $csv_dump .= $acc_area[$z].",";
                $csv_dump .= $acc_producer[$z].",";
                $csv_dump .= "(".$num_count[$z].")".$num_rowz[$z].",";
                $csv_dump .= $acc_name[$z].",";
                $csv_dump .= "\r\n";
                $z++;
                
            } else {
                
                $z++;
                
            }


        
    }

}


header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename='.$today.' 잎채소라벨.csv');

echo "\xEF\xBB\xBF";
echo $csv_dump;

?>