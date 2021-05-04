<!--<script type="text/javascript" src="/wp-content/themes/storefront-child/jquery/jquery-3.4.1.min.js"></script>-->
<!-- 제이쿼리는 필요없으면 날리세요 -->

<?php

/*

    * 배송 일시중지 페이지, 기간을 설정하면 일시정지되는 날짜가 확인되고,
    * 신청시 기간내에 식단이 비워지고 밀린 만큼 다시 채워지는 방식
    * 다음 알림문자가 가는 기간도 딜레이 된다

    * php 문 사이사이에 있는 html을 수정해서 사용하면 된다
    * php 문 건드릴 시 고장이 날 수 있다

*/


if (current_user_can('subscriber')) {
    $userid = get_user_meta($current_user->ID, 'username', true);
    $username = get_user_meta($current_user->ID, 'first_name', true);
} else {
    //echo "<script>alert('로그인 하지 않았거나, 대상자가 아닙니다.');location.href='/';</script>";
}

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$deli_data_query = "SELECT * FROM userbase WHERE userid = '$userid'";
$deli_data_result = mysqli_query($mysqli, $deli_data_query);
$deli_data_row = mysqli_fetch_array($deli_data_result);

$next_payment = $deli_data_row[nextpayment];
$deliday = $deli_data_row[deliday];
$now_period = $deli_date_row[nowperiod];
$now_mem = $deli_date_row[membership];

$baby_name_q = "SELECT * FROM research WHERE userid = '$userid'";
$baby_name_r = mysqli_query($mysqli, $baby_name_q);
$baby_name_row = mysqli_fetch_array($baby_name_r);

$baby_name = $baby_name_row[babyname];

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
$rotationday = date("Y-m-d", strtotime($today . $delilog));
$today_3 = date("Y-m-d", strtotime("+3 days", strtotime($today)));

if ($today >= $today_3) {
    $rotationday = date("Y-m-d", strtotime("+1 weeks", strtotime($rotationday)));
}

?>

<div>
    <p>일시정지 가능 배송일</p>
    <p><?php echo $rotationday ?></p>
</div>
<div>
    <!--여기서 stop_schedule_active.php 를 연결시킨 페이지를 action에 넣어주면 됩니다 예) /con2youubasic <- 처럼 새로 만들어서 -->
    <form method="POST" action="/wp-content/themes/storefront-child/csv_down/test/stop_schedule_active.php">
        <input type="hidden" name="rotationday" value="<?php echo $rotationday ?>">
        <input type="hidden" name="deliday" value="<?php echo $deliday ?>">

        <!--라벨은 알아서 넣어줘요 ㅠㅠ -->
        <input name="weeks" type="radio" value="1" checked>
        <input name="weeks" type="radio" value="2">
        <input name="weeks" type="radio" value="3">
        <input name="weeks" type="radio" value="4">

        <div class="">
            <div class="">
                <p><?php echo $baby_name ?>이를 위한</p>
                <p>도담밀 <?php echo $now_period ?> <?php echo $now_mem ?> 식단</p>
            </div>
            <div class="" id="dates">
                <p> 부터 일시정지</p>
                <p> 부터 재시작</p>
            </div>
        </div>
        <input type="submit" value="신청하기">
    </form>
</div>


<script>

    $(document).ready(function(){
        var no = $("input[name=weeks]").val();
        var rote = $("input[name=rotaionday]").val();
        var didy = $("input[name=deliday]").val();
        var url = "/wp-content/themes/storefront-child/csv_down/test/stop_schedule_get.php";
        //$("#review_cont").html("/로딩되는이미지?");
        $.get(url, {
            weeks: no,
            didy:didy,
            rote:rote
        }, function(args) {
            $("#dates").html(args);
        });
    });


    $("input[name=weeks]").on('click',function() {

        var no = $("input[name=weeks]").val();
        var rote = $("input[name=rotaionday]").val();
        var didy = $("input[name=deliday]").val();
        var url = "/wp-content/themes/storefront-child/csv_down/test/stop_schedule_get.php";
        //$("#review_cont").html("/로딩되는이미지?");
        $.get(url, {
            weeks: no,
            didy:didy,
            rote:rote
        }, function(args) {
            $("#dates").html(args);
        });
    });
</script>

<div>

    <?php
    // 모양을 잡고싶으면 아래에 있는 소스에서 하면 됩니다
    $log_query = "SELECT * FROM stoplog WHERE userid = '$userid'";
    $log_result = mysqli_query($mysqli, $log_query);
    while ($log_row = mysqli_fetch_array($log_result)) {

        $day = $log_row[startday];
        $days = $log_row[endday];

        $week = array("일요일" , "월요일"  , "화요일" , "수요일" , "목요일" , "금요일" ,"토요일");    
        
        $dayday = $week[date("w",strtotime($day))];
        $daydays = $week[date("w",strtotime($days))];

        echo '
            <div class="">
            <div class="">
            <p>일시정지 신청일 | ' . $log_row[dates] . '</p>
</div>
<div class="">
<p></p>
</div>
            <div class="">
            <p>일시정지 시작일</p>
            <p>기간</p>
            <p>일시정지 종료일</p>
            </div>
          
            <div class="">
            <p>' . $log_row[startday] . '('.$dayday.')</p>
            <p>' . $log_row[weeks] . '주</p>
            <p>' . $log_row[endday] . '('.$daydays.')</p>
            </div>
            </div>
            ';
    }

    ?>



</div>