<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>

<?php

    //if( current_user_can( 'subscriber' ) ){
        //$userid = get_user_meta( $current_user -> ID, 'username', true );
        //$username = get_user_meta( $current_user -> ID, 'first_name', true );
        //
    //}
    //else
    //{ 
        //echo "<script>alert('로그인 하지 않았거나, 대상자가 아닙니다.');location.href='/';</script>";
    //}

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

    $userid = "banana";

    $deli_data_query = "SELECT * FROM userbase WHERE userid = '$userid'";
    $deli_data_result = mysqli_query($mysqli, $deli_data_query);
    $deli_data_row = mysqli_fetch_array($deli_data_result);

    $next_payment = $deli_data_row[nextpayment];
    $deliday = $deli_data_row[deliday];

    if ($deliday == "월") {
        $delilog = "MON";
    } else if ($deliday == "화") {
        $delilog = "TUE";
    } else if ($deliday == "수") {
        $delilog = "WED";
    } else if ($deliday == "목") {
        $delilog = "THU";
    } else {
        $delilog = "FRI";
    }

    $today = date("Y-m-d");
    $rotationday = date("Y-m-d", strtotime($today.$delilog));
    $today_3 = date("Y-m-d", strtotime("+3 days", strtotime($today)));
    
    if ($today < $today_3){
        $rotationday = date("Y-m-d", strtotime("+1 weeks",strtotime($rotationday)));
    }

?>

<div>
    <p>일시정지 가능 배송일</p>
    <p><?php echo $rotationday ?></p>
</div>
<div>
    <form method="POST" action="/wp-content/themes/storefront-child/csv_down/test/stop_schedule_active.php">
        <input type="hidden" name="rotationday" vlaue="<?php echo $rotationday ?>">
        
        <select name="weeks" id="weeksto">
            <option value="1">1주</option>
            <option value="2">2주</option>
            <option value="3">3주</option>
            <option value="4">4주</option>
        </select>
        <input type="submit" value="신청하기">
    </form>
</div>

<div class="">
    <div class="">
        <p><?php echo $rotationday ?></p>
        <p id="week1">일시중지</p>
    </div>
    <div class="">
        <p><?php echo date("Y-m-d", strtotime("+1 weeks",strtotime($rotationday))) ?></p>
        <p id="week2">정상배송</p>
    </div>
    <div class="">
        <p><?php echo date("Y-m-d", strtotime("+2 weeks",strtotime($rotationday))) ?></p>
        <p id="week3">정상배송</p>
    </div>
    <div class="">
        <p><?php echo date("Y-m-d", strtotime("+3 weeks",strtotime($rotationday))) ?></p>
        <p id="week4">정상배송</p>
    </div>
</div>


<script>

        $("#weeksto").change(function(){
            
            var weeks = $("#weeksto").val(); 

            if(weeks == "1"){
                $("#week1").html('일시중지');
                $("#week2").html('정상배송');
                $("#week3").html('정상배송');
                $("#week4").html('정상배송');
            } else if(weeks == "2") {
                $("#week1").html('일시중지');
                $("#week2").html('일시중지');
                $("#week3").html('정상배송');
                $("#week4").html('정상배송');
            } else if(weeks == "3") {
                $("#week1").html('일시중지');
                $("#week2").html('일시중지');
                $("#week3").html('일시중지');
                $("#week4").html('정상배송');
            } else {
                $("#week1").html('일시중지');
                $("#week2").html('일시중지');
                $("#week3").html('일시중지');
                $("#week4").html('일시중지');
            }

        });

</script>

<div>
<div>
        <p>신청일자</p>
        <p>정지시작일</p>
        <p>정지종료일</p>
        <p>신청주수</p>
</div>

<?php



$schedule_query = "SELECT * FROM wp_actionscheduler_actions WHERE args LIKE '%4984%' ORDER BY scheduled_date_gmt DESC";
$schedule_result = mysqli_query($mysqli, $schedule_query);
$schedule_row = mysqli_fetch_array($schedule_result);

$scheduler = $schedule_row[schedule];


$postmeta_query = "SELECT * FROM wp_postmeta WHERE post_id = '4984' AND meta_key = '_schedule_next_payment'";
$postmeta_result = mysqli_query($mysqli, $postmeta_query);
$postmeta_row = mysqli_fetch_array($postmeta_result);

$postmeta = $postmeta_row[meta_value];

$time_before = date("Y-m-d H:i:s", strtotime("+9 hours", strtotime($postmeta_row[meta_value])));
$time_after = strtotime($time_before);

$changed = date("Y-m-d 09:00:00", strtotime("+1 weeks", strtotime($time_before)));
$changed_time = strtotime($changed);

$time_swap = str_replace($time_after,$changed_time,$scheduler);

echo $scheduler."<br>";
echo $time_swap."<br>";
echo $changed."<br>";
echo $time_after."<br>";




?>

</div>


