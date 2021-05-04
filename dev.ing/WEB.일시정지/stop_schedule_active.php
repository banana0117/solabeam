<?php

/*

    * 일시정지 액티브 파일
    * 일시정지 폼에서 이쪽으로 submit해올것임
    * 맨 아래부분에 일시정지가 완료되었다~ 이런 내용 적으면 됩니다

*/

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

if( current_user_can( 'subscriber' ) ){
    $userid = get_user_meta( $current_user -> ID, 'username', true );
    $username = get_user_meta( $current_user -> ID, 'first_name', true );

}
else
{ 
    echo "<script>alert('로그인 하지 않았거나, 대상자가 아닙니다.');location.href='/';</script>";
}

$rotationday = $_POST['rotationday'];
$weeks = $_POST['weeks'];

$users_subscriptions = wcs_get_users_subscriptions($userid);
foreach ($users_subscriptions as $subscription){
   if ($subscription->has_status(array('active'))) {
      $subscription_id = $subscription->get_id(); 
   }
 }

// 액션스케줄러 불러오기
$schedule_query = "SELECT * FROM wp_actionscheduler_actions WHERE args LIKE '%$subscription_id%' ORDER BY scheduled_date_gmt DESC LIMIT 1";
$schedule_result = mysqli_query($mysqli, $schedule_query);
$schedule_row = mysqli_fetch_array($schedule_result);

$scheduler = $schedule_row[schedule];

// 포스트메타 불러오기
$postmeta_query = "SELECT * FROM wp_postmeta WHERE post_id = '$subscription_id' AND meta_key = '_schedule_next_payment'";
$postmeta_result = mysqli_query($mysqli, $postmeta_query);
$postmeta_row = mysqli_fetch_array($postmeta_result);

$postmeta = $postmeta_row[meta_value];

$time_no_before = date("Y-m-d H:i:s", strtotime($postmeta_row[meta_value]));
$time_before = date("Y-m-d H:i:s", strtotime("+9 hours", strtotime($postmeta_row[meta_value])));
$time_after = strtotime($time_before);
$time_solution = $time_before;

//$changed = date("Y-m-d 09:00:00", strtotime("+1 weeks", strtotime($time_before)));
//$changed_time = strtotime($changed);

//$time_swap = str_replace($time_after,$changed_time,$scheduler);

$today = date("Y-m-d");
$push_day = $rotationday;
$remove_day = $rotationday;
$end_days = $rotationday;

$count = 1;
$counts = 1;

$weekly = $weeks;
$weeklys = $weeks;

$user_info_query = "SELECT * FROM userbase WHERE userid = '$userid'";
$user_info_result = mysqli_query($mysqli, $user_info_query);
$user_info_row = mysqli_fetch_array($deli_data_result);

$period_str = array();
$table_str = array();
$side_str = array();

$meta_name = $user_info_row[username];
$meta_tables = $user_info_row[tables];

$meta_snack = $user_info_row[opt];
$meta_nowperiod = $user_info_row[nowperiod];

array_push($meta_name, $period_str);

array_push($meta_tables, $table_str);

array_push($meta_snack, $side_str);

if (in_array("준비기", $period_str)) {
    $period = "Z";
} elseif (in_array("초기", $period_str)) {
    $period = "X";
} elseif (in_array("중기", $period_str)) {
    $period = "T";
} elseif (in_array("후기", $period_str)) {
    $period = "H";
} elseif (in_array("유아식준비기", $period_str)) {
    $period = "W";
} elseif (in_array("유아기", $period_str)) {
    $period = "Y";
}

if (in_array("균형", $table_str)) {
    $table = "A"; // 균형
} elseif (in_array("더하기", $table_str)) {
    $table = "B"; // 내맘
} else {
    $table = "P"; // 퍼스트
}


if (in_array("간식", $side_str)) {
    $snack = "K";
} 

while ($counts <= $weeklys) {
    $i = 1;

    while ($i <= 6) {
        $userids = $userid . "-" . $i;
        $reset_query = "UPDATE shicktest SET `$remove_day`='' WHERE userid = '$userids'";
        mysqli_query($mysqli, $reset_query);
        $i++;
    }

    $j=1;
    while ($j <= 4){
        $userids = $userid . "-" . $j;
        $reset_query = "UPDATE snacktable SET `$remove_day`='' WHERE userid = '$userids'";
        mysqli_query($mysqli, $reset_query);
        $j++;
    }

    $remove_day = date("Y-m-d", strtotime("+1 weeks", strtotime($remove_day)));
    $counts++;
}

$counter = $weeks;

// 변경
while ($count <= $weekly) {
   
    $userids = $userid . "-1";

    $push_day = date("Y-m-d", strtotime("+".$counter." weeks", strtotime($push_day)));

    $push_query = "SELECT * FROM shicktest WHERE userid = '$userids'";
    $push_result = mysqli_query($mysqli, $push_query);
    $push_row = mysqli_fetch_array($push_result);
    $push_empty = $push_row[$push_day];

    if (empty($push_empty)) {

        $table_set_query = "SELECT * FROM tablebase WHERE based = 'default'";
        $table_set_result = mysqli_query($mysqli, $table_set_query);
        $table_set_row = mysqli_fetch_array($table_set_result);

        $week_part = $table_set_row[$push_day];

        $zx = 1;

        while ($zx <= 6) {
            
            $add_table_user = $userid . "-" . $zx;
            $load_table_query = "SELECT * FROM tablelist WHERE periods = '$period' AND options = '$table' AND codes LIKE '%-$zx'";
            
            $load_table_result = mysqli_query($mysqli, $load_table_query);
            $load_table_row = mysqli_fetch_array($load_table_result);

            $load_menu[$zx] = $load_table_row[$week_part];

            $load_table_update = "UPDATE `shicktest` SET `$push_day` = '$load_menu[$zx]' WHERE userid = '$add_table_user'";
            mysqli_query($mysqli, $load_table_update);
            $zx++;
        }

        while ($zd <= 4) {
            
            $add_table_user = $userid . "-" . $zd;
            $load_table_query = "SELECT * FROM tablelist WHERE periods = '$period' AND snack = '$snack' AND codes LIKE '%-$zd'";
            
            $load_table_result = mysqli_query($mysqli, $load_table_query);
            $load_table_row = mysqli_fetch_array($load_table_result);

            $load_menu[$zd] = $load_table_row[$week_part];

            $load_table_update = "UPDATE `snacktable` SET `$push_day` = '$load_menu[$zd]' WHERE userid = '$add_table_user'";
            mysqli_query($mysqli, $load_table_update);
            $zd++;
        }

    }

    $time_solution = date("Y-m-d 09:00:00", strtotime("+1 weeks", strtotime($time_solution)));
    $end_days = date("Y-m-d", strtotime("+1 weeks", strtotime($end_days)));

    $count++;
    $counter = 1;
    
} //while 끗

    //로그남기기
    $rotas = date("Y-m-d", strtotime($rotationday));

    $log_query = "INSERT INTO stoplog (dates, userid, startday, weeks, endday ) VALUES ('$today', '$userid', '$rotas', '$weeks','$end_days')";
    mysqli_query($mysqli, $log_query);


    $changed = date("Y-m-d 09:00:00", strtotime("+".$weeks." weeks", strtotime($time_before)));
    $changed_t = date("Y-m-d 00:00:00", strtotime("+".$weeks." weeks", strtotime($time_no_before)));
    
    $changed_time = strtotime($changed);
    $time_swap = str_replace($time_after, $changed_time, $scheduler);

   

    //스케줄업데이트
    $meta_update = "UPDATE wp_postmeta SET `meta_value`='$changed_t' WHERE post_id = '$subscription_id' AND meta_key = '_schedule_next_payment'";
    mysqli_query($mysqli, $meta_update);
    $swap_update = "UPDATE wp_actionscheduler_actions SET `schedule`='$time_swap' WHERE args LIKE '%$subscription_id%' ORDER BY scheduled_date_gmt DESC LIMIT 1";
    mysqli_query($mysqli, $swap_update);

    $next_update = "UPDATE userbase SET `nextpayment` = '$next_days' WHERE userid = '$userid'";
    mysqli_query($mysqli, $next_update);

    $table_search_query = "SELECT * FROM userbase WHERE userid = '$userid'";
    $table_search_result = mysqli_query($mysqli, $table_search_query);
    $table_search_row = mysqli_fetch_array($table_search_result);
    $table_insert_date = $table_search_row[nextdeliday];
    $next_circle = date("Y-m-d", strtotime("+".$weeks." weeks", strtotime($table_insert_date)));

    $circle_update = "UPDATE userbase SET `nextdeliday` = '$next_circle' WHERE userid = '$userid'";
    mysqli_query($mysqli, $circle_update);




?>

<!--여기부터 html 적어서 사용하면 됩니다. 일시정지 완료창-->



<div>
    <p>성공띠</p>
</div>