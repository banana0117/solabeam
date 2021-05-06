
<?php
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
require_once "TKakaoNotificationTalk.php";

$userid = $_POST['userid'];
$year = $_POST['reyear'];
$month = $_POST['remonth'];
$day = $_POST['reday'];

$date = $year.'-'.$month.'-'.$day;

$comment_1 = $POST['text1'];
$comment_2 = $POST['text2'];
$comment_3 = $POST['text3'];
$comment_4 = $POST['text4'];
$comment_5 = $POST['text5'];


$insert = "INSERT INTO `babycomment`(`date`, `userid`, `one`, `two`, `the`, `four`, `five`) VALUES ('$date', '$userid', '$comment_1','$comment_2','$comment_3','$comment_4','$comment_5')";
mysqli_query($mysqli, $insert);

// 초기화
$key = "MTQ0MjAtMTYxNTg4MTMyOTgxMi1kMzVjNGM2NS00NGZhLTQ5NTAtOWM0Yy02NTQ0ZmE5OTUwMDA="; // 구매 시 발급받은 Key의 코드값 (헤더 “x-waple-authorization”의 값으로 설정하는 값을 말한다.)
$clientId = "olivejnainc"; // {client_id} 는 API스토어에 가입한 후 해당 API를 사용(구매) 신청한 ID.
$defaultCallBack = "0518055957"; // 발신자 전화번호
$knt = new TKakaoNotificationTalk\TKakaoNotificationTalk($key, $clientId, $defaultCallBack);

$user_search = "SELECT * FROM userbase WHERE userid = '$userid'";
$user_result = mysqli_query($mysqli, $user_search);
$user_row = mysqli_fetch_array($user_result);

$user_name = $user_row[username];
$user_phone = $user_row[phone];

$body = [
    "phone" => $user_phone,
    "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
    "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
    "msg" => "안녕하세요, $user_name 님!

지금 ‘우리아기 영양사의 한 마디’가 담긴 보고서가 업데이트 되었습니다.
    
아기가 도담밀과 함께 얼마나 잘 자라고 있는지 확인하러 가볼까요?
    
그 외 궁금한 점이나 불편사항이 있으신 경우 언제든 퍼스트 전용 채널로 연락주세요!
    
▶고객센터: 051-805-5957", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
"template_code" => "DN0017", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
"btn_types" => "웹링크,웹링크",
"btn_txts" => "아기성장보고서,도담밀홈페이지",
"btn_urls1" => "https://dodammeal.com/login/?redirect_to=/con3report-check, https://dodammeal.com",
"btn_urls2" => "https://dodammeal.com/login/?redirect_to=/con3report-check, https://dodammeal.com",
];

$response = $knt->postMessage($body);
  
    if ($response->body->result_message == "OK") {
      
      echo "<script>console.log(".$response->body->cmid.")</script>";
      
  } else {
      // ERROR 발송 실패.
      echo "<script>console.log(".$response->body->result_message.")</script>";
      echo "<script>console.log(".$response->body->result_code.")</script>";
  }

?>

<p>완료~~~~~</p>
