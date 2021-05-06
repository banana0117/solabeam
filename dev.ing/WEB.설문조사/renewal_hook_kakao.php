<?php

function banana_renewal_kakao_send($subscription){

    if( ! $subscription )
    return;

    $order_date = date("Y-m-d");
    $order_id = $subscription->get_parent_id();

    $order = wc_get_order($order_id);
    $order_data = date("Y-m-d");

    $order_total = $order_data['total'];
    $order_phone = $order_data['billing']['phone'];
    $order_name = $order_data['billing']['first_name'];

    $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
    $query = "INSERT INTO `userTest` (`userid`, `name`, `deliday`, `opt`) VALUES ('$order_date', '$order_total','$order_phone', '$order_name')";
    mysqli_query($mysqli, $query);

    $user_data = "SELECT * FROM userbase WHERE phone = '$order_phone'";
    $user_result = mysqli_query($mysqli, $user_data);
    $user_row = mysqli_fetch_array($user_result);

    $mem = $user_row[membership];
    $period = $user_row[nowperiod];

    require_once "TKakaoNotificationTalk.php";
    $key = "MTQ0MjAtMTYxNTg4MTMyOTgxMi1kMzVjNGM2NS00NGZhLTQ5NTAtOWM0Yy02NTQ0ZmE5OTUwMDA="; // 구매 시 발급받은 Key의 코드값 (헤더 “x-waple-authorization”의 값으로 설정하는 값을 말한다.)
    $clientId = "olivejnainc"; // {client_id} 는 API스토어에 가입한 후 해당 API를 사용(구매) 신청한 ID.
    $defaultCallBack = "0518055957"; // 발신자 전화번호
    $knt = new TKakaoNotificationTalk\TKakaoNotificationTalk($key, $clientId, $defaultCallBack);

    $body = [
        "phone" => $order_phone,
        "callback" => "0518055957", // 발신번호 발신자번호등록 기능으로 먼저 등록해야 메시지발송이 가능합니다.
        "reqdate" => "", // 예약발송시 다음과같은 형식으로 일시를 지정한다. "20160517000000", 비워두면 즉시발송.
        "msg" => "$order_name 님의 다음 달 식단이 정상적으로 결제되었습니다.

꼼꼼하게 챙겨서 보내드릴게요! 
        
▶결제일: $order_date
▶식단명: $period $mem 식단
        
*궁금한 사항은 언제든 홈페이지 또는 고객센터로 문의 주시기 바랍니다.
        
▶고객센터: 051-805-5957", // 변수부분을 제외하고 템플릿내용 동일해야합니다.
    "template_code" => "DN0002", // 미리 APISTORE 카카오 알림톡 템플릿으로 등록승인된 템플릿의 코드값
    "btn_types" => "웹링크,웹링크",
    "btn_txts" => "마이페이지,도담가이드",
    "btn_urls1" => "https://dodammeal.com/login/?redirect_to=/con3mypage, https://dodammeal.com/con3guide",
    "btn_urls2" => "https://dodammeal.com/login/?redirect_to=/con3mypage, https://dodammeal.com/con3guide",
    ];

    $response = $knt->postMessage($body);
}

add_action('woocommerce_subscription_renewal_payment_complete', 'banana_renewal_kakao_send');
