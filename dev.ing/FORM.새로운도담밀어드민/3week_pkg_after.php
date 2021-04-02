<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>
<?php
// 패키지 구매자들 식단 자동연장 쿼리문입니다
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$today = date("Y-m-d");
$last_week_day = date("Y-m-d", strtotime("+7 days", strtotime($today)));

$day_query = "SELECT * FROM userbase WHERE nextdeliday = '$last_week_day' AND news = '2'";
$day_result = mysqli_query($mysqli, $day_query);
while ($day_row = mysqli_fetch_array($day_result)) {
    $select_users[] = $day_row[userid];
    $select_period[] = $day_row[nowperiod];
    $select_deliday[] = $day_row[nextdeliday];
}

$select_count = count($select_users);
$nx = 0;

while ($nx <= $select_count) {

    $next_payday[0] = date("Y-m-d", strtotime($select_deliday));
    $next_payday[1] = date("Y-m-d", strtotime("+7 days", strtotime($select_deliday)));
    $next_payday[2] = date("Y-m-d", strtotime("+14 days", strtotime($select_deliday)));
    $next_payday[3] = date("Y-m-d", strtotime("+21 days", strtotime($select_deliday)));
    $next_post_circle = date("Y-m-d", strtotime("+28 days", strtotime($select_deliday)));

    $next_deliday_query = "UPDATE userbase SET `nextdeliday` = '$next_post_circle' WHERE userid = '$select_users[$nx]'";
    mysqli_query($mysqli, $next_deliday_query);

    $next_postdays = $next_payday[$nx];
    $next_postday = "SELECT * FROM tablebase WHERE based = 'default'";
    $next_postday_result = mysqli_query($mysqli, $next_postday);
    $next_postday_row = mysqli_fetch_array($next_postday_result);
    $testday[$nx] = $next_postday_row[$next_postdays];

    for ($qs = 1; $qs = 6; $qs = $qs + 1) {

        $load_codes = $testday[$nx] . "-" . $qs;
        $load_query = "SELECT * FROM tablelist WHERE codes = '$load_codes'";
        $load_result = mysqli_query($mysqli, $load_query);
        $load_row = mysqli_fetch_array($load_result);
        $load_menu[$qs] = $load_row[$testday[$nx]];

        $insert_user = $select_users[$nx] . "-" . $qs;

        $update_query = "UPDATE `shicktest` SET `$next_payday[$nx]`='$load_menu[$qs]' where userid = '$insert_user'";
        mysqli_query($mysqli, $update_query);
    }

    $nx++;
}
