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
    $select_table[$ax] = $day_row[membership];

    $select_deliday[$ax] = $day_row[nextdeliday];

    $select_counter[$ax] = $day_row[pkg];

    $select_snack[$ax] = $day_row[opt];

    $ax++;
}

$select_count = count($select_users);
$nx = 0;

while ($nx <= $select_count) {

    $period_array = array();
    $table_array = array();
    $side_array = array();

    if ($select_period[$nx] == "준비기") {
        array_push($period_array, "Z");
        $periods = "준비기";
    } elseif ($select_period[$nx] == "초기") {
        array_push($period_array, "X");
        $periods = "초기";
    } elseif ($select_period[$nx] == "중기") {
        array_push($period_array, "T");
        $periods = "중기";
    } elseif ($select_period[$nx] == "후기") {
        array_push($period_array, "H");
        $periods = "후기";
    } elseif ($select_period[$nx] == "유아식준비기") {
        array_push($period_array, "W");
        $periods = "유아식준비기";
    } elseif ($select_period[$nx] == "유아기") {
        array_push($period_array, "Y");
        $periods = "유아기";
    }

    if ($select_table[$nx] == "균형") {
        array_push($table_array, "A");
        $tables = "균형";
    } elseif ($select_table[$nx] == "더하기") {
        array_push($table_array, "B");
        $tables = "더하기";
    }

    if ($select_table[$nx] == "간식") {
        array_push($side_array, "K");
        $sides = "간식";
    } else {
        $sides = "";
    }


    $period_str = implode("", $period_array);
    $table_str = implode("", $table_array);
    $side_str = implode("", $side_array);

    $next_payday[0] = date("Y-m-d", strtotime($select_deliday[$nx]));
    $next_payday[1] = date("Y-m-d", strtotime("+7 days", strtotime($select_deliday[$nx])));
    $next_payday[2] = date("Y-m-d", strtotime("+14 days", strtotime($select_deliday[$nx])));
    $next_payday[3] = date("Y-m-d", strtotime("+21 days", strtotime($select_deliday[$nx])));
    $next_post_circle = date("Y-m-d", strtotime("+28 days", strtotime($select_deliday[$nx])));

    $next_deliday_query = "UPDATE userbase SET `nextdeliday` = '$next_post_circle' WHERE userid = '$select_users[$nx]'";
    mysqli_query($mysqli, $next_deliday_query);

    $period = $period_str;

    if ($select_counter[$nx] == "0") {

        if ($period_str == "Z") {
            $new_counter[$nx] = 1;
            $next_period[$nx] = "초기";
            $next_period_code[$nx] = "X";
            $period = "X";
        } elseif ($period_str == "X") {
            $new_counter[$nx] = 3;
            $next_period[$nx] = "중기";
            $next_period_code[$nx] = "T";
            $period = "T";
        } elseif ($period_str == "T") {
            $new_counter[$nx] = 3;
            $next_period[$nx] = "후기";
            $next_period_code[$nx] = "H";
            $period = "H";
        } elseif ($period_str == "H") {
            $new_counter[$nx] = 3;
            $next_period[$nx] = "유아식준비기";
            $next_period_code[$nx] = "W";
            $period = "W";
        } elseif ($period_str == "W") {
            $new_counter[$nx] = 12;
            $next_period[$nx] = "유아기";
            $next_period_code[$nx] = "Y";
            $period = "Y";
        } else {
            $period = "Z";
        }

        $update_data = "UPDATE userbase SET `pkg` = '$new_counter', `nowperiod` = '$next_period[$nx]', `periodstr`='$period' WHERE userid = '$select_users[$nx]'";
        mysqli_query($mysqli, $update_data);
    }

    $za = 0;

    while ($za < 4) {

        $next_postdays = $next_payday[$za];
        $next_postday = "SELECT * FROM tablebase WHERE based = 'default'";
        $next_postday_result = mysqli_query($mysqli, $next_postday);
        $next_postday_row = mysqli_fetch_array($next_postday_result);
        $testday[$za] = $next_postday_row[$next_postdays];

        for ($qs = 1; $qs = 6; $qs = $qs + 1) {

            $load_query = "SELECT * FROM tablelist WHERE periods = '$period' AND options = '$table_str' AND codes LIKE '%-$qs'";
            $load_result = mysqli_query($mysqli, $load_query);
            $load_row = mysqli_fetch_array($load_result);
            $load_menu[$qs] = $load_row[$testday[$za]];

            $insert_user = $select_users[$za] . "-" . $qs;

            $update_query = "UPDATE `shicktest` SET `$next_payday[$za]`='$load_menu[$qs]' where userid = '$insert_user'";
            mysqli_query($mysqli, $update_query);
        }

        if (in_array("K", $side_array)) {

            for ($ds = 1; $ds = 2; $ds = $ds + 1) {
                $load_query = "SELECT * FROM tablelist WHERE periods = '$period' AND options = '$side_str' AND codes LIKE '%-$qs'";
                $load_result = mysqli_query($mysqli, $load_query);
                $load_row = mysqli_fetch_array($load_result);
                $load_menu[$qs] = $load_row[$testday[$za]];

                $insert_user = $select_users[$za] . "-" . $qs;

                $update_query = "UPDATE `snacktable` SET `$next_payday[$za]`='$load_menu[$qs]' where userid = '$insert_user'";
                mysqli_query($mysqli, $update_query);
            }
        }
    }

    $min_query = "SELECT * FROM userbase WHERE userid = '$select_users[$nx]'";
    $min_result = mysqli_query($mysqli, $min_query);
    $min_row = mysqli_fetch_array($min_result);

    $now_counter[$nx] = $min_row[pkg];

    $now_counter[$nx] = $now_counter[$nx] - 1;

    $update_pkg_counter = "UPDATE userbase SET `pkg` = '$now_counter[$nx]' WHERE userid = '$select_users[$nx]'";
    mysqli_query($mysqli, $update_pkg_counter);

    $nx++;
}
?>