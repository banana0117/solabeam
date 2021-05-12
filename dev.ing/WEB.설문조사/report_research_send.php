<?php

/*

    * 카카오 알림톡
    * Banana ver.01.2
    * 완전 완성은 아니지만 어느정도의 완성본

    * 3주가 된 연장고객에게 메시지를 전달하는 시스템
    * 앞의 report_research_send.php 의 내용으로 DB내용을 POST로 전달받아 사용된다

    * KAKAO 알림톡 소스는 TKakaoNotificationTalk.php 와 항상 같은 디렉토리 내에 있어야 한다
    * 템플릿이나 내용의 수정이 필요한 경우 api store에서 템플릿 수정이 가능하다

    * 이파일은 홈페이지 페이지에 등록하는 것이 아닌 시스템의 일종이기에 페이지로 만들지 않아도 된다
    * storefront-child/api 디렉토리 생성해서 넣어주세요

*/

require_once "TKakaoNotificationTalk.php";

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

// 초기화
$key = "MTQ0MjAtMTYxNTg4MTMyOTgxMi1kMzVjNGM2NS00NGZhLTQ5NTAtOWM0Yy02NTQ0ZmE5OTUwMDA="; // 구매 시 발급받은 Key의 코드값 (헤더 “x-waple-authorization”의 값으로 설정하는 값을 말한다.)
$clientId = "olivejnainc"; // {client_id} 는 API스토어에 가입한 후 해당 API를 사용(구매) 신청한 ID.
$defaultCallBack = "0518055957"; // 발신자 전화번호
$knt = new TKakaoNotificationTalk\TKakaoNotificationTalk($key, $clientId, $defaultCallBack);

$count = $_REQUEST['count'];
$ars = $_REQUEST['ars'];
$today = date("Y-m-d");
$last_week_day = date("Y-m-d", strtotime("+10 days", strtotime($today)));
$last_week_days = date("Y-m-d", strtotime("+6 days", strtotime($today)));
$last_week_dayss = date("Y-m-d", strtotime("+3 days", strtotime($today)));

$arsd = preg_replace("/[ #\&\+\-%@=\/\\\:;\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $ars);

$ars_row = explode(',', $arsd);

$basic_query = "SELECT * FROM userbase WHERE news = '1' AND news = '2'";
$basic_result = mysqli_query($mysqli, $basic_query);
while($basic_row = mysqli_fetch_array($basic_result){
    $basic_array[] = $basic_row[phone];
}

$first_query = "SELECT * FROM userbase WHERE news = '3'";
$first_result = mysqli_query($mysqli, $first_query);
while($first_row = mysqli_fetch_array($first_result){
    $first_array[] = $first_row[phone];
}

$all_counter = count($ars_row);
$i = 0;

while ($i < $all_counter){

    $user_search = "SELECT * FROM userbase WHERE phone = '$ars_row[$i]'";
    $user_result = mysqli_query($mysqli, $user_search);
    $user_row = mysqli_fetch_array($user_result);

    $user_id[$i] = $user_row[userid];
    $user_name[$i] = $user_row[username];

    $data_name[$i] = preg_replace("/[ #\&\+\-%@=\/\\\:;\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $user_name[$i]);
    $data_name[$i] = preg_replace("/[0-9]/","",$data_name[$i]);

    if(in_array($ars_row[$i], $basic_array)){
        $body = [
            "phone" => $ars_row[$i],
            "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
            "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
            "msg" => "안녕하세요, $data_name[$i]님!
우리아기가 도담밀과 함께 잘 자라고 있나요? 
            
지금 아래 버튼을 눌러 설문조사에 참여해주세요!
설문 결과를 바탕으로 아기 영양보고서가 업데이트 되니 꼭 참여해주시기 바랍니다.
            
도담밀은 여러분의 소중한 후기를 바탕으로 지속적인 발전을 이루어 나가고 있습니다.
리뷰이벤트도 진행하고 있으니 홈페이지에도 놀러오세요♥
            
▶고객센터: 051-805-5957", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
    "template_code" => "DN0006", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
        "btn_types" => "웹링크,웹링크",
        "btn_txts" => "아기성장설문조사,도담밀홈페이지",
        "btn_urls1" => "https://dodammeal.com/login/?redirect_to=/con3babyresearch, https://dodammeal.com",
        "btn_urls2" => "https://dodammeal.com/login/?redirect_to=/con3babyresearch, https://dodammeal.com",
        ];
    } elseif($in_array($ars_row[$i], $first_array)){
        $body = [
            "phone" => $ars_row[$i],
            "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
            "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
            "msg" => "안녕하세요, $data_name[$i]님!
우리아기가 도담밀과 함께 잘 자라고 있나요? 
            
지금 아래 버튼을 눌러 설문조사에 참여해주세요!
설문 결과를 바탕으로 아기 영양보고서가 업데이트 되니 꼭 참여해주시기 바랍니다.
            
도담밀은 여러분의 소중한 후기를 바탕으로 지속적인 발전을 이루어 나가고 있습니다.
리뷰이벤트도 진행하고 있으니 홈페이지에도 놀러오세요♥
            
▶고객센터: 051-805-5957", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
    "template_code" => "DN0012", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
    "btn_types" => "웹링크",
    "btn_txts" => "아기성장설문조사",
    "btn_urls1" => "https://dodammeal.com/login/?redirect_to=/con3firstresearch",
    "btn_urls2" => "https://dodammeal.com/login/?redirect_to=/con3firstresearch",
        ];
    }
    
    $response = $knt->postMessage($body);
  
    if ($response->body->result_message == "OK") {
      
      echo "<script>console.log(".$response->body->cmid.")</script>";
      
  } else {
      // ERROR 발송 실패.
      echo "<script>console.log(".$response->body->result_message.")</script>";
      echo "<script>console.log(".$response->body->result_code.")</script>";
  }
 
    $next_payment_circle = date("Y-m-d", strtotime("+4 weeks", strtotime($last_week_day)));
    $update_date_query = "UPDATE userbase SET `nextpayment`='$next_payment_circle' WHERE userid = '$user_id[$i]'";
    mysqli_query($mysqli, $update_date_query);

    $i++;
}