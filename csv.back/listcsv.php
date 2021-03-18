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
        $userwaterz[$z] = $user_row[water];
        $usermenuz[$z] = $user_row[$today];
        $z++;
    }
}

$csv_dump .= "고객명,오늘의메뉴,육수팩,재료1,재료2,재료3,재료4,재료5,재료6,재료7,재료8,재료9";
$csv_dump .= "\r\n";
$z = 0;
while ($z < 3000) {
    if (empty($usermenuz[$z])) {
        break;
    } else {

        if (strpos($usermenuz[$z], "미음") !== false) {

            $userwaterz[$z] = "";
        } else {
        }

        $realid[$z] = str_replace("-1", "", $useridz[$z]);
        $pear_query = "SELECT * FROM userbase WHERE userid = '$realid[$z]'";
        $pear_result = mysqli_query($mysqli, $pear_query);
        $pear_row = mysqli_fetch_array($pear_result);

        $code_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
        $code_result = mysqli_query($mysqli, $code_query);
        $code_row = mysqli_fetch_array($code_result);

        $code_rowz[$z] = $code_row[numbering];

        $num_code = preg_replace("/[^a-zA-Z]/", "", $code_rowz[$z]);

        $list_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
        $list_result = mysqli_query($mysqli, $list_query);
        $list_row = mysqli_fetch_array($list_result);

        $jearyo_1[$z] = $list_row[jearyo1];
        $jearyo_2[$z] = $list_row[jearyo2];
        $jearyo_3[$z] = $list_row[jearyo3];
        $jearyo_4[$z] = $list_row[jearyo4];
        $jearyo_5[$z] = $list_row[jearyo5];
        $jearyo_6[$z] = $list_row[jearyo6];
        $jearyo_7[$z] = $list_row[jearyo7];
        $jearyo_8[$z] = $list_row[jearyo8];
        $jearyo_9[$z] = $list_row[jearyo9];

        $csv_dump .= $usernamez[$z] . ",";
        $csv_dump .= $usermenuz[$z] . ",";


        if ($num_code == "DN") {
            $csv_dump .= $userwaterz[$z] . ",";
        } else {
            $csv_dump .= ",";
        }

        $csv_dump .= $jearyo_1[$z] . ",";
        $csv_dump .= $jearyo_2[$z] . ",";
        $csv_dump .= $jearyo_3[$z] . ",";
        $csv_dump .= $jearyo_4[$z] . ",";
        $csv_dump .= $jearyo_5[$z] . ",";
        $csv_dump .= $jearyo_6[$z] . ",";
        $csv_dump .= $jearyo_7[$z] . ",";
        $csv_dump .= $jearyo_8[$z] . ",";
        $csv_dump .= $jearyo_9[$z] . ",";
        $csv_dump .= "\r\n";
        $z++;
    }
}

header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename=' . $today . ' 발송명단.csv');
echo "\xEF\xBB\xBF";
echo $csv_dump;
