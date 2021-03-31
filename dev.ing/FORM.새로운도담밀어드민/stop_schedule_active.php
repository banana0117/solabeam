<?php
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

//if( current_user_can( 'subscriber' ) ){
//    $userid = get_user_meta( $current_user -> ID, 'username', true );
//    $username = get_user_meta( $current_user -> ID, 'first_name', true );

//}
//else
//{ 
//    echo "<script>alert('로그인 하지 않았거나, 대상자가 아닙니다.');location.href='/';</script>";
//}

$rotationday = $_POST['rotationday'];
$weeks = $_POST['weeks'];

//$users_subscriptions = wcs_get_users_subscriptions($userid);
//foreach ($users_subscriptions as $subscription){
//   if ($subscription->has_status(array('active'))) {
//      $subscription_id = $subscription->get_id(); 
//   }
// }

$userid = "banana";
$subscription_id = "7720";


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

while ($counts <= $weeklys) {
    $i = 1;

    while ($i <= 6) {
        $userids = $userid . "-" . $i;
        $reset_query = "UPDATE shicktest SET `$remove_day`='' WHERE userid = '$userids'";
        mysqli_query($mysqli, $reset_query);
        $i++;
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

        $code_load_query = "SELECT * FROM userbase WHERE userid = '$userid'";
        $code_load_result = mysqli_query($mysqli, $code_load_query);
        $code_load_row = mysqli_fetch_array($code_load_result);
        $user_code = $code_load_row[tablecode]; // 유저테이블코드

        $table_set_query = "SELECT * FROM tablebase WHERE based = 'default'";
        $table_set_result = mysqli_query($mysqli, $table_set_query);
        $table_set_row = mysqli_fetch_array($table_set_result);

        $week_part = $table_set_row[$push_day];

        $zx = 1;

        while ($zx <= 6) {
            $users_code = $user_code . "-" . $zx;
            $add_table_user = $userid . "-" . $zx;
            $load_table_query = "SELECT * FROM tablelist WHERE codes = '$users_code'";
            $load_table_result = mysqli_query($mysqli, $load_table_query);
            $load_table_row = mysqli_fetch_array($load_table_result);

            $load_menu[$zx] = $load_table_row[$week_part];

            $load_table_update = "UPDATE `shicktest` SET `$push_day` = '$load_menu[$zx]' WHERE userid = '$add_table_user'";
            mysqli_query($mysqli, $load_table_update);
            $zx++;
        }
    }

    $time_solution = date("Y-m-d 09:00:00", strtotime("+1 weeks", strtotime($time_solution)));
    $end_days = date("Y-m-d", strtotime("+1 weeks", strtotime($end_days)));

    $count++;
    $counter = 1;
    
} //while 끗
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

?>

<div>
    <p>성공띠</p>
</div>