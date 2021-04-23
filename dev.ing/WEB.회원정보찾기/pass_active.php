
<?php

// 반드시 TKakaoNotificationTalk.php 와 같은 루트에 있어야해요
require_once "TKakaoNotificationTalk.php";
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$id = $_POST['userid'];
$phone = $_POST['userphone'];

$id_search = "SELECT * FROM wp_usermeta WHERE meta_value = '$phone' LIMIT 1";
$id_search_r = mysqli_query($mysqli, $id_search);
$id_search_row = mysqli_fetch_array($id_search_r);

$meta = $id_search_row[user_id];

$login_search = "SELECT * FROM wp_users WHERE ID = '$meta' LIMIT 1";
$login_result = mysqli_query($mysqli, $login_search);
$login_row = mysqli_fetch_array($login_result);

$showid = $login_row[user_login];
$metaid = $login_row[ID];

$name_search = "SELECT * FROM wp_usermeta WHERE user_id = '$metaid' AND meta_key = 'firstname'";
$name_result = mysqli_query($mysqli, $name_search);
$name_row = mysqli_fetch_array($name_result);

$name = $name_row[meta_value];

$date = date("Y-m-d");
$date = strtotime($date);

if ($id == $showid) {

    $code = 1;
    $pass = "!do" . $date . "*$";
    $passw = "[ ".$pass." ]";

    $key = "MTQ0MjAtMTYxNTg4MTMyOTgxMi1kMzVjNGM2NS00NGZhLTQ5NTAtOWM0Yy02NTQ0ZmE5OTUwMDA="; // 구매 시 발급받은 Key의 코드값 (헤더 “x-waple-authorization”의 값으로 설정하는 값을 말한다.)
    $clientId = "olivejnainc"; // {client_id} 는 API스토어에 가입한 후 해당 API를 사용(구매) 신청한 ID.
    $defaultCallBack = "0518055957"; // 발신자 전화번호
    $knt = new TKakaoNotificationTalk\TKakaoNotificationTalk($key, $clientId, $defaultCallBack);

    $body = [
        "phone" => $ars_row[$i],
        "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
        "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
        "msg" => "[임시비밀번호발급]
$name 고객님의 임시비밀번호는
$passw 입니다.

반드시 마이페이지에서 새로운 비밀번호로
변경해주시기 바랍니다.", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
        "template_code" => "DODAM08", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
    ];

    $response = $knt->postMessage($body);

    if ($response->body->result_message == "OK") {

        echo "<script>console.log(" . $response->body->cmid . ")</script>";
    } else {
        // ERROR 발송 실패.
        echo "<script>console.log(" . $response->body->result_message . ")</script>";
        echo "<script>console.log(" . $response->body->result_code . ")</script>";
    }

    $pass_up = "UPDATE `wp_users` SET `user_pass` = MD5('$pass') WHERE ID = '$metaid'";
    mysqli_query($mysqli, $pass_up);

} else {
    $code = 2;
}

?>


<div class="" id="suc">
    <div class="">
        <p>임시비밀번호가 전달되었습니다~~</p>
    </div>
    <div class="">
        <p>임시비번을 알림톡으로 보냈따아~</p>
    </div>
    <div class="">
        <a href="/login/?redirect_to=">로그인하기</a>
    </div>
</div>

<div class="" id="fail">
    <p>해당하는 정보를 찾을 수 없습니다</p>
    <!-- 다시 아이디비번찾기 페이지로 링크 -->
    <a href="">재시도</a>
</div>

<script>
var code = $(input[name="code"]).val();

if (code == 1){
    $("#suc").show();
    $("#fail").hide();
} else {
    $("#suc").hide();
    $("#fail").show();
}

</script>