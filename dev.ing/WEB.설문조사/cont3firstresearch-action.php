<?php

//con3firstresearch.php 완료페이지

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$userid = $_POST['userid'];
$today = date("Y-m-d");

$babyname = $_POST['first'];

$cm = $_POST['cm'];

$kg = $_POST['kg'];
$su = $_POST['su'];

$type01 = $_POST['first03']; // 특이사항
$type02 = $_POST['first04']; // 그외

$type03 = $_POST['DOC_TEXT'];

$type04 = $_POST['first06']; //
$type04_1 = $_POST['first07'];
$type04_2 = $_POST['first07-ing'];//

$type05 = $_POST['first08'];
$type05_1 = $_POST['first08-sel01'];//

$type06 = $_POST['first09'];//
$type07 = $_POST['first10'];//
$type08 = $_POST['first11'];//
$type09 = $_POST['first12'];//
$type10 = $_POST['first13'];//
$type11 = $_POST['first14'];//

$type12 = $_POST['first15'];//
$type13 = $_POST['DOC_TEXT2'];//

$type14 = $_POST['first17'];//
$type15 = $_POST['first18'];//
$type16 = $_POST['first19'];//

$type17 = $_POST['first20'];//
$type18 = $_POST['DOC_TEXT3'];//
$baby_gender_query = "SELECT * FROM research WHERE userid = '$userid' ORDER BY date ASC";
$baby_gender_result = mysqli_query($mysqli, $baby_gender_result);
$baby_gender_row = mysqli_fetch_array($baby_gender_result);

$baby_gender = $baby_gender_row[gender];
$baby_birth = $baby_gender_row[birthday];

$year = date("Y", strtotime($baby_birth));
$month = date("m", strtotime($baby_birth));
$dayz = date("d", strtotime($baby_birth));

$baby_after_q = strtotime($today) - strtotime($baby_birth);
$baby_after_y = floor($baby_after_q / 31536000);
$baby_after_w = floor($baby_after_q / 86400);
$baby_after_day = ($baby_after_w - (365 * $baby_after_y)) + 1;
$baby_after = $baby_after_day / 30;
$baby_after = round($baby_after);

$user_query = "SELECT * FROM userbase WHERE userid = '$userid'";
$user_result = mysqli_query($mysqli, $user_query);
$user_row = mysqli_fetch_array($user_result);

$username = $user_row[username];
$period = $user_row[nowperiod];
$phone = $user_row[phone];

$insert = "INSERT INTO `research`(`date`, `userid`, `username`, `babyname`,`gender`, `monthly`, `birthday`, `period`, `weight`, `height`, `phone`,`research`, `satisfaction`, `yessatis`, `nonsatis`, `fresh`, `nofresh`,`milk`,`nursing`, `amount`, `unusual`, `otherunusual`, `wish`, `year`,`month`, `day`,`snack`,`snackhow`,`noeat`,`yeseat`,`others`,`sideothers`,`eatingcount`,`eatingyes`,`callpoint`) VALUES ('$today','$userid','$username','$babyname','$baby_gender','$baby_after','$baby_birth','$period','$kg','$cm','$phone','1','$type14','$type15','','$type16','','$type04','$type04_2','$type05_1','$type01','$type02','$type18','$year','$month','$dayz','$type12','$type13','$type11','$type10','$type08','$type09','$type06','$type07','$type17')";
mysqli_query($mysqli, $insert);


?>

<div class="survey-sub fade ps20 first-page03">
    <div class="first-bar">
        <div class="first-bar-gauge"></div>
    </div>
    <div class="edit">
        <div class="deit-title">
            <div class="deit-title-img">
                <img src="/wp-content/themes/storefront-child/con3/image/survey-img.png" alt="도담밀">
            </div>
            <h3>도담밀 아기 성장 설문조사가<br>완료되었습니다.</h3>
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
</div>