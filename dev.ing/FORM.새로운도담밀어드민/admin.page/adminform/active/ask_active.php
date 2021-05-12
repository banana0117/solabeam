<?php 

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$no = $_POST['nos'];
$cont = $_POST['cont'];

$query = "UPDATE `onebyoneask` SET `comment`='$cont',`status`='완료됨' WHERE no = '$no'";
mysqli_query($mysqli, $query);

echo '
<p>성공적</p>
';


require_once "TKakaoNotificationTalk.php";

// 초기화.
$key = "MTQ0MjAtMTYxNTg4MTMyOTgxMi1kMzVjNGM2NS00NGZhLTQ5NTAtOWM0Yy02NTQ0ZmE5OTUwMDA="; // 구매 시 발급받은 Key의 코드값 (헤더 “x-waple-authorization”의 값으로 설정하는 값을 말한다.)
$clientId = "olivejnainc"; // {client_id} 는 API스토어에 가입한 후 해당 API를 사용(구매) 신청한 ID.
$defaultCallBack = "0518055957"; // 발신자 전화번호

$knt = new TKakaoNotificationTalk\TKakaoNotificationTalk($key, $clientId, $defaultCallBack);

$user_search = "SELECT * FROM onebyoneask WHERE no = '$no'";
$user_result = mysqli_query($mysqli, $user_search);
$user_row = mysqli_fetch_array($user_result);

$userid = $user_row[userid];

$searching = "SELECT * FROM userbase WHERE userid = '$userid'";
$result = mysqli_query($mysqli, $searching);
$row = mysqli_fetch_array($result);

$username = $row[username];
$userphone = $row[phone];

$body = [
    "phone" => $userphone,
    "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
    "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
    "msg" => "안녕하세요, 도담밀입니다.

$username 님의 질문에 대한 답변이 등록되었답니다.
        
아래 버튼을 눌러 확인해보세요!
        
▶고객센터: 051-805-595", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
    "template_code" => "DN0018", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
    "btn_types" => "웹링크,웹링크",
    "btn_txts" => "마이페이지,도담밀홈페이지",
    "btn_urls1" => "https://dodammeal.com/login/?redirect_to=/con3mypage, https://dodammeal.com",
    "btn_urls2" => "https://dodammeal.com/login/?redirect_to=/con3mypage, https://dodammeal.com",
];

$response = $knt->postMessage($body);

?>