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


    if( current_user_can( 'subscriber' ) ){
        $userid = get_user_meta( $current_user -> ID, 'username', true );
        $username = get_user_meta( $current_user -> ID, 'first_name', true );
        
    }
    else
    { 
        //echo "<script>alert('로그인 하지 않았거나, 대상자가 아닙니다.');location.href='/';</script>";
    }

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

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
    
    if ($today >= $today_3){
        $rotationday = date("Y-m-d", strtotime("+1 weeks",strtotime($rotationday)));
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
        
        <!--라벨은 알아서 넣어줘요 ㅠㅠ -->
        <input name="weeks" type="radio" value="1">
        <input name="weeks" type="radio" value="2">
        <input name="weeks" type="radio" value="3">
        <input name="weeks" type="radio" value="4">

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

        $("input[name=weeksto]").change(function(){
            
            var weeks = $("input[name=weeksto]").val(); 

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
        <p>신청주수</p>
        <p>다음배송출발</p>
</div>

<?php
// 모양을 잡고싶으면 아래에 있는 소스에서 하면 됩니다
        $log_query = "SELECT * FROM stoplog WHERE userid = '$userid'";
        $log_result = mysqli_query($mysqli, $log_query);
        while($log_row = mysqli_fetch_array($log_result)){

            echo '
            <div class="">
            <div class="">
            <p>일시정지 신청일 | '.$log_row[dates].'</p>
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
            <p>'.$log_row[startday].'</p>
            <p>'.$log_row[weeks].'</p>
            <p>'.$log_row[endday].'</p>
            </div>
            </div>
            ';

        }

?>



</div>


