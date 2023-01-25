<?php

require_once "TKakaoNotificationTalk.php";

// 오류확인하는법
// error_reporting( E_ALL );
// ini_set( "display_errors", 1 );

// 초기화 : api-store때 쓰던거
// $key = "MTQ0MjAtMTYxNTg4MTMyOTgxMi1kMzVjNGM2NS00NGZhLTQ5NTAtOWM0Yy02NTQ0ZmE5OTUwMDA="; // 구매 시 발급받은 Key의 코드값 (헤더 “x-waple-authorization”의 값으로 설정하는 값을 말한다.)
// $clientId = ""; // {client_id} 는 API스토어에 가입한 후 해당 API를 사용(구매) 신청한 ID.
// $defaultCallBack = ""; // 발신자 전화번호

$knt = new TKakaoNotificationTalk\TKakaoNotificationTalk();

$e_name = "김예준";
$e_date = "2023-01-25";
$url = "test";

// 버튼 파라미터
$button = ["name"  => "결과확인바로가기", "type" => "WL", "url_mobile" => "https://rheumaezresult.co.kr/$url_add", "url_pc" => "https://rheumaezresult.co.kr/$url_add"];

// 메시지 템플릿, php변수부분은 템플릿에서 #{} 변수지정해야함
$msg = "
안녕하세요, $e_name 님!\n\n
$e_date 에 류마이지내과에서 검사 받으신 결과를 확인하실 수 있습니다.\n\n
아래 버튼을 눌러 확인하실 수 있습니다^^\n
감사합니다.";
// 카카오톡 수신거부, 미가입 등일 경우 문자메시지로 발송되는 템플릿
$msg2 = "
안녕하세요, $d_name 님!
$d_check_date 에 류마이지내과에서 검사 받으신 결과를 확인하실 수 있습니다.
아래 링크를 눌러 확인하실 수 있습니다^^
감사합니다.\n
https://rheumaezresult.co.kr/$url_add";

// 메시지 발송 파라미터
$body = [
    "message_type" => "AT", // AT : 알림톡
    "phn" => "$d_phone", // 받는사람 번호
    "profile" => "7284f5caaa42c00f8f059cd2622711d5f686ef91", // 비즈엠 KEY
    "msg" => "$msg", // 메시지 템플릿, 등록한 템플릿과 같아야함
    "tmplId" => "rhemaez_01", // 템플릿 ID
    "smsKind" => "L", // 카카오톡 못받을때 문자메시지 종류 SMS, LMS, MMS
    "smsLmsTit" => "검진결과확인하기", // LMS 일경우 제목
    "smsSender" => "0517108200", // SMS 발신번호
    "msgSms" => "$msg2", // SMS 보낼때 템플릿
    "button1" =>  $button, // 버튼정보 json_array 여야함
];
//$response = $knt->registSender($body);
//$response = $knt->getTemplate($body);

// 메시지를 보내고 결과를 response에 담음
$response = $knt->postMessage($body);

// 받은 request 결과를 추출
// 결과가 성공일경우
if ($response->body[0]->code == "success") {
    //echo "CMID: " . $response->body[0]->data->msgid . "\n"; // cmid 값을 기억하고 있다가 발송결과 확인할 때 사용하면 된다.
    //echo "OK.\n";
    $result_code = $response->body[0]->data->msgid;
    echo ("<script>alert('알림톡 발송에 성공했습니다.');</script>");
} else {
    // ERROR 발송 실패일경우
    // echo "RESULT MESSAGE: " . $response->body[0]->message . "\n";
    // echo "RESULT CODE: " . $response->body[0]->code . "\n";
    $result_code = $response->body[0]->message;
    echo ("<script>alert('알림톡 발송에 실패했습니다.');</script>");
}

// 발송결과 확인. (발송결과는 발송후 즉시받을 수 있는 것이 아니므로 5분에 한번씩이라든지 주기적으로 확인해야 합니다.)
//$sendResponse = $knt->getReport(["cmid" => "2021031814421428140801"]);
//if (isset($sendResponse) 
//  && isset($sendResponse->body) 
//  && isset($sendResponse->body->CMID) 
//  && $sendResponse->body->CMID != "" 
//  && $sendResponse->body->CMID != "result is null") {
//  echo "report_status        => " . $sendResponse->body->STATUS . "\n";                                  // 발송상태 1: 발송대기 2: 전송완료 3: >결과수신완료
//  echo "report_status_text   => " . $knt->getReportStatusText($sendResponse->body->STATUS) . "\n";      // 발송상태 텍스트
//  echo "report_rslt          => " . $sendResponse->body->RSLT . "\n";                                    // 최종 카카오알림톡 결과수신
//  echo "report_rslt_text     => " . $knt->getReportResultText($sendResponse->body->RSLT) . "\n";        // 최종 카카오알림톡 결과수신 텍스트
//  echo "report_msg_rslt      => " . $sendResponse->body->msg_rslt . "\n";                                // 최종 카카오알림톡 실패 시 메시지 결과수신
//  echo "report_msg_rslt_text => " . $knt->getReportMsgResultText($sendResponse->body->msg_rslt) . "\n"; // 최종 카카오알림톡 실패 시 메시지 결과수신 텍스트
//} else {
//  echo "ERROR 발송결과 확인도중 오류발생.\n";
//}
