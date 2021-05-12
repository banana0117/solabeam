<?php

//con3babyresearch.php 완료페이지

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$userid = $_POST['userid'];
$today = date("Y-m-d");
$babyname = $_POST['baby'];

$cm = $_POST['cm'];

$kg = $_POST['kg'];
$su = $_POST['su'];
$sueat = $_POST['today'];
$sueating = $_POST['su-ing'];

$eusik = $_POST['num05'];
$eusikeating = $_POST['num05-sel01'];
$yooeating = $_POST['num05-sel02'];

$sahang = $_POST['num06'];
$etc = $_POST['num07'];
$etcs = $_POST['DOC_TEXT'];

$baby_gender_query = "SELECT * FROM research WHERE userid = '$userid' ORDER BY date ASC";
$baby_gender_result = mysqli_query($mysqli, $baby_gender_result);
$baby_gender_row = mysqli_fetch_array($baby_gender_result);

$baby_gender = $baby_gender_row[gender];
$baby_birth = $baby_gender_row[birthday];

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

$insert = "INSERT INTO `research` (`date`, `userid`,`username`,`babyname`,`gender`,`monthly`,`birthday`,`period`,`weight`,`height`,`unusual`,`otherunusual`, `wish`,`milk`,`nursing`,`amount`) VALUES ('$today','$userid','$username','$babyname','$baby_gender','$baby_after','$baby_birth','$period','$kg','$cm','$sahang','$etc','$etcs','$su','$sueating','$eusikeating')";
mysqli_query($mysqli, $insert);


?>

<!-- page02 -->
<div class="baby-page02 fade">
    <div class="edit">
        <div class="deit-title">
            <div class="deit-title-img">
                <img src="/wp-content/themes/storefront-child/con3/image/survey-img.png" alt="도담밀">
            </div>
            <h3>도담밀 설문조사가<br>완료되었습니다.</h3>
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