
<!--테스트용제이쿼리-->
<!--<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>-->
<?php

/*

    * 패키지 구매자들 식단 자동연장 쿼리문
    * 하루 한번 정도 들어가는 페이지에 설치하면 됩니다
    * 다음 4주시작일 -13일에 작업이 진행됨
    * 패키지 카운트가 차감되고 다음 시기로 넘어가는 방식임

*/

// 패키지 구매자들 식단 자동연장 쿼리문입니다
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$today = date("Y-m-d");
$last_week_day = date("Y-m-d", strtotime("-13 days", strtotime($today)));

$ax = 0;

$day_query = "SELECT * FROM userbase WHERE nextdeliday = '$last_week_day' AND news = '2'";
$day_result = mysqli_query($mysqli, $day_query);
while ($day_row = mysqli_fetch_array($day_result)) {
    $select_users[$ax] = $day_row[userid];
    $select_period[$ax] = $day_row[nowperiod];
    $select_deliday[$ax] = $day_row[nextdeliday];
    $select_counter[$ax] = $day_row[pkg];
    
    $select_super[$ax] = $day_row[super];
    $select_mate[$ax] = $day_row[mate];
    $select_beef[$ax] = $day_row[beef];
    $select_tenloin[$ax] = $day_row[tenloin];
    $select_water[$ax] = $day_row[water];
    $select_weekend[$ax] = $day_row[weekend];
    $select_care[$ax] = $day_row[care];
    $select_snack[$ax] = $day_row[snack];
    $select_safe[$ax] = $day_row[safe];
    $select_nowperiod[$ax] = $day_row[periodstr];


    $ax++;
}

$select_count = count($select_users);
$nx = 0;

while ($nx <= $select_count) {

    $period_array = array();
    $table_array = array();
    $side_array = array();



    array_push($select_nowperiod[$nx],$period_array);
    array_push($select_super[$nx], $table_array);
    array_push($select_mate[$nx], $table_array);
    array_push($select_nowperiod[$nx],$table_array);
    array_push($select_beef[$nx],$table_array);
    array_push($select_tenloin[$nx],$table_array);
    array_push($select_safe[$nx],$table_array);
    array_push($select_water[$nx],$side_array);
    array_push($select_weekend[$nx],$side_array);
    array_push($select_care[$nx],$side_array);
    array_push($select_snack[$nx],$side_array);
    

    $period_str = implode("/",$period_array);
    $table_str = implode("/",$table_array);
    $side_str = implode("/",$side_array);



    $next_payday[0] = date("Y-m-d", strtotime($select_deliday[$nx]));
    $next_payday[1] = date("Y-m-d", strtotime("+7 days", strtotime($select_deliday[$nx])));
    $next_payday[2] = date("Y-m-d", strtotime("+14 days", strtotime($select_deliday[$nx])));
    $next_payday[3] = date("Y-m-d", strtotime("+21 days", strtotime($select_deliday[$nx])));
    $next_post_circle = date("Y-m-d", strtotime("+28 days", strtotime($select_deliday[$nx])));

    $next_deliday_query = "UPDATE userbase SET `nextdeliday` = '$next_post_circle' WHERE userid = '$select_users[$nx]'";
    mysqli_query($mysqli, $next_deliday_query);

    $period = $period_str;

    if ($select_counter[$nx] == "0") {

        if ($select_nowperiod[$nx] == "Z") {
            $new_counter[$nx] = 1;
            $next_period[$nx] = "초기";
            $next_period_code[$nx] = "X";
            $period = "X";
        } elseif ($select_nowperiod[$nx] == "X") {
            $new_counter[$nx] = 3;
            $next_period[$nx] = "중기";
            $next_period_code[$nx] = "T";
            $period = "T";
        } elseif ($select_nowperiod[$nx] == "T") {
            $new_counter[$nx] = 3;
            $next_period[$nx] = "후기";
            $next_period_code[$nx] = "H";
            $period = "H";
        } elseif($select_nowperiod[$nx] == "H") {
            $new_counter[$nx] = 3;
            $next_period[$nx] = "완료기";
            $next_period_code[$nx] = "W";
            $period = "W";
        } elseif($select_nowperiod[$nx] == "W") {
            $new_counter[$nx] = 12;
            $next_period[$nx] = "유아기";
            $next_period_code[$nx] = "Y";
            $period = "Y";
        } else {
            $period = "Z";
        }

        $update_data = "UPDATE userbase SET `pkg` = '$new_counter', `nowperiod` = '$next_period[$nx]', `periodstr`='$next_period_code[$nx]' WHERE userid = '$select_users[$nx]'";
        mysqli_query($mysqli, $update_data);
    }

    $period = $period;
    $safe = $select_safe[$nx];
    $super = $select_super[$nx];
    $beef = $select_beef[$nx];
    $mate = $select_mate[$nx];
    $tenloin = $select_tenloin[$nx];


    $za = 0;

    while ($za < 4) {

        $next_postdays = $next_payday[$za];
        $next_postday = "SELECT * FROM tablebase WHERE based = 'default'";
        $next_postday_result = mysqli_query($mysqli, $next_postday);
        $next_postday_row = mysqli_fetch_array($next_postday_result);
        $testday[$za] = $next_postday_row[$next_postdays];

        for ($qs = 1; $qs = 6; $qs = $qs + 1) {

            $load_codes = $testday[$za] . "-" . $qs;
            $load_query = "SELECT * FROM tablelist WHERE periods = '$period' AND safe = '$safe' AND super = '$super' AND beef = '$beef' AND tenloin = '$tenloin' AND mate = '$mate' AND codes LIKE '%-$zx'";
            $load_result = mysqli_query($mysqli, $load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$za]];

            $insert_user = $select_users[$za] . "-" . $qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$za]`='$load_menu[$qs]' where userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);
        }
    }

    $min_query = "SELECT * FROM userbase WHERE userid = '$select_users[$nx]'";
    $min_result = mysqli_query($mysqli, $min_query);
    $min_row = mysqli_fetch_array($min_result);

    $now_counter[$nx] = $min_row[pkg];

    $now_counter[$nx] = $now_counter[$nx] - 1;

    $update_pkg_counter = "UPDATE userbase SET `pkg` = '$now_counter[$nx]' WHERE userid = '$select_users[$nx]'";

    $nx++;
}
?>