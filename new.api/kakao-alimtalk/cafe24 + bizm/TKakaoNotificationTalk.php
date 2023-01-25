<?php

namespace TKakaoNotificationTalk;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php"; // For use Unirest package...
require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/unirest-php/src/Unirest.php";

/* 
* ----------------------------------------------------------------
* 2023-01-25 insight
* 새로운 카페24환경에서 작성된 버전
* 알림톡을 보내는 부분 빼고는 아직 수정X
* 나머지 부분은 필요시 천천히 수정하는걸로..
* 
* userid 부분만 수정해주면된다
* ----------------------------------------------------------------
*/
class TKakaoNotificationTalk
{

  public $userid = "rheumaez";
  public $apiUrls = array();
  public $timeOut = 10; // 초

  public function __construct()
  {
    $this->apiUrls = [
      "발송" => "https://alimtalk-api.bizmsg.kr/v2/sender/send", // 발송URL
    ];
  }

  // 메세지 발송...
  /* INPUT : $params
   * PHONE          String Yes 수신할 핸드폰번호
   * CALLBACK       String Yes 발신자 전화번호(“-“제외/숫자만 입력) “01012345678”
   * REQDATE        String Yes 발송시간(없을 경우 즉시발송) “20130529171111”(2013-05-29-17:11:11)
   * MSG            String Yes 전송할 메시지
   * TEMPLATE_CODE  String Yes 카카오 알림톡 템플릿코드
   * FAILED_TYPE    String No  카카오알림톡 전송 실패 시 전송할 메시지 타입 ( SMS, LMS, N )
   * URL            String No  알림톡 버튼 타입 URL (승인된 template 과 불일치시 전송실패), (2017-11-09 업데이트 이전 버튼 1 개 템플릿 호환)
   * URL_BUTTON_TXT String No  알림톡 버튼 타입 버튼 TEXT (승인된 template 과 불일치시 전송실패), (2017-11-09 업데이트 이전 버튼 1개 템플릿 호환)
   * FAILED_SUBJECT String No  카카오알림톡 전송 실패 시 전송할 제목 (SMS 미사용)
   * FAILED_MSG     String No  카카오알림톡 전송 실패 시 전송할 내용
   * BTN_TYPES      String No  카카오 알림톡 버튼타입 (웹링크, 앱링크, 봇키워드,메시지전달, 배송조회), 최대 5개까지 추가 가능하며 타입별 콤마로 구분함.
   * BTN_TXTS       String No  카카오 알림톡 버튼 TEXT ( BNT_TYPES 입력순으로 버튼 TEXT 입력, 승인된 템플릿과 불일치시 전송실패), TEXT별 콤마로 구분함.
   * BTN_URLS1      String No  알림톡 버튼타입 URL (2017-11-09 업데이트 이후 버튼 5개 추가시 필수) 버튼 URL 링크가2개 이상일 경우
   *                           (예제: BTN_URLS1, BTN_URLS2로 파라미터 추가), 콤마로 구분하며 웹링크, 앱링크는 URL이 필수이며, 기타(배송조회, 봇키워드, 메시지전달)은 null 값임. 
   * 
   * OUTPUT
   * 
   * Failed Type
   * RESULT_CODE String No 처리 결과 코드 ($PostMessageResults 참조)
   * RESULT_MSG  String No 잔금 부족[미발송 목록] 01012345678
   * SERIAL_NUM  String No 서버에서 생성한 request를 식별할 수 있는 유일한 키
   * 
   * 
   * < 사용 예제 >
   * 
   * REQUEST
   * URL http://api.apistore.co.kr/kko/1/msg/{client_id}
   * POST
   * Content-Type: application/x-www-form-urlencoded; charset=UTF-8
   * Header
   * x-waple-authorization:MS0xMzY1NjY2MTAyNDk0LTA2MWE4ZDgyLTZhZmMtNGU5OS05YThkLTgyNmFmYzVlOTkzZQ==
   * Parameter
   * PHONE=01011112222
   * CALLBACK=0211112222
   * MSG=테스트
   * TEMPLATE_CODE=A1111
   * BTN_TYPES=웹링크,배송조회,웹링크
   * BTN_TXTS=홈페이지,배송조회,홈페이지
   * BTN_URLS1= https://www.apistore.co.kr, ,https://www.apistore.co.kr (버튼링크가 1개일 경우)
   * FAILED_SUBJECT=테스트
   * FAILED_MSG=테스트
   * 
   * RESONSE
   * 200
   * Access-Control-Allow-Origin
   * Content-Type: application/json
   * {“result_code”:”200”,”cmid”:”2017052411064978”}
   * 
   */
  public function postMessage($params = array())
  {
    return ($this->post($this->apiUrls["발송"], $params));
  }

  /*
   * 발송 결과 조회
   * 
   * 요청 파라미터
   * Element Type    Optional Description
   * CMID    String  No       서버에서 생성한 request를 식별할 수 있는 유일한 키
   * 
   * 반환값
   * Element  Type   Optional Description
   * STATUS   String No       발송상태 1: 발송대기 2: 전송완료 3: 결과수신완료
   * PHONE    String No       수신한 핸드폰번호
   * CALLBACK String No       발신자 전화번호
   * RSLT     String Yes      카카오알림톡 결과수신 ($ResultMessages 참조)
   * MSG_RSLT String Yes      카카오알림톡 실패 시 메시지 결과수신 ($ErrorMessages 참조)
   * 
   * 
   * 사용 예제
   * 
   * REQUEST 
   * URL http://api.apistore.co.kr/kko/1/report/{client_id}?CMID=2017052411064978
   * GET
   * Content-Type: application/x-www-form-urlencoded; charset=UTF-8
   * Header
   * x-waple-authorization:MS0xMzY1NjY2MTAyNDk0LTA2MWE4ZDgyLTZhZmMtNGU5OS05YThkLTgyNmFmYzVlOTkzZQ==
   * 
   * RESONSE
   * 200
   * Access-Control-Allow-Origin: *
   * Content-Type: application/json
   * {"PHONE":"01011112222","RSLT":"0","CALLBACK":"0232894122","MSG_RSLT":"00","STATUS":"3","CMID":"2017052411064978"}
   * 
   */

  public function getReport($params = array())
  {
    // "결과조회"     => "https://api.apistore.co.kr/kko/1/report/" . $this->client_id,

    if (!$params["cmid"]) {
      throw new \Exception("CMID 값이 비어있습니다.");
    }

    return ($this->get($this->apiUrls["결과조회"], $params));
  }

  public function getReportStatusText($status)
  {
    global $ReportSendStatus;
    return ($ReportSendStatus[$status]);
  }

  public function getReportResultText($rslt)
  {
    global $ResultMessages;
    return ($ResultMessages[$rslt]);
  }

  public function getReportMsgResultText($msg_rslt)
  {
    global $ErrorMessages;
    return ($ErrorMessages[$msg_rslt]);
  }

  static public $templateStatus = [
    1 => "반환 등록",
    2 => "검수요청",
    3 => "승인",
    4 => "반려",
    5 => "승인중단",
  ];

  /*
   * 템필릿 조회
   * 
   * 요청 파라미터
   * Element       Type   Optional Description
   * TEMPLATE_CODE String Yes      템플릿코드 – 입력 안 할경우 전체 리스트 반환
   * STATUS        String Yes      검수상태 – 입력 안 할경우 전체 리스트 
   *                               반환 등록(1) / 검수요청(2) / 승인(3) / 반려(4) / 승인중단(5)
   * 
   * 반환값
   * Element           Type   Optional Description
   * TEMPLATE_CODE     String No       템플릿코드
   * TEMPLATE_NAME     String No       템플릿명
   * TEMPLATE_MSG      String No       템플릿 내용
   * STATUS            String No       등록상태(등록,검수요청,승인,반려)
   * BTNLIST           String No       버튼 리스트
   * TEMPLATE_BTN_URL  String No       버튼 URL
   * TEMPLATE_BTN_NAME String No       버튼이름
   * TEMPLATE_BTN_TYPE String No       버튼 타입
   * 
   * 사용 예제
   * 
   * REQUEST
   * URL http://api.apistore.co.kr/kko/1/template/list/{client_id}
   * GET
   * Content-Type: application/x-www-form-urlencoded; charset=UTF-8
   * Header
   * x-waple-authorization:
   * MS0xMzY1NjY2MTAyNDk0LTA2MWE4ZDgyLTZhZmMtNGU5OS05YThkLTgyNmFmYzVlOTkzZQ==
   * Parameter
   * TEMPLATE_CODE=api123&status=1
   * 
   * RESONSE
   * 200
   * Access-Control-Allow-Origin: *
   * Content-Type: application/json
   * {"template_code”:”test1","template_name":"test1","template_msg":"메시지내용","status": "등록","btnList": "template_btn_url2": null,"template_btn_name":"홈페이지",template_btn_url":"https://www.apistore.co.kr","template_btn_type”:”웹링크”}
   * 
   */

  public function getTemplate($params = array())
  {
    // "템플릿조회"   => "https://api.apistore.co.kr/kko/1//template/list/" . $this->client_id,
    return ($this->get($this->apiUrls["템플릿조회"], $params));
  }

  /*
   * 발신번호 등록
   * 
   * 요청 파라미터
   * Element    Type   Optional Description
   * sendnumber String No       발신번호(“-“ 제외) 발신번호 등록 규칙 참조
   * comment    String No       코멘트(200자)
   * pintype    String Yes      인증방법 (SMS. VMS 중 1개 선택)
   * pincode    String Yes      인증번호 (SMS 인증번호(6자리), VMS인증번호 (2자리))
   * 
   * 반환값
   * Element     Type   Optional Description
   * result_code String No       처리 결과 코드
   *                             200 : 성공
   *                             300 : 파라메터 에러
   *                             400 : 인증 업데이트 중 에러
   *                             500 : 이미 등록된 번호
   *                             600 : 일치 하지 않는 인증번호
   *                             700 : 핀코드 인증 시간 만료(3분 이후 만료이며 재등록 요청해야 함.)
   * sendnumber  String No       등록한 번호
   * 
   * 
   * 사용 예제
   * 
   * REQUEST
   * <요청>
   * URL http://api.apistore.co.kr/kko/2/sendnumber/save/{client_id}
   * POST
   * Content-Type: application/x-www-form-urlencoded; charset=UTF-8
   * Header
   * x-waple-authorization:MS0xMzY1NjY2MTAyNDk0LTA2MWE4ZDgyLTZhZmMtNGU5OS05YThkLTgyNmFmYzVlOTkzZQ==
   * Parameter
   * sendnumber=0232894122&comment=케이티하이텔대표번호&pintype=SMS 또는 VMS
   * <인증>
   * URL http://api.apistore.co.kr/kko/2/sendnumber/save/{client_id}
   * POST
   * Content-Type: application/x-www-form-urlencoded; charset=UTF-8
   * Header
   * x-waple-authorization:
   * MS0xMzY1NjY2MTAyNDk0LTA2MWE4ZDgyLTZhZmMtNGU5OS05YThkLTgyNmFmYzVlOTkzZQ==
   * Parameter
   * sendnumber=0232894122&comment=케이티하이텔대표번호&pintype=SMS&pincode=123456(6자리)
   * (pintype=VMS 일 경우 pincode=12(2자리))
   * 
   * RESPONSE
   * [요청]
   * 200
   * Access-Control-Allow-Origin: *
   * Content-Type: application/json
   * {"result_code":"200","sendnumber":"0232894122"}
   * 
   * [인증]
   * 200
   * Access-Control-Allow-Origin: *
   * Content-Type: application/json
   * {"result_code":"200","sendnumber":"0232894122"}
   * 
   */

  public function registSender($params)
  {
    // "발신번호등록" => "https://api.apistore.co.kr/kko/2/sendernumber/save/" . $this->client_id,

    if (!$params["sendnumber"]) {
      throw new \Exception("발신번호가 비어있습니다.");
    }

    if (!$params["comment"]) {
      throw new \Exception("코멘트가 비어있습니다.");
    }

    return ($this->post($this->apiUrls["발신번호등록"], $params));
  }

  /*
   * 발신번호 목록 가져오기
   * 
   * 요청 파라미터
   * Element    Type   Optional Description
   * sendnumber String Yes      발신번호(“-“제외) – 입력 안 할경우 전체 리스트 반환
   * 
   * 반환값
   * Element     Type   Optional Description
   * result_code String No       처리 결과 코드
   *                             100 : User Error
   *                             200 : OK
   *                             300 : Parameter Error
   *                             400 : Etc Error
   *                             USE_YN : Y 값은 정상 등록된 번호. N 값은 요청 후 미인증 번호.
   * client_id   String No       API스토어 계정
   * comment     String No       등록 내용
   * sendnumber  String No       등록한 번호 
   * 
   * 
   * 사용 예제
   * 
   * REQUEST
   * URL http://api.apistore.co.kr/kko/1/sendnumber/list/{client_id}
   * GET
   * Content-Type: application/x-www-form-urlencoded; charset=UTF-8
   * Header
   * x-waple-authorization:MS0xMzY1NjY2MTAyNDk0LTA2MWE4ZDgyLTZhZmMtNGU5OS05YThkLTgyNmFmYzVlOTkzZQ==
   * 
   * RESONSE
   * 200
   * Access-Control-Allow-Origin: *
   * Content-Type: application/json
   * {"result_code":"200" , “numberList": [{“client_id” : “{client_id}” , “comment” : null ,“sendnumber":"0232892888"}, {“client_id” : “{client_id}” , “comment” : null ,“sendnumber":"0212345678"}
   * 
   */

  public function getSenders($params)
  {
    // "발신번호목록" => "https://api.apistore.co.kr/kko/1/sendernumber/list/" . $this->client_id,

    return ($this->get($this->apiUrls["발신번호목록"], $params));
  }

  // API POST 호출
  public function post($url, $parameters = [])
  {

    /* 
    * ----------------------------------------------------------------
    * 
    * 2023-01-25 insight
    *
    * Header
    * Content-type : application/json
    * userid : 비즈엠 ID
    *
    * url : https://alimtalk-api.bizmsg.kr/v2/sender/send
    *
    * parameters : [ ] 처리된 json-array
    * [ { "msg":"msg", "profile":"profile" } ]
    * 
    * ----------------------------------------------------------------
    */ 

    $headers = ["Content-type" => "application/json", "userid" => "$this->userid"]; 
  
    \Unirest\Request::timeout($this->timeOut);
    $result = \Unirest\Request::post(
      $url,
      $headers,
      "[".json_encode($parameters, JSON_FORCE_OBJECT)."]"
    );

    return ($result);
  }

  // API GET 호출
  public function get($url, $parameters = array())
  {
    $headers = ["Content-type" => "application/json", "userid" => "$this->userid"];

    \Unirest\Request::timeout($this->timeOut);
    $result = \Unirest\Request::get(
      $url,
      $headers,
      "[".json_encode($parameters, JSON_FORCE_OBJECT)."]"
    );

    return ($result);
  }
}
