<?php
$year = $_POST['reyear'];
$month = $_POST['remonth'];
$day = $_POST['reday'];

if (empty($year)) {

    $cndate = $_POST['cndate'];
} else {

    $cndate = "$year" . "-" . "$month" . "-" . "$day";
}

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$z = 0;
$today = $cndate;
//$add_day = "SELECT * FROM shicktest WHERE $today IS NOT NULL AND $today NOT LIKE '% %'";
$add_day = "(SELECT * FROM shicktest WHERE ifnull($today,0) > ' ') UNION (SELECT * FROM snacktable WHERE ifnull($today,0) > ' ') ORDER BY name ASC";
//$add_day = "SELECT * FROM shicktest WHERE NULLIF($today, ' ') IS NULL;
$day_result = mysqli_query($mysqli, $add_day);
while ($user_row = mysqli_fetch_array($day_result)) {
    if (empty($user_row[$today])) {
    } else {
        $useridz[$z] = $user_row[userid];
        $usernamez[$z] = $user_row[name];
        $usermenuz[$z] = $user_row[$today];
        $z++;
    }
}
$csv_dump .= "고객명,메뉴명,재료,날짜,일련번호,인증명,";
$csv_dump .= "\r\n";
$z = 0;
while ($z < 3000) {

    if (empty($usermenuz[$z])) {

        break;
    } else {

        $array = array("쌀","쌀가루","찹쌀가루");
        $etc_array = array("아몬드","잣","들깨가루","참깨","호두","전분","밀가루","테프가루","완두콩가루","노란콩가루","강낭콩","검은콩가루","팥가루","김","건미역","한천","건파래","건톳","찹쌀가루");
        $side_array = array("수수","차조","찹쌀","현미","흑미","귀리","보리","퀴노아","현미가루","병아리콩","홍미","기장","렌틸콩");
        $menurray = array("찹쌀미음","한우미음","한우미역미음","한우병아리콩미음","닭고기미음","한우귀리미음","닭고기찹쌀미음","한우찹쌀미음","한우현미미음","닭고기귀리미음","쌀미음");

        $leaf_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
        $leaf_result = mysqli_query($mysqli, $leaf_query);
        $leaf_row = mysqli_fetch_array($leaf_result);
        $leaf_rows[$z] = $leaf_row;

        $inten[$z] = array_intersect($array, preg_replace("/[0-9]/", "", $leaf_rows[$z]));
        $intens[$z] = implode(",", $inten[$z]);
        $intene[$z] = explode(",", $intens[$z]);
        $intenz[$z] = count($intene[$z]);

        $inten_2[$z] = array_intersect($etc_array, preg_replace("/[0-9]/", "", $leaf_rows[$z]));
        $intens_2[$z] = implode(",", $inten_2[$z]);
        $intene_2[$z] = explode(",", $intens_2[$z]);
        $intenz_2[$z] = count($intene_2[$z]);

        $inten_3[$z] = array_intersect($side_array, preg_replace("/[0-9]/", "", $leaf_rows[$z]));
        $intens_3[$z] = implode(",", $inten_3[$z]);
        $intene_3[$z] = explode(",", $intens_3[$z]);
        $intenz_3[$z] = count($intene_3[$z]);

        if ($intens[$z] == "") {

            $z++;

        } else {

            if ($intene[$z][0] == "") {
                $z++;
            } else {

                $checkout[$z] = preg_replace("/[0-9]/", "", $leaf_rows[$z]);
                $key[$z] = array_search($intene[$z][0], $checkout[$z]);
                $showout[$z] = preg_replace("/[^0-9]/", "", $leaf_rows[$z]);
                $ssal[$z] = $intene[$z][0] . " " . $showout[$z][$key[$z]] . "g";

                //$intenacc[$z] = $intene[$z][0];

                //$acc_query = "SELECT * FROM acctest WHERE ingredients = '$intenacc[$z]'";
                //$acc_result = mysqli_query($mysqli, $acc_query);
                //$acc_row = mysqli_fetch_array($acc_result);

                //$acc_name[$z] = $acc_row[accreditname];
                //$acc_num[$z] = $acc_row[accreditnum];
                //$acc_area[$z] = $acc_row[area];
                //$acc_producer[$z] = $acc_row[producer];

                $menu_num_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
                $menu_num_result = mysqli_query($mysqli, $menu_num_query);
                $menu_num_row = mysqli_fetch_array($menu_num_result);
                $num_rowz[$z] = $menu_num_row[numbering];
                $num_count[$z] = $menu_num_row[menucount];

                if(in_array($intens_3[$z],$side_array)){
                    $checkout_3[$z] = preg_replace("/[0-9]/","",$leaf_rows[$z]);
                    $key_3[$z] = array_search($intens_3[$z], $checkout_3[$z]);
                    $showout_3[$z] = preg_replace("/[^0-9]/","",$leaf_rows[$z]);

                    if($checkout_3[$z] == "김"){
                        $after[$z] = "장";
                    } else {
                        $after[$z] = "g";
                    }

                    $ssal[$z] .= "+".$intens_3[$z]." ".$showout_3[$z][$key_3[$z]]."".$after[$z];
                }

                if (in_array($usermenuz[$z], $menurray)) {
                    $ssal[$z] .= "(물 600ml)";

                }

                $csv_dump .= $usernamez[$z] . "님의,";
                $csv_dump .= $usermenuz[$z] . ",";
                $csv_dump .= $ssal[$z] . ",";
                $csv_dump .= "포장일" . $today . ",";
                //$csv_dump .= $acc_num[$z] . ",";
                //$csv_dump .= $acc_area[$z] . ",";
                //$csv_dump .= $acc_producer[$z] . ",";
                $csv_dump .= "(" . $num_count[$z] . ")" . $num_rowz[$z] . ",";
                //$csv_dump .= $acc_name[$z] . ",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

                $etc = 0;

                if($intene_2[$z][0] == ""){
                    
                } else {

                while($etc < $intenz_2[$z]){

                    $checkout_2[$etc] = preg_replace("/[0-9]/", "", $leaf_rows[$z]);
                    $key_2[$etc] = array_search($intene_2[$z][$etc], $checkout_2[$etc]);
                    $showout_2[$etc] = preg_replace("/[^0-9]/", "", $leaf_rows[$z]);

                    if($intene_2[$z][$etc] == "김"){
                        $after[$etc] = "장";
                    } else {
                        $after[$etc] = "g";
                    }

                    $ssal_2[$etc] = $intene_2[$z][$etc] . " " . $showout_2[$etc][$key_2[$etc]] . "".$after[$etc];

                    //$intenacc_2[$etc] = $intene_2[$z][$etc];

                    //$acc_query_2 = "SELECT * FROM acctest WHERE ingredients = '$intenacc_2[$etc]'";
                    //$acc_result_2 = mysqli_query($mysqli, $acc_query_2);
                    //$acc_row_2 = mysqli_fetch_array($acc_result_2);
    
                    //$acc_name_2[$etc] = $acc_row_2[accreditname];
                    //$acc_num_2[$etc] = $acc_row_2[accreditnum];
                    //$acc_area_2[$etc] = $acc_row_2[area];
                    //$acc_producer_2[$etc] = $acc_row_2[producer];

                    $csv_dump .= $usernamez[$z] . "님의,";
                    $csv_dump .= $usermenuz[$z] . ",";
                    $csv_dump .= $ssal_2[$etc] . ",";
                    $csv_dump .= "포장일" . $today . ",";
                    //$csv_dump .= $acc_num_2[$etc] . ",";
                    //$csv_dump .= $acc_area_2[$etc] . ",";
                    //$csv_dump .= $acc_producer_2[$etc] . ",";
                    $csv_dump .= "(" . $num_count[$z] . ")" . $num_rowz[$z] . ",";
                    //$csv_dump .= $acc_name_2[$etc] . ",";
                    $csv_dump .= "도담밀,";
                    $csv_dump .= "\r\n";

                    $etc++;

                }}

                $z++;
            }

        }
    }
}

header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename=' . $today . ' 쌀라벨.csv');
echo "\xEF\xBB\xBF";
echo $csv_dump;
