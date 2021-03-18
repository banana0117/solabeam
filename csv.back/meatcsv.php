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
$csv_dump .= "고객명,메뉴명,재료,날짜,인증번호,산지,생산자,일련번호,인증명,";
$csv_dump .= "\r\n";

$z = 0;
$k = 0;

while ($z < 3000) {

    if (empty($usermenuz[$z])) {

        break;
    } else {

        $array = array("한우","안심","돼지고기","닭고기");

        $leaf_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
        $leaf_result = mysqli_query($mysqli, $leaf_query);
        $leaf_row = mysqli_fetch_array($leaf_result);
        $leaf_rows[$z] = $leaf_row;

        $inten[$z] = array_intersect($array, preg_replace("/[0-9]/", "", $leaf_rows[$z]));
        $intens[$z] = implode(",", $inten[$z]);
        $intene[$z] = explode(",", $intens[$z]);
        $intenz[$z] = count($intene[$z]);

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

                $intenacc[$z] = $intene[$z][0];

                $acc_query = "SELECT * FROM acctest WHERE ingredients = '$intenacc[$z]'";
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

                $csv_dump .= $usernamez[$z] . "님의,";
                $csv_dump .= $usermenuz[$z] . ",";
                $csv_dump .= $ssal[$z] . ",";
                $csv_dump .= "포장일" . $today . ",";
                $csv_dump .= $acc_num[$z] . ",";
                $csv_dump .= $acc_area[$z] . ",";
                $csv_dump .= $acc_producer[$z] . ",";
                $csv_dump .= "(" . $num_count[$z] . ")" . $num_rowz[$z] . ",";
                $csv_dump .= $acc_name[$z] . ",";
                $csv_dump .= "\r\n";
                
                $z++;
            }

                
            

        }
    }
}


header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename='.$today.' 고기라벨.csv');
echo "\xEF\xBB\xBF";
echo $csv_dump;
?>