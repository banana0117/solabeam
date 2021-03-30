<?php
 $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

        //$userid = get_user_meta( $current_user -> ID, 'username', true );
        //$username = get_user_meta( $current_user -> ID, 'first_name', true );

 $rotationday = $_POST['rotationday'];
 $weeks = $_POST['weeks'];

 $users_subscriptions = wcs_get_users_subscriptions($userid);

 foreach ($users_subscriptions as $subscription){
    if ($subscription->has_status(array('active'))) {
        $subscription_id = $subscription->get_id(); 
    }
  }

// 액션스케줄러 불러오기
$schedule_query = "SELECT * FROM wp_actionscheduler_actions WHERE args LIKE '%$subscription_id%' ORDER BY scheduled_date_gmt DESC";
$schedule_result = mysqli_query($mysqli, $schedule_query);
$schedule_row = mysqli_fetch_array($schedule_result);

$scheduler = $schedule_row[schedule];

// 포스트메타 불러오기
$postmeta_query = "SELECT * FROM wp_postmeta WHERE post_id = '$subscription_id' AND meta_key = '_schedule_next_payment'";
$postmeta_result = mysqli_query($mysqli, $postmeta_query);
$postmeta_row = mysqli_fetch_array($postmeta_result);

$postmeta = $postmeta_row[meta_value];

$time_before = date("Y-m-d H:i:s", strtotime("+9 hours", strtotime($postmeta_row[meta_value])));
$time_after = strtotime($time_before);


//스케줄러 replace

// 변경
if ($weeks == 1){

    $time_swap = preg_replace($time_after,$changed_time,$scheduler);
    
    

 } elseif ($weeks == 2){

 } elseif ($weeks == 3){

 } else {

 }