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
$arx = $_REQUEST['arx'];

$arsd = preg_replace("/[ #\&\+\-%@=\/\\\:;\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $ars);
$arxd = preg_replace("/[ #\&\+\-%@=\/\\\:;\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $arx);

$ars_row = explode(',', $arsd);
$arx_row = explode(',', $arxd);

$tracking_query = "SELECT * FROM tracking WHERE status NOT LIKE '%배달완료%'";
$tracking_result = mysqli_query($mysqli, $tracking_query);
while ($tracking_row = mysqli_fetch_array($tracking_result)) {
    $tracking_code[] = $tracking_row[code];
}

$tracking_counter = count($tracking_code);
$i = 0;

while($i < $tracking_counter){

  if(in_array($tracking_code[$i], $ars_row)){
    
    $user_search = "SELECT * FROM tracking WHERE code = '$ars_row[$i]'";
    $user_search_result = mysqli_query($mysqli, $user_search);
    while($user_search_row = mysqli_fetch_array($user_search_result)){
      $user_phone[$i] = $user_search_row[phone];
      $user_status[$i] = $user_search_row[status];
    }

    $user_phones[$i] = $user_phone[$i];

    $user_data = "SELECT * FROM userbase WHERE phone = '$user_phone[$i]'";
    $user_data_result = mysqli_query($mysqli, $user_data);
    while($user_data_row = mysqli_fetch_array($user_data_result)){
      $data_name[$i] = $user_data_row[username]; //고객명
    }
      $data_name[$i] = preg_replace("/[ #\&\+\-%@=\/\\\:;\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $data_name[$i]);
      $data_name[$i] = preg_replace("/[0-9]/","",$data_name[$i]);

    if($user_status[$i] <> $arx_row[$i]){

    //배송완료시
    if (strpos($arx_row[$i],"완료") !== false ){
      
      $body = [
          "phone" => $user_phones[$i],
          "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
          "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
          "msg" => "안녕하세요.
도담밀입니다.

고객님의 소중한 택배가 배송이 완료되었습니다.
감사합니다.", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
          "template_code" => "DODAM01", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
      ];

    } elseif(strpos($arx_row[$i],"출발") !== false ) {
      
      $body = [
        "phone" => $user_phones[$i],
        "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
        "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
        "msg" => "", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
        "template_code" => "", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
    ];

    } //elseif(strpst"출발") 

  } // 지금상태와 기존상태가 다를경우
  
  } //if(in_array > trackingcode)

  $response = $knt->postMessage($body);

  $insert_query = "UPDATE `tracking` SET `status` = '$arx_row[$i]' WHERE code = '$ars_row[$i]'";
  mysqli_query($mysqli, $insert_query);

  if ($response->body->result_message == "OK") {
    
    echo "<script>console.log(".$response->body->cmid.")</script>";
    
} else {
    // ERROR 발송 실패.
    echo "<script>console.log(".$response->body->result_message.")</script>";
    echo "<script>console.log(".$response->body->result_code.")</script>";
}

  $i++;
} //while




