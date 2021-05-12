<?php

$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$today = date("Y-m-d");
$userid = $_POST['userid'];

$menu1 = $_POST['menu1'];
$menu2 = $_POST['menu2'];
$menu3 = $_POST['menu3'];
$menu4 = $_POST['menu4'];
$menu5 = $_POST['menu5'];
$menu6 = $_POST['menu6'];

$data_1_1 = $_POST['userr01-01'];
$data_1_2 = $_POST['userr01-02'];
$data_1_3 = $_POST['userr01-03'];
$data_1_4 = $_POST['score1'];
$data_1_5 = $_POST['userr01-04'];

$data_2_1 = $_POST['userr02-01'];
$data_2_2 = $_POST['userr02-02'];
$data_2_3 = $_POST['userr02-03'];
$data_2_4 = $_POST['score2'];
$data_2_5 = $_POST['userr02-04'];

$data_3_1 = $_POST['userr03-01'];
$data_3_2 = $_POST['userr03-02'];
$data_3_3 = $_POST['userr03-03'];
$data_3_4 = $_POST['score3'];
$data_3_5 = $_POST['userr03-04'];

$data_4_1 = $_POST['userr04-01'];
$data_4_2 = $_POST['userr04-02'];
$data_4_3 = $_POST['userr04-03'];
$data_4_4 = $_POST['score4'];
$data_4_5 = $_POST['userr04-04'];

$data_5_1 = $_POST['userr05-01'];
$data_5_2 = $_POST['userr05-02'];
$data_5_3 = $_POST['userr05-03'];
$data_5_4 = $_POST['score5'];
$data_5_5 = $_POST['userr05-04'];

$data_6_1 = $_POST['userr06-01'];
$data_6_2 = $_POST['userr06-02'];
$data_6_3 = $_POST['userr06-03'];
$data_6_4 = $_POST['score6'];
$data_6_5 = $_POST['userr06-04'];

$data_7_1 = $_POST['userr07-01'];
$data_7_1_1 = $_POST['userr07-108'];

$data_7_2 = $_POST['userr07-02'];
$data_7_2_1 = $_POST['userr07-209'];

$data_8_1 = $_POST['DOC_TEXT'];

$query = "INSERT INTO `menuresearch`(`date`, `userid`, `menu1`, `menu1con1`, `menu1con2`, `menu1con3`, `menu1con4`, `menu1con5`, `menu2`, `menu2con1`, `menu2con2`, `menu2con3`, `menu2con4`, `menu2con5`, `menu3`, `menu3con1`, `menu3con2`, `menu3con3`, `menu3con4`, `menu3con5`, `menu4`, `menu4con1`, `menu4con2`, `menu4con3`, `menu4con4`, `menu4con5`, `menu5`, `menu5con1`, `menu5con2`, `menu5con3`, `menu5con4`, `menu5con5`, `menu6`, `menu6con1`, `menu6con2`, `menu6con3`, `menu6con4`, `menu6con5`, `con6`, `con7`, `con8`, `con9`, `con10`) VALUES ('$today','$user','$menu1','$data_1_1','$data_1_2','$data_1_3','$data_1_4','$data_1_5','$menu2','$data_2_1','$data_2_2','$data_2_3','$data_2_4','$data_2_5','$menu3','$data_3_1','$data_3_2','$data_3_3','$data_3_4','$data_3_5','$menu4','$data_4_1','$data_4_2','$data_4_3','$data_4_4','$data_4_5','$menu5','$data_5_1','$data_5_2','$data_5_3','$data_5_4','$data_5_5','$menu6','$data_6_1','$data_6_2','$data_6_3','$data_6_4','$data_6_5','$data_7_1','$data_7_1_1','$data_7_2', '$data_7_2_1', '$data_8_1')";
mysqli_query($myqli, $query);

?>
<!-- page09 -->
<div class="survey-sub fade ps20 userr-page09">
    <div class="user-bar"></div>
    <!-- 질문5 -->
    <div class="edit">
        <div class="deit-title">
            <div class="deit-title-img">
                <img src="/wp-content/themes/storefront-child/con3/image/survey-img.png" alt="도담밀">
            </div>
            <h3>도담밀 메뉴 설문조사가<br>완료되었습니다.</h3>
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