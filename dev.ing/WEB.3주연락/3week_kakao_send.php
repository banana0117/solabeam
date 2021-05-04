<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>
<?php

/*

    * 3주차에 알림톡을 보내는 시스템의 시작
    * ajax url 부분에 3week_kakao_send_active.php 의 링크를 알맞게 수정해주면 된다
    * 링크의 파일은 notification_kakao 와 같은 위치에 있게 해야한다

    * 아래의 소스는 매일1번은 오픈하게 되는 페이지의 아래에 삽입하면 된다
    * 위 php 태그부터 맨아래 스크립트까지, 제이쿼리의 아래면 어느 위치든 중요하지 않다
    * 카카오 알림톡 발생 특성상 리소스를 어느정도 잡아먹기때문에 조금은 느려질 수 있다

*/

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
$today = date("Y-m-d");
$delete_query = "SELECT * FROM userbase WHERE nextdeliday = '$today' AND news='1'";
$delete_result = mysqli_query($mysqli, $delete_query);
while ($delete_row = mysqli_fetch_array($delete_result)) {

    $delete_id = $delete_row[subid];

    $real_id = $delete_id - 1;

    $order = wc_get_order($real_id);
    $subscriptions = wcs_get_subscriptions_for_order($real_id);
    foreach ($subscriptions as $subscription_id => $subscription) {
        $subscription->update_status('cancelled');
    }

    $user_query = "SELECT * FROM userbase WHERE subid = '$delete_id'";
    $user_result = mysqli_query($mysqli, $user_result);
    $user_row = mysqli_fetch_array($user_result);
    
    $c_subid = $user_row[subid];
    $c_userid = $user_row[userid];
    $c_username = $user_row[username];
    $c_phone = $user_row[phone];
    $c_address = $user_row[address];
    $c_firstperiod = $user_row[firstperiod];
    $c_membership = $user_row[membership];
    $c_opt = $user_row[opt];
    $c_delidate = $user_row[delidate];
    $c_deliday = $user_row[deliday];
    $c_postcode = $user_row[postcode];
    $c_message = $user_row[message];
    $c_limitday = $user_row[limitday];
    $c_addproduct = $user_row[addproduct];
    $c_nextpayment = $user_row[nextpayment];
    $c_nextdeliday = $user_row[nextdeliday];
    $c_tables = $user_row[tables];
    $c_super = $user_row[super];
    $c_mate = $user_row[mate];
    $c_beef = $user_row[beef];
    $c_tenloin = $user_row[tenloin];
    $c_water = $user_row[water];
    $c_snack = $user_row[snack];
    $c_snacke = $user_row[snacke];
    $c_weekend = $user_row[weekend];
    $c_care = $user_row[care];
    $c_safe = $user_row[safe];
    $c_tablecode = $user_row[tablecode];
    $c_news = $user_row[news];
    $c_pkg = $user_row[pkg];
    $c_periodstr = $user_row[periodstr];
    $c_tablestr = $user_row[tablestr];
    $c_sidestr = $user_row[sidestr];
    
    
    $cancle_query = "INSERT INTO `canclebase`(`cancledate`, `subid`, `userid`, `username`, `phone`, `address`, `firstperiod`, `membership`, `opt`, `delidate`, `deliday`, `postcode`, `message`, `limitday`, `addproduct`, `nextpayment`, `nextdeliday`, `nowperiod`, `recommend`, `tables`, `super`, `mate`, `beef`, `tenloin`, `water`, `snack`, `snacke`, `weekend`, `care`, `safe`, `tablecode`, `news`, `pkg`, `periodstr`,`tablestr`, `sidestr`) VALUES ('$today','$c_subid','$c_userid','$c_username','$c_phone','$c_address','$c_firstperiod','$c_membership', '$c_opt','$c_delidate','$c_deliday','$c_limitday','$c_addproduct','$c_nextpayment','$c_nextdeliday', '$c_tables','$c_super','$c_mate','$c_beef','$c_tenloin','$c_water','$c_snack','$c_snacke','$c_weekend','$c_care', '$c_safe','$c_tablecode','$c_news','$c_pkg','$c_periodstr','$c_tablestr','$c_sidestr')";
    mysqli_query($mysqli, $cancle_query);
    
    $delete_query = "DELETE FROM `userbase` WHERE subid = '$delete_id'";
    mysqli_query($mysqli, $delete_query);

}


$last_week_day = date("Y-m-d", strtotime("+10 days", strtotime($today)));
$last_week_days = date("Y-m-d", strtotime("+6 days", strtotime($today)));
$last_week_dayss = date("Y-m-d", strtotime("+3 days", strtotime($today)));

$day_query = "(SELECT * FROM userbase WHERE nextdeliday = '$last_week_day' AND news = '1') UNION (SELECT * FROM userbase WHERE nextdeliday = '$last_week_days' AND news = '1') UNION (SELECT * FROM userbase WHERE nextdeliday = '$last_week_dayss' AND news='1') UNION (SELECT * FROM userbase WHERE nextdeliday = '$today' WHERE news='1')";
$day_result = mysqli_query($mysqli, $day_query);
while ($day_row = mysqli_fetch_array($day_result)) {
    $select_users[] = $day_row[phone];
}

$select_count = count($select_users);

?>

<script>
    $(document).ready(function() {
        var select_array = <?php echo json_encode($select_users) ?>;
        var select_count = <?php echo $select_count ?>;
        var last_week_day = <?php echo $last_week_day ?>;

        var json_users = JSON.stringify(select_array);
        console.log(json_users);
        $.ajax({
            type: 'POST',
            url: '/wp-content/themes/storefront-child/api/3week_kakao_send_active.php',
            data: {
                count: select_count,
                ars: json_users,
                days: last_week_day,
                deluser : json_delete
            },
            success: function(data) {
                console.log(data);
            }
        });
    });
</script>