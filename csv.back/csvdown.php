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

        if ($user_row[period] == "준비기") {
            $useridz[$z] = str_replace("-1", "", $user_row[userid]);
        } elseif ($user_row[period] == "초기") {
            $useridz[$z] = str_replace("-1", "", $user_row[userid]);
        } else {
            $useridz[$z] = str_replace("-2", "", $user_row[userid]);
        }

        $user_list[] = $useridz[$z];

        $z++;
    }
}


//엑셀쿼리


$delivery_dump = "도담밀멤버십";

$csv_dump .= "품목명,내품명,받는분성명,받는분전화번호,받는분우편번호,받는분주소,배송메세지1,";
$csv_dump .= "\r\n";

$z = 0;

$user_list = array_unique($user_list);

while ($z <= 3000) {
    $sql = "select * from userbase where userid = '$user_list[$z]'";
    $sql_result = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($sql_result)) {

        $csv_dump .= $delivery_dump . ",";
        $csv_dump .= $row[membership] . ",";
        $csv_dump .= $row[username] . ",";
        $csv_dump .= "=\"" . $row[phone] . "\",";
        $csv_dump .= "=\"" . $row[postcode] . "\",";
        $csv_dump .= $row[address] . ",";
        $csv_dump .= $row[message] . ",";
        $csv_dump .= "\r\n";

        if ($row[delidate] == $cndate) {

            if ($row[membership] == "서포터즈") {
            } else {
                $array[] = $useridz[$z];
            }
        }
    }
    $z++;
}

$count = count($array);
$xc = 0;
while ($xc < $count) {

    $newmem_query = "SELECT * FROM userbase WHERE userid = '$array[$xc]'";
    $newmem_result = mysqli_query($mysqli, $newmem_query);
    while ($new_row = mysqli_fetch_array($newmem_result)) {
        $csv_dump .= "도담밀,";
        $csv_dump .= "신규가입 사은품,";
        $csv_dump .= $new_row[username] . ",";
        $csv_dump .= "=\"" . $new_row[phone] . "\",";
        $csv_dump .= "=\"" . $new_row[postcode] . "\",";
        $csv_dump .= $new_row[address] . ",";
        $csv_dump .= $new_row[message] . ",";
        $csv_dump .= "\r\n";
    }
    $xc++;
}

$az = 1;

$normal_query = "SELECT * FROM normalorder WHERE status = 'wc-processing'";
$normal_result = mysqli_query($mysqli, $normal_query);
$count = mysqli_num_rows($normal_result);

while ($az <= $count) {

    $normalorder_query = "SELECT * FROM normalorder WHERE status = 'wc-processing'";
    $normalorder_result = mysqli_query($mysqli, $normalorder_query);
    while ($normalorder_row = mysqli_fetch_array($normalorder_result)) {

        $norder_per[$az] = $normalorder_row[period];
        $norder_qua[$az] = $normalorder_row[quantity];
        $norder_phone[$az] = $normalorder_row[phone];
        $norder_postcode[$az] = $normalorder_row[postcode];
        $norder_address[$az] = $normalorder_row[address];



        $csv_dump .= "도담밀,";
        $csv_dump .= $norder_per[$az] . " : " . $norder_qua[$az] . ",";
        $csv_dump .= $normalorder_row[username] . ",";
        $csv_dump .= "=\"" . $norder_phone[$az] . "\",";
        $csv_dump .= "=\"" . $norder_postcode[$az] . "\",";
        $csv_dump .= $norder_address[$az] . ",";
        $csv_dump .= " ,";
        $csv_dump .= "\r\n";



        $az++;
    }
}
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename=' . $today . ' 송장목록.csv');

echo "\xEF\xBB\xBF";
echo $csv_dump;
