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
$k = 0;

while ($z < 3000) {

    if (empty($usermenuz[$z])) {

        break;
    } else {

        $non_array = array("쌀미음", "찹쌀미음", "한우미음", "한우미역미음", "한우병아리콩미음", "닭고기미음", "한우귀리미음", "닭고기찹쌀미음", "한우찹쌀미음", "한우현미미음", "닭고기귀리미음", "청경채미음", "비타민미음", "한우청경채미음", "닭고기청경채미음", "한우비타민미음", "닭고기비타민미음", "닭고기현미미음","닭고기시금치무른밥", "닭고기표고시금치무른밥(4)","닭고기표고시금치무른밥","비타민미음","청경채미음","닭고기수수아욱죽","닭고기수수아욱죽(4)","한우귀리미음","한우미역미음","한우현미미음","한우로메인미음","닭고기블루베리미음","한우양송이미역죽","흑미버섯미역무른밥","한우병아리콩미음","한우새송이비타민죽","한우청경채미음","한우현미청경채미음","현미청경채미음","한우비타민미음","닭고기차조청경채죽(4)","닭고기찹쌀느타리죽","닭고기찹쌀느타리죽(4)","한우미역귀리죽","한우미역귀리죽(4)","한우귀리비타민미음","닭고기현미미음","닭고기차조아욱죽(4)","닭고기비타민미음","닭고기표고시금치무른밥(4)","닭고기표고시금치덮밥(4)","흑미연두부미역죽","닭고기청경채미음","닭고기귀리미음","닭고기표고시금치렌틸콩덮밥(4)","귀리보미","비타민보미","청경채보미","귀리배보미","귀리비타민보미","귀리청경채보미","노란콩비타민보미","노란콩청경채보미","닭고기귀리배보미","닭고기귀리보미","닭고기귀리비타민보미","닭고기귀리사과보미","닭고기귀리청경채보미","닭고기배보미","닭고기비타민보미","닭고기찹쌀배보미","닭고기찹쌀보미","닭고기찹쌀비타민보미","닭고기찹쌀청경채보미","닭고기청경채보미","배노란콩보미","배비타민보미","배완두콩보미","배청경채보미","안심귀리배보미","안심귀리보미","안심귀리비타민보미","안심귀리청경채보미","안심배보미","안심비타민보미","안심찹쌀배보미","안심찹쌀보미","안심찹쌀비타민보미","안심찹쌀청경채보미","안심청경채보미","완두콩비타민보미","완두콩청경채보미","찹쌀비타민보미","찹쌀청경채보미","한우귀리배보미","한우귀리보미","한우귀리비타민보미","한우귀리청경채보미","한우배보미","한우비타민보미","한우찹쌀배보미","한우찹쌀보미","한우찹쌀비타민보미","한우찹쌀청경채보미","한우청경채보미","닭고기치즈아욱죽","닭고기느타리김죽","닭고기렌틸콩느타리죽","닭고기병아리콩근대죽","안심깻잎청경채죽","안심병아리콩근대죽","안심옥수수파래죽","안심검은콩사과죽","안심표고브루베리죽","한우깻잎청경채죽","한우병아리콩근대죽","한우옥수수파래죽","한우검은콩사과죽","한우표고브루베리죽","닭고기케일무른밥","닭고기참나물무른밥","닭고기시금치무른밥","닭고기근대무른밥","닭고기청경채무른밥","닭고기톳청경채무른밥","닭고기로메인무른밥","닭고기새송이무른밥","닭고기옥수수김무른밥","닭고기팥참나물무른밥","닭고기토마토근대무른밥","닭고기케일아몬드무른밥","닭고기목이시금치무른밥","닭고기테프근대무른밥","닭고기케일느타리무른밥","안심아욱무른밥","안심열무무른밥","안심봄동무른밥","안심팽이무른밥","안심미역무른밥","안심깻잎돌나물무른밥","안심세발나물옥수수무른밥","안심병아리콩양송이무른밥","안심열무토마토무른밥","안심검은콩봄동무른밥","안심홍미미역무른밥","안심깻잎아욱무른밥","안심옥수수김무른밥","안심새송이봄동무른밥","안심취나물무른밥","안심검은콩취나물무른밥","안심새송이취나물무른밥","흑미사과연두부무른밥","한우아욱무른밥","한우열무무른밥","한우돌나물무른밥","한우봄동무른밥","한우팽이무른밥","한우옥수수무른밥","한우미역무른밥","한우느타리무른밥","한우양송이무른밥","한우깻잎돌나물무른밥","한우세발나물옥수수무른밥","한우병아리콩양송이무른밥","한우열무토마토무른밥","한우검은콩봄동무른밥","한우홍미미역무른밥","한우깻잎아욱무른밥","한우옥수수김무른밥","한우새송이봄동무른밥","한우표고아욱무른밥","한우돌나물청경채무른밥","한우취나물무른밥","한우검은콩취나물무른밥","한우새송이취나물무른밥","닭고기열무볶은진밥","닭고기봄동볶은진밥","닭고기쪽파볶은진밥","닭고기팽이진밥","닭고기봄동느타리볶은진밥","닭고기봄동잣볶은진밥","닭고기목이팽이진밥","닭고기열무파래볶은진밥","닭고기봄동아몬드볶은진밥","닭고기팽이시금치진밥","닭고기부추진밥","닭고기취나물볶은진밥","닭고기취나물느타리볶은진밥","닭고기취나물잣볶은진밥","닭고기취나물아몬드볶은진밥","안심로메인볶은진밥","안심깻잎청경채진밥","안심아몬드케일볶은진밥","안심시금치토마토볶은진밥","흑미연두부새송이진밥","귀리표고치즈볶은진밥","한우케일볶은진밥","한우근대볶은진밥","한우청경채진밥","한우로메인볶은진밥","한우시금치볶은진밥","한우깻잎청경채진밥","한우아몬드케일볶은진밥","한우시금치토마토볶은진밥","한우팽이시금치진밥","한우청경채배진밥","한우청경채새송이진밥","현미과일퓨레","사과배젤리","블루베리배젤리","닭고기새송이부추국","닭고기봄동된장국","안심미역국&흑미밥","열무미역국","쪽파닭꼬치","안심열무미역국","쪽파닭꼬치&기장밥","한우미역국&흑미밥","한우열무미역국","취나물미역국","안심취나물미역국","한우취나물미역국","닭고기취나물된장국");
        $darray = array("김","닭고기","건미역","수수","연두부","차조","찹쌀","치즈","한우","현미","흑미","쌀가루","찹쌀가루","시금치","청경채","귀리","비타민","안심","완두콩가루","노란콩가루","쌀","강낭콩","보리","퀴노아","전분","현미가루","밀가루","검은콩가루","한천","바나나","표고","케일","돼지고기","병아리콩","근대","블루베리","아욱","양송이","렌틸콩","로메인","느타리","배추","새송이","돌나물","봄동","꺳잎","방울토마토","열무","건파래","취나물","참나물","부추","건톳","대추","아몬드","잣","건목이","쪽파","세발나물","루꼴라","팽이","홍미","들깨가루","참깨","호두","기장","팥가루","테프가루","제철나물");
        $sarray = array("감자","무","양배추","고구마","애호박","브로콜리","연근","오이","단호박","밤","사과","배","당근","비트","파프리카","양파","가지","콜라비","적채","우엉","피망");

        $menu_num_query = "SELECT jearyo1, jearyo2, jearyo3, jearyo4,jearyo5,jearyo6,jearyo7,jearyo8,jearyo9 FROM menutest WHERE menu = '$usermenuz[$z]'";
        $menu_num_result = mysqli_query($mysqli, $menu_num_query);
        $menu_num_row = mysqli_fetch_array($menu_num_result);
        $nums_rowz[$z] = $menu_num_row;

        $cpas[$z] = array_intersect($sarray, preg_replace("/[0-9]/", "", $nums_rowz[$z]));

        $counts[$z] = count($cpas[$z]);

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
                $not_array = array("아욱", "근대", "케일", "로메인", "비타민", "시금치", "청경채", "배추","새송이","표고","양송이");

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
                                    $csv_dump .= "(" . $num_count[$z] . "/".$counts[$z].")" . $num_rowz[$z] . ",";
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
                                    $csv_dump .= "(" . $num_count[$z] . "/".$counts[$z].")" . $num_rowz[$z] . ",";
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
                $csv_dump .= "(" . $num_count[$z] . "/".$counts[$z].")" . $num_rowz[$z] . ",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif ($num_code == "TM") {

                $tm_query = "SELECT * FROM shickrecipe WHERE menu = '$usermenuz[$z]'";
                $tm_result = mysqli_query($mysqli, $tm_query);
                $tm_row = mysqli_fetch_array($tm_result);

                $water_tm[$z] = $tm_row[plusmate];

                if ($water_tm[$z] == "") {
                    $water_tm[$z] = "채소류";
                }

                $csv_dump .= $usernamez[$z] . "님의,";
                $csv_dump .= $usermenuz[$z] . ",";
                $csv_dump .= $water_tm[$z] . ",";
                $csv_dump .= "포장일" . $today . ",";
                $csv_dump .= "(" . $num_count[$z] . "/".$counts[$z].")" . $num_rowz[$z] . ",";
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
                $csv_dump .= "(" . $num_count[$z] . "/".$counts[$z].")" . $num_rowz[$z] . ",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";
            }
            $z++;
        }
    }
}



header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename=' . $today . ' 물라벨.csv');

echo "\xEF\xBB\xBF";
echo $csv_dump;
