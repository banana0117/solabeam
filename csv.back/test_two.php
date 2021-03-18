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
$today = "2020-03-16";
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
$k = 0;

while ($z < 3000) {

    if (empty($usermenuz[$z])) {

        break;
    } else {

        $non_array = array("쌀미음", "찹쌀미음", "한우미음", "한우미역미음", "한우병아리콩미음", "닭고기미음", "한우귀리미음", "닭고기찹쌀미음", "한우찹쌀미음", "한우현미미음", "닭고기귀리미음", "청경채미음", "비타민미음", "한우청경채미음", "닭고기청경채미음", "한우비타민미음", "닭고기비타민미음", "닭고기현미미음");

        if (in_array($usermenuz[$z], $non_array)) {

            $z++;
        } else {

            $menu_num_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
            $menu_num_result = mysqli_query($mysqli, $menu_num_query);
            $menu_num_row = mysqli_fetch_array($menu_num_result);
            $num_rowz[$z] = $menu_num_row[numbering];
            $num_count[$z] = $menu_num_row[menucount];

            $num_code = preg_replace("/[^a-zA-Z]/", "", $num_rowz[$z]);

            if ($num_code == "SN") {

                $array = array("사과", "감자", "배", "고구마", "단호박", "비트", "바나나", "브로콜리", "밤", "애호박", "시금치", "파프리카", "양배추", "양송이", "새송이", "당근", "케일", "느타리", "오이", "방울토마토", "연근", "블루베리", "로메인", "무", "양파", "아몬드", "표고", "배추", "근대", "청경채", "파프리카");
                $after_etc = array("바나나");
                $not_array = array("아욱", "근대", "케일", "로메인", "비타민", "시금치", "청경채", "배추");

                $leaf_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
                $leaf_result = mysqli_query($mysqli, $leaf_query);
                $leaf_row = mysqli_fetch_array($leaf_result);
                $leaf_rows[$z] = $leaf_row;

                $inten[$z] = array_intersect($array, preg_replace("/[0-9]/", "", $leaf_rows[$z]));

                for ($k = 3; $k <= 8; $k = $k + 1) {

                    if (empty($leaf_row[$k])) {
                    } else {

                        $leaf_text[$k] = $leaf_row[$k];

                        if (in_array(preg_replace("/[0-9]/", "", $leaf_text[$k]), $array)) {

                            if (in_array(preg_replace("/[0-9]/", "", $leaf_text[$k]), $after_etc)) {
                                $after[$k] = "개";
                            } else {
                                $after[$k] = "g";
                            }

                            $max_num[$k] = preg_replace("/[^0-9]/", "", $leaf_text[$k]);
                            $max_text[$k] = preg_replace("/[0-9]/", "", $leaf_text[$k]);
                            $half_num[$k] = $max_num[$k] / 2;

                            if ($max_num[$k] >= 201) {

                                if (in_array(preg_replace("/[0-9]/", "", $leaf_text[$k]), $not_array)) {
                                } else {

                                    $csv_dump .= $usernamez[$z] . "님의,";
                                    $csv_dump .= $usermenuz[$z] . ",";
                                    $csv_dump .= $max_text[$k] . "" . $half_num[$k] . " " . $after[$k] . ",";
                                    $csv_dump .= "포장일" . $today . ",";
                                    $csv_dump .= "(" . $num_count[$z] . ")" . $num_rowz[$z] . ",";
                                    $csv_dump .= "도담밀,";
                                    $csv_dump .= "\r\n";
                                    $csv_dump .= $usernamez[$z] . "님의,";
                                    $csv_dump .= $usermenuz[$z] . ",";
                                    $csv_dump .= $max_text[$k] . "" . $half_num[$k] . " " . $after[$k] . ",";
                                    $csv_dump .= "포장일" . $today . ",";
                                    $csv_dump .= "(" . $num_count[$z] . ")" . $num_rowz[$z] . ",";
                                    $csv_dump .= "도담밀,";
                                    $csv_dump .= "\r\n";
                                }
                            } else {

                                if (in_array(preg_replace("/[0-9]/", "", $leaf_text[$k]), $not_array)) {
                                } else {

                                    $csv_dump .= $usernamez[$z] . "님의,";
                                    $csv_dump .= $usermenuz[$z] . ",";
                                    $csv_dump .= $leaf_text[$k] . " " . $after[$k] . ",";
                                    $csv_dump .= "포장일" . $today . ",";
                                    $csv_dump .= "(" . $num_count[$z] . ")" . $num_rowz[$z] . ",";
                                    $csv_dump .= "도담밀,";
                                    $csv_dump .= "\r\n";
                                }
                            }
                        }
                    }
                }
            } elseif ($num_code == "MN") {

                $mn_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
                $mn_result = mysqli_query($mysqli, $mn_query);
                $mn_row = mysqli_fetch_array($mn_result);

                $water_mn[$z] = $mn_row[period];

                if ($water_mn[$z] = "준비기") {
                    $waterml[$z] = "400ml";
                } elseif ($water_mn[$z] = "초기") {
                    $waterml[$z] = "400ml";
                } elseif ($water_mn[$z] = "중기") {
                    $waterml[$z] = "350ml";
                } elseif ($water_mn[$z] = "후기") {
                    $waterml[$z] = "400ml";
                } else {

                    if (strpos($usermenuz[$z], "볶은진밥") !== false) {
                        $waterml[$z] = "50ml";
                    } elseif (strpos($usermenuz[$z], "덮밥") !== false) {
                        $waterml[$z] = "200ml";
                    } else {
                        $waterml[$z] = "400ml";
                    }
                }

                $csv_dump .= $usernamez[$z] . "님의,";
                $csv_dump .= $usermenuz[$z] . ",";
                $csv_dump .= $waterml[$z] . ",";
                $csv_dump .= "포장일" . $today . ",";
                $csv_dump .= "(" . $num_count[$z] . ")" . $num_rowz[$z] . ",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif ($num_code == "TM") {

                //$tm_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
                //$tm_result = mysqli_query($mysqli, $tm_result);
                //$tm_row = mysqli_fetch_array($tm_result);

                //$water_tm[$z] = $tm_row[submate];

                $waterml[$z] = "완료기샘플";

                $csv_dump .= $usernamez[$z] . "님의,";
                $csv_dump .= $usermenuz[$z] . ",";
                $csv_dump .= "물 " . $waterml[$z] . ",";
                $csv_dump .= "포장일" . $today . ",";
                $csv_dump .= "(" . $num_count[$z] . ")" . $num_rowz[$z] . ",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {

                if (strpos($usermenuz[$z], "(4)") !== false) {
                    $waterml[$z] = "650ml";
                } else {
                    $waterml[$z] = "600ml";
                }

                $csv_dump .= $usernamez[$z] . "님의,";
                $csv_dump .= $usermenuz[$z] . ",";
                $csv_dump .= "물 " . $waterml[$z] . ",";
                $csv_dump .= "포장일" . $today . ",";
                $csv_dump .= "(" . $num_count[$z] . ")" . $num_rowz[$z] . ",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";
            }
            $z++;
        }
    }
}



header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename=' . $today . ' 사전설문조사.csv');

echo "\xEF\xBB\xBF";
echo $csv_dump;
