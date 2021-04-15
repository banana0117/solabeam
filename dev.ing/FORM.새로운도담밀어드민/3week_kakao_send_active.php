<?php

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
$last_week_day = date("Y-m-d", strtotime("+7 days", strtotime($today)));

$arsd = preg_replace("/[ #\&\+\-%@=\/\\\:;\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $ars);

$ars_row = explode(',', $arsd);

$day_query = "SELECT * FROM userbase WHERE nextdeliday = '$last_week_day' AND news = '1'";
$day_result = mysqli_query($mysqli, $day_query);
while($day_row = mysqli_fetch_array($day_result)){
    $select_users[] = $day_row[userid];
}

$select_counter = count($select_users);
$i = 0;

while ($i < $select_counter){

    $user_search = "SELECT * FROM userbase WHERE phone = '$ars_row[$i]'";
    $user_result = mysqli_query($mysqli, $user_search);
    $user_row = mysqli_fetch_array($user_result);

    $user_id[$i] = $user_row[userid];
    $user_name[$i] = $user_row[username];

    $data_name[$i] = preg_replace("/[ #\&\+\-%@=\/\\\:;\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $user_name[$i]);
    $data_name[$i] = preg_replace("/[0-9]/","",$data_name[$i]);

    $body = [
        "phone" => $ars_row[$i],
        "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
        "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
        "msg" => "오늘 $data_name[$i]님의
식단이 도착할 예정입니다!
        
궁금한 사항이 있으신 경우
언제든 홈페이지 또는 고객센터로
문의 주시면 빠른 처리 도와드리겠습니다♥
        
▶택배사: CJ 대한통운
▶운송장번호: $ars_row[$i]
▶고객센터: 051-805-5957", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
    "template_code" => "DODAM07", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
    ];

    $response = $knt->postMessage($body);
  
    if ($response->body->result_message == "OK") {
      
      echo "<script>console.log(".$response->body->cmid.")</script>";
      
  } else {
      // ERROR 발송 실패.
      echo "<script>console.log(".$response->body->result_message.")</script>";
      echo "<script>console.log(".$response->body->result_code.")</script>";
  }
  
    $i++;
}