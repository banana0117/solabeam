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
}$csv_dump .= "고객명,메뉴명,재료,날짜,일련번호,인증명,";
$csv_dump .= "\r\n";
$z=0;
while ($z<3000){
    if ( empty($usermenuz[$z])){
        break;
    } else {

        $menu_num_query = "SELECT numbering FROM menutest WHERE menu = '$usermenuz[$z]'";
        $menu_num_result = mysqli_query($mysqli, $menu_num_query);
        $menu_num_row = mysqli_fetch_array($menu_num_result);
        $num_rowz[$z] = $menu_num_row[numbering];

        if (strpos($usermenuz[$z],"미음") !== false ){

            if ($usermenuz[$z] == "찹쌀미음"){
                $ssal[$z] = "물600ml(찹쌀가루40g)";
            } elseif ($usermenuz[$z] == "한우미음" ){
                $ssal[$z] = "물600ml(쌀가루40g)";
            } elseif ($usermenuz[$z] == "한우미역미음" ){
                $ssal[$z] = "물600ml(쌀가루40g)";
            } elseif ($usermenuz[$z] == "한우병아리콩미음" ){
                $ssal[$z] = "물600ml(쌀가루40g+병아리콩10g)";
            } elseif ($usermenuz[$z] == "닭고기미음" ){
                $ssal[$z] = "물600ml(쌀가루40g)";
            } elseif ($usermenuz[$z] == "한우귀리미음" ){
                $ssal[$z] = "물600ml(쌀가루40g+귀리6g)";
            } elseif ($usermenuz[$z] == "닭고기찹쌀미음" ){
                $ssal[$z] = "물600ml(찹쌀가루40g)";
            } elseif ($usermenuz[$z] == "한우찹쌀미음" ){
                $ssal[$z] = "물600ml(찹쌀가루40g)";
            } elseif ($usermenuz[$z] == "한우현미미음" ){
                $ssal[$z] = "물600ml(쌀가루40g+현미6g)";
            } elseif ($usermenuz[$z] == "닭고기귀리미음" ){
                $ssal[$z] = "물600ml(쌀가루40g+귀리6g)";
            } elseif ($usermenuz[$z] == "닭고기현미미음" ){
                $ssal[$z] = "물600ml(쌀가루40g+현미6g)";
            } elseif ($usermenuz[$z] == "쌀미음" ){
                $ssal[$z] = "물600ml(쌀가루40g)";

            } elseif (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "찹쌀가루40g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀가루40g+귀리6g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀가루40g+현미6g";
            } else {
                $ssal[$z] = "쌀가루40g";
            }

            $csv_dump .= $usernamez[$z] . "님의,";
            $csv_dump .= $usermenuz[$z] . ",";
            $csv_dump .= $ssal[$z] . ",";
            $csv_dump .= "포장일" . $today . ",";
            $csv_dump .= $num_rowz[$z] . ",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "미역") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "미역 2g,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif (strpos($usermenuz[$z], "김") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "김 1장,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {}

        } elseif (strpos($usermenuz[$z], "죽(4)") !== false ) {
            if (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "쌀60g+찹쌀12g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀60g+귀리12g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀60g+현미12g";
            } elseif (strpos($usermenuz[$z], "흑미") !== false ){
                $ssal[$z] = "쌀60g+흑미12g";
            } elseif (strpos($usermenuz[$z], "퀴노아") !== false ){
                $ssal[$z] = "쌀60g+퀴노아12g";
            } elseif (strpos($usermenuz[$z], "차조") !== false ){
                $ssal[$z] = "쌀60g+차조12g";
            } elseif (strpos($usermenuz[$z], "수수") !== false ){
                $ssal[$z] = "쌀60g+수수12g";
            } elseif (strpos($usermenuz[$z], "병아리콩") !== false ){
                $ssal[$z] = "쌀60g+병아리콩20g";
            } elseif (strpos($usermenuz[$z], "렌틸콩") !== false ){
                $ssal[$z] = "쌀60g+렌틸콩20g";
            } else {
                $ssal[$z] = "쌀60g";
            }

            $csv_dump .= $usernamez[$z] . "님의,";
            $csv_dump .= $usermenuz[$z] . ",";
            $csv_dump .= $ssal[$z] . ",";
            $csv_dump .= "포장일" . $today . ",";
            $csv_dump .= $num_rowz[$z] . ",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "미역") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "미역 2g,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif (strpos($usermenuz[$z], "김") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "김 1장,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {}

        } elseif (strpos($usermenuz[$z], "죽") !== false ) {
            if (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "쌀45g+찹쌀9g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀45g+귀리9g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀45g+현미9g";
            } elseif (strpos($usermenuz[$z], "흑미") !== false ){
                $ssal[$z] = "쌀45g+흑미9g";
            } elseif (strpos($usermenuz[$z], "퀴노아") !== false ){
                $ssal[$z] = "쌀45g+퀴노아9g";
            } elseif (strpos($usermenuz[$z], "차조") !== false ){
                $ssal[$z] = "쌀45g+차조9g";
            } elseif (strpos($usermenuz[$z], "수수") !== false ){
                $ssal[$z] = "쌀45g+수수9g";
            } elseif (strpos($usermenuz[$z], "병아리콩") !== false ){
                $ssal[$z] = "쌀45g+병아리콩20g";
            } elseif (strpos($usermenuz[$z], "렌틸콩") !== false ){
                $ssal[$z] = "쌀45g+렌틸콩20g";
            } else {
                $ssal[$z] = "쌀45g";
            }

            $csv_dump .= $usernamez[$z] . "님의,";
            $csv_dump .= $usermenuz[$z] . ",";
            $csv_dump .= $ssal[$z] . ",";
            $csv_dump .= "포장일" . $today . ",";
            $csv_dump .= $num_rowz[$z] . ",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "미역") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "미역 2g,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif (strpos($usermenuz[$z], "김") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "김 1장,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {}

        }elseif (strpos($usermenuz[$z], "무른밥(4)") !== false ) {
            if (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "쌀100g+찹쌀16g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀100g+귀리16g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀100g+현미16g";
            } elseif (strpos($usermenuz[$z], "흑미") !== false ){
                $ssal[$z] = "쌀100g+흑미16g";
            } elseif (strpos($usermenuz[$z], "퀴노아") !== false ){
                $ssal[$z] = "쌀100g+퀴노아16g";
            } elseif (strpos($usermenuz[$z], "차조") !== false ){
                $ssal[$z] = "쌀100g+차조16g";
            } elseif (strpos($usermenuz[$z], "수수") !== false ){
                $ssal[$z] = "쌀100g+수수16g";
            } elseif (strpos($usermenuz[$z], "병아리콩") !== false ){
                $ssal[$z] = "쌀100g+병아리콩20g";
            } elseif (strpos($usermenuz[$z], "렌틸콩") !== false ){
                $ssal[$z] = "쌀100g+렌틸콩20g";
            } else {
                $ssal[$z] = "쌀100g";
            }

            $csv_dump .= $usernamez[$z] . "님의,";
            $csv_dump .= $usermenuz[$z] . ",";
            $csv_dump .= $ssal[$z] . ",";
            $csv_dump .= "포장일" . $today . ",";
            $csv_dump .= $num_rowz[$z] . ",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "미역") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "미역 3g,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif (strpos($usermenuz[$z], "김") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "김 2장,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {}

        }elseif (strpos($usermenuz[$z], "무른밥") !== false ) {
            if (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "쌀75g+찹쌀12g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀75g+귀리12g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀75g+현미12g";
            } elseif (strpos($usermenuz[$z], "흑미") !== false ){
                $ssal[$z] = "쌀75g+흑미12g";
            } elseif (strpos($usermenuz[$z], "퀴노아") !== false ){
                $ssal[$z] = "쌀75g+퀴노아12g";
            } elseif (strpos($usermenuz[$z], "차조") !== false ){
                $ssal[$z] = "쌀75g+차조12g";
            } elseif (strpos($usermenuz[$z], "수수") !== false ){
                $ssal[$z] = "쌀75g+수수12g";
            } elseif (strpos($usermenuz[$z], "병아리콩") !== false ){
                $ssal[$z] = "쌀75g+병아리콩20g";
            } elseif (strpos($usermenuz[$z], "렌틸콩") !== false ){
                $ssal[$z] = "쌀75g+렌틸콩20g";
            } else {
                $ssal[$z] = "쌀75g";
            }

            $csv_dump .= $usernamez[$z] . "님의,";
            $csv_dump .= $usermenuz[$z] . ",";
            $csv_dump .= $ssal[$z] . ",";
            $csv_dump .= "포장일" . $today . ",";
            $csv_dump .= $num_rowz[$z] . ",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "미역") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "미역 3g,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif (strpos($usermenuz[$z], "김") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "김 2장,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {}


        }elseif (strpos($usermenuz[$z], "진밥(4)") !== false ) {
            if (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "쌀105g+찹쌀20g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀105g+귀리20g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀105g+현미20g";
            } elseif (strpos($usermenuz[$z], "흑미") !== false ){
                $ssal[$z] = "쌀105g+흑미20g";
            } elseif (strpos($usermenuz[$z], "퀴노아") !== false ){
                $ssal[$z] = "쌀105g+퀴노아20g";
            } elseif (strpos($usermenuz[$z], "차조") !== false ){
                $ssal[$z] = "쌀105g+차조20g";
            } elseif (strpos($usermenuz[$z], "수수") !== false ){
                $ssal[$z] = "쌀105g+수수20g";
            } elseif (strpos($usermenuz[$z], "병아리콩") !== false ){
                $ssal[$z] = "쌀105g+병아리콩20g";
            } elseif (strpos($usermenuz[$z], "렌틸콩") !== false ){
                $ssal[$z] = "쌀105g+렌틸콩20g";
            } else {
                $ssal[$z] = "쌀105g";
            }
        } elseif (strpos($usermenuz[$z], "진밥") !== false ) {
            if (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "쌀80g+찹쌀16g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀80g+귀리16g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀80g+현미16g";
            } elseif (strpos($usermenuz[$z], "흑미") !== false ){
                $ssal[$z] = "쌀80g+흑미16g";
            } elseif (strpos($usermenuz[$z], "퀴노아") !== false ){
                $ssal[$z] = "쌀80g+퀴노아16g";
            } elseif (strpos($usermenuz[$z], "차조") !== false ){
                $ssal[$z] = "쌀80g+차조16g";
            } elseif (strpos($usermenuz[$z], "수수") !== false ){
                $ssal[$z] = "쌀80g+수수16g";
            } elseif (strpos($usermenuz[$z], "병아리콩") !== false ){
                $ssal[$z] = "쌀80g+병아리콩20g";
            } elseif (strpos($usermenuz[$z], "렌틸콩") !== false ){
                $ssal[$z] = "쌀80g+렌틸콩20g";
            } else {
                $ssal[$z] = "쌀80g";
            }

            $csv_dump .= $usernamez[$z] . "님의,";
            $csv_dump .= $usermenuz[$z] . ",";
            $csv_dump .= $ssal[$z] . ",";
            $csv_dump .= "포장일" . $today . ",";
            $csv_dump .= $num_rowz[$z] . ",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "미역") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "미역 3g,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif (strpos($usermenuz[$z], "김") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "김 2장,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {}


        }elseif (strpos($usermenuz[$z], "국(4)") !== false ) {
            if (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "쌀105g+찹쌀20g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀105g+귀리20g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀105g+현미20g";
            } elseif (strpos($usermenuz[$z], "흑미") !== false ){
                $ssal[$z] = "쌀105g+흑미20g";
            } elseif (strpos($usermenuz[$z], "퀴노아") !== false ){
                $ssal[$z] = "쌀105g+퀴노아20g";
            } elseif (strpos($usermenuz[$z], "차조") !== false ){
                $ssal[$z] = "쌀105g+차조20g";
            } elseif (strpos($usermenuz[$z], "수수") !== false ){
                $ssal[$z] = "쌀105g+수수20g";
            } elseif (strpos($usermenuz[$z], "병아리콩") !== false ){
                $ssal[$z] = "쌀105g+병아리콩20g";
            } elseif (strpos($usermenuz[$z], "렌틸콩") !== false ){
                $ssal[$z] = "쌀105g+렌틸콩20g";
            } else {
                $ssal[$z] = "쌀105g";
            }

            $csv_dump .= $usernamez[$z] . "님의,";
            $csv_dump .= $usermenuz[$z] . ",";
            $csv_dump .= $ssal[$z] . ",";
            $csv_dump .= "포장일" . $today . ",";
            $csv_dump .= $num_rowz[$z] . ",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "미역") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "미역 3g,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif (strpos($usermenuz[$z], "김") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "김 2장,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {}


        } elseif (strpos($usermenuz[$z], "국") !== false ) {
            if (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "쌀80g+찹쌀16g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀80g+귀리16g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀80g+현미16g";
            } elseif (strpos($usermenuz[$z], "흑미") !== false ){
                $ssal[$z] = "쌀80g+흑미16g";
            } elseif (strpos($usermenuz[$z], "퀴노아") !== false ){
                $ssal[$z] = "쌀80g+퀴노아16g";
            } elseif (strpos($usermenuz[$z], "차조") !== false ){
                $ssal[$z] = "쌀80g+차조16g";
            } elseif (strpos($usermenuz[$z], "수수") !== false ){
                $ssal[$z] = "쌀80g+수수16g";
            } elseif (strpos($usermenuz[$z], "병아리콩") !== false ){
                $ssal[$z] = "쌀80g+병아리콩20g";
            } elseif (strpos($usermenuz[$z], "렌틸콩") !== false ){
                $ssal[$z] = "쌀80g+렌틸콩20g";
            } else {
                $ssal[$z] = "쌀80g";
            }

            $csv_dump .= $usernamez[$z] . "님의,";
            $csv_dump .= $usermenuz[$z] . ",";
            $csv_dump .= $ssal[$z] . ",";
            $csv_dump .= "포장일" . $today . ",";
            $csv_dump .= $num_rowz[$z] . ",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "미역") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "미역 3g,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif (strpos($usermenuz[$z], "김") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "김 2장,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {}


        }elseif (strpos($usermenuz[$z], "덮밥(4)") !== false ) {

            $csv_dump .= $usernamez[$z]."님의,";
            $csv_dump .= $usermenuz[$z].",";
            $csv_dump .= "전분가루 9g,";
            $csv_dump .= "포장일".$today.",";
            $csv_dump .= $num_rowz[$z].",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "쌀105g+찹쌀20g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀105g+귀리20g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀105g+현미20g";
            } elseif (strpos($usermenuz[$z], "흑미") !== false ){
                $ssal[$z] = "쌀105g+흑미20g";
            } elseif (strpos($usermenuz[$z], "퀴노아") !== false ){
                $ssal[$z] = "쌀105g+퀴노아20g";
            } elseif (strpos($usermenuz[$z], "차조") !== false ){
                $ssal[$z] = "쌀105g+차조20g";
            } elseif (strpos($usermenuz[$z], "수수") !== false ){
                $ssal[$z] = "쌀105g+수수20g";
            } elseif (strpos($usermenuz[$z], "병아리콩") !== false ){
                $ssal[$z] = "쌀105g+병아리콩20g";
            } elseif (strpos($usermenuz[$z], "렌틸콩") !== false ){
                $ssal[$z] = "쌀105g+렌틸콩20g";
            } else {
                $ssal[$z] = "쌀105g";
            }

            $csv_dump .= $usernamez[$z] . "님의,";
            $csv_dump .= $usermenuz[$z] . ",";
            $csv_dump .= $ssal[$z] . ",";
            $csv_dump .= "포장일" . $today . ",";
            $csv_dump .= $num_rowz[$z] . ",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "미역") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "미역 3g,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif (strpos($usermenuz[$z], "김") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "김 2장,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {
            }


        } elseif (strpos($usermenuz[$z], "덮밥") !== false ) {

            $csv_dump .= $usernamez[$z]."님의,";
            $csv_dump .= $usermenuz[$z].",";
            $csv_dump .= "전분가루 9g,";
            $csv_dump .= "포장일".$today.",";
            $csv_dump .= $num_rowz[$z].",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "찹쌀") !== false ){
                $ssal[$z] = "쌀80g+찹쌀16g";
            } elseif (strpos($usermenuz[$z], "귀리") !== false ){
                $ssal[$z] = "쌀80g+귀리16g";
            } elseif (strpos($usermenuz[$z], "현미") !== false ){
                $ssal[$z] = "쌀80g+현미16g";
            } elseif (strpos($usermenuz[$z], "흑미") !== false ){
                $ssal[$z] = "쌀80g+흑미16g";
            } elseif (strpos($usermenuz[$z], "퀴노아") !== false ){
                $ssal[$z] = "쌀80g+퀴노아16g";
            } elseif (strpos($usermenuz[$z], "차조") !== false ){
                $ssal[$z] = "쌀80g+차조16g";
            } elseif (strpos($usermenuz[$z], "수수") !== false ){
                $ssal[$z] = "쌀80g+수수16g";
            } elseif (strpos($usermenuz[$z], "병아리콩") !== false ){
                $ssal[$z] = "쌀80g+병아리콩20g";
            } elseif (strpos($usermenuz[$z], "렌틸콩") !== false ){
                $ssal[$z] = "쌀80g+렌틸콩20g";
            } else {
                $ssal[$z] = "쌀80g";
            }

            $csv_dump .= $usernamez[$z] . "님의,";
            $csv_dump .= $usermenuz[$z] . ",";
            $csv_dump .= $ssal[$z] . ",";
            $csv_dump .= "포장일" . $today . ",";
            $csv_dump .= $num_rowz[$z] . ",";
            $csv_dump .= "도담밀,";
            $csv_dump .= "\r\n";

            if (strpos($usermenuz[$z], "미역") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "미역 3g,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } elseif (strpos($usermenuz[$z], "김") !== false ) {

                $csv_dump .= $usernamez[$z]."님의,";
                $csv_dump .= $usermenuz[$z].",";
                $csv_dump .= "김 2장,";
                $csv_dump .= "포장일".$today.",";
                $csv_dump .= $num_rowz[$z].",";
                $csv_dump .= "도담밀,";
                $csv_dump .= "\r\n";

            } else {}




        } else {

            $array = array("현미","완두콩가루","서리태","검은콩가루","김","쌀","쌀가루","한천가루","밀가루","미역","찹쌀가루");

            $leaf_query = "SELECT * FROM menutest WHERE menu = '$usermenuz[$z]'";
            $leaf_result = mysqli_query($mysqli, $leaf_query);
            $leaf_row = mysqli_fetch_array($leaf_result);
            $leaf_rows[$z] = $leaf_row;

            $inten[$z] = array_intersect($array, preg_replace("/[0-9]/", "", $leaf_rows[$z]));

            for($k=3; $k<=8; $k=$k+1) {

                if (empty($leaf_row[$k])) {

                } else {

                    $leaf_text[$k] = $leaf_row[$k];

                    if (in_array(preg_replace("/[0-9]/","",$leaf_text[$k]), $array)) {
                        $csv_dump .= $usernamez[$z] . "님의,";
                        $csv_dump .= $usermenuz[$z] . ",";
                        $csv_dump .= $leaf_text[$k] . "g,";
                        $csv_dump .= "포장일" . $today . ",";
                        $csv_dump .= $num_rowz[$z] . ",";
                        $csv_dump .= "도담밀,";
                        $csv_dump .= "\r\n";
                    } else {

                    }

                }
            }

        }

            $z++;

    }
}

header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename='.$today.' 쌀해라벨.csv');
echo "\xEF\xBB\xBF";
echo $csv_dump;
?>