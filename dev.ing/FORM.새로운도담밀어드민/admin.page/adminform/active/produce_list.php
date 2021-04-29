<?php
include 'mysqli.php';


$year = $_POST['reyear'];
$month = $_POST['remonth'];
$day = $_POST['reday'];

if (empty($year)) {

    $cndate = $_POST['cndate'];
} else {

    $cndate = "$year" . "-" . "$month" . "-" . "$day";
}

$z = 0;
$today = $cndate;
//$add_day = "SELECT * FROM shicktest WHERE $today IS NOT NULL AND $today NOT LIKE '% %'";
$add_day = "(SELECT `$today` FROM shicktest WHERE ifnull($today,0) > ' ') UNION (SELECT `$today` FROM snacktable WHERE ifnull($today,0) > ' ')";
//$add_day = "SELECT * FROM shicktest WHERE NULLIF($today, ' ') IS NULL;
$day_result = mysqli_query($mysqli, $add_day);
while ($user_row = mysqli_fetch_array($day_result)) {

    if (empty($user_row[$today])) {
    } else {

        $usermenuz[$z] = $user_row[$today];

        $z++;
    }
}

$csv_dump .= "일련번호,메뉴명,재료1,재료2,재료3,재료4,재료5,재료6,";
$csv_dump .= "\r\n";
$z = 0;



while ($z < 3000) {
    if (empty($usermenuz[$z])) {

        break;
    } else {

        $list_query = "SELECT numbering FROM menutest WHERE menu = '$usermenuz[$z]' ORDER BY numbering ASC";
        $list_result = mysqli_query($mysqli, $list_query);
        $list_row = mysqli_fetch_array($list_result);

        $produce_num[$z] = $list_row[numbering];

        $numbering_query = "SELECT * FROM menutest WHERE numbering = '$produce_num[$z]' ORDER BY numbering ASC";
        $numbering_result = mysqli_query($mysqli, $numbering_query);
        $numbering_row = mysqli_fetch_array($numbering_result);

        $menuz[$z] = $numbering_row[menu];
        $jearyo_1[$z] = $numbering_row[jearyo1];
        $jearyo_2[$z] = $numbering_row[jearyo2];
        $jearyo_3[$z] = $numbering_row[jearyo3];
        $jearyo_4[$z] = $numbering_row[jearyo4];
        $jearyo_5[$z] = $numbering_row[jearyo5];
        $jearyo_6[$z] = $numbering_row[jearyo6];

        $array = array("닭고기","한우","안심","돼지고기","쌀", "쌀가루", "찹쌀가루", "아몬드", "잣", "들깨가루", "참깨", "호두", "전분", "밀가루", "테프가루", "완두콩가루", "노란콩가루", "강낭콩", "검은콩가루", "팥가루", "김", "건미역", "한천", "건파래", "건톳", "수수", "차조", "찹쌀", "현미", "흑미", "귀리", "보리", "퀴노아", "현미가루", "병아리콩", "홍미", "기장", "렌틸콩", "시금치", "청경채", "비타민", "표고", "케일", "근대", "블루베리", "아욱", "양송이", "로메인", "느타리", "새송이", "돌나물", "봄동", "깻잎", "방울토마토", "취나물", "참나물", "부추", "대추", "건목이", "쪽파", "세발나물", "루꼴라", "팽이", "건고사리","연두부","치즈");

        if (in_array(preg_replace("/[0-9]/", "", $jearyo_1[$z]), $array)) {
            $jearyo_1[$z] = "";
        } else {
        }

        if (in_array(preg_replace("/[0-9]/", "", $jearyo_2[$z]), $array)) {
            $jearyo_2[$z] = "";
        } else {
        }

        if (in_array(preg_replace("/[0-9]/", "", $jearyo_3[$z]), $array)) {
            $jearyo_3[$z] = "";
        } else {
        }

        if (in_array(preg_replace("/[0-9]/", "", $jearyo_4[$z]), $array)) {
            $jearyo_4[$z] = "";
        } else {
        }

        if (in_array(preg_replace("/[0-9]/", "", $jearyo_5[$z]), $array)) {
            $jearyo_5[$z] = "";
        } else {
        }

        if (in_array(preg_replace("/[0-9]/", "", $jearyo_6[$z]), $array)) {
            $jearyo_6[$z] = "";
        } else {
        }


        if (empty($jearyo_1[$z])) {
            $jearyo_1[$z] = $jearyo_2[$z];
            $jearyo_2[$z] = "";
        }

        if (empty($jearyo_2[$z])) {
            $jearyo_2[$z] = $jearyo_3[$z];
            $jearyo_3[$z] = "";
        }

        if (empty($jearyo_3[$z])) {
            $jearyo_3[$z] = $jearyo_4[$z];
            $jearyo_4[$z] = "";
        }

        if (empty($jearyo_4[$z])) {
            $jearyo_4[$z] = $jearyo_5[$z];
            $jearyo_5[$z] = "";
        }

        if (empty($jearyo_5[$z])) {
            $jearyo_5[$z] = $jearyo_6[$z];
            $jearyo_6[$z] = "";
        }

        if (empty($jearyo_6[$z])) {
            $jearyo_6[$z] = "";
        }

        if (empty($jearyo_1[$z])) {
            $jearyo_1[$z] = $jearyo_2[$z];
            $jearyo_2[$z] = "";
        }

        if (empty($jearyo_2[$z])) {
            $jearyo_2[$z] = $jearyo_3[$z];
            $jearyo_3[$z] = "";
        }

        if (empty($jearyo_3[$z])) {
            $jearyo_3[$z] = $jearyo_4[$z];
            $jearyo_4[$z] = "";
        }

        if (empty($jearyo_4[$z])) {
            $jearyo_4[$z] = $jearyo_5[$z];
            $jearyo_5[$z] = "";
        }

        if (empty($jearyo_5[$z])) {
            $jearyo_5[$z] = $jearyo_6[$z];
            $jearyo_6[$z] = "";
        }

        if (empty($jearyo_6[$z])) {
            $jearyo_6[$z] = "";
        }

        if (empty($jearyo_1[$z]) && empty($jearyo_2[$z]) && empty($jearyo_3[$z]) && empty($jearyo_4[$z]) && empty($jearyo_5[$z]) && empty($jearyo_6[$z])) {
            $z++;
        } else {

            $csv_dump .= $produce_num[$z] . ",";
            $csv_dump .= $menuz[$z] . ",";
            $csv_dump .= $jearyo_1[$z] . ",";
            $csv_dump .= $jearyo_2[$z] . ",";
            $csv_dump .= $jearyo_3[$z] . ",";
            $csv_dump .= $jearyo_4[$z] . ",";
            $csv_dump .= $jearyo_5[$z] . ",";
            $csv_dump .= $jearyo_6[$z] . ",";
            $csv_dump .= "\r\n";
            $z++;
        }
    }
}

header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename=' . $today . ' 생산목록.csv');
echo "\xEF\xBB\xBF";
echo $csv_dump;
