<?php

/**
 * Template Name: con3report
 */

get_header(); ?>

<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$today = date("Y-m-d"); // 오늘날짜 colum : date

$user_id = $_POST['user-name']; // 고객아이디 colum : userid
$user_phone = $_POST['user-phone']; // 고객폰 colum : userphone
$user_age = $_POST['ages']; // 엄마나이 colum : userage
$baby_name = $_POST['baby-name']; // 아기이름 colum : babyname
$baby_birth = $_POST['date']; // 아이생일 colum : birthday

$year = date("Y", $today);
$month = date("m", $today);
$day = date("d", $today);

// 생후개월계산
$baby_after_q = strtotime($today) - strtotime($baby_birth);
$baby_after_y = floor($baby_after_q / 31536000);
$baby_after_w = floor($baby_after_q / 86400);
$baby_after_day = ($baby_after_w - (365 * $baby_after_y)) + 1;
$baby_after = $baby_after_day / 30;
$baby_after = round($baby_after);

$baby_rank = $_POST['rangking']; // 아기첫째둘째 colum : rank
$baby_gender = $_POST['gender']; // 아이성별 colum : gender
$baby_cm = $_POST['cm']; // 키 colum : height
$baby_kg = $_POST['kg']; // 무게 colum : weight

//$start_time = $_POST['time']; // 시작시기 colum : startperiod
//$step1_1 = $_POST['ing']; // 진행유무 colum : ing

$newz_step_1 = $_POST['page001'];
$newz_step_1 = implode("/", $newz_step_1);
$newz_step_1_2 = $_POST['page1'];
$newz_step_1_2 = implode("/", $newz_step_1_2);

// $step1_2 = $_POST['start-dodam']; // 4주전후 colum : start
// $step1_3 = $_POST['eat']; // 고기이유식유무 colum : eat
// $step1_4 = $_POST['mix']; // 재료혼합유무 colum : mix
// $step1_5 = $_POST['foods']; // 하루이유식섭취횟수 colum : foods
// $step1_6 = $_POST['one-time']; // 한번섭취량 colum : onetime
// $step1_7 = $_POST['big-fd']; // 입자감진행 colum : bigfd

// $new_step_1 = $_POST['average44']; // 이유식진행
// $new_step_1_t = implode("/", $new_step_1);

//없어진것
//$step2_1_1 = $_POST['average']; // 수유방법 colum : average
//$step2_1_2 = $_POST['averages']; // 수유량 colum : averages
//$step2_2 = $_POST['cooking']; // 이유식어케만듬 colum : cooking
//$step2_2_i = implode("/", $step_2_2); // 배열분리


$step2_2_1 = $_POST['one-eat']; // 한번에먹는 이유식 섭취량 colum : oneeat
$step2_2_2 = $_POST['cook-eat']; // 먹어본재료 모두선택 colum : cookeat
$step2_2_2_i = implode("/", $step2_2_2); // 배열분리

//추가
$new_step_2_1 = $_POST['reselect'];
$new_step_2_1_1 = $_POST['reselect001']; // 완모
$new_step_2_2_1 = $_POST['reselect002']; // 완모
$new_step_2_1_2 = $_POST['reselect-text']; // 완모
$new_step_2_1_2_t = implode("/", $new_step_2_1_2);
$new_step_2_1_3 = $_POST['reselect-t']; // 완모


$step2_3 = $_POST['impo']; // 가장중요하게 생각하는 부분 colum : impo
$step3_1 = $_POST['family']; // 알러지가족력 colum : family
$step3_2 = $_POST['allergy']; // 알러지반응이나온재료 colum : allergy
$step3_2_i = implode("/", $step3_2); // 배열분리
$step3_2_t = $_POST['DOC_TEXT02']; // 알러지 특이사항 colum : allergyabout*
$step3_3 = $_POST['sick']; // 자주나타난 증상 colum : sick
$step3_3_i = implode("/", $step3_3); // 배열분리
$step3_3_1 = $_POST['sick001']; // 변비특이사항 colum : sick001
$step3_3_1_i = implode("/", $step3_3_1); // 배열분리
$step3_3_2 = $_POST['sick002']; // 설사특이사항 colum : sick002
$step3_3_2_i = implode("/", $step3_3_2); // 배열분리
$step3_3_3_1 = $_POST['sick003']; // 구토체크 
$step3_3_3_2 = $_POST['sick003s']; // 구토횟수하루 colum : sick003
$step3_3_3_3 = $_POST['sick003ss']; // 구토주기 colum : sick003count
$step3_3_4 = $_POST['sick004']; // 발열 colum : sick004
$step3_3_4_i = implode("/", $step3_3_4); // 배열분리  
$step3_4 = $_POST['DOC_TEXT03']; // 그외특이사항병원진단 colum : otherabout

$step3_5 = $_POST['breath'];
$step3_5_t = implode("/", $step3_5);

$ystep1_1 = $_POST['recooking']; // 유아기조리방법 colum : recooking
$ystep1_1_i = implode("/", $ystep1_1); // 배열분리

$ynew_1 = implode("/", $_POST['recooking001']); // 이유식업체명

$ystep1_2 = $_POST['one-you']; // 이유식 섭취량 colum : oneyou
$ystep1_3 = $_POST['su-you']; // 유아기 수유량 colum : suyou
$ystep1_3_1 = $_POST['su-you01']; // 유아기 수유량 colum : suyou
$ystep1_4 = $_POST['average-you']; // 유아식섭취량 colum : averageyou
$ystep1_4_1 = $_POST['average-yous']; // 먹을경우용량 colum : averageyous
$ystep1_5 = $_POST['impo-you']; // 중요하게생각하는것 colum : impoyou
$ystep2_1 = $_POST['cook-you']; // 알러지테스트 colum : cookyou
$ystep2_1_i = implode("/", $ystep2_1); // 배열분리
$ystep2_1_t = $_POST['DOC_TEXT04']; // 알러지증상 colum : allergyaboutyou*
$ystep3_3 = $_POST['sick-two']; // 아픈것 colum : sicktwo
$ystep3_3_i = implode("/", $ystep3_3); // 배열분리
$ystep3_3_1 = $_POST['con-sick']; // 변비특이사항 colum : consick
$ystep3_3_1_i = implode("/", $ystep3_3_1); // 배열분리 
$ystep3_3_2 = $_POST['diarsick']; // 설사 colum : diarsick
$ystep3_3_2_i = implode("/", $ystep3_3_2); // 배열분리
$ystep3_3_3_1 = $_POST['goo-sick']; // 구토체크 
$ystep3_3_3_2 = $_POST['goo-sicks']; // 구토횟수 colum : goosick
$ystep3_3_3_3 = $_POST['goo-sickss']; // 구토시기 colum : goosicks
$ystep3_3_4 = $_POST['foot-sick']; // 발열 colum : footsick

$ystep_4_1 = $_POST['breath-sick'];
$ystep_4_1_t = implode("/", $ystep_4_1);

$ystep3_3_4_i = implode("/", $ystep3_3_4); // 배열분리
$ystep3_4 = $_POST['DOC_TEXT05']; // 병원진단특이사항 colum : otheraboutyou

$presearch_add_query = "INSERT INTO `presearch`(`date`, `userid`, `username`, `phone`, `babyname`, `birthday`, `monthly`, `rank`, `gender`, `height`, `weight`, `start`, `eat`, `mix`, `foods`,`onetime`, `bigfd`, `average`, `oneeat`, `cookeat`, `impo`, `family`, `allergy`,`allergyabout`, `sick`, `sick001`, `sick002`, `sick003`, `sick003count`, `sick004`,`otherabout`, `recooking`, `oneyou`, `suyou`,`suyoucont`, `averageyou`, `averageyous`, `impoyou`, `cookyou`, `allergyaboutyou`, `sicktwo`, `consick`, `diarsick`, `goosick`, `goosicks`, `footsick`, `otheraboutyou`,`breath`,`reselect`,`reselect001`,`reselect002`,`reselecttext`,`reselectt`,`yoobreath`,`recookingbrand`) VALUES    ('$today','$user_id','','$user_phone','$baby_name','$baby_birth','$baby_after','$baby_rank','$baby_gender','$baby_cm','$baby_kg','$step1_2','$step1_3','$step1_4','$step1_5','$step1_6','$step1_7','$new_step_1_t','$step2_2_1','$step2_2_2_i','$step2_3','$step3_1','$step3_2_i','$step3_2_t','$step3_3_i','$step3_3_1_i','$step3_3_2_i','$step3_3_3_2','$step3_3_3_3','$step3_3_4_i','$step3_4','$ystep1_1_i','$ystep1_2','$ystep1_3','$ystep1_3_1','$ystep1_4','$ystep1_4_1','$ystep1_5','$ystep2_1_i','$ystep2_1_t','$ystep3_3_i','$ystep3_3_1_i','$ystep3_3_2_i','$ystep3_3_3_2','$ystep3_3_3_3','$ystep3_3_4_i', '$ystep3_4','$step3_5_t','$new_step_2_1','$new_step_2_1_1','$new_step_2_2_1','$new_step_2_1_2_t','$new_step_2_1_3','$ystep_4_1_t','$ynew_1')";
mysqli_query($mysqli, $presearch_add_query);

$height_graph = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
$weight_graph = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
$heigth_graph[$baby_after] = $baby_cm;
$weigth_graph[$baby_after] = $baby_kg;

//2021.04.23 새로 추가된부분
$research_add_query = "INSERT INTO `research`(`date`, `userid`, `username`, `babyname`, `gender`, `monthly`, `birthday`,`period`, `weight`, `height`, `phone`, `research`, `year`, `month`, `day`) VALUES ('$today', '$user_id' ,'$user_name', '$baby_name', '$baby_gender', '$baby_after', '$baby_birth', '$period', '$baby_kg', '$baby_cm', '$user_phone', '1', '$year', '$month', '$day')";
mysqli_query($mysqli, $research_add_query);
//새로추가된부분 끝
?>

<!-- page18 -->
<div class="survey-sub fade showSlide-last">
    <div class="edit">
        <div class="deit-title">
            <div class="deit-title-img">
                <img src="/wp-content/themes/storefront-child/con3/image/survey-img.png" alt="도담밀">     
            </div> 
            <h3>도담밀 사전 설문조사가<br>완료되었습니다.</h3>
            <span><span class="edit-count">10</span> 초 뒤 마이 페이지로 자동 이동합니다.</span>
        </div>
        <div class="dodammeal-contents">
            <p>도다밀의 다양한 컨텐츠를<br> 확인해보세요!</p>
            <div class="dodammeal-contents-img">
                <div class="img-inner">
                    <a href="https://www.instagram.com/dodammeal_official/">                
                        <img src="/wp-content/themes/storefront-child/con3/image/instar.png" alt="인스타">
                        <p>도담밀 공식<br> 인스타그램</p>
                    </a>
                </div>
                <div class="img-inner">
                    <a href="https://blog.naver.com/PostList.nhn?blogId=olivejna&parentCategoryNoe">                
                        <img src="/wp-content/themes/storefront-child/con3/image/blog.png" alt="블로그">
                        <p>도담밀 공식<br> 블로그</p>
                    </a>
                </div>
                <div class="img-inner">
                    <a href="">                
                        <img src="/wp-content/themes/storefront-child/con3/image/baby.png" alt="도담클래스">
                        <p>도담밀<br> 이유식 클래스</p>
                    </a>
                </div>
            </div>
        </div>
    </div>      

<?php
do_action('storefront_sidebar');
get_footer();
